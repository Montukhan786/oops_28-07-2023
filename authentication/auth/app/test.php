<?php

    include_once "db.php";
    include_once "Crud.php";

    // getdbConnection();
    // $crud = new Crud();

    // $crud1 =new Crud();

    // $crud3 =new Crud();

    // $crud4 =new Crud();

    $db = Crud::getInstance();
    $connection = $db->getConnection();
    echo "<pre>";
    var_dump($connection);

    $connection1 = $db->getConnection();
    echo "<pre>";
    var_dump($connection1);

    // $db1 = Crud::getInstance();
    // echo "<pre>";
    // var_dump($db1);

    // $db2 = Crud::getInstance();
    // echo "<pre>";
    // var_dump($db2);

    $sql = "select * from users";

    // $result = $connection->query($sql);

    // $response = $result->fetchAll();
    // print_r($response);

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo"<pre>";
    print_r($result);



?>