$(document).ready(function(){

    $('#insert-btn').on('click', function(){

        var inputs = document.querySelectorAll('input');

        for (var i = 0; i < inputs.length; ++i)
            if (inputs[i].value == '')
            {
                show_error_notification('Nenhum campo pode ficar vazio!');
                return;

            }

        if (!(/^[A-Z]+( [A-Z]+)*$/.exec(inputs[1].value)))
            show_error_notification('Nome com caracteres inválidos!');
        else if (!(/\d{11}/.exec(inputs[2].value)))
            show_error_notification('Insira apenas números no CPF.');
        else if (inputs[2].value.length < 11 || inputs[2].value.length > 11)
            show_error_notification('A quantidade de dígitos no CPF está incorreta.');
        else if (Number(inputs[0].value) < 0)
            show_error_notification('O número de matrícula deve ser um inteiro positivo.');
        else
        {

            var form_data = {
            
                    cadastro: true,
                    matricula: inputs[0].value,
                    nome: inputs[1].value,
                    cpf: inputs[2].value,
                    programacao: document.querySelector('select').value,
                    inicio_periodo: inputs[3].value,
                    fim_periodo: inputs[4].value,
                    direito_ferias: inputs[5].value,
                    inicio_ferias: inputs[6].value,
                    fim_ferias: inputs[7].value,
                    ferias: inputs[8].value,
                    pagamento: inputs[9].value,
                    retorno_ferias: inputs[10].value

            };

            $.ajax({
                url: 'controllers/users.contr.php',
                method: 'POST',
                data: form_data

            }).done(function(data){

                var result_data = $.parseJSON(data);

                if (result_data == 'employeeexists')
                    show_error_notification('Colaborador já está cadastrado.');
                else if (result_data == 'invalidname')
                    show_error_notification('Nome com caracteres inválidos!');
                else if (result_data == 'cpfchar')
                    show_error_notification('Insira apenas números no CPF.');
                else if (result_data == 'cpflength')
                    show_error_notification('A quantidade de dígitos no CPF está incorreta.');
                else if (result_data == 'negative')
                    show_error_notification('O número de matrícula deve ser um inteiro positivo.');
                else
                {

                    show_success_notification('Cadastro efetuado com sucesso!');
                    clear_inputs();

                }
                
            })

        }
        
    });

    $('#cancel-btn').on('click', clear_inputs);

});

function clear_inputs()
{

    var inputs = document.querySelectorAll('input');
        for (var i = 0; i < inputs.length; ++i)
            inputs[i].value = '';

}

function show_error_notification(message)
{

    $('#notification-error').html(message);
    $('#notification-error').toggleClass('is-hidden', false);
    setTimeout(() => { $('#notification-error').fadeOut('slow', function(){
        $(this).toggleClass('is-hidden', true);
        $(this).css('display', '');
    })}, 2500);

}

function show_success_notification(message)
{

    $('#notification-success').html(message);
    $('#notification-success').toggleClass('is-hidden', false);
    setTimeout(() => { $('#notification-success').fadeOut('slow', function(){
        $(this).toggleClass('is-hidden', true);
        $(this).css('display', '');
    })}, 2500);

}