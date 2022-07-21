<?php
        //login.php의 form태그에서 보낸 값 받아와서 변수에 저장
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];

        //DB연결 
        $conn = mysqli_connect('localhost', 'root', 'qwe123', 'testDB');
        $sql = "select * from tb_user where user_id = '$user_id' and user_pw = '$user_pw'";
        $res = mysqli_fetch_array(mysqli_query($conn,$sql));
        
        //로그인 데이터를 세션에 저장
        if($res){
            session_start();

            $_SESSION['user_id'] = $res['user_id'];
            $_SESSION['user_name'] = $res['user_names'];
            // $_SESSION['user_name'] = $res['user_name'];
            echo "<script>window.location.replace('main.php')</script>";
            
        }else{
            echo "<script> window.location.replace('main.php')</script>";
        }




?>
