<?php

    // 개발자들과 협업하는 경우 코드사이의 불필요한 공백 또는 띄어쓰지 않은 부분들은 제거가 필요함 - PSR 참조

    session_start();
    require_once('./db/db.php');

        
        switch($_GET['mode']){
            case 'register':
                $user_name = $_POST['user_name'];
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
                $user_pw2 = $_POST['user_pw2'];
                $user_gender = $_POST['user_gender'];
                $user_date = $_POST['user_date'];
                $user_tel = $_POST['user_tel'];
                
                if(!is_null($uer_id)){
                    
                    $conn = mysqli_connect('localhost','root','qwe123','testdb');
                    
                    $sql = "SELECT user_id FROM tb_user WHERE user_id = '$user_id';";

                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $user_id_e = $row['user_id'];
                    }

                    if($user_id == $user_id_e){
                        $wu = 1;
                    }else if($user_pw != $user_pw2){
                        echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                        $wp = 1;
                    }else{
                        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql_add = "INSERT INTO tb_user VALUES ('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')";
                    }

                }
               
                
                
                
                
                if($user_pw != $user_pw2){
                    echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                }

                $sql = $db -> prepare("INSERT INTO tb_user VALUE('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')");
                
                $sql -> execute();
                echo "<script> Location.replace('/bigcastle/main.php')</script>";

                break;
            

            case 'login':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
              
        
                $sql = $db -> prepare("SELECT * FROM tb_user WHERE user_id=$user_id");
                $sql -> execute();
               

                if(!$user_id){
                    echo("<script>alert('아이디를 입력해주세요'); history.back();</script>");
                
                }
                $_SESSION['user_id'] = $user_id;
               

                // echo "<script> Location.replace('/bigcastle/main.php')</script>";

                header('Location: /bigcastle/main.php');

                break;

            
            case 'logout':
                session_unset();
                header('location:/bigcastle/main.php');

                break;



            case 'id_check':
                $user_id = $_POST['user_id'];
                
                if($_POST['user_id'] != NULL){
                    $id_check = mq("select * from tb_user where user_id='" .$user_id."'");
                    $id_check = $id_check->fetch_array();
                    
                    if($id_check >= 1){
                        echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
                        
                    }else{
                        echo("<script>alert('사용할 수 있는 아이디입니다.'); history.back();</script>");
                    }
                    
                    echo "<script> Location.replace('/bigcastle/main.php')</script>";
                    break;
            }

        }
        