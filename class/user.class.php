<?php

    $target = 'user.php';
    if (basename($_SERVER['PHP_SELF']) == $target)
        die("<meta charset='utf-8'><title></title><script>window.location=('login.php')</script>");

    class User extends Dbh
    {

        public $id;
        public $matricula;
        public $username;
        public $email;
        public $pwd;
        public $isRh;

        public function auth()
        {

            try
            {

                $sql = "SELECT * FROM usuarios WHERE matricula=? OR BINARY username=? OR BINARY email=?;";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$this->matricula, $this->username, $this->email]);

                if ($stmt->rowCount() == 1)
                {

                    $rowUser = $stmt->fetch();

                    if (password_verify($this->pwd, $rowUser['pwd']))
                    {

                        $this->matricula = $rowUser['matricula'];
                        $this->username = $rowUser['username'];
                        $this->email = $rowUser['email'];
                        $this->perfil = $rowUser['perfil'];
                        return true;

                    }
                    else
                        return false;

                }

            }
            catch(PDOException $exe)
            {

                echo 'Connection failed: ' . $exe->getMessage();
                die();

            } 

        }

        public function insert_user()
        {

            try
            {   

                date_default_timezone_set('America/Manaus');

                $sql = "INSERT INTO usuarios (matricula, username, email, pwd, registro) VALUES (?, ?, ?, ?, ?);";
                $stmt = $this->connect()->prepare($sql);
                $hashedpwd = password_hash($this->pwd, PASSWORD_DEFAULT);

                $registro = date('Y-m-d H:i:s');
                $result = $stmt->execute([$this->matricula, $this->username, $this->email, $hashedpwd, $registro]);


            }
            catch(PDOException $exe)
            {

                echo 'Connection failed: ' . $exe->getMessage();
                die();

            }

        }

        public static function get_user($matricula, $username, $email)
        {

            try
            {   

                $db = new Dbh();
                // Verifica no banco por matricula, username e email para não cadastrar um usuário com essas
                // Informações duplicadas;
                $sql = "SELECT * FROM usuarios WHERE matricula=? OR BINARY username=? OR BINARY email=?;";

                $conn = $db->connect();
                $stmt = $conn->prepare($sql);
                $stmt->execute([$matricula, $username, $email]);

                $result = $stmt->fetch();

                if ($result)
                    return false;
                else
                    return true;

                unset($db);
                
            }
            catch (PDOException $e)
            {

                unset($db);
                echo 'Connection failed: ' . $e->getMessage();
                die();

            }


        }


    }