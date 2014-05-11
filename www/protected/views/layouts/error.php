<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            Yii::app()->clientScript->registerPackage('bootstrap')->registerCssFile('/css/application/default.css');
        ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <?php echo (string) $content;?>
    </body>
</html>
