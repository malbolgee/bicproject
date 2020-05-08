<?php

    class Dbh
    {

        private $host;
        private $user;
        private $pwd;
        private $db;

        protected function connect($local = true)
        {

            // debugger
            if (!$local)
            {

                $this->host = 'sql304.epizy.com';
                $this->user = 'epiz_25639737';
                $this->pwd = 'uq4bLFhEoup';
                $this->db = 'epiz_25639737_cadastros';
                $this->charset = 'utf8mb4';

            }
            else
            {

                $this->host = 'localhost';
                $this->user = 'root';
                $this->pwd = '';
                $this->db = 'cadastros';
                $this->charset = 'utf8mb4';

            }

            // Actual connection;
            try
            {

                $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return $pdo;

            }
            catch (PDOException $e)
            {
                
                echo "Connection failed: " . $e->getMessage();

            }
            
        }

    }