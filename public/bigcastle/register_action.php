<?php
 session_start();
 require_once('./db/db.php');
 
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_pw2 = $_POST['user_pw2'];
$user_gender = $_POST['user_gender'];
$user_date = $_POST['user_date'];
$user_tel = $_POST['user_tel'];

if(!is_null($user_id)){
    $conn = mysqli_connect('localhost','root','qwe123','testdb');
    $sql = "select user_id 
            from tb_user 
            where user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){
        $user_id2 = $row['user_id'];
        echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
    }

    if($user_id == $user_id2){
        
    }else if($user_pw != $user_pw2){
        echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
    }else{
        //비밀번호 암호화
        // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_add = "insert into tb_user
                    values ('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')";
    }

    mysqli_query($conn, $sql_add);
    header('Location: bigcastle/main.php');

}else{
    echo "회원가입 실패";
}