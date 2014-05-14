<?php

    /* @var $class EnterController */
    /* @var $model LoginForm */
    /* @var $form  CActiveForm */

    Yii::app()->clientScript->registerCssFile('/css/application/enter/index.css')
        ->registerScriptFile('/js/application/enter/index.js');

    $this->pageTitle = Yii::app()->name.' | Вход '

?>


<div class="form">
    <div class="form-control-container">
        <h2 class="text-center">Вход</h2>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'                    => 'login-form-index-form',
            'enableAjaxValidation'  => false,

        )); ?>

        <div class="row-in col-sm-12">
            <?php echo $form->labelEx($model,'user_main_email', array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->textField($model,'user_main_email', array(
                'class'       => 'alert alert-danger',
                'placeholder' => 'name-email@example.com'
            )); ?>
            <?php echo $form->error($model,'user_main_email', array(
                'class' => 'alert alert-danger alert-form-danger'
            )); ?>
        </div>

        <div class="row-in col-sm-12">
            <?php echo $form->labelEx($model,'user_password', array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->passwordField($model,'user_password', array(
                'class' => 'alert alert-danger',
                'placeholder' => 'Ваш пароль'
            )); ?>
            <?php echo $form->error($model,'user_password', array(
                'class' => 'alert alert-danger alert-form-danger'
            )); ?>
        </div>

        <div class="row-in col-sm-12 buttons">
            <div class="pull-left rem-me-box">
                <a class="pull-left" id="reparePass" href="#">Забыл пароль</a>
                <div class="pull-right">
                    <?php echo $form->labelEx($model,'remember_me', array(
                        'class' => 'formLabel'
                    )); ?>
                    <?php echo $form->checkBox($model,'remember_me'); ?>
                </div>
            </div>
            <div class="pull-right">
                <?php echo CHtml::submitButton('Войти', array(
                    'class' => 'btn btn-info'
                )); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
    <img id="shadow" src="/images/app.design/shadow-bottom-img.png">

</div><!-- form -->