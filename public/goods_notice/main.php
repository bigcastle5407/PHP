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

  $query_string = $_SERVER["QUERY_STRING"];
  $request_url = $_SERVER[ "REQUEST_URI" ];
  // echo $request_url;
  // echo $query_string;

  $show = $_GET['show'];
  
  $sort = $_GET['sort'];
  switch($sort){
    case 'rt':
      $sort2 = "asc";
      break;
    case 'goods_nm':
      $sort2 = "asc";
      break;
    default:
      $sort2 = "desc";
      break;
  }
  // echo $show;


  $list_num = $show;
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
  // $sort $sort2
  $sql = "
      select * 
      from goods 
      order by $sort $sort2 limit $start, $list_num
          ";
          // echo $sql;
  $result = mysqli_query($conn, $sql);
 
  $cnt = $start + 1;
?>

<?php
  if(empty($_GET["search"])){
    $search_word ="";
  }else{
    $search_word =$_GET["search"];
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
      <input type="text" name="search_word" id="search_word" class="form-control" placeholder="검색어를 입력해주세요." autofocus style="width:300px;display:inline-block;">
      <input type="button" name="search_btn" class="btn btn-success" value="검색" onclick="search_btn();">
    </div>

    <?php 
      $search_conn = mysqli_connect('localhost','root','qwe123','goods');
      $search_sql = "
            select * 
            from goods 
            where goods_nm like '%$search_word%' order by idx desc limit $start, $list_num 
                "; 
      $search_result=mysqli_query($search_conn, $search_sql);
    ?>

    <!-- 검색값을 찾는 sql문 -->
    <?php
      $search_count_conn = mysqli_connect('localhost','root','qwe123','goods');
      $search_count_sql = "
          select count(*)
          from goods
          where goods_nm like '%$search_word%'
              ";
      $search_result2  = mysqli_query($search_count_conn, $search_count_sql);
      $search_row  = mysqli_fetch_array($search_result2);
      $num2 = $search_row[0];

      $search_page = ceil($num2 / $list_num);
      // echo "<pre>";
      // var_dump($search_result);
      // echo "</pre>";
      // exit;
    ?> 
    <div style="text-align:right;padding-top:30px;">
      <input type="button" class="btn btn-primary" id="reg_btn" name="reg_btn" value="등록" onclick="open_popup();" >&nbsp;&nbsp;&nbsp;
      <input type="button" class="btn btn-danger" id="del_btn2" name="del_btn2" value="삭제" onclick="goods_Del();" >&nbsp;&nbsp;&nbsp;
      <select class="form-control" style="width:auto;display:inline-block;" id="sort" name="sort">
        <option value="idx" selected>==정렬==</option>
        <option value="goods_nm">상품이름순</option>
        <option value="rt">상품등록순</option>
      </select>
      <select class="form-control" style="width:auto;display:inline-block;" id="show" name="show">
        <option value="">==보기==</option>
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
    if(!isset($_GET["search"])){
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
    }else{
      while($data = mysqli_fetch_array($search_result)){
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
      } ?>
</tbody>
</table>
<!-- 페이징 -->
<?php if(!isset($_GET["search"])){?>
  <p class="pager">
      <?php
        if($page <= 1){
      ?>
        <a href="?page=1&show=<?php echo $show?>&sort=<?php echo $sort?>">이전</a>
      <?php } else{ ?>
      <a href="?page=<?php echo ($page-1); ?>&show=<?php echo $show?>&sort=<?php echo $sort?>">이전</a>
      <?php }?>

      <?php
        for($print_page=$s_pageNum;$print_page<=$e_pageNum;$print_page++){
      ?>
        <a href="?page=<?php echo $print_page;?>&show=<?php echo $show?>&sort=<?php echo $sort?>"><?php echo $print_page; ?></a>
      <?php } ?>
      <?php
        if($page >= $total_page){
      ?>
        <a href="?page=<?php echo $total_page; ?>&show=<?php echo $show?>&sort=<?php echo $sort?>">다음</a>
      <?php } else{ ?>
        <a href="?page=<?php echo ($page+1); ?>&show=<?php echo $show?>&sort=<?php echo $sort?>">다음</a>
      <?php }?>
  </p>
<?php }else{?>
  <p class="pager">
      <?php
        if($page <= 1){
      ?>
        <a href="?page=1&show=<?php echo $show?>&sort=<?php echo $sort?>&search=<?php echo $search_word?>">이전</a>
      <?php } else{ ?>
      <a href="?page=<?php echo ($page-1); ?>&show=<?php echo $show?>&sort=<?php echo $sort?>&search=<?php echo $search_word?>">이전</a>
      <?php }?>

      <?php
        for($print_page=$s_pageNum;$print_page<=$search_page;$print_page++){
      ?>
        <a href="?page=<?php echo $print_page;?>&show=<?php echo $show?>&sort=<?php echo $sort?>&search=<?php echo $search_word?>"><?php echo $print_page; ?></a>
      <?php } ?>
      <?php
        if($page >= $total_page){
      ?>
        <a href="?page=<?php echo $total_page; ?>&show=<?php echo $show?>&sort=<?php echo $sort?>&search=<?php echo $search_word?>">다음</a>
      <?php } else{ ?>
        <a href="?page=<?php echo ($page+1); ?>&show=<?php echo $show?>&sort=<?php echo $sort?>&search=<?php echo $search_word?>">다음</a>
      <?php }?>
</p>
<?php } ?>
 
<!-- 등록페이지 팝업창 -->
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

<!-- 검색기능 -->
<script>
  function search_btn(){
    var search = document.getElementById("search_word").value;
    var search_url = document.location.href;
    console.log(search_url);
    var url3 = search_url + "&search="+search;
    location.href = url3;

    $.ajax({
        type: 'get',
        url : search_url,
        data: {search:search},
        dataType:"json",
        success : function(data, status, xhr) {
            console.log(data);
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
  }

</script>

<!-- 체크박스 전체선택 -->
<script>
 $(document).ready(function() {
	$("#cbx_chkAll").click(function() {
		if($("#cbx_chkAll").is(":checked")) $("input[name='chk[]']").prop("checked", true);
		else $("input[name='chk[]']").prop("checked", false);
	});

	$("input[name='chk[]']").click(function() {
		var total = $("input[name='chk[]']").length;
		var checked = $("input[name='chk[]']:checked").length;

		if(total != checked) $("#cbx_chkAll").prop("checked", false);
		else $("#cbx_chkAll").prop("checked", true); 
	});
});
</script>

<!-- 선택삭제 일괄삭제 기능 -->
<script>
function goods_Del(){

var chk_arr = $("input[name='chk[]']");
var boo = false;

var chk_data = [];
for( var i=0; i<chk_arr.length; i++ ) {
    if( chk_arr[i].checked == true ) {
        chk_data.push(chk_arr[i].value);
        boo = true;
        
    }
}
if(boo){
  if(!confirm('선택한 상품을 삭제하시겠습니까?')){

  }else{
    location.reload();
  }
    $.ajax({
        type: 'post',
        url : "/goods_notice/delete2.php",
        data: {chk: chk_data},
        dataType:"json",
        success : function(data, status, xhr) {
            console.log(data);
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
  }else{
    alert("삭제할 항목을 적어도 하나는 체크해주세요");
  }
}
</script>

<!-- 상품 등록순 상품명 순으로 정렬 기능 -->
<script>
  $(document).ready(function(){
    $("select[name='sort']").change(function(){
        var sel2 = $(this).val();
        console.log(sel2);
        
        var url2 = window.location.href + "&sort="+sel2;

        location.href = url2;
    });
  });

</script>

<!-- 셀렉트 박스에있는 값만큼 행 보여주는 기능 -->
<script>
  $(document).ready(function(){
    $("select[name='show']").change(function(){
        var sel = $(this).val();
        console.log(sel);
        
        var url = window.location.href + "&show="+sel;

        location.href = url;

        console.log(url);
       
    });
  });

</script>
</body>
</html>