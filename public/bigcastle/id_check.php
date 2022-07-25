<?php

require_once('./db/db.php');

if($_POST['user_id'] != NULL){
    $id_check = mq("select * from tb_user where user_id='{$_POST['USER_ID']}'"); // mq 함수가 정의되지 않음
    $id_check = $id_check->fetch_array();

    if($id_check >= 1){
        echo "존재하는 아이디입니다.";

    }else{
        echo "사용가능한 아이디입니다.";
    }
}

// 하단에는 닫힘 꺽쇠를 사용하지 않음 - psr 준수
?>