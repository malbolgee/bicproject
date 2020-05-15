document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
})

$(document).ready(function(){

    $('#matricula').on('input', () => {
        var val = $('#matricula').val();
        if (/^(\d{3}|\d{4})$/.exec(val))
            $('#matricula').addClass('is-success').removeClass('is-danger');
        else
            $('#matricula').addClass('is-danger').removeClass('is-success');

    });

    $('#cpf').on('input', () => {

        var cpf = $('#cpf').val();

        if (/^(\d{11})$/.exec(cpf))
            $('#cpf').addClass('is-success').removeClass('is-danger');
        else
            $('#cpf').addClass('is-danger').removeClass('is-success');

    });

    $('#matricula, #cpf').on('input', () => {

        var matricula = $('#matricula').val();
        var cpf = $('#cpf').val();

        if (!(/^(\d{3}|\d{4})$/.exec(matricula)) || !(/^(\d{11})$/.exec(cpf)))
            $('#query-btn-submit').prop('disabled', true);
        else
            $('#query-btn-submit').prop('disabled', false);

    });

    $('#query-btn-submit').on('click', () => {

        var cpf = $('#cpf').val();
        var matricula = $('#matricula').val();

        axios.get('http://localhost/bicproject/inclusoes/query.php?info=1&matricula=' + matricula + '&cpf=' + cpf).
            then(function(response){

                var item = response.data;
                var content = document.querySelector('#result-infos');
                content.innerHTML = "";

                if (item == 'nouser')
                {

                    var content = document.getElementById('div-coluna');
                    content.innerHTML = "<div id = 'notification' class= 'notification is-danger'><button class = 'delete'></button><p>Cadastro não encontrado.</p></div>";
                    button_fade_close();
                    $('.success-result').slideUp('slow');

                    return;

                }
                else if (item == 'noprepare' || item == 'nobind')
                {

                    var content = document.getElementById('div-coluna');
                    content.innerHTML = "<div id = 'notification' class= 'notification is-danger'><button class = 'delete'></button><p>Ocorreu um erro interno.</p></div>";
                    button_fade_close();
                    $('.success-result').slideUp('slow');

                    return;

                }
                else if (item == 'novacation')
                {

                    var content = document.getElementById('div-coluna');
                    content.innerHTML = "<div id = 'notification' class = 'notification is-info'><button class = 'delete'></button><p>Férias não programadas.</p></div>";
                    button_fade_close();
                    $('.success-result').slideUp('slow');

                    return;

                }
                else
                {

                    $('#result-infos').slideUp('slow');

                    var ferias = item.ferias;
                    var direito_ferias = item.direito_ferias;
                    var dias_antecipados = ferias - direito_ferias;
                    var inicio_periodo = new Date(item.inicio_periodo + "T00:00").toLocaleDateString();
                    var fim_periodo = new Date(item.fim_periodo + "T00:00").toLocaleDateString();
                    var inicio_ferias = new Date(item.inicio_ferias + "T00:00").toLocaleDateString();
                    var fim_ferias = new Date(item.fim_ferias + "T00:00").toLocaleDateString();
                    var pagamento = new Date(item.pagamento + "T00:00").toLocaleDateString();
                    var retorno_ferias = new Date(item.retorno_ferias + "T00:00").toLocaleDateString();

                    if (ferias != 1)
                        ferias = ferias.toString() + " Dias";
                    else
                        ferias = ferias.toString() + " Dia";

                    if (direito_ferias != 1)
                        direito_ferias = direito_ferias.toString() + ' Dias';
                    else
                        direito_ferias = direito_ferias.toString() + ' Dia';

                    if (dias_antecipados != 1)
                        dias_antecipados = dias_antecipados.toString() + ' Dias';
                    else
                        dias_antecipados = dias_antecipados.toString() + ' Dia';
                    
                    html = "<div id = 'success-div' class='container has-text-centered'>";
                    html += "<div class='notification is-warning'>";
                    html += "<nav class='level'>";
                    html += "<div class='level-item has-text-centered'>"
                    html += "<div>";
                    html += "<p class='heading'>Nome</p>";
                    html += "<p class='title'>" + capital_letter(item.nome) + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Período Aquisitivo</p>";
                    html += "<p class='title'>" + inicio_periodo + " a "  + fim_periodo + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Direito a Férias</p>";
                    html += "<p class='title'>" + direito_ferias + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "</nav>";
                    html += "</div>";
                    html += "<div class='notification is-warning'>";
                    html += "<nav class='level'>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Tipo de Férias</p>";
                    html += "<p class='title'>" + item.programacao + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Período de Férias</p>";
                    html += "<p class='title'>" + inicio_ferias + " a " + fim_ferias + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Dias de Férias</p>";
                    html += "<p class='title'>" + ferias + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Dias Antecipados</p>";
                    html += "<p class='title'>" + dias_antecipados + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "</nav>";
                    html += "</div>";
                    html += "<div class='notification is-warning'>";
                    html += "<nav class='level'>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Data de Pagamento</p>";
                    html += "<p class='title'>" + pagamento + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "<div class='level-item has-text-centered'>";
                    html += "<div>";
                    html += "<p class='heading'>Retorno ao Trabalho</p>";
                    html += "<p class='title'>" + retorno_ferias + "</p>";
                    html += "</div>";
                    html += "</div>";
                    html += "</nav>";
                    html += "</div>";
                    html += "</div>";
                    
                    content.innerHTML = html;

                    $('#result-infos').slideDown('slow');

                }

            })
            .catch(function(error){
                console.warn(error);

            });

    });

});

function capital_letter(str) 
{
    str = str.toLowerCase();
    str = str.split(" ");

    for (var i = 0, x = str.length; i < x; i++) {
        str[i] = str[i][0].toUpperCase() + str[i].substr(1);
    }

    return str.join(" ");
}
