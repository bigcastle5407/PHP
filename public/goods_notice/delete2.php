<?php

$chk = $_POST['chk'];
// var_dump($chk);
require_once('./db/db.php');


$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";


    foreach($chk as $idx){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "
                delete from
                goods
                where idx=$idx
                ";
            $sql2 = "
                set @count=0
                    ";
            $sql3 = "
                update goods
                set idx=@count:=@count+1
                    ";
            $sql4 = "
                alter table goods 
                auto_increment=1
                    ";
            $conn->exec($sql);
            $conn->exec($sql2);
            $conn->exec($sql3);
            $conn->exec($sql4);
           
        
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
            
            $conn = null;
    }

?>