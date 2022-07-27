<?php
    require_once('./db/db.php');

    $category = $_POST['category'];
    $productName = $_POST['productName'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    
    $conn = mysqli_connect('localhost','root','qwe123','goods');
    $sql = "insert into goods(idx, category, goods_nm, color, size, price, rt,ut)
            values(null,'$category', '$productName', '$color', '$size', '$price','2022-07-27','2022-07-27')";

    $result = $conn->query($sql);

    if($result){
        echo "
            <script>
                alert('상품이 등록되었습니다.');
                window.close();
            </script>
        ";
    }else{
        echo "상품 등록에 실패하였습니다.";
    }

    mysqli_close($conn);
