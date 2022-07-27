<?php
  require_once('goods_notice/db/db.php');

  $conn = mysqli_connect('localhost','root','qwe123','goods');
  $sql = "select * 
          from goods 
          order by idx desc limit 0,10";
  $result = mysqli_query($conn, $sql);
  $table = $result -> fetch_array(MYSQLI_ASSOC);
  $idx = $table['idx'];
  $category = $table['category'];
  $goods_nm = $table['goods_nm'];
  $color = $table['color'];
  $size = $table['size'];
  $rt = $table['rt'];
  $ut = $table['ut'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품관리</title>
    <link rel="stylesheet" href="goods_notice/resource/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="goods_notice/resource/js/bootstrap.js"></script>
</head>
<body style="width:90%; margin:auto;">
<h1 style="text-align:center; border-bottom:1px gray solid; padding-bottom:30px;">상품 관리</h1>
<table class="table table-striped" style="width:1500px; margin:auto;">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">카테고리</th>
      <th scope="col">상품명</th>
      <th scope="col">색상</th>
      <th scope="col">사이즈</th>
      <th scope="col">등록일자</th>
      <th scope="col">수정일자</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$idx?></th>
      <td><?=$category?></td>
      <td><?=$goods_nm?></td>
      <td><?=$color?></td>
      <td><?=$size?></td>
      <td><?=$rt?></td>
      <td><?=$ut?></td>
    </tr>
    
  </tbody>
</table>

<div style="text-align:center;padding-top:30px;">
  <input type="button" class="btn btn-primary" id="reg_btn" name="reg_btn" value="등록" onclick="open_popup();" >
</div>
   
<script>
    function open_popup() {
        window.open('goods_notice/reg_popup.php','register page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');
    }
</script>
    
</body>
</html>