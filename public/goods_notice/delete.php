<?php
require_once('./db/db.php');

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$idx = "";


$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";

if($method == "POST") {
    $idx = $_POST['idx'];
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "
            delete from
            goods
            where idx={$idx}
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
        echo "
            <script>
                confirm('정말 삭제하시겠습니까?')
                
            </script>
            ";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
        
        $conn = null;

}
