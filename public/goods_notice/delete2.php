<?
require_once('./db/db.php');

$chk = $_POST['chk'];

for($i=0;$i<sizeof($chk);$i++){
    $conn = mysqli_connect('localhost','root','qwe123','goods');
    $sql = "delete from goods where idx = $chk[$i]";
    mysqli_query($conn, $sql);

    echo $chk[$i]. "<br>";
}

?>