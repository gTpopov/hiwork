<?php
    Yii::app()->clientScript->registerCssFile('/css/application/user.application/settings/index.css');
    Yii::app()->clientScript->registerCssFile('/js/library/files-upload/file-crop/jquery.Jcrop.min.css');
    $this->pageTitle = Yii::app()->user->nick.' |  Настройки'
?>
    <script>
        window.FileAPI = {
            debug: true,
            staticPath: '/js/library/files-upload/FileAPI/' // path to *.swf
        };
    </script>
    <script src="/js/library/files-upload/FileAPI/FileAPI.min.js"></script>
    <script src="/js/library/files-upload/FileAPI/FileAPI.exif.js"></script>
    <script src="/js/library/files-upload/jquery.fileapi.js"></script>
    <script src="/js/library/files-upload/file-crop/jquery.Jcrop.min.js"></script>

    <script>
        $(function(){





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