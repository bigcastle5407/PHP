<?php
    require_once('./db/db.php');

    $category = $_POST['category'];
    $goods_nm = $_POST['goods_nm'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    
    $servername = "localhost";
    $username = "root";
    $password = "qwe123";
    $dbname = "goods";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into goods(idx, category, goods_nm, color, size, price, rt)
            values(null,'$category', '$goods_nm', '$color', '$size', '$price',now())";
    $conn->exec($sql);
    echo "
        <script>
            alert('등록에 성공하였습니다.');
            window.close();
        </script>
         ";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>