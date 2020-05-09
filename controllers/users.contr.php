<?php

    if (!isset($_POST['op']))
    {
        header("Location: ../admin.php");
        exit();
    }

    require '../inclusoes/autoloader.inc.php';

    function update_user_picture()
    {

        session_start();
        $user = new User();
        $user->id = $_SESSION['id'];

        $user->fullUser();

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActExt, $allowed))
        {

            if ($fileError === 0)
            {   

                if ($fileSize < 700000)
                {

                    $fileNewName = 'profile_' . $user->username . '.' . $fileActExt;
                    $fileDest = '../users/' . $fileNewName;
                    move_uploaded_file($fileTmpName, $fileDest);

                    $user->perfil = 'users/' . $fileNewName;
                    $user->updateFoto();
                    $_SESSION['perfil'] = $user->perfil;

                    header("Location: ../admin.php?upload=success");
                    exit();

                }
                else
                {

                    header("Location: ../admin.php?error=imgtoolarge");
                    exit();

                }

            }
            else
            {

                header("Location: ../admin.php?error=upload");
                exit();
            }

        }
        else
        {

            header('Location: ../admin.php?error=extension');
            exit();

        }

    }

    if ($_POST['op'] == 'updatephoto')
    {

        update_user_picture();
        header("Location: ../admin.php");
        exit();

    }