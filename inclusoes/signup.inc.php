<?php

    function user_signup() 
    {

        require_once '../class/dbh.class.php';
        require_once '../class/user.class.php';

        $matricula = $_POST['matricula'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $rpwd = $_POST['rpwd'];

        if (empty($matricula) || empty($username) || empty($email) || empty($pwd) || empty($rpwd))
            return 'emptyfields';
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return 'invalidemail';
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
            return 'invalidusername';
        else if (strlen(($pwd)) < 6)
            return 'nolength';
        else if ($pwd != $rpwd)
            return 'pwdnotmatch';
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
                return 'signupsuccess';

            }
            else
                return 'usertaken';

        }

        return 'simpleerror';

    }
    
    if (isset($_POST['signup']))
        echo json_encode(user_signup());