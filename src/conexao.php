<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "tcc";
    $port = 3306;

    try{
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

        //echo "teste";
    } catch(PDOException $err){
        echo "erro teste" . $err->getMessage();
    }
?>