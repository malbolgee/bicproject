<?php

    function user_login()
    {

        require_once '../class/dbh.class.php';
        require_once '../class/user.class.php';

        $login = $_POST['info'];
        $pwd = $_POST['pwd'];
        
        if (empty($login) || empty($pwd))
            return 'emptyfields';
        else if (!preg_match("/^[a-zA-Z0-9@]*$/", $login))
            return 'forbiddenchar';
        else
        {

            $user = new User();
            $user->matricula = $login;
            $user->username = $login;
            $user->email = $login;
            $user->pwd = $pwd;

            if (!$user->auth())
                return 'nouser';
            else
            {

                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['matricula'] = $user->matricula;
                $_SESSION['perfil'] = $user->perfil;
                
                return 'loginsuccess';

            }

        }

    }

    if (isset($_POST['login']))
        echo json_encode(user_login());