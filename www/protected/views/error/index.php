<?php
    Yii::app()->clientScript->registerCssFile('/css/application/error/index.css');
?>

    <div class="col-sm-12 text-center">
        <h2 id="error-tab-header">Ошибка №<?php print (string) $code; ?></h2>
        <p><?php print (string) $message; ?></p>
        <a href="#">На главную</a>
    </div>