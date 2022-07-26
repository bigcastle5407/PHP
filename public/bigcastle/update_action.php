<?php
session_start();
require_once('./db/db.php');
 
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_pw2 = $_POST['user_pw2'];

$stmt = $db -> prepare('select *
                        from tb_user 
                        where user_id=:user_id');
$stmt -> bindParam('user_id',$user_id);
$stmt -> execute();
$user = $stmt -> fetch();

$sql = $db -> prepare('update tb_user
                        set user_pw=:user_pw 
                        where user_id=:user_id');
$sql -> bindParam('user_pw',$user_pw);
$sql -> bindParam('user_id',$user_id);

if(!$user_pw || !$user_pw2){
    echo("<script>alert('비밀번호를 입력해주세요'); history.back();</script>");
} elseif($user_pw != $user_pw2){
    echo("<script>alert('비밀번호가 일치하지 않습니다'); history.back();</script>");
}elseif($pw1 == $user['pw']){
    echo("<script>alert('이전 비밀번호와 같습니다.'); history.back();</script>");
}
$sql -> execute();
 
session_unset();
header('Location:main.php');
