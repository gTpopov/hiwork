<?php
    Yii::app()->clientScript->registerCssFile('/css/application/user.application/settings/index.css');
    Yii::app()->clientScript->registerCssFile('/js/library/files-upload/file-crop/jquery.Jcrop.min.css');
    Yii::app()->clientScript->registerScriptFile('/js/application/user.application/settings/exif.init.js')
        ->registerScriptFile('/js/library/files-upload/FileAPI/FileAPI.min.js')
        ->registerScriptFile('/js/library/files-upload/FileAPI/FileAPI.exif.js')
        ->registerScriptFile('/js/library/files-upload/jquery.fileapi.js')
        ->registerScriptFile('/js/application/user.application/settings/index.js');
        //->registerScriptFile('/js/library/files-upload/file-crop/jquery.Jcrop.min.js');
    $this->pageTitle = Yii::app()->user->nick.' |  Настройки'
?>
    <script>
        $(function(){



            var url = window.location.href.split('/'), protocol = url[0], host = url[2], baseUrl = protocol + '://' + host;

            $('.uploader-empty').fileapi({
                url         : '/user/settings/uploadLayout',
                accept      : 'image/*',
                multiple    : true,
                imageSize   : { minWidth: 200, minHeight: 200 },
                maxSize     : 2 * FileAPI.MB,
                autoUpload  : true,
                onSelect    : function(evt,ui){
                    var file = ui.files[0];
                    if(file.length > 0){
                        $('.img-view').cropper({
                            file      : file,
                            bgColor   : '#fff',
                            maxSize   : [$(window).width()-100, $(window).height()-100],
                            minSize   : [200, 200],
                            selection : '90%'
                        });
                    }
                }
            });

        });
    </script>


    <div class="modal fade" id="change-layout-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Изменить обложку профиля</h4>
                </div>
                <div class="modal-body" id="change-user-picture-area">

                    <div class="uploader-empty text-center">
                        <span></span>
                        <?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
                            <?php echo CHtml::activeFileField($image, 'image', array('id'=>'upload-area-layout')); ?>
                        <?php echo CHtml::endForm(); ?>
                    </div>

                    <div class="img-view">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-info btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 first-block">
        <div class="photo-layout"><div id="change-layout" class="btn btn-success" data-toggle="modal" data-target="#change-layout-modal">Редактировать</div></div>
        <div class="col-sm-3 user-info-in-first-block">
            <div class="user-picture no-picture" data-toggle="tooltip" data-placement="top" title="Кликните, чтобы добавить фото профиля"></div>
            <div class="user-name text-center">
                <b data-toggle="tooltip" data-placement="bottom" title="Кликните, чтобы изменить"><?php print $user_data['user_first_name'].Yii::app()->user->nick.$user_data['user_last_name'];?></b>
            </div>
        </div>
    </div>