<?php 
    class Database{
        protected   $conn;
        private $dsn = 'mysql:dbname=demo_anm;host=127.0.0.1';
        private $user = 'root';
        private $password = '';

        function __construct(){
            
            try {
                $this->conn = new  PDO ( $this->dsn, $this->user, $this->password) ;
            } catch (PDOException $e) {
                $this->conn = null;
                echo 'Connection failed: ' . $e->getMessage();
            }  
        }

        function close(){
            $this->conn = null;
        }
    }
?>