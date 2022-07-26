<?php
    session_start();

    $user_id = $_SESSION['user_id'];


    $conn = mysqli_connect("localhost", "root", "qwe123", "testdb");
    $sql = "delete from tb_user where user_id = '$user_id'";
    mysqli_query($conn,$sql);

    unset($_SESSION['user_id']);
    
    mysqli_close($conn);
    
    // header('Location:main.php');


    echo "
    <script type=\"text/javascript\">
        alert(\"정상처리 되었습니다.\");
        location.href = \"../index.php\";
    </script>
";




