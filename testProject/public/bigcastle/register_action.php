<?php
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
                

                // echo "$user_name.','.$user_id.','.$user_pw.','.$user_gender.','.$user_date.','$user_tel'";
                
                $sql = $db -> prepare("INSERT INTO tb_user VALUE('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')");

                if($user_pw != $user_pw2){
                    errMsg("비밀번호가 일치하지 않습니다.");
                }

                $sql -> execute();
                header('location:/bigcastle/index.php');

                break;
            

            case 'login':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
        
                $sql = $db -> prepare("SELECT * FROM tb_user WHERE user_id=$user_id");
                $sql -> execute();
                $row = $sql -> fetch();

                if(!$user_id){
                    errMsg("아이디를 입력해주세요.");
                } elseif(!isset($row['user_id'])){
                    errMsg("존재하지않는 아이디입니다.");
                } elseif(!$user_pw){
                    errMsg("비밀번호를 입력해주세요.");
                } elseif($user_pw != $row['user_pw']){
                    errMsg("비밀번호가 일치하지 않습니다.");
                

                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];


                header('location:/bigcastle/main.php');

                
    
                break;


            }
        }