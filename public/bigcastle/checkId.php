<?php
    require_once('./db/db.php');

    $user_id = $_GET['user_id'];

    if(!$user_id){
        echo "
        <p>아이디를 입력해주세요.</p>
        <center><input type=button value=창닫기 onclick='self.close()'></center>
        ";
    } else{
        $sql = $db -> prepare("SELECT * FROM tb_user WHERE user_id=:user_id");
        $sql -> bindParam(':user_id',$user_id);
        $sql -> execute();
        $count = $sql -> rowCount();

            if($count<1){
                echo "
                <p>사용 가능한 아이디입니다.</p>
                <center><input type=button value=창닫기 onclick='self.close()'></center>
                ";
            } else{
                echo "
                <p>이미 존재하는 아이디입니다.</p>
                <center><input type=button value=창닫기 onclick='self.close()'></center>
                ";
            }
    }
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>중복확인</title>
</head>
</html>