<?php

    /* @var $this RegistrationController */
    /* @var $model Users */
    /* @var $form CActiveForm */

    Yii::app()->clientScript->registerScriptFile('/js/library/password-browse.js');
    Yii::app()->clientScript->registerCssFile('/css/application/registration/index.css');
    Yii::app()->clientScript->registerScriptFile('/js/application/registration/index.js');

?>

<div class="form">
    <div class="form-control-container">
        <h2 class="text-center">Присоединяйся</h2>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'                    => 'users-index-form',
            'enableAjaxValidation'  => false,
        )); ?>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_nick_name',array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->textField($model,'user_nick_name',array(
                'placeholder' => 'Ваш никнейм'
            )); ?>
            <?php echo $form->error($model,'user_nick_name'); ?>
        </div>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_main_email',array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->textField($model,'user_main_email',array(
                'placeholder' => 'name-email@example.com'
            )); ?>
            <?php echo $form->error($model,'user_main_email'); ?>
        </div>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_password',array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->passwordField($model,'user_password',array(
                'placeholder' => 'Придумайте пароль'
            )); ?>
            <?php echo $form->error($model,'user_password'); ?>
        </div>

        <div class="col-sm-12 text-center user-accept row-in">
            <small>Регистрируясь вы автоматически соглашаетесь с нашими <a href="#">Условиями использования</a> и <a href="#">Пользовательским соглашением</a></small>
        </div>


        <div class="col-sm-12 buttons">
            <a class="pull-left" id="reparePass" href="#">Забыл пароль</a>
            <?php echo CHtml::submitButton('Присоединиться',array(
                'class' => 'btn btn-info pull-right'
            )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>

</div><!-- form -->