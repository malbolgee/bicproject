<?php

    if (isset($_POST['modify-btn-submit']))
    {

        session_start();
        require 'conn.php';

        $matricula = $_POST['matricula'];
        $programacao = $_POST['programacao'];
        $inicio_periodo = $_POST['inicio_periodo'];
        $fim_periodo = $_POST['fim_periodo'];
        $direito_ferias = $_POST['direito_ferias'];
        $inicio_ferias = $_POST['inicio_ferias'];
        $fim_ferias = $_POST['fim_ferias'];
        $ferias = $_POST['ferias'];
        $pagamento = $_POST['pagamento'];
        $retorno_ferias = $_POST['retorno_ferias'];
        
        $sql = "UPDATE colaboradores SET programacao=?, inicio_periodo=?, fim_periodo=?, direito_ferias=?, inicio_ferias=?, fim_ferias=?, ferias=?, pagamento=?, retorno_ferias=? WHERE matricula=?;";

        if (!($stmt = $conn->prepare($sql)))
        {

            $_SESSION['error'] = 'noprepare';
            header("Location: ../index.php");
            exit();

        }
        else
        {

            if (!$stmt->bind_param('sssississi', $programacao, $inicio_periodo, $fim_periodo, $direito_ferias, $inicio_ferias, $fim_ferias, $ferias, $pagamento, $retorno_ferias, $matricula))
            {

                $_SESSION['error'] = 'nobind';
                header("Location: ../admin.php");
                exit();

            }
            else
            {

                if (!$stmt->execute())
                {

                    $_SESSION['error'] = 'noupdate';
                    header("Location: ../admin.php");
                    exit();


                }
                else
                {   

                    $stmt->close();
                    $conn->close();
                    unset($_SESSION['search']);
                    unset($_SESSION['result']);
                    $_SESSION['success'] = 'success';
                    header("Location: ../admin.php");
                    exit();

                }

            }

        }

    }
    else
        header("Location: ../admin.php");
