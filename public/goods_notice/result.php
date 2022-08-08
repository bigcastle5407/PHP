<?
require_once('./db/db.php');

$search = $_GET['search'];
$kind = $_GET['kind'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo $kind; ?>에서 '<?php echo $search;?>'검색결과</h1>
<h4 style="margin-top:30px;"><a href="/">홈으로</a></h4>
<table class="table table-striped" style="width:1500px; margin:auto;">
  <thead>
    <tr>
      <th style="text-align:center;">NO</th>
      <th style="text-align:center;"><input type="checkbox" name="chkAll[]" id="cbx_chkAll" value="전체선택"></th>
      <th style="text-align:center;">카테고리</th>
      <th style="text-align:center;">상품명</th>
      <th style="text-align:center;">색상</th>
      <th style="text-align:center;">사이즈</th>
      <th style="text-align:center;">가격</th>
      <th style="width:150px; text-align:center;">등록일자</th>
      <th style="width:150px; text-align:center;">수정일자</th>
    </tr>
  </thead>
    <?php
        $conn = mysqli_connect('localhost','root','qwe123','goods');
        $sql2 ="select * from goods where goods_nm like '%$search%' order by idx desc";
        $result = mysqli_query($conn, $sql2);
 
        while($board = mysqli_fetch_array($result)){
           
          $goods_nm=$board["goods_nm"]; 
            if(strlen($goods_nm)>30)
              { 
                $goods_nm=str_replace($board["goods_nm"],mb_substr($board["goods_nm"],0,30,"utf-8")."...",$board["goods_nm"]);
              }
           
    ?>

<tbody>
    <tr style='text-align:center;'>
      <td style='text-align:center; width:50px;'><?=$board['idx']?></td>
      <td style='text-align:center; width:50px;'><input type="checkbox" name="chk[]" value="<?=$board['idx']?>"></td>
      <td style='width:100px;'><?=$board['category']?></td>
      <td style='width:170px;'><a href="goods_notice/modify.php?idx=<?=$board['idx']?>" onclick="window.open(this.href,'register page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');return false"><?=$data['goods_nm']?></a></td>
      <td style='width:60px;'><?=$board['color']?></td>
      <td style='width:60px;'><?=$board['size']?></td>
      <td style='width:60px;'><?=$board['price'].'원'?></td>
      <td><?=$board['rt']?></td>
      <td><?=$board['ut']?></td>
    </tr>
</tbody>
    <?php } ?>
</body>
</html>