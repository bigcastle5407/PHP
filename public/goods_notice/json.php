<?php
require_once('./db/db.php');

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";

if($method == "POST") {
    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $img = $_POST['img'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    // echo(json_encode(array("mode" => $_REQUEST['mode'], "category" => $category, "goods_nm" => $goods_nm,"img" => $img, "color" => $color, "size" => $size, "price" => $price)));
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into goods(idx, category, goods_nm, img, color, size, price, rt)
                values(null,'$category', '$goods_nm','$img','$color', '$size', '$price',now())";
        $conn->exec($sql);
       
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
        $conn = null;


    
}
