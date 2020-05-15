<?php

    require_once '../class/dbh.class.php';
    require_once '../class/user.class.php';
    require_once '../class/colab.class.php';

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

    function insert_employee()
    {

        $matricula =           $_POST['matricula'];
        $nome =                $_POST['nome'];
        $cpf =                 $_POST['cpf'];
        $programacao =         $_POST['programacao'];
        $inicio_periodo =      $_POST['inicio_periodo'];
        $fim_periodo =         $_POST['fim_periodo'];
        $direito_ferias =      $_POST['direito_ferias'];
        $inicio_ferias =       $_POST['inicio_ferias'];
        $fim_ferias =          $_POST['fim_ferias'];
        $ferias =              $_POST['ferias'];
        $pagamento =           $_POST['pagamento'];
        $retorno_ferias =      $_POST['retorno_ferias'];

        if (empty($matricula) || empty($nome) ||empty($cpf) ||empty($programacao) ||empty($inicio_periodo) ||empty($fim_periodo) ||empty($direito_ferias) ||empty($inicio_ferias) ||empty($fim_ferias) ||empty($ferias) ||empty($pagamento) ||empty($retorno_ferias))
            return 'emptyfields';
        if (!preg_match("/^[A-Z]+( [A-Z]+)*$/", $nome))
            return 'invalidname';
        else if (!preg_match("/\d{11}/", $cpf))
            return 'cpfchar';
        else if (strlen(($cpf) < 11 || strlen($cpf) > 11))
            return 'cpflength';
        else if ((int)$matricula < 0)
            return 'negative';
        else
        {

            if (Employee::get_employee($matricula) == true)
                return 'employeeexists';
            else
            {

                $employee = new Employee();

                $employee->matricula =      $matricula;
                $employee->nome =           $nome;
                $employee->cpf =            $cpf;
                $employee->programacao =    $programacao;
                $employee->inicio_periodo = $inicio_periodo;
                $employee->fim_periodo =    $fim_periodo;
                $employee->direito_ferias = $direito_ferias;
                $employee->inicio_ferias =  $inicio_ferias;
                $employee->fim_ferias =     $fim_ferias;
                $employee->ferias =         $ferias;
                $employee->pagamento =      $pagamento;
                $employee->retorno_ferias = $retorno_ferias;

                $employee->insert_employee();

                return 'success';

            }

        }

    }

    if (isset($_POST['image']))
        update_user_picture();
    
    if (isset($_POST['cadastro']))
        echo json_encode(insert_employee());