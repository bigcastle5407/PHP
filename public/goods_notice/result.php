<?
require_once('./db/db.php');
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
<div id="board_area"> 
<?php
  $search = $_GET['search'];
  
?>

  <h1><?php echo $search; ?> 검색결과</h1>
  <h4 style="margin-top:30px;"><a href="/main.php">홈으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
            <th style="text-align:center;">NO</th>
            <th style="text-align:center;"><input type="checkbox" name="check[]" id="selectAll" value="전체선택"></th>
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
          
          while($row = $result -> fetch_array(MYSQLI_ASSOC)){
           
      
        ?>
      <tbody>
       
    <tr style='text-align:center;'>
      <td style='text-align:center; width:50px;'><?=$row['idx']?></td>
      <td style='text-align:center; width:50px;'><input type="checkbox" id="ck_box" name="check[]" value="<?=$row['idx']?>"></td>
      <td style='width:100px;'><?=$row['category']?></td>
      <td style='width:170px;'><a href="goods_notice/modify.php?idx=<?=$data['idx']?>" onclick="window.open(this.href,'register page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');return false"><?=$data['goods_nm']?></a></td>
      <td style='width:60px;'><?=$row['color']?></td>
      <td style='width:60px;'><?=$row['size']?></td>
      <td style='width:60px;'><?=$row['price'].'원'?></td>
      <td><?=$row['rt']?></td>
      <td><?=$row['ut']?></td>
    </tr>
  
      </tbody>

      <?php } ?>
    </table>
    <!-- 18.10.11 검색 추가 -->
    <div id="search_box2">
      <form action="/BBS/page/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
</div>
</body>
</html>