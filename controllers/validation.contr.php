<?php

    require_once '../inclusoes/autoloader.inc.php';

    function input_validation($username, $email)
    {

        return User::get_user(NULL, $username, $email);

    }

    if (isset($_GET['validation']))
    {

        if ($_GET['validation'] == 'username')
        {

            $result = input_validation($_GET['username'], NULL);
            header("Content-Type: application/json");
            echo json_encode($result);
            exit();

        }
        else if ($_GET['validation'] == 'email')
        {

            $result = input_validation(NULL, $_GET['email']);
            header("Content-Type: application/json");
            echo json_encode($result);
            exit();

        }

    }
