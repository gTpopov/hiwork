<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            Yii::app()->clientScript->registerPackage('bootstrap')->registerCssFile('/css/application/default.css')
                ->registerCssFile('/css/application/default.UI.css')
                ->registerCssFile('/css/application/default.forms.css');
            Yii::app()->clientScript->registerCssFile(CHtml::normalizeUrl('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,900,700italic,900italic&subset=latin-ext,cyrillic-ext'));
        ?>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/app.design/logo.png" type="image/x-icon" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

    <div id="wrapper">
            <header class="navbar navbar-default" role="navigation">
                <div class="container-pass">
                    <div class="container-fluid pull-left" id="keeper">
                        <div class="navbar-header pull-left">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">HW</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group-keeper">
                                <input type="text" class="form-control" id="top-search" placeholder="Найти заказ...">
                            </div>
                            <button class="search-button-top"></button>
                        </form>
                        <div class="nav-container pull-right">
                            <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'encodeLabel' => false,
                                    'items'       => array(
                                        array(
                                            'label'=> '<span id="user-menu-pic" class="glyphicon glyphicon-user"> </span> '.Yii::app()->user->nick.' <b class="caret"></b>', 'url'=>array(''),
                                            'items'=>array(
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-download"> </span> Мои заказы <span class="label label-message pull-right">24</span>',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-upload"> </span> Мои заявки <span class="label label-message pull-right">4</span>',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'       => '',
                                                    'url'         => array('#'),
                                                    'itemOptions' => array('class' => 'divider')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-leaf"> </span> Коллеги <span class="label label-message pull-right">2</span>',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-inbox"> </span> Сообщения <span class="label label-message pull-right">130</span>',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-tower"> </span> Моя компания',
                                                    'url'=>array('product/new'),
                                                    'itemOptions' => array('class' => 'blocked-menu-item')
                                                ),
                                                array(
                                                    'label'       => '',
                                                    'url'         => array('#'),
                                                    'itemOptions' => array('class' => 'divider')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-dashboard"> </span> Журнал действий',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-plus-sign"> </span> Создать страницу компании',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-cog"> </span> Настройки профиля',
                                                    'url'=>array('/user/settings/index'),
                                                ),
                                                array(
                                                    'label'       => '',
                                                    'url'         => array('#'),
                                                    'itemOptions' => array('class' => 'divider')
                                                ),
                                                array(
                                                    'label'=>'<span class="glyphicon glyphicon-off"> </span> Выход',
                                                    'url'=>array('/enter/exit', 'tag'=>'exit'),
                                                ),
                                            ),
                                            'linkOptions' => array('class'=>'dropdown-toggle', 'id'=>'act-in', 'data-toggle'=>'dropdown'),
                                            'visible' => Yii::app()->user->checkAccess(1)
                                        ),
                                        array(
                                            'label'   => '<span class="glyphicon glyphicon-list-alt"></span> Заказы',
                                            'url'     => array('/index/index'),
                                        ),
                                        array(
                                            'label'   => '<span id="user-menu-pic" class="glyphicon glyphicon glyphicon-briefcase"></span> Вакансии',
                                            'url'     => array('/enter'),
                                        ),
                                        array(
                                            'label'   => '<span id="user-menu-pic" class="glyphicon glyphicon-globe"></span> Люди',
                                            'url'     => array('/enter'),
                                        ),
                                        array(
                                            'label'   => '<span class="glyphicon glyphicon-circle-arrow-right"></span> Вход',
                                            'url'     => array('/enter/index'),
                                            'visible' => Yii::app()->user->isGuest
                                        ),
                                        array(
                                            'label'   => '<span class="glyphicon glyphicon-pencil"></span> Регистрация',
                                            'url'     => array('/registration/index'),
                                            'visible' => Yii::app()->user->isGuest
                                        ),
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'nav navbar-nav pull-right'
                                    ),
                                    'submenuHtmlOptions' => array('class'=>'dropdown-menu')
                                ));
                            ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <?php print (string) $content; ?>
            </div>
        </div>

        <footer class="col-sm-12">
            <div class="ripts pull-left"> &copy; <?php print Yii::app()->name.' &centerdot; '.date('Y'); ?></div>
        </footer>

    </body>
</html>
