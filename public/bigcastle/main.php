<?php
session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 메인 페이지와 관련된 타이틀 태그 작성 -->
    <title>Document</title> 
    <link rel="stylesheet" href="/css/css.css">
</head>
<body>
    <hearder>
        <div class="topBar" style ="text-align : right; margin-right : 30px; height : 60px; font-size :20px; background-color : gray;">
        <?php

            if(!isset($_SESSION['user_id'])){
                echo "<a href='/bigcastle/login.php'>로그인</a>&nbsp;|&nbsp;";
                echo "<a href='/bigcastle/register.php'>회원가입 </a>";
            }else{
                echo '<span>'.$_SESSION['user_id'].'님 환영합니다.</span>&nbsp;&nbsp;';
                echo "<a href= logout.php?mode=logout>로그아웃</a>";
            
            }
         ?>
         </div>
    </header>
</body>
</html>