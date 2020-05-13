<?php

    require_once '../class/dbh.class.php';
    require_once '../class/user.class.php';

    function update_user_picture()
    {

        session_start();
        $user = new User();
        $user->id = $_SESSION['id'];

        $user->fullUser();
        $data = $_POST['image'];
        $data = base64_decode(explode(',', explode(';', $data)[1])[1]);

        $imageName = '../users/profile_' . $user->username . '.png';
        $user->perfil = 'users/profile_' . $user->username . '.png';
        file_put_contents($imageName, $data);

        $user->updateFoto();
        $_SESSION['perfil'] = $user->perfil;
        
        echo $user->perfil;

    }

    if ($_POST['image'])
        update_user_picture();