<?php
  require_once('goods_notice/db/db.php');

  $conn = mysqli_connect('localhost','root','qwe123','goods');
  $sql = "select * 
          from goods 
          order by idx desc limit 0,50";
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
      <th style="text-align:center;">NO</th>
      <th style="text-align:center;">카테고리</th>
      <th style="text-align:center;">상품명</th>
      <th style="text-align:center;">색상</th>
      <th style="text-align:center;">사이즈</th>
      <th style="text-align:center;">가격</th>
      <th style="width:150px; text-align:center;">등록일자</th>
      <th style="width:150px; text-align:center;">수정일자</th>
    </tr>
  </thead>
  <tbody id="input_data">
    <?php
      while($data = mysqli_fetch_array($result)){
        $goods_nm = $data['goods_nm'];
        if(strlen($goods_nm)>30){
          $goods_nm=str_replace($data['goods_nm'],mb_substr($data['goods_nm'],0,30,"utf-8")."...",$data['goods_nm']);
        }


    ?>
    <tr style="text-align:center;">
      <th style="text-align:center; width:50px;"><?=$data['idx']?></th>
      <td style="width:100px;"><?=$data['category']?></td>
      <td style="width:170px;"><?=$data['goods_nm']?></td>
      <td style="width:60px;"><?=$data['color']?></td>
      <td style="width:60px;"><?=$data['size']?></td>
      <td style="width:60px;"><?=$data['price'].'원'?></td>
      <td><?=$data['rt']?></td>
      <td><?=$data['ut']?></td>
    </tr>
    <?php
      }
    ?>
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

<script>
  $(document).ready(function(){
    $('#reg_btn').click(function(){
      
      $.ajax({
        url:"reg_popup.php",
        type: "post",
        data: $("form").serialize(),
      }).done(function(data){
        $("#input_data").html(data);
      });
    });
  });
</script>
</body>
</html>