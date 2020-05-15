<?php session_start(); ?>

<?php

    if (isset($_SESSION['id']))
        header("Location: admin.php");

?> 

<!DOCTYPE html>
<html>

<?php

    $page_title = 'Login';
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
                    <a class="navbar-item" href = "signup.php">Cadastrar</a>
                    <a class="navbar-item" href = "login.php">Login</a>
                </div>
            </div>

        </nav>

    <section class="hero has-background-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">

                    <div class="box" >
                        
                        <div id = 'notification-error' class="notification is-danger is-hidden">
                            <button class="delete"></button>
                            <div id = 'notification-error-content'></div>
                        </div>

                        <div class="field">
                            <div class="control has-icons-left">
                                <input id = 'login' type="text" class="input is-large" placeholder = 'matrícula ou email ou username' required autofocus />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="field">
                            <div class="control has-icons-left">
                                <input id = 'pwd' type="password" class="input is-large" minlength = '6' placeholder = 'Insira sua senha' required />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                        
                        <button id = 'submit-button' class="button is-fullwidth is-block is-success" >Login</button>
                        <a href = 'signup.php'><p class = 'help'>Não tem cadastro? Faça um.</p></a>

                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="plugins/fontawesome/js/fontawesome.min.js"></script>
<script src="plugins/fontawesome/js/solid.min.js"></script>
<script type="text/javascript" src="js/login-page.js"></script>
</html>