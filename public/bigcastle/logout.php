<?php
session_start();
//세션 삭제 
$del = session_destroy();

if($del){
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    header('Location: index.php');
=======
    header('Location: main.php');
>>>>>>> Stashed changes
=======
    header('Location: main.php');
>>>>>>> Stashed changes
}

?>