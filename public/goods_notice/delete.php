<?php
require_once('./db/db.php');

$idx = $_POST['idx'];
$sql = "delete from
        goods
        where idx={$idx}";
if(mysqli_query($conn,$sql)){
    echo json_encode(array("statusCode"=>200));
}else{
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);



?>