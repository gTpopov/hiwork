$(function(){

    $('.buttons').children('input').attr('disabled',true).hover(function(){
        reg_objects.button_unlock()
    });

    var reg_objects = {
        password : 'nil',
        email    : 'nil'
    };

    reg_objects.password_strong = function(password_field,alert_field){
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");

        if (false == enoughRegex.test(password_field.val()))
        {
            alert_field.html('').css('color','#F00').html('Должно быть больше 8 символов');
        }
        else if (strongRegex.test(password_field.val()))
        {
            alert_field.html('').css('color','#F90').html('Сложный пароль');
        }
        else if (mediumRegex.test(password_field.val()))
        {
            alert_field.html('').css('color','#FC0').html('Средняя сложность');
        }
        else
        {
            alert_field.html('').css('color','#08c').html('Низкая сложность');
        }
        return true;
    };

    reg_objects.button_unlock = function(){

        if($('#Users_user_main_email').val() != '') reg_objects.email  = true; else  reg_objects.email  = 'nil';
        if($('#Users_user_password').val() != '' && $('#Users_user_password').val().length > 7 ) reg_objects.password = true; else  reg_objects.password  = 'nil';

        if(reg_objects.email === true && reg_objects.password === true && $('#Users_user_nick_name').val() != ''){
            $('.buttons').children('input').attr('disabled',false);
        }else{
            $('.buttons').children('input').attr('disabled',true);
        }

    };

    $('#Users_user_nick_name').keyup(function(){
        reg_objects.button_unlock();
    });

    $('#Users_user_main_email').keyup(function(){

        reg_objects.button_unlock();

        if( $(this).val() == '' || !/[а-яА-ЯЁё]/.test( $(this).val() ) )
        {
            $(this).prev('label').css('color','#444b53').children('#email-alert-in-label').remove();
        }
        else
        {
            var lang_keyboard_message = '<small id="email-alert-in-label" class="pull-right">Поменяйте раскадку клавиатуры</small>';
            $(this).prev('label').css('color','#f00').html('').html('Email'+lang_keyboard_message);
        }

    });

    $('#Users_user_password').keyup(function(){

        reg_objects.button_unlock();

        if( $(this).val() == '' )
        {
            $(this).prev('label').children('#password-alert-in-label').remove();
            reg_objects.button_unlock();
        }
        else {

            var lang_keyboard_message = '<small id="password-alert-in-label" class="pull-right"></small>';

            $(this).prev('label').html('').html('Пароль'+lang_keyboard_message);
            reg_objects.password_strong($(this),$('#password-alert-in-label'));

        }



    });





});