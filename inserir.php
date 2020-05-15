<?php session_start(); ?>

<?php

    if (!isset($_SESSION['id']))
        die("<meta charset='utf-8'><title></title><script>window.location=('login.php')</script>");

?>

<!DOCTYPE html>
<html>

<?php

    $page_title = "Cadastrar Funcionário";
    require "inclusoes/head.php";

?>

<body>

    <!-- Início Menu -->
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">

            <a class="navbar-item" href="http://www.feriasbic.rf.gd/admin.php">
                <img src="img/bic-logo-1.png" width="112" height="28">
            </a>
            <a role='button' class="navbar-burger burger" aria-label='menu' aria-expanded='false' data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>

        </div>

        <div id="NavMenu" class="navbar-menu">

            <div class="navbar-start">
                <a class="navbar-item" href="admin.php">Alterar Cadastro</a>
                <a class="navbar-item" href="inserir.php">Inserir Cadastro</a>
                <a class="navbar-item" href="#">Dashboard</a>
            </div>

            <div class="navbar-end">

                <div class="navbar-item">
                    <p>Olá, <?php echo $_SESSION['username'] ?></p>
                </div>

                <div class="navbar-item">
                    <figure class="image is-48x48">
                        <img id='user-profile-picture' class="is-rounded is-user-picture" src=<?php echo $_SESSION['perfil']; ?> />
                    </figure>
                </div>

                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-danger" href="inclusoes/logout.inc.php">
                            <strong>Logout</strong>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </nav>
    <!-- Fim Menu -->

    <section class="hero is-sucess is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-10 is-offset-1">
                    <div class="box">

                        <div id = 'notification-error' class="notification is-danger is-hidden"></div>
                        <div id = 'notification-success' class="notification is-success is-hidden"></div>

                        <!-- Começo dos três primeiros Campos -->
                        <form>
                            <div class="field is-horizontal">
                                <div class="field-body">

                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='matricula' class='input' type='number' value='' placeholder='Matricula' autofocus />
                                            </p>
                                            <p class="help">Matriícula</p>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='nome' class='input' type='text' value='' oninput="let p = this.selectionStart; this.value = this.value.toUpperCase();this.setSelectionRange(p, p);" />
                                            </p>
                                            <p class="help">Nome</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='cpf' class='input' value='' type='text' />
                                            </p>
                                            <p class="help">CPF</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Fim dos três primeiros campos -->

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control is-expanded">
                                            <div class="select is-fullwidth">
                                                <select id='programacao'>
                                                    <option value='Férias Normais'>Férias Normais</option>
                                                    <option value='Antecipação de Férias'>Antecipação de Férias</option>
                                                    <option value='Férias Não Programadas'>Férias Não Programadas</option>
                                                </select>
                                            </div>
                                            <p class="help">Tipo de Férias</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='inicio_periodo' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Início Período</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='fim_periodo' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Fim Período</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='direito_ferias' class='input' value='' type='number' />
                                            </p>
                                            <p class="help">Direito a Férias</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='inicio_ferias' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Início Férias</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='fim_ferias' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Fim Férias</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='ferias' type='number' class='input' value='' maxlength='2' />
                                            </p>
                                            <p class="help">Dias de Férias</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='pagamento' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Pagamento</p>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <p class="control">
                                                <input id='retorno_ferias' class='input' value='' type='date' max = '2050-12-31' min = '1960-12-31' />
                                            </p>
                                            <p class="help">Retorno</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field is-grouped is-grouped-centered">
                                        <div class="control">
                                            <p class="control">
                                                <button id='insert-btn' type = 'submit' class='button is-normal is-success'>Cadastrar</button>
                                                <button id='cancel-btn' class='button is-normal is-danger'>Limpar</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/include-page.js"></script>

</html>