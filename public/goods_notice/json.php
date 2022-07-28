<?php
 header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$category = "";
$goods_nm = "";
$color = "";
$size = "";
$price="";
$rt = "";



if($method == "POST") {
    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    echo(json_encode(array("mode" => $_REQUEST['mode'], "category" => $category, "goods_nm" => $goods_nm, "color" => $color, "size" => $size, "price" => $price)));
    
}else if($method == "GET") {
    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    echo(json_encode(array("mode" => $_REQUEST['mode'], "category" => $category, "goods_nm" => $goods_nm, "color" => $color, "size" => $size, "price" => $price)));
    
    
} 
