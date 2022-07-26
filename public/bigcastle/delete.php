<?php
    session_start();
    $user_id = $_SESSION['user_id'];
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
        let result = confirm('정말 탈퇴하시겠습니까?');
        
        if(result == true){
            alert('정상처리되었습니다.');
                <?php
                    $conn = mysqli_connect("localhost", "root", "qwe123", "testdb");
                    $sql = "delete from tb_user where user_id = '$user_id'";
                    mysqli_query($conn,$sql);

                    unset($_SESSION['user_id']);
                    
                    mysqli_close($conn);
                ?>
            location.href = 'main.php';
            
        }else{
            alert('취소하였습니다.');
            location.href = 'history.back(1)';
        }

    </script>
</body>
</html>

