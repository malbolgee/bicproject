<?php

    if (isset($_POST['search-btn-submit']))
    {

        require 'conn.php';
        session_start();

        $matricula = $_POST['matricula'];
        $sql = "SELECT * FROM colaboradores WHERE matricula=?;";

        if (!($stmt = $conn->prepare($sql)))
        {

            $_SESSION['error'] = 'noprepare';
            header("Location: ../admin.php");
            exit();

        }
        else
        {

            if (!$stmt->bind_param("i", $matricula))
            {

                $_SESSION['error'] = 'nobind';
                header("Location: ../admin.php");
                exit();

            }
            else
            {

                $stmt->execute();
                $result = $stmt->get_result();
                $result = $result->fetch_assoc();
                $stmt->close();
                $conn->close();
                if (!$result)
                {
                    
                    $_SESSION['error'] = 'nouser';
                    header("Location: ../admin.php");
                    exit();

                }
                else
                {

                    $_SESSION['search'] = true;
                    $_SESSION['result'] = $result;
                    header("Location: ../admin.php");
                    exit();

                }

            }

        }

    }
    else
        header("Location: ../admin.php");