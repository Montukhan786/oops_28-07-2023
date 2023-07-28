<?php

    include_once "db.php";


    class Crud{
        private $conn;
        private static $instance;

        private function __construct()
        {
            $this->conn = getdbConnection();
            
            var_dump($this->conn);
        }

        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->conn;
        }
    
    }

?>