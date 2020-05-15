<!DOCTYPE html>
<html>

<?php

    $page_title = "Consulta Férias BIC";
    require 'inclusoes/head.php';

?>

<body>
    <section class="hero is-warning">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="https://www.bicworld.com/pt">
                            <img src="img/bic-logo-1.png" alt="Logo">
                        </a>
                    </div>
            </nav>
        </div>
    </section>

    <section class="hero has-background-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Consulta de Férias BIC<br>Amazônia S/A</h3>
                    <div id='div-coluna'></div>

                    <div class="box">
                        <form>

                            <div class="field">
                                <div class="control">
                                    <input id="matricula" type="text" class="input is-large is-danger" placeholder="Insira a matrícula" maxlength="4" pattern="(\d{3}|\d{4})" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input id='cpf' type="text" class="input is-large is-danger" placeholder="Insira o cpf (apenas números)" maxlength="11" pattern="\d{11}">
                                </div>
                            </div>
                            <button id='query-btn-submit' class="button is-warning is-hovered is-large is-fullwidth" disabled>Consultar</button>
                        </form>
                        <p class = 'help'><a href="http://feriasbic2.rf.gd/" target="_blank"><strong>Perguntas e Respostas</strong></a></p>
                    </div>
                </div>
                <div id='result-infos'></div>
            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/index-page.js"></script>
</html>