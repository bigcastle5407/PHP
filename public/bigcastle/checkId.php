<?php
    require_once('./db/db.php');

    $user_id = $_GET['user_id'];

    if(!$user_id){
        /**
         * html 부분은 될 수 있는 한 편집기에서 인식되게끔 처리 할 것
         * 
         * component 폴더에 alert.php 관련된 기능들을 따로 만들어 필요할 때 가져와 사용하는 방법도 한번 생각해보세요
         * include 또는 require로 코드를 분리하여 부품화 (코드가 방대해질수록 이러한 일련의 작업들이 필요함)
         */
        echo "
        <p>아이디를 입력해주세요.</p>
        <center><input type=button value=창닫기 onclick='self.close()'></center>
        ";
    } else{
        $sql = $db -> prepare("SELECT * FROM tb_user WHERE user_id=:user_id"); // user_id를 pdo 처리로 한 것은 좋은 방법 - DB Injection 공격 방어됨
        $sql -> bindParam(':user_id',$user_id);
        $sql->execute(); // 클래스에서 프로피터 접근할 때는 공백 없이 붙여서 사용
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
<body>
</body>
</html>