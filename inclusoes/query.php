<?php

    function retrieve_info($matricula, $cpf)
    {

        require 'conn.php';

        $result = NULL;
        $sql = 'SELECT * FROM colaboradores WHERE matricula=? AND cpf=?;';

        if (!($stmt = $conn->prepare($sql)))
            return 'noprepare';
        else
        {

            if(!$stmt->bind_param('is', $matricula, $cpf))
                return 'nobind';
            else
            {

                $stmt->execute();
                $result = $stmt->get_result();
                $result = $result->fetch_assoc();
                $stmt->close();
                $conn->close();

                if ($result['programacao'] == 'Férias Não Programadas')
                    return 'novacation';

                if (!$result)
                    return 'nouser';
                else
                    return $result;

            }
        }

    }

    if (isset($_GET['info']))
    {

        $result = retrieve_info($_GET['matricula'], $_GET['cpf']);
        header("Content-Type: application/json");

        echo json_encode($result);

    }