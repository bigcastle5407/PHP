<?php
require_once('./db/db.php');

$idx = $_GET['idx'];
$conn = mysqli_connect('localhost','root','qwe123','goods');
$sql = "delete from
        goods
        where idx={$idx}";
$sql2 = "alter table goods auto_increment=1";
mysqli_query($conn,$sql2);
if(mysqli_query($conn,$sql)){
   
    header('Location:/');

}else{
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);



?>