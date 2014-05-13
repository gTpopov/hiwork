<?php

    /* @var $this  RegistrationController */
    /* @var $model Users */
    /* @var $form  CActiveForm */

    Yii::app()->clientScript->registerCssFile('/css/application/registration/index.css')
        ->registerScriptFile('/js/application/registration/index.js');

    $this->pageTitle = Yii::app()->name.'| Ресгистрация'

?>

<div class="form">
    <?php

        if(Yii::app()->user->hasFlash('success-registration')){

            print
                '<div class="alert text-center alert-success">
                    <p class="alert-message">'.Yii::app()->user->getFlash('success-registration').'</p>
                    <span class="close alert-close" data-dismiss="alert" aria-hidden="true">&times;</span>
                </div>';

        }else if(Yii::app()->user->hasFlash('failed-registration')){
            print
                '<div class="alert text-center alert-danger">
                    <p class="alert-message">'.Yii::app()->user->getFlash('failed-registration').'</p>
                    <span class="close alert-close" data-dismiss="alert" aria-hidden="true">&times;</span>
                </div>';
        }

    ?>
    <div class="form-control-container">
        <h2 class="text-center">Присоединяйся</h2>
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'enableAjaxValidation'   => false,
                'clientOptions'          => array(
                    'validateOnSubmit' => true
                ),
            ));
        ?>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_nick_name', array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->textField($model,'user_nick_name', array(
                'placeholder' => 'Ваш никнейм'
            )); ?>
            <?php echo $form->error($model,'user_nick_name', array(
                'class' => 'alert alert-danger'
            )); ?>
        </div>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_main_email', array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->emailField($model,'user_main_email', array(
                'placeholder' => 'name-email@example.com'
            )); ?>
            <?php echo $form->error($model,'user_main_email', array(
                'class' => 'alert alert-danger'
            )); ?>
        </div>

        <div class="col-sm-12 row-in">
            <?php echo $form->labelEx($model,'user_password', array(
                'class' => 'formLabel'
            )); ?>
            <?php echo $form->passwordField($model,'user_password', array(
                'placeholder' => 'Придумайте пароль',
                'minlength'   => 8,
                'maxlength'   => 32
            )); ?>
            <?php echo $form->error($model,'user_password', array(
                'class' => 'alert alert-danger'
            )); ?>
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