<?php
    require_once('./db/db.php');
   
    $idx = $_GET['idx'];


    $conn = mysqli_connect('localhost','root','qwe123','goods');
    $sql = "select * 
            from goods 
            where idx = {$idx}";
    $result = mysqli_query($conn, $sql);
    $row = $result -> fetch_array(MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="resource/js/bootstrap.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
       th {width: 200px; border-right:1px solid #ddd;}
       td {width: 500px;}
        th, td {text-align:center;}
    </style>
</head>
<body>
<h1 style="text-align:center; padding-bottom:20px; border-bottom:1px gray solid;">상품조회</h1>

<table class="table" style="margin-left:auto;margin-right:auto; width:1000px;">
    <tr>
        <th>카테고리</th>
        <td><?=$row['category']?></td>
    </tr>
    <tr>
        <th>상품명</th>
        <td><?=$row['goods_nm']?></td>
    </tr>
    <tr>
        <th>색상</th>
        <td><?=$row['color']?></td>
    </tr>
    <tr>
        <th>사이즈</th>
        <td><?=$row['size']?></td>
    </tr>
    <tr>
        <th>가격</th>
        <td><?=$row['price']?></td>
    </tr>
    <tr>
        <th>등록날짜</th>
        <td><?=$row['rt']?></td>
    </tr>
    <tr>
        <th>수정날짜</th>
        <td><?=$row['ut']?></td>
    </tr>

</table>
<div class="col-sm-10" style="text-align:center; width:100%;">
  <input type="button" value="수정" class="btn btn-success" id="mod_btn" onclick="open_popup2();">
  <input type="button" value="삭제" class="btn btn-danger" id="del_btn">
  <a href="delete.php?idx=<?=$idx?>">삭제</a>
  <button class="btn btn-warning" onclick="history.back()">취소</button>
</div>

<script>
    function open_popup2() {
        window.open('modify.php','modify page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');
    }
</script>
</body>
</html>