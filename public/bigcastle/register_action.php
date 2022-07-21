<?php

    if(isset($_POST['user_id']) && isset($_POST['user_pw'])){
        //register.php의 form 태그에서 보낸 값들을 받아와서 변수에 저장
        $user_name = $_POST['user_name'];
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];
        $user_gender = $_POST['user_gender'];
        $user_date = $_POST['user_date'];
        $user_tel = $_POST['user_tel'];
        

        //DB 연결
        $conn = mysqli_connect('localhost', 'root', 'qwe123', 'testDB');
        $sql = "INSERT INTO user_info VALUES ('$user_name', '$user_id', '$user_pw', '$user_gender', '$user_date', '$user_tel');";
        
        if($result = mysqli_query($conn, $sql)){
            header('Location: /index.php');
        }else{
            echo "실패";
        }

        mysqli_close($conn);
    }
    



?>



<?php


