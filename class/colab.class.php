<?php

    class Employee extends Dbh
    {

        public $id;
        public $matricula;
        public $nome;
        public $cpf;
        public $programacao;
        public $inicio_periodo;
        public $fim_periodo;
        public $direito_ferias;
        public $inicio_ferias;
        public $fim_ferias;
        public $ferias;
        public $pagamento;
        public $retorno_ferias;

        /* Method fetches all the information about an employee */
        public function full_colab()
        {

            try
            {

                $sql = "SELECT * FROM colaboradores WHERE matricula = '$this->matricula';";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$this->matricula]);

                $rowUser = $stmt->fetch();

                if (!$rowUser)
                    return false;
                else
                {

                    $this->id =                 $rowUser['id'];
                    $this->matricula =          $rowUser['matricula'];
                    $this->nome =               $rowUser['nome'];
                    $this->cpf =                $rowUser['cpf'];
                    $this->programacao =        $rowUser['programacao'];
                    $this->inicio_periodo =     $rowUser['inicio_periodo'];
                    $this->fim_periodo =        $rowUser['fim_periodo'];
                    $this->direito_ferias =     $rowUser['direito_ferias'];
                    $this->inicio_ferias =      $rowUser['inicio_ferias'];
                    $this->fim_ferias =         $rowUser['fim_ferias'];
                    $this->ferias =             $rowUser['ferias'];
                    $this->pagamento =          $rowUser['pagamento'];
                    $this->retorno_ferias =     $rowUser['retorno_ferias'];

                    return true;

                }

            }
            catch(PDOException $e)
            {

                echo 'Connection failed: '. $e->getMessage();
                die();

            }

        }

        // Method inserts a new employee in the database;
        public function insert_employee()
        {

            try
            {

                $sql = "INSERT INTO colaboradores (matricula, nome, cpf, programacao, inicio_periodo, fim_periodo, direito_ferias, inicio_ferias, fim_ferias, ferias, pagamento, retorno_ferias) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$this->matricula, $this->nome, $this->cpf, $this->programacao, $this->inicio_periodo, $this->fim_periodo, $this->direito_ferias, $this->inicio_ferias, $this->fim_ferias, $this->ferias, $this->pagamento, $this->retorno_ferias]);

            }
            catch (PDOException $e)
            {

                echo 'Connection failed: ' . $e->getMessage();
                die();

            }

        }

        // Function that searchs if an employee is alredy registered;
        public static function get_employee($matricula)
        {
            
            try
            {

                $db = new Dbh();
                $sql = "SELECT * FROM colaboradores WHERE matricula=?;";
                $conn = $db->connect();
                $stmt = $conn->prepare($sql);
                $stmt->execute([$matricula]);

                $result = $stmt->fetch();

                unset($db);

                if ($result)
                    return true;
                else
                    return false;

            }
            catch(PDOException $e)
            {

                echo 'Connection failed: '. $e->getMessage();
                die();

            }

        }

    }