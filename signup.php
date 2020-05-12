<?php session_start(); ?>

<?php

    if(isset($_SESSION['id']))
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
                <a class="navbar-item" href = "singup.php">Cadastrar</a>
                <a class="navbar-item" href = "login.php">Login</a>
            </div>
        </div>

    </nav>

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-4 is-offset-4">

                    <div class="box" >
                        <form method = 'post' action = 'inclusoes/signup.inc.php'>
                            <div class="field">
                                <div id = 'div-matricula' class = "control has-icons-left">
                                    <input name = 'matricula' type="text" class="input is-medium" placeholder = 'Matrícula' maxlength = '4' required  autofocus />
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </div>
                            </div>
                            <div id = 'div-field-username' class = "field">
                                <div id = 'div-username' class="control has-icons-left">
                                    <input id = 'username_' name = 'username' type="text" class="input is-medium" minlength = '4' placeholder = 'Nome de usuário' autocomplete = 'off' required oninput = 'username_validation()' />
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div id = 'div-field-email' class = "field">
                                <div id = 'div-email' class="control has-icons-left">
                                    <input id = 'email_' name = 'email' type="text" class="input is-medium" placeholder = 'E-mail' required oninput = 'email_validation()' />
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input name = 'pwd' type="password" class="input is-medium" minlength = '6' placeholder = 'Insira uma senha' required />
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input name = 'rpwd' type="password" class="input is-medium" minlength = '6' placeholder = 'Repita a senha' required />
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-key"></i>
                                        </span>
                                </div>
                            </div>
                            <button type = 'submit' name = 'signup-submit' class="button is-fullwidth is-block is-success" >Cadastrar</button>
                            <div class = 'has-text-centered'>
                                <a href = 'login.php'><p class = 'help'>Já tem cadastro? Faça login.</p></a>
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
<script type="text/javascript" src="js/signup-page.js"></script>
<script src="plugins/fontawesome/js/fontawesome.min.js"></script>
<script src="plugins/fontawesome/js/solid.min.js"></script>
<script src="plugins/fontawesome/js/regular.min.js"></script>
</html>