<?php
session_start();
//세션 삭제 
$del = session_destroy();

if($del){
    header('Location: main.php');
}

?>