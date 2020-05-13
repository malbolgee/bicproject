$(document).ready(function(){

    $('#username_').on('change', function(){

        var username = document.getElementById('username_').value;

        if (username == '')
        {

            input_cleanup('username');
            return;

        }

        if (!(/^[0-9A-Za-z]*$/.exec(username)))
        {

            $('#username-icon-available').toggleClass('is-hidden', true);
            $("#username-icon-notavailable").toggleClass('is-hidden', false);
            $('#username-available-message').toggleClass('is-hidden', true);
            $('#username-notavailable-message').toggleClass('is-hidden', true);
            $('#username-notvalid-message').toggleClass('is-hidden', false);
            $('#username_').toggleClass('is-success', true);
            $('#username_').toggleClass('is-danger', false);

            return;

        }

        axios.get('http://localhost/bicproject/controllers/validation.contr.php?validation=username&username=' + username).
        then(function(response){

            if (response.data === true)
                toggle_input_success('username');
            else
                toggle_input_error('username');
               
        })
        .catch(function(error){
            console.log(error);
        });

    });

});

$(document).ready(function()
{   
    $('#email_').on('change', function(){

        var email = document.getElementById('email_').value;

        if (email == '')
        {

            input_cleanup('email');
            return;

        }

        if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.exec(email)))
        {

            $('#email-icon-available').toggleClass('is-hidden', true);
            $("#email-icon-notavailable").toggleClass('is-hidden', false);
            $('#email-available-message').toggleClass('is-hidden', true);
            $('#email-notavailable-message').toggleClass('is-hidden', true);
            $('#email-notvalid-message').toggleClass('is-hidden', false);
            $('#email_').toggleClass('is-success', true);
            $('#email_').toggleClass('is-danger', false);

            return;

        }

        axios.get('http://localhost/bicproject/controllers/validation.contr.php?validation=email&email=' + email).
            then(function(response){

                if (response.data === true)
                    toggle_input_success('email');
                else
                    toggle_input_error('email');

            })
            .catch(function(error){
                console.log(error);
            });

    });

});

$(document).ready(function(){
    
    $('#submit-btn').click(function(){

        matricula = $('#matricula_').val();
        username = $('#username_').val();
        email = $('#email_').val();
        pwd = $('#pwd_').val();
        rpwd = $('#rpwd_').val();

        if (!matricula || !username || !email || !pwd || !rpwd)
            show_error_notification('Nenhum campo pode ficar vazio!');
        else if (!(/^[0-9]*$/.exec(matricula)))
            show_error_notification('Só números são permitidos na matrícula');
        else if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.exec(email)))
            show_error_notification('Email inválido!');
        else if (!(/^[0-9A-Za-z]*$/.exec(username)))
            show_error_notification('Usuário inválido!');
        else if (pwd != rpwd)
            show_error_notification('Senhas não conferem!')
        else
        {

            form_data = { signup: true,
                          matricula: matricula,
                          username: username,
                          email:email,
                          pwd: pwd,
                          rpwd: rpwd };

            $.ajax({
                url: 'inclusoes/signup.inc.php',
                method: 'POST',
                data: form_data,

            }).done(function(data){

                var result_data = $.parseJSON(data);

                if (result_data == 'signupsuccess')
                    show_success_notification('Cadastro efetuado com sucesso!');
                else if (result_data == 'emptyfields')
                    show_error_notification('Nenhum campo pode ficar vazio!');
                else if (result_data == 'invalidemail')
                    show_error_notification('Email inválido!');
                else if (result_data == 'invalidusername')
                    show_error_notification('Username inválido!');
                else if (result_data == 'pwdnotmatch')
                    show_error_notification('Senhas não conferem!');
                else if (result_data == 'nolength')
                    show_error_notification('Senha curta demais!');
                else if (result_data == 'usertaken')
                    show_error_notification('Usuário indisponível!');
                else if (result_data == 'simpleerror')
                    show_error_notification('Ocorreu um erro interno :(');

            })

        }

    });

});

