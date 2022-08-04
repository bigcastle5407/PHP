<?php
require_once('./db/db.php');

$idx = $_GET['idx'];
$conn = mysqli_connect('localhost','root','qwe123','goods');
$sql = "delete from
        goods
        where idx={$idx}";
$sql2 = "SET @count=0;";
$sql3 = "update goods set idx=@count:=@count+1";
$sql4 = "alter table goods auto_increment=1";
mysqli_query($conn,$sql);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);

   
   echo "<script>
            window.close();
        <script>";

mysqli_close($conn);



?>