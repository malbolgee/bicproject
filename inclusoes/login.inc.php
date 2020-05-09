<?php

    if (isset($_POST['login-submit']))
    {

        require_once 'autoloader.inc.php';

        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        
        if (empty($login) || empty($pwd))
        {

            header("Location: ../login.php?error=emptyfields");
            exit();

        }
        else
        {

            $user = new User();
            $user->matricula = $login;
            $user->username = $login;
            $user->email = $login;
            $user->pwd = $pwd;

            if (!$user->auth())
            {

                header("Location: ../login.php?error=nouser");
                exit();

            }
            else
            {

                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['matricula'] = $user->matricula;
                $_SESSION['perfil'] = $user->perfil;
                
                header("Location: ../admin.php");
                exit();

            }

        }

    }
    else
    {

        header("Location: ../login.php");
        exit();

    }