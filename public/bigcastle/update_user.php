<?php 
    session_start();
    
    require_once('./db/db.php');

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
    <form action='action.php?mode=update' method='POST'>
        <fieldset>
            <legend>회원정보수정</legend>
                
                    <table>
                        <tr>
                            <td>아이디</td>
                            <td><input type="text" id='user_id' name="user_id" value="<?=$_SESSION['user_id']?>" disabled></td>
                        </tr>
                        
                        <tr>
                            <td>새 비밀번호</td>
                            <td><input type="password" id='user_pw' name='user_pw'></td>
                        </tr>
                        
                        <tr>
                            <td>비밀번호 확인</td>
                            <td><input type="password" id='user_pw2' name='user_pw2'></td>
                        </tr>
                    </table>
                    <input type="submit" value="수정">
                    <input type="button" value="삭제" onclick="delete_info();">
                    <input type="button" value="취소" onclick="history.back(1)">
                            

        </fieldset>
    </form>

</body>
</html>