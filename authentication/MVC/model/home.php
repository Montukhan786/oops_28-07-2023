<?php
    class homeModel{
        private $con;
        function __construct()
        {
            try{
                $this->con = new PDO("mysql:host=localhost;dbname=authdb",'root','Montukhan@2000');
            }
            catch(PDOException $e){
                echo "Error ".$e->getMessage();
            }
        }

        function page($id){
            $sql = "select title,data from page where id='$id'";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = $data['0'];
            return $arr;
        }

    }

?>