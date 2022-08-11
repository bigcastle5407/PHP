<?php

require_once('./db/db.php');

$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";

$method = $_SERVER['REQUEST_METHOD'];


if($method == "POST") {
    $img = $_POST['src'];
 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "
            insert into goods(img)
            values('$img');
        ";
        $conn->exec($sql);
       
       
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
        
        $conn = null;

}












