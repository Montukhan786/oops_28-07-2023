<?php

    function getdbConnection(){
        $server = 'localhost';
        $username = 'root';
        $password = 'Montukhan@2000';
        $dbname = 'authdb';
        
        try{
            $conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

            //set the PDO error mode to ecxeption
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "return success!";
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection failed: ". $e->getMessage();
        }
        
    }

?>