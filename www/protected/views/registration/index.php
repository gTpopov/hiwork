<?php

    /* @var $this RegistrationController */
    /* @var $model Users */
    /* @var $form CActiveForm */

    Yii::app()->clientScript->registerCssFile('/css/application/registration/index.css');

?>

<div class="col-sm-6">

</div>

<div class="form col-sm-5">
    <h2 class="text-center">Присоединяйся!</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'users-index-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="col-sm-12 row-in">
        <?php echo $form->labelEx($model,'user_nick_name',array(
            'class' => 'formLabel'
        )); ?>
        <?php echo $form->textField($model,'user_nick_name',array(
            'placeholder' => 'name-email@example.com'
        )); ?>
        <?php echo $form->error($model,'user_nick_name'); ?>
    </div>

    <div class="col-sm-12 row-in">
        <?php echo $form->labelEx($model,'user_main_email',array(
            'class' => 'formLabel'
        )); ?>
        <?php echo $form->textField($model,'user_main_email',array(
            'placeholder' => 'Ваш никнейм'
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


    <div class="col-sm-12 buttons">
        <a class="pull-left" id="reparePass" href="#">Забыл пароль</a>
        <?php echo CHtml::submitButton('Присоединиться',array(
            'class' => 'btn btn-info pull-right'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
