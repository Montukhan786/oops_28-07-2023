<?php

    class Users{
        private $servername = "localhost";
        private $username = "root";
        private $password = "Montukhan@2000";
        private $database = "projectdb";

        private $isConnect = false;
        private $result = array();
        private $connection = "";

        //database conectcion
        public function __construct()
        {
            if(!$this->isConnect){
                $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
                $this->isConnect = true;
                if($this->connection->connect_error){
                    array_push($this->result,$this->connection->connect_error);
                    return false;
                }
            }
            // $this->con = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);

            // if(mysqli_connect_error()){
            //     trigger_error("Failed to connect to mysql: ". mysqli_connect_error());
            // }
            // else{
            //     return $this->con;
            // }
        }

        //insert data into table
        public function insertData($post,$table){
            // first we convert normal password to md5 formet(Encrypted)
            $post['password'] = $this->connection->real_escape_string(md5($_POST['password']));

            if($this->tableExist($table)){ //we check table is exist in database or not 
                $data = array_slice($post,0,-1);

                $columns = implode(',',array_keys($data)); //it contain the columnname saperated by ,
                // $placeholders = "$post"."['".implode("'],$post"."['" , array_keys($data)) . "]";
                $placeholders = implode("', '",array_values($data));

                $query = "INSERT INTO $table ($columns) VALUES ('$placeholders')";

                $sql = $this->connection->query($query);


                if($sql){
                    array_push($this->result,$this->connection->insert_id);
                    return true;
                }
                else{
                    array_push($this->result,$this->connection->error);
                    return false;
                }
            }
            else{
                return false;
            }
            

            // return $sql;
        }

        //Fetch all records
        public function displayData($table, $rows="*", $where = null, $order = null, $limit = null){

            if($this->tableExist($table)){
                $sql = "SELECT $rows FROM $table";

                if($where != null){
                    $sql .= " WHERE $where";
                }

                if($order != null){
                    $sql .= " ORDER BY $order";
                }

                if($limit != null){
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }

                    $start = ($page-1) * $limit;


                    $sql .= " LIMIT $start,$limit";
                }

                // echo $sql;

                $query = $this->connection->query($sql);

                if($query){
                    $record = array();
                    while($row = $query->fetch_assoc()){
                        $record[] = $row;
                    }
                    // $encoded_data = json_encode($record,JSON_PRETTY_PRINT);
                    // file_put_contents('data.json',$encoded_data);
                    // echo "<pre>";
                    // var_dump($encoded_data);
                    return $record;
                }
                else{
                    array_push($result,$this->connection->error);
                    echo "No record found";
                }

            }
            else{
                echo "Table does not exist in database";
            }
            // $query = "SELECT * from tblusers";
            // $result = $this->connection->query($query);
            // if($result->num_rows > 0){
            //     $data = array();
            //     while($row = $result->fetch_assoc()){
            //         $data[] = $row;
            //     }
            //     return $data;
            // }
            // else{
            //     echo "No records found";
            // }
        }

        public function pagination($table, $joins= null, $where=null, $limit = null){
            if($this->tableExist($table)){
                
                if($limit != null){
                    $sql = "SELECT COUNT(*) FROM $table";
                    // echo $sql;
                    if($joins != null){
                        $sql .= " JOIN $joins";
                    }
    
                    if($where != null){
                        $sql .= " WHERE $where";
                    }

                    $query = $this->connection->query($sql);

                    $record = $query->fetch_array();
                    // echo "<pre>";
                    
                    $totalRecord = $record[0];
                    
                    
                    $total_page = ceil($totalRecord / $limit);
                    // echo $total_page;

                    $url = basename($_SERVER['PHP_SELF']);

                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }

                    $output = "<ul class='pagination'>";
                    
                    if($page>1){
                        $output .= "<li> <a href='$url?page=".($page-1)."'>Prev</a></li>";
                    }

                    if($total_page >= $limit){
                        for($i = 1; $i <= $total_page; $i++){
                            if($i == $page){
                                $cls = "class='active'";
                            }
                            else{
                                $cls = "";
                            }
                            $output .= "<li> <a $cls href='$url?page=$i'>$i</a></li>";
                        }
                    }

                    if($total_page>$page){
                        $output .= "<li> <a href='$url?page=".($page+1)."'>Next</a></li>";
                    }
                    $output .= "</ul>";
                    
                    echo $output;
                }
                else{
                    
                    return false;
                }
            }
            else{

                return false;
            }
        }

        //Fetch single data
        public function displayRecordById($id){
            $query = "SELECT * FROM tblusers WHERE id='$id'";
            $result = $this->connection->query($query);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
            else{
                echo "Record not found";
            }
        }
        
        //update data
        public function updateRecord($postData, $table, $where){
            // $name = $this->connection->real_escape_string($_POST['name']);
            // $email = $this->connection->real_escape_string($_POST['email']);
            // $username = $this->connection->real_escape_string($_POST['username']);
            // $id = $this->connection->real_escape_string($_POST['id']);

            if($this->tableExist($table)){
                $newData = array();
                $data = array_slice($postData,0,-2);


                foreach($data as $key => $val){
                    $newData[] = "$key = '$val' ";
                }

                $sql = "UPDATE $table SET " . implode(', ',$newData);

                if($where != null){
                    $sql .= " WHERE $where";
                }

                // echo $sql;
                if($this->connection->query($sql)){
                    array_push($this->result,$this->connection->affected_rows);
                    return true;
                }
                else{
                    array_push($this->result,$this->connection->error);
                    return false;
                }
            }
            else{
                return false;
            }

            // if(!empty($id) && !empty($postData)){
            //     // $query = "UPDATE tblusers SET name='$name', email='$email', username='$username' WHERE id = '$id'";

            //     // echo $where;
            //     //$query = "UPDATE $table SET name='$name', email='$email', username='$username' WHERE id = '$id'";


            //     // $sql = $this->connection->query($query);

            //     // if($sql){
            //     //     // header('location:index.php?msg2=update');
            //     // }
            //     // else{
            //     //     echo "Registration updated failed try again!";
            //     // }
            // }
        }

        //Delete data
        public function deleteRecord($table, $where = null){

            if($this->tableExist($table)){
                $sql = "DELETE FROM $table";

                //check if condition is present or not
                if($where != null){
                    $sql .= " WHERE $where";
                }

                if($this->connection->query($sql)){
                    array_push($result,$this->connection->affected_rows);
                    return true;
                }
                else{
                    array_push($result,$this->connection->error);
                    return false;
                }

            }

            else{
                return false;
            }


        }

        private function tableExist($table){
            $sql = "show tables from $this->database like '$table'";

            $tableExists = $this->connection->query($sql);

            if($tableExists){
                if($tableExists->num_rows >= 1){
                    return true;
                }
                else{
                    array_push($result,$table . 'does not exist in database');
                    return false;
                }
            }
        }

        public function getResult(){
            $val = $this->result;
            $this->result = array();

            return $val;
        }

        public function __destruct()
        {
            if($this->isConnect){
                if($this->connection->close()){
                    $this->isConnect = false;
                    return true;
                }
            }
            else{
                return false;
            }
        }


    }

    // $user = new Users();

    // $result = $user->displayData('tblusers', "*", null, null, 3);
    // echo "<br>Select result is :<br>";
    // echo "<pre>";
    // // print_r($result);

    // // $user->pagination('tblusers',null,null,3);

    // foreach($result as list("id"=>$id,"name"=>$name,"email"=>$email,"username"=>$username)){
    //     echo "$id - $name - $email - $username <br>";
    // }
    // $user->pagination('tblusers',null,null,3);

    // // echo "<pre>";
    // // print_r($user->getResult());

?>