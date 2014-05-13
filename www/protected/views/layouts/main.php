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
                        <div class="nav-container nav-user pull-left">
                            <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'encodeLabel' => false,
                                    'items'       => array(
                                        array(
                                            'label'=> Yii::app()->user->nick.' <b class="caret"></b>', 'url'=>array(''),
                                            'items'=>array(
                                                array(
                                                    'label'=>'Журнал действий',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'Создать страницу компании',
                                                    'url'=>array('product/new','tag'=>'new')
                                                ),
                                                array(
                                                    'label'=>'Настройки',
                                                    'url'=>array('product/index'),
                                                ),
                                                array(
                                                    'label'       => '',
                                                    'url'         => array('#'),
                                                    'itemOptions' => array('class' => 'divider')
                                                ),
                                                array(
                                                    'label'=>'Выход',
                                                    'url'=>array('/enter/exit', 'tag'=>'exit'),
                                                ),
                                            ),
                                            'linkOptions' => array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
                                            'visible' => Yii::app()->user->checkAccess(1)
                                        ),
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'nav navbar-nav pull-left'
                                    ),
                                    'submenuHtmlOptions' => array('class'=>'dropdown-menu')
                                ));
                            ?>
                        </div>
                        <div class="nav-container pull-right">
                            <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'encodeLabel' => false,
                                    'items'       => array(
                                        array(
                                            'label'   => 'Вход',
                                            'url'     => array('/enter'),
                                            'visible' => Yii::app()->user->isGuest
                                        ),
                                        array(
                                            'label'   => 'Регистрация',
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
