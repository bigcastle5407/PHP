<?php
    session_start();
    require_once('./db/db.php');
        
        switch($_GET['mode']){
            // 회원가입 기능
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
                    $sql = "select user_id 
                            from tb_user 
                            where user_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $user_id_e = $row['user_id'];
                        echo("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
                    }

                    if($user_id == $user_id_e){
                        
                    }else if($user_pw != $user_pw2){
                        echo("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
                    }else{
                        //비밀번호 암호화
                        // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql_add = "insert into tb_user values ('$user_name', '$user_id','$user_pw', '$user_gender','$user_date','$user_tel')";
                    }

                    mysqli_query($conn, $sql_add);
                    header('Location: bigcastle/main.php');

                }else{
                    echo "회원가입 실패";
                }
                break;

            // 로그인 기능
            case 'login':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
        
                $conn = mysqli_connect('localhost','root','qwe123','testdb');
                $sql = "select * 
                        from tb_user 
                        where user_id='{$user_id}' and user_pw = '{$user_pw}'";
                $result = mysqli_query($conn, $sql);
                $row = $result -> fetch_array(MYSQLI_ASSOC); //MYSQLI_ASSOC : 컬럼명으로 값을 불러옴

                if($row != null){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_id'] = $row['user_id'];
                    echo $_SESSION['user_id'].'님 안녕하세요';
                    header('Location: /bigcastle/main.php');
                }

                if($row == null){
                    echo '로그인 실패';
                }

                if(!$user_id){
                    echo("<script>alert('아이디를 입력해주세요'); history.back();</script>");
                }

                break;

            //로그아웃 기능
            case 'logout':
                session_unset();
                header('Location:/main.php');
                break;

            //회원정보수정 기능
            case 'update':
                $user_id = $_POST['user_id'];
                $user_pw = $_POST['user_pw'];
                $user_pw2 = $_POST['user_pw2'];

                $stmt = $db -> prepare('select *
                                        from tb_user 
                                        where user_id=:user_id');
                $stmt -> bindParam('user_id',$user_id);
                $stmt -> execute();
                $user = $stmt -> fetch();

                $sql = $db -> prepare('update tb_user
                                        set user_pw=:user_pw 
                                        where user_id=:user_id');
                $sql -> bindParam('user_pw',$user_pw);
                $sql -> bindParam('user_id',$user_id);
    
                if(!$user_pw || !$user_pw2){
                    echo("<script>alert('비밀번호를 입력해주세요'); history.back();</script>");
                } elseif($user_pw != $user_pw2){
                    echo("<script>alert('비밀번호가 일치하지 않습니다'); history.back();</script>");
                }elseif($pw1 == $user['pw']){
                    echo("<script>alert('이전 비밀번호와 같습니다.'); history.back();</script>");
                }
                $sql -> execute();
                 
                session_unset();
                header('Location:main.php');

                break;
        }
    
        