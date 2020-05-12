function cancel_event()
{   

    var element = document.querySelectorAll('input');
    for(var i = 0; i < element.length; ++i)
        element[i].value = '';

    for(var i = 1; i < element.length; ++i)
        element[i].required = false;

    document.getElementById('input-matricula').readOnly = false;
    document.getElementById('modify-btn-submit').disabled = true;

}

function input_verify_mat(x)
{

    var matricula_input = document.getElementById("matricula_");

    if (x.length >= 3 && x.length <= 4)
        matricula_input.classList.replace('is-danger', 'is-success');
    else
        matricula_input.classList.replace('is-success', 'is-danger');
    
}

function input_verify_cpf(x)
{

    var cpf_input = document.getElementById('cpf_');

    if (x.length < 11)
        cpf_input.classList.replace('is-success', 'is-danger');
    else if (x.length == 11)
        cpf_input.classList.replace('is-danger', 'is-success');
    else
        cpf_input.classList.replace('is-success', 'is-danger');

}

function input_search_event(x)
{

    var search_btn = document.getElementById('search-btn-submit');
    var input_matricula = document.getElementById('input-matricula');

    if (x.length < 3)
    {

        search_btn.disabled = true;
        input_matricula.classList.remove('is-success');

    }
    else
    {

        search_btn.disabled = false;
        input_matricula.classList.add('is-success');

    }

}

function index_input_auth()
{

    var matricula = document.getElementById('matricula_').value;
    var cpf = document.getElementById('cpf_').value;

    if ((matricula.length < 3) || (cpf.length != 11))
        document.getElementById('query-btn-submit').disabled = true;
    else
        document.getElementById('query-btn-submit').disabled = false;

}

function search_btn_event()
{

    var modify_btn_submit = document.getElementById('modify-btn-submit');
    modify_btn_submit.disabled = true;

}

function query_infos()
{

    var cpf = document.getElementById('cpf_').value;
    var matricula = document.getElementById('matricula_').value;

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

                $('.success-result').slideUp('slow');

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
                html += "<p class='title'>" + item.nome + "</p>";
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

                $('.success-result').slideDown('slow');

            }

        })
        .catch(function(error){
            console.warn(error);

        });

}

function button_fade_close()
{

    $('.delete').click(function(){
        $('.delete').fadeOut('slow', 'swing');
        $('#notification').fadeOut('slow', 'swing');

    });

}