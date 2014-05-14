/*$(function(){

    window.FileAPI = {
        debug: true,
        staticPath: '/js/library/files-upload/FileAPI/' // path to *.swf
    };

    var url = window.location.href.split('/'), protocol = url[0], host = url[2], baseUrl = protocol + '://' + host;

    $('#upload-area-layout').fileapi({
        url         : baseUrl+'/user/settings/uploadLayout',
        accept      : 'image/*',
        multiple    : true,
        imageSize   : { minWidth: 200, minHeight: 200 },
        maxSize     : 2 * FileAPI.MB,
        autoUpload  : true,
        elements    : {
            active  : { show: '.img-view', hide: '.uploader-empty' },
            preview : { el:   '.img-view', width: 200, height: 200}
        }
    });

});*/