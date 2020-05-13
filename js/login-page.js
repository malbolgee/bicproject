$(document).ready(function(){

    $('#submit-button').on('click', function(){

        var login = $('#login').val();
        var pwd = $('#pwd').val();

        if (!login || !pwd)
            show_error_notification('Existem campos vazios!');
        else if (!(/^[A-Za-z0-9@]*$/.exec(login)))
            show_error_notification('Caracteres não permitidos!');
        else
        {

            var form_data = { login: true,
                              info: login,
                              pwd: pwd };

            $.ajax({
                url: 'inclusoes/login.inc.php',
                method: 'POST',
                data: form_data

            }).done(function(data){

                var result_data = $.parseJSON(data);

                if (result_data == 'emptyfields')
                    show_error_notification('Existem campos vazios!');
                else if (result_data == 'nouser')
                    show_error_notification('Cadastro não encontrado!');
                else if (result_data == 'forbiddenchar')
                    show_error_notification('Caracteres não permitidos!');
                else
                    location.href = 'admin.php';

            })

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