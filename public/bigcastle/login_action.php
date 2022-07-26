<?php
session_start();
require_once('./db/db.php');

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

$conn = mysqli_connect('localhost','root','qwe123','testdb');
$sql = "select * 
        from tb_user 
        where user_id='{$user_id}' and user_pw = '{$user_pw}'";
$result = mysqli_query($conn, $sql);
$row = $result -> fetch_array(MYSQLI_ASSOC); //MYSQLI_ASSOC : 컬럼명으로 값을 불러옴

if($row != null){
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_id'] = $row['user_id'];
    echo $_SESSION['user_id'].'님 안녕하세요';
    header('Location: /bigcastle/main.php');
}

if($row == null){
    echo '로그인 실패';
}

if(!$user_id){
    echo("<script>alert('아이디를 입력해주세요'); history.back();</script>");
}