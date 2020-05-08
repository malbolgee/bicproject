<!DOCTYPE html>
<html>

<?php

    $page_title = 'Login';
    require 'inclusoes/head.php';

?>

<body>

    <nav class="navbar" role="navigation" aria-label="main navigation">

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
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">

                    <div class="box" >
                        <form method = 'post' action = 'inclusoes/login.inc.php'>

                            <div class="field">
                                <div class="control">
                                    <input name = 'login' type="text" class="input is-large" placeholder = 'matrícula ou email ou username' required autofocus />
                                </div>
                            </div>
                            
                            <div class="field">
                                <div class="control">
                                    <input name = 'pwd' type="password" class="input is-large" minlength = '6' placeholder = 'Insira sua senha' required />
                                </div>
                            </div>
                           
                            <button type = 'submit' name = 'login-submit' class="button is-fullwidth is-block is-success" >Login</button>
                            <a href = 'signup.php'><p class = 'help'>Não tem cadastro? Faça um.</p></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>