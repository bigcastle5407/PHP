<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 메인 페이지와 관련된 타이틀 태그 작성 -->
    <title>Document</title>
</head>
<body>
    <h1>로그인페이지</h1>


    <form action='action.php?mode=login' method ='POST'>
        <fieldset>
            <label><p>아이디</p></label>
            <input type ='text' name = 'user_id' id = "user_id">

            <label><p>비밀번호</p></label>
            <input type ='password' name = 'user_pw' id ="user_pw"><br><br><br>

            <input type ='submit' value='로그인'>
            <input type ='reset' value='취소'>
            <a href ='/main.php'>뒤로가기 </a>

        </fieldset>



    </form>

</body>
</html>

