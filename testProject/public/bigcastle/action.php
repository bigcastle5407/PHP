<?php
    session_start();
    require_once('./db/db.php');
        
        switch($_GET['mode']){
            // 회원가입 
            case 'register':
                $user_name = $_POST['user_name'];
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
                $user_pw2 = $_POST['user_pw2'];
                $user_gender = $_POST['user_gender'];
                $user_date = $_POST['user_date'];
                $user_tel = $_POST['user_tel'];
                
                if(!is_null($user_id)){
                    $conn = mysqli_connect('localhost','root','qwe123','testdb');
                    $sql = "SELECT user_id FROM tb_user WHERE user_id = '$user_id';";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $user_id_e = $row['user_id'];
                        echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
                    }

                    if($user_id == $user_id_e){
                        $wu = 1;
                    }else if($user_pw != $user_pw2){
                        echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                        $wp = 1;
                    }else{
                        // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql_add = "INSERT INTO tb_user VALUES ('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel');";
                    }

                    mysqli_query($conn, $sql_add);
                    header('Location: bigcastle/main.php');

                }else{
                    echo "회원가입 실패";
                }
                break;
            

                // if($user_pw != $user_pw2){
                //     echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                // }

                // $sql = $db -> prepare("INSERT INTO tb_user VALUE('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')");
                
                // $sql -> execute();
                // echo "<script> Location.replace('/bigcastle/main.php')</script>";
            

            // 로그인
            case 'login':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
        

                $conn = mysqli_connect('localhost','root','qwe123','testdb');
                $sql = "SELECT * FROM tb_user WHERE user_id='{$user_id}' AND user_pw = '{$user_pw}'";
                $result = mysqli_query($conn, $sql);
                $row = $result -> fetch_array(MYSQLI_ASSOC);

                if($row != null){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_id'] = $row['user_id'];
                    echo $_SESSION['user_id'].'님 안녕하세요';
                    header('Location: /bigcastle/main.php');
                }

                if($row == null){
                    echo '로그인 실패sss';
                }

                if(!$user_id){
                    echo("<script>alert('아이디를 입력해주세요'); history.back();</script>");
                }

                break;

            //로그아웃
            case 'logout':
                session_unset();
                header('location:/main.php');
                break;

            // 아이디 중복체크
            // case 'id_check':
            //     $user_id = $_POST['user_id'];
                
            //     if($_POST['user_id'] != NULL){
            //         $id_check = mq("select * from tb_user where user_id='" .$user_id."'");
            //         $id_check = $id_check->fetch_array();
                    
            //         if($id_check >= 1){
            //             echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
            //         }else{
            //             echo("<script>alert('사용할 수 있는 아이디입니다.'); history.back();</script>");
            //         }
                    
            //         echo "<script> Location.replace('/bigcastle/main.php')</script>";
            //         break;
            // }
            


            case 'update':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
                $user_pw2 = $_POST['user_pw2'];

                $stmt = $db -> prepare("SELECT * FROM tb_user WHERE user_id={$user_id}");
                $stmt -> execute();
                

                $sql ="UPDATE tb_user SET user_pw='$user_pw' WHERE user_id='$user_id'";
                $res = $db->query($sql);

                
                
                if(!$user_pw || !$user_pw2){
                    echo("<script>alert('비밀번호를 입력해주세요'); history.back();</script>");
                } elseif($user_pw != $user_pw2){
                    echo("<script>alert('비밀번호가 일치하지 않습니다'); history.back();</script>");
                }
                
                if($res){
                    echo("<script>alert('회원정보수정 성공'); history.back();</script>");
                    session_unset();
                    header('location:main.php');
                }else{
                    echo("<script>alert('회원정보수정 실패'); history.back();</script>");
                }

                

                break;









        }
        