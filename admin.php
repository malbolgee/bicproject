<?php session_start(); ?>

<!DOCTYPE html>
<html>

    <?php 

        $page_title = "Alteração de Cadastro";
        require "inclusoes/head.php"; 
        
    ?>

    <body>

        <!-- Início Menu -->
        <nav class="navbar" role="navigation" aria-label="main navigation">

            <div class="navbar-brand">
                <a class="navbar-item" href="http://www.feriasbic.rf.gd/admin.php">
                    <img src="img/bic-logo-1.png" width="112" height="28">
                </a>
            </div>

            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href = "admin.php">Alterar Cadastro</a>
                    <a class="navbar-item" href = "#">Inserir Cadastro</a>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                    <a class="button is-primary" href = "inclusoes/report.php">
                        <strong>Gerar Relatório</strong>
                    </a>
                    </div>
                </div>
            </div>

        </nav>
        <!-- Fim Menu -->

        <section class = "hero is-sucess is-fullheight">
            <div class = "hero-body">
                <div class = "container has-text-centered">
                    <div class = "column is-10 is-offset-1">
                        <div class = "box">

                            <?php

                                if (isset($_SESSION['error']))
                                {

                                    $error = $_SESSION['error'];

                                    if ($error == 'nouser')
                                        echo "<div id = 'notification' class='notification is-danger'><button class = 'delete' ></button><p>Cadastro não encontrado.</p></div>";
                                    else if ($error == 'nobind' || $error == 'noprepare')
                                        echo "<div id = 'notification' class='notification is-danger'><button class = 'delete' ></button><p>Ocorreu um erro interno. Tente novamente.</p></div>";
                                                            
                                    unset($_SESSION['error']);

                                }
                                else if (isset($_SESSION['success']))
                                {

                                    echo "<div id = 'notification' class='notification is-success'><button class = 'delete' ></button><p>Alteração realizada com sucesso!</p></div>";
                                    unset($_SESSION['success']);

                                }

                                if (!isset($_SESSION['search']))
                                    unset($_SESSION['result']);
                                else
                                    unset($_SESSION['search']);

                            ?>

                            <!-- Início do formulário -->
                            <form method = 'post'>

                                <!-- Começo dos três primeiros Campos -->
                                <div class = "field is-horizontal">
                                    <div class = "field-body">

                                        <!-- Matricula e botão -->
                                        <div class = "field has-addons">
                                            <p class = "control is-expanded">

                                                <?php
                                                    if (isset($_SESSION['result']))
                                                    {

                                                        $matricula = $_SESSION['result']['matricula'];
                                                        echo "<input id = 'input-matricula' name = 'matricula' class = 'input' oninput = 'input_search_event(this.value)' type = 'text' maxlength = '4' value = '$matricula' pattern = '(\d{3}|\d{4})' placeholder = 'Matricula' autofocus readonly required />";

                                                    }
                                                    else
                                                        echo "<input id = 'input-matricula' name = 'matricula' class = 'input' oninput = 'input_search_event(this.value)' type = 'text' maxlength = '4' value = '' pattern = '(\d{3}|\d{4})' placeholder = 'Matricula' autofocus required />";
                                                ?>

                                            </p>
                                            <div class="control">
                                                <button id = 'search-btn-submit' name = 'search-btn-submit' class = 'button is-info' type = 'submit' formaction = 'inclusoes/search.php' disabled>Search</button>
                                            </div>
                                        </div>
                                        <!-- Fim Matrícula e Botão -->

                                        <div class = "field">
                                            <p class = "control">
                                                <?php

                                                    if (isset($_SESSION['result']))
                                                    {

                                                        $nome = $_SESSION['result']['nome'];
                                                        echo "<input name = 'nome' class = 'input' type = 'text' maxlength = '200' value = '$nome' readonly required />";

                                                    }
                                                    else
                                                        echo "<input name = 'nome' class = 'input' type = 'text' maxlength = '200' />";

                                                ?>
                                            </p>
                                            <p class = "help">Nome</p>
                                        </div>
                                        <div class = "field">
                                            <p class = "control">
                                                <?php

                                                    if (isset($_SESSION['result']))
                                                    {
                                                        
                                                        $cpf = $_SESSION['result']['cpf'];
                                                        echo "<input name = 'cpf' class = 'input' type = 'text' maxlength = '11' minlength = '11' pattern = '\d{11}' value = '$cpf' required />";

                                                    }
                                                    else
                                                        echo "<input name = 'cpf' class = 'input' type = 'text' maxlength = '11' minlength = '11' pattern = '\d{11}' />";

                                                ?>
                                            </p>
                                            <p class = "help">CPF</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim dos três primeiros campos -->

                                <div class = "field is-horizontal">
                                    <div class = "field-body">
                                        <div class = "field is-narrow">
                                            <div class = "control is-expanded">
                                                <div class = "select is-fullwidth">
                                                    <select name = 'programacao'>
                                                        <?php require 'inclusoes/select-input.php'; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "field is-horizontal">
                                        <div class = "field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <p class = "control">
                                                        <?php

                                                            if (isset($_SESSION['result']))
                                                            {

                                                                $inicio_periodo = $_SESSION['result']['inicio_periodo'];
                                                                echo "<input name = 'inicio_periodo' class = 'input' type = 'date' value = '$inicio_periodo' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                            }
                                                            else
                                                                echo "<input name = 'inicio_periodo' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                        ?>
                                                    </p>
                                                    <p class = "help">Início Período</p>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <p class = "control">
                                                        <?php

                                                            if (isset($_SESSION['result']))
                                                            {

                                                                $fim_periodo = $_SESSION['result']['fim_periodo'];
                                                                echo "<input name = 'fim_periodo' class = 'input' type = 'date' value = '$fim_periodo' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                            }
                                                            else
                                                                echo "<input name = 'fim_periodo' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                        ?>
                                                    </p>
                                                    <p class = "help">Fim Período</p>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <p class = "control">
                                                        <?php
                                                            
                                                            if (isset($_SESSION['result']))
                                                            {
                                                                
                                                                $direito_ferias = $_SESSION['result']['direito_ferias'];
                                                                echo "<input name = 'direito_ferias' class = 'input' type = 'number' value = '$direito_ferias' required />";

                                                            }
                                                            else
                                                                echo "<input name = 'direito_ferias' class = 'input' type = 'number' />";

                                                        ?>
                                                    </p>
                                                    <p class = "help">Direito a Férias</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <p class="control">
                                                <?php

                                                    if (isset($_SESSION['result']))
                                                    {

                                                        $inicio_ferias = $_SESSION['result']['inicio_ferias'];
                                                        echo "<input name = 'inicio_ferias' class = 'input' type = 'date' value = '$inicio_ferias' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                    }
                                                    else
                                                        echo "<input name = 'inicio_ferias' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                ?>
                                                </p>
                                                <p class = "help">Início Férias</p>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <p class="control">
                                                <?php

                                                    if (isset($_SESSION['result']))
                                                    {

                                                        $fim_ferias = $_SESSION['result']['fim_ferias'];
                                                        echo "<input name = 'fim_ferias' class = 'input' type = 'date' value = '$fim_ferias' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                    }
                                                    else
                                                        echo "<input name = 'fim_ferias' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                ?>
                                                </p>
                                                <p class = "help">Fim Férias</p>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <p class="control">
                                                    <?php

                                                        if (isset($_SESSION['result']))
                                                        {

                                                            $ferias = $_SESSION['result']['ferias'];
                                                            echo "<input name = 'ferias' type = 'number' class = 'input' maxlength = '2' value = '$ferias' required />";

                                                        }
                                                        else
                                                            echo "<input name = 'ferias' type = 'number' class = 'input' maxlength = '2' />";

                                                    ?>
                                                </p>
                                                <p class = "help">Férias</p>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <p class="control">
                                                <?php

                                                    if (isset($_SESSION['result']))
                                                    {

                                                        $pagamento = $_SESSION['result']['pagamento'];
                                                        echo "<input name = 'pagamento' class = 'input' type = 'date' value = '$pagamento' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                    }
                                                    else
                                                        echo "<input name = 'pagamento' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                ?>
                                                </p>
                                                <p class="help">Pagamento</p>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control">
                                                <p class="control">
                                                    <?php

                                                        if (isset($_SESSION['result']))
                                                        {

                                                            $retorno_ferias = $_SESSION['result']['retorno_ferias'];
                                                            echo "<input name = 'retorno_ferias' class = 'input' type = 'date' value = '$retorno_ferias' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' required />";

                                                        }
                                                        else
                                                            echo "<input name = 'retorno_ferias' class = 'input' type = 'date' pattern = '[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' maxlength = '10' max = '2050-12-31' min = '1960-01-01' />";

                                                    ?>
                                                </p>
                                                <p class = "help">Retorno</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field is-grouped is-grouped-centered">
                                            <div class="control">
                                                <p class="control">
                                                    <?php
                                                        
                                                        if (isset($_SESSION['result']))
                                                            echo "<button id = 'modify-btn-submit' name = 'modify-btn-submit' type = 'submit' class = 'button is-normal is-success' formaction = 'inclusoes/modify.php'>Alterar</button>
                                                                  <a id = 'cancel-search-btn' class = 'button is-normal is-danger' onclick = 'cancel_event()'>Cancelar</a>";
                                                        else
                                                            echo "<button id = 'modify-btn-submit'  type = 'submit' class = 'button is-normal is-success' disabled >Alterar</button>
                                                                  <a id = 'cancel-search-btn' class = 'button is-normal is-danger'>Cancelar</a>";

                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- Fim do formulário -->
                            
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </body>
    <script type="text/javascript" src="js/app.js"></script>
</html>