<?php

    if (isset($_POST['signup-submit']))
    {

        require 'autoloader.inc.php';

        $matricula = $_POST['matricula'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $rpwd = $_POST['rpwd'];

        if (empty($matricula) || empty($username) || empty($email) || empty($pwd) || empty($rpwd))
        {

            header("Location: ../signup.php?error=empytfields&username=" . $username . "&email=" . $email);
            exit();

        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
        {

            header("Location: ../signup.php?error=invalidemailandusername");
            exit();

        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            header("Location: ../signup.php?error=invalidemail&username=" . $username);
            exit();

        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {

            header("Location: ../signup.php?error=invalidusername&email=" . $email);
            exit();

        }
        else if ($pwd != $rpwd)
        {

            header("Location: ../signup.php?error=passwordcheck&email=" . $amil . "&username=" . $username);
            exit();

        }
        else
        {

            if (User::get_user($matricula, $username, $email))
            {

                $user = new User();
                $user->matricula = $matricula;
                $user->username = $username;
                $user->email = $email;
                $user->pwd = $pwd;
                
                $user->insert_user();
                header("Location: ../signup.php?signup=success");
                exit();

            }
            else
            {
                
                // A mensagem de erro padrão vai ser que o usuário já está cadastrado;
                // Mas não será dito qual é o campo que já existe no banco (por motivos de segurança);
                header("Location: ../signup.php?error=usertaken");
                exit();

            }

        }

    }
    else
    {
        header('Location: ../signup.php?error');
        exit();
    }

