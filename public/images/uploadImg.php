<?
require_once('./db/db.php');

$img = $_POST['img'];
$src = $_POST['src'];

echo $img;
echo $src;

$conn = mysqli_connect('localhost','root','qwe123','dogimages');
$sql = "
    insert into dogimages(idx, dogImages)
    values(null,'$img')
        ";
mysqli_query($conn, $sql);