$(document).ready(function(){

    $('#pwd_').on('input', function(){

        var pwd_length = $('#pwd_').val();

        if (pwd_length == '')
        {

            $('#pwd_').toggleClass('is-danger', false);
            $('#pwd-icon-notlength').toggleClass('is-hidden', true);
            $('#pwd-notlength-message').toggleClass('is-hidden', true);
            return;

        }

        if (pwd_length.length < 6)
        {

            $('#pwd_').toggleClass('is-danger', true);
            $('#pwd-icon-notlength').toggleClass('is-hidden', false);
            $('#pwd-notlength-message').toggleClass('is-hidden', false);

        }
        else
        {

            $('#pwd_').toggleClass('is-danger', false);
            $('#pwd-icon-notlength').toggleClass('is-hidden', true);
            $('#pwd-notlength-message').toggleClass('is-hidden', true);

        }

    });

});

$(document).ready(function(){

    $('#rpwd_').on('input', function(){

        var pwd = $('#pwd_').val();
        var rpwd = $('#rpwd_').val();

        if (rpwd == '')
        {

            $('#rpwd_').toggleClass('is-success', false);
            $('#rpwd_').toggleClass('is-danger', true);
            $('#rpwd-icon-match').toggleClass('is-hidden', true);
            $('#rpwd-icon-notmatch').toggleClass('is-hidden', false);
            $('#rpwd-notmatch-message').toggleClass('is-hidden', false);
            return;

        }

        if (pwd != rpwd)
        {

            $('#rpwd_').toggleClass('is-success', false);
            $('#rpwd_').toggleClass('is-danger', true);
            $('#rpwd-icon-match').toggleClass('is-hidden', true);
            $('#rpwd-icon-notmatch').toggleClass('is-hidden', false);
            $('#rpwd-notmatch-message').toggleClass('is-hidden', false);

        }
        else
        {

            $('#rpwd_').toggleClass('is-danger', false);
            $('#rpwd_').toggleClass('is-success', true);
            $('#rpwd-icon-notmatch').toggleClass('is-hidden', true);
            $('#rpwd-icon-match').toggleClass('is-hidden', false);
            $('#rpwd-notmatch-message').toggleClass('is-hidden', true);

        }

    });

});

function show_error_notification(message)
{

    $('#notification-error-content').html(message);
    $('#notification-error').toggleClass('is-hidden', false);
    setTimeout(() => { $('#notification-error').fadeOut('slow', function(){
        $('#notification-error').toggleClass('is-hidden', true);
        $('#notification-error').css('display', '');
    })}, 2500);

}

function show_success_notification(message)
{

    $('#notification-success-content').html(message);
    $('#notification-success').toggleClass('is-hidden', false);
    setTimeout(() => { $('#notification-success').fadeOut('slow', function(){
        $('#notification-success').toggleClass('is-hidden', true);
        $('#notification-success').css('display', '');
    })}, 2500);

}

function toggle_input_error(field)
{

    $('#' + field + '-icon-notavailable').toggleClass('is-hidden', false);
    $('#' + field + '-icon-available').toggleClass('is-hidden', true);
    $('#' + field + '-available-message').toggleClass('is-hidden', true);
    $('#' + field + '_').toggleClass('is-success', false);
    $('#' + field + '-notvalid-message').toggleClass('is-hidden', true);
    $('#' + field + '-notavailable-message').toggleClass('is-hidden', false);
    $('#' + field + '_').toggleClass('is-success', false);
    $('#' + field + '_').toggleClass('is-danger', true);

}

function toggle_input_success(field)
{

    $('#' + field + '-icon-notavailable').toggleClass('is-hidden', true);
    $('#' + field + '-icon-available').toggleClass('is-hidden', false);
    $('#' + field + '-notavailable-message').toggleClass('is-hidden', true);
    $('#' + field + '-notvalid-message').toggleClass('is-hidden', true);
    $('#' + field + '-available-message').toggleClass('is-hidden', false);
    $('#' + field + '_').toggleClass('is-danger', false);
    $('#' + field + '_').toggleClass('is-success', true);

}

function input_cleanup(field)
{

    $('#'+ field + '_').toggleClass('is-danger', false);
    $('#'+ field + '_').toggleClass('is-success', false);
    $('#'+ field + '-icon-available').toggleClass('is-hidden', true);
    $('#'+ field + '-icon-notavailable').toggleClass('is-hidden', true);
    $('#'+ field + '-available-message').toggleClass('is-hidden', true);
    $('#'+ field + '-notavailable-message').toggleClass('is-hidden', true);
    $('#'+ field + '-notvalid-message').toggleClass('is-hidden', true);

}