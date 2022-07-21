<?php
session_start();


if(!isset($_SESSION['user_id'])){

    hearder ('Location: ./bigcaslte/login.php');

} 

$user_id = $_SESSION['user_id'];


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> <?=$user_id?> 님 환영합니다.</p>
    <a href= logout.php>로그아웃</a>
</body>
</html>