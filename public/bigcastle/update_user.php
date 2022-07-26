<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    require_once('./db/db.php');
    
    $sql = $db -> prepare("SELECT * FROM tb_user WHERE user_id=:user_id");
    $sql -> bindParam("user_id",$_SESSION['user_id']);
    $sql -> execute();
    $row = $sql -> fetch();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" gitcontent="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='update_action.php' method='POST'>
        <fieldset>
            <legend>회원정보수정</legend>
                <input type="hidden" name="user_id" value="<?= $row['user_id']?>">
                    <table>
                        <tr>
                            <td>아이디</td>
                            <td><input type="text" id="user_id" name="user_id" value="<?=$row['user_id']?>" disabled></td>
                        </tr>
                        
                        <tr>
                            <td>새 비밀번호</td>
                            <td><input type="password" id="user_pw" name="user_pw"></td>
                        </tr>
                        
                        <tr>
                            <td>비밀번호 확인</td>
                            <td><input type="password" id="user_pw2" name="user_pw2"></td>
                        </tr>
                    </table>
                    <input type="submit" value="수정">
                    <input type="button" value="취소" onclick="history.back(1)">
                    <a href="delete.php?id=<?=$user_id?>">회원 탈퇴 </a>
        </fieldset>
    </form>
</body>
</html>