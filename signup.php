<?php session_start(); ?>

<?php

if (isset($_SESSION['id']))
    header("Location: admin.php");

?>

<!DOCTYPE html>
<html>

<?php

$page_title = 'Cadastro';
require 'inclusoes/head.php';

?>

<body>

    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="img/bic-logo-1.png" width="112" height="28">
            </a>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="singup.php">Cadastrar</a>
                <a class="navbar-item" href="login.php">Login</a>
            </div>
        </div>

    </nav>

    <section class="hero has-background-light is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-4 is-offset-4">

                    <div class="box">
                        <div id = 'notification-error' class="notification is-danger is-hidden">
                            <button class="delete"></button>
                            <div id = 'notification-error-content'></div>
                        </div>
                        <div id = 'notification-success' class="notification is-success is-hidden">
                            <button class="delete"></button>
                            <div id = 'notification-success-content'></div>
                        </div>

                        <div class="field">
                            <div id='div-matricula' class="control has-icons-left">
                                <input id = 'matricula_' type="text" class="input is-medium" placeholder='Matrícula' maxlength='4' required autofocus />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-address-card"></i>
                                </span>
                            </div>
                        </div>
                        <div id='div-field-username' class="field">
                            <div id='div-username' class="control has-icons-left has-icons-right">
                                <input id='username_' type="text" class="input is-medium" minlength='4' placeholder='Nome de usuário' autocomplete='off' required />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span id = 'username-icon-available' class="icon is-small has-text-primary is-right is-hidden">
                                    <i class='far fa-check-circle'></i>
                                </span>
                                <span id = 'username-icon-notavailable' class="icon is-small has-text-danger is-right is-hidden">
                                    <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </div>
                            <p id = 'username-available-message' class = 'help is-success is-hidden'>Usuário disponível</p>
                            <p id = 'username-notavailable-message' class = 'help is-danger is-hidden'>Usuário indisponível</p>
                            <p id = 'username-notvalid-message' class = 'help is-danger is-hidden'>Usuário inválido</p>
                        </div>
                        <div id='div-field-email' class="field">
                            <div id='div-email' class="control has-icons-left has-icons-right">
                                <input id='email_' type="email" class="input is-medium" placeholder='E-mail' required />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <span id = 'email-icon-available' class="icon is-small has-text-primary is-right is-hidden">
                                    <i class= 'far fa-check-circle'></i>
                                </span>
                                <span id = 'email-icon-notavailable' class="icon is-small has-text-danger is-right is-hidden">
                                    <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </div>
                            <p id = 'email-available-message' class = 'help is-success is-hidden'>Email disponível</p>
                            <p id = 'email-notavailable-message' class = 'help is-danger is-hidden'>Email indisponível</p>
                            <p id = 'email-notvalid-message' class = 'help is-danger is-hidden'>Email inválido</p>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input id = 'pwd_' type="password" class="input is-medium" minlength='6' placeholder='Insira uma senha' required />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                                <span id = 'pwd-icon-notlength' class="icon is-small has-text-danger is-right is-hidden">
                                    <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </div>
                            <p id = 'pwd-notlength-message' class = 'help is-danger is-hidden'>A senha precisa ter no mínimo 6 caracteres</p>
                        </div>
                        <div id = 'div-field-rpwd' class="field">
                            <div id = 'div-rpwd' class="control has-icons-left has-icons-right">
                                <input id = 'rpwd_' type="password" class="input is-medium" minlength='6' placeholder='Repita a senha' required />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                                <span id = 'rpwd-icon-match' class="icon is-small has-text-primary is-right is-hidden">
                                    <i class= 'far fa-check-circle'></i>
                                </span>
                                <span id = 'rpwd-icon-notmatch' class="icon is-small has-text-danger is-right is-hidden">
                                    <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </div>
                            <p id = 'rpwd-notmatch-message' class = 'help is-danger is-hidden'>As senhas não estão iguais</p>
                        </div>
                        <button id = 'submit-btn' type='submit' class="button is-fullwidth is-success">Cadastrar</button>
                        <div class='has-text-centered'>
                            <a href='login.php'>
                                <p class='help'>Já tem cadastro? Faça login.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="js/signup-page.js"></script>
<script src="plugins/fontawesome/js/fontawesome.min.js"></script>
<script src="plugins/fontawesome/js/solid.min.js"></script>
<script src="plugins/fontawesome/js/regular.min.js"></script>

</html>