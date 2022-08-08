<?php
  $db_conn = mysqli_connect('localhost','root','qwe123','goods');
  $selSql = "
      select count(*)
      from goods
          ";
  $selRes  = mysqli_query($db_conn, $selSql);
  $selRow  = mysqli_fetch_array($selRes);
  $num = $selRow[0];

  // echo $num;
  

  $list_num = 5;
  $page_num = 5;
  $page = isset($_GET["page"]) ? $_GET["page"] : 1;
  $total_page = ceil($num / $list_num);
  $total_block = ceil($total_page / $page_num);
  $now_block = ceil($page / $page_num);
  $s_pageNum = ($now_block - 1) * $page_num + 1;

  if($s_pageNum <= 0){
      $s_pageNum = 1;
  };

  $e_pageNum = $now_block * $page_num;

  if($e_pageNum > $total_page){
      $e_pageNum = $total_page;
  };

  $start = ($page - 1) * $list_num;
  $conn = mysqli_connect('localhost','root','qwe123','goods');
  
  $sql = "
      select * 
      from goods 
      order by idx desc limit $start, $list_num;
          ";
          // echo $sql;
  $result = mysqli_query($conn, $sql);
 
  $cnt = $start + 1;
?>

<?
  if(isset($_GET['search'])){
    $sel = $_GET['kind'];
    $search = $_GET['search'];
    $search_conn = mysqli_connect('localhost','root','qwe123','goods');
    $search_sql="
              select * 
              from goods
              where goods_nm like '%$search%' order by id desc limit $start, $list_num";
  $search_result=mysqli_query($search_conn, $search_sql);
  $search_sql2="
              select count(*) 
              from goods
              where goods_nm like '%$search%'
               ";

  $result_count=mysqli_query($search_conn,$search_sql2);

}
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  </head>
  <body style="width:90%; margin:auto;" id="body">
    <h1 style="text-align:center; border-bottom:1px gray solid; padding-bottom:30px;">상품 관리</h1>
    <div class="searchArea">
      <form action="main.php" method="GET" name="frm1">
      <select name="kind">
        <option value="category">카테고리</option>
        <option value="goods_nm" selected>상품명</option>

      </select>
      <input type="search" size="45" name="search" required="required" placeholder="상품명을 입력하세요">
      <input type=button name=byn1 onclick="search1()" value="찾기">
      </form>
    </div>
    <form method="POST" name="f">
    <div style="text-align:right;padding-top:30px;">
      <input type="button" class="btn btn-primary" id="reg_btn" name="reg_btn" value="등록" onclick="open_popup();" >&nbsp;&nbsp;&nbsp;
      <input type="button" class="btn btn-danger" id="del_btn2" name="del_btn2" value="삭제" onclick="historyDel();" >&nbsp;&nbsp;&nbsp;
      <select class="form-control" style="width:auto;display:inline-block;" id="sort" name="sort">
        <option>==정렬==</option>
        <option value="1">상품이름순</option>
        <option value="2">상품등록순</option>
      </select>
      <select class="form-control" style="width:auto;display:inline-block;" id="show" name="show">
        <option>==보기==</option>
        <option value="2">2개</option>
        <option value="5">5개</option>
        <option value="10">10개</option>
      </select>
      <button class="btn btn-danger" onclick="changeColor();">다크모드</button>
    </div><br>
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
  <tbody>
    <?php
      while($data = mysqli_fetch_array($result)){
    ?>
    <tr style='text-align:center;'>
      <td style='text-align:center; width:50px;'><?=$data['idx']?></td>
      <td style='text-align:center; width:50px;'><input type="checkbox" name="chk[]" value="<?=$data['idx']?>"></td>
      <td style='width:100px;'><?=$data['category']?></td>
      <td style='width:170px;'><a href="goods_notice/modify.php?idx=<?=$data['idx']?>" onclick="window.open(this.href,'register page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');return false"><?=$data['goods_nm']?></a></td>
      <td style='width:60px;'><?=$data['color']?></td>
      <td style='width:60px;'><?=$data['size']?></td>
      <td style='width:60px;'><?=$data['price'].'원'?></td>
      <td><?=$data['rt']?></td>
      <td><?=$data['ut']?></td>
    </tr>
    <?php
      $cnt++;

      }
    ?>
</tbody>



</table>
<!-- 페이징 -->
<p class="pager">

    <?php
      if($page <= 1){
    ?>
      <a href="main.php?page=1">이전</a>
    <?php } else{ ?>
    <a href="main.php?page=<?php echo ($page-1); ?>">이전</a>
    <?php };?>

    <?php
      for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
    ?>
      <a href="main.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
    <?php };?>

    <?php
      if($page >= $total_page){
    ?>
      <a href="main.php?page=<?php echo $total_page; ?>">다음</a>
    <?php } else{ ?>
      <a href="main.php?page=<?php echo ($page+1); ?>">다음</a>
    <?php };?>

    </p>
    </form>
   
<script>
    function open_popup() {
        window.open('goods_notice/reg_popup.php','register page','left=600, top=500, width=700, height=900, scrollbars=no, resizeable=no');
    }
</script>

<!-- 다크모드 -->
<script>
  var color = ["white", "black"];
  var textColor = ["black", "white"];

  var i = 0;
  var j = 0;

  function changeColor(){
    i++;
    j++;
    if(i>=color.length){
      i = 0;
    }
    if(j>=textColor.length){
      j = 0;
    }
    
    var bodyTag = document.getElementById("body");
    bodyTag.style.backgroundColor = color[i];
    document.querySelector('body').style.color=textColor[j];
  }

</script>

<!-- 셀렉트박스 정렬 -->
<script>
$(function() {

    $("#sort").change(function() {

        var v = $("#sort").val();

       if(v==1){
        <?php
           $conn = mysqli_connect('localhost','root','qwe123','goods');
           $sql = "
               select * 
               from goods 
               order by goods_nm asc limit $start, $list_num;
                   ";
           $result = mysqli_query($conn, $sql);
        ?>
       }
      
    });

});

</script>

<script>
$(function(){
  $('#show').change(function(){
    var count = $('#show').val();
    var count1 = parseInt(count,10);
    alert(count1);
  
  });
});

</script>

<script>
  function search1(){
    if(frm1.search.value){
      frm1.submit();
    }else{
      location.href="main.php"
    }
  }
</script>

<!-- 체크박스 전체선택 -->
<script>
 $(document).ready(function() {
	$("#cbx_chkAll").click(function() {
		if($("#cbx_chkAll").is(":checked")) $("input[name=chk]").prop("checked", true);
		else $("input[name=chk]").prop("checked", false);
	});

	$("input[name=chk]").click(function() {
		var total = $("input[name=chk]").length;
		var checked = $("input[name=chk]:checked").length;

		if(total != checked) $("#cbx_chkAll").prop("checked", false);
		else $("#cbx_chkAll").prop("checked", true); 
	});
});
</script>

<script>
function historyDel(){
  var form = document.f;
  var boo = false;

  if(document.getElementsByName("chk[]").length>0){
    for(var i=0;i<document.getElementsByName("chk[]").length;i++){
      if(document.getElementsByName("chk[]")[i].checked==true){
        boo = true;
        break;
        
        

      }
    }
  }
  if(boo){
    form.action = "delete2.php";
    form.submit();
    alert("선택한 항목은 입니다.");
  }else{
    alert("삭제할 항목을 적어도 하나는 체크해주세요");
  }
}
</script>

</body>
</html>