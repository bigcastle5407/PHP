<?php
require_once('./db/db.php');

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$category = "";
$goods_nm = "";
$color = "";
$size = "";
$price="";
$ut = "";

$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";

if($method == "POST") {
    $idx = $_GET['idx'];
    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    echo(json_encode(array("mode" => $_REQUEST['mode'], "category" => $category, "goods_nm" => $goods_nm, "color" => $color, "size" => $size, "price" => $price)));
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update goods
                set category='$category', goods_nm='$goods_nm', color='$color', size='$size',price='$price',ut='now()'
                where idx = {$idx}";
        $conn->exec($sql);
       
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;

}else if($method == "GET") {
    $idx = $_GET['idx'];
    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    echo(json_encode(array("mode" => $_REQUEST['mode'], "category" => $category, "goods_nm" => $goods_nm, "color" => $color, "size" => $size, "price" => $price)));
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update goods
                set category='$category', goods_nm='$goods_nm', color='$color', size='$size',price='$price',ut='now()'
                where idx = {$idx}";
        $conn->exec($sql);
       
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
} 
