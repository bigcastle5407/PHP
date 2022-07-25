<?php
    session_start();
    require_once('./db/db.php');

        
        switch($_GET['mode']){

            //회원가입
            case 'register':
                $user_name = $_POST['user_name'];
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
                $user_pw2 = $_POST['user_pw2'];
                $user_gender = $_POST['user_gender'];
                $user_date = $_POST['user_date'];
                $user_tel = $_POST['user_tel'];
                

                // echo "$user_name.','.$user_id.','.$user_pw.','.$user_gender.','.$user_date.','$user_tel'";
                
                $sql = $db -> prepare("INSERT INTO tb_user VALUE('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')");
              


                if($user_pw != $user_pw2){
                    echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                }

                $sql -> execute();
                
                // echo "<script> Location.replace('/bigcastle/main.php')</script>";
                header('Location: /bigcastle/main.php');

                break;
            
            // 로그인
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

            // 로그아웃
            case 'logout':
                session_unset();
                header('location:/bigcastle/main.php');

                break;


            // 아이디 중복체크
            // case 'id_check':
            //     $user_id = $_POST['user_id'];
                
            //     if($_POST['user_id'] != NULL){
            //         $id_check = mq("select * from tb_user where user_id='{$user_id}'");
            //         $id_check = $id_check->fetch_array();
                    
            //         if($id_check >= 1){
            //             echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
                        
            //         }else{
            //             echo("<script>alert('사용할 수 있는 아이디입니다.'); history.back();</script>");
            //         }
                    
            //         echo "<script> Location.replace('/bigcastle/main.php')</script>";
            //         break;
            // }

        }
        