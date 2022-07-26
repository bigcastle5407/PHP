<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
</head>
<body>
    <hearder>
        <div style="text-align:right; margin-right:30px; height:60px; font-size:20px; background-color:gray;">
        <?php
            if(!isset($_SESSION['user_id'])){
                echo "<a href='/bigcastle/login.php'>로그인</a>&nbsp;|&nbsp;";
                echo "<a href='/bigcastle/register.php'>회원가입 </a>";
            }else{
                echo '<span>'.$_SESSION['user_id'].'님 환영합니다.</span>&nbsp;&nbsp;';
                echo "<a href = 'update_user.php'>회원정보수정</a>&nbsp;&nbsp;";
                echo "<a href= 'action.php?mode=logout'>로그아웃</a>";
            }
         ?>
         </div>
    </header>
</body>
</html>