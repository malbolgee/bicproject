<!DOCTYPE html>
<html>

<?php

    $page_title = 'Cadastro';
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
                        <form method = 'post' action = 'inclusoes/signup.inc.php'>
                            <div class="field">
                                <div class="control">
                                    <input name = 'matricula' type="text" class="input is-medium" placeholder = 'Matrícula' maxlenght = '4' required  autofocus />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name = 'username' type="text" class="input is-medium" placeholder = 'Nome de usuário' required />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name = 'email' type="text" class="input is-medium" placeholder = 'E-mail' required />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name = 'pwd' type="password" class="input is-medium" minlength = '6' placeholder = 'Insira uma senha' required />
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name = 'rpwd' type="password" class="input is-medium" minlength = '6' placeholder = 'Repita a senha' required />
                                </div>
                            </div>
                            <button type = 'submit' name = 'signup-submit' class="button is-fullwidth is-block is-success" >Cadastrar</button>
                            <a href = 'login.php'><p class = 'help'>Já tem cadastro? Faça login</p></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>