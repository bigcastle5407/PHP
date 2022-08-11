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

</head>
<body style="margin-left:30px; margin-right:30px; margin-top:30px;">
<h1 style="text-align:center; padding-bottom:20px; border-bottom:1px gray solid;">상품수정 및 삭제</h1>

<form id="AjaxForm2" name="AjaxForm2">
  <div class="form-group row">
    
    <div class="col-sm-10">
     <input type="hidden" class="form-control" id="idx" name="idx" value="<?=$row['idx']?>"> 
    </div>
  </div>
  <div class="form-group row">
    <label for="img" class="col-sm-2 col-form-label"><h3>사진</h3></label>
    <!-- <div class="col-sm-10">
      <input type="file" name="file" class="form-control" accept="image/jpeg,image/gif,image/png" id="input_image">
    </div><br><br> -->
    <div style="text-align:center;" id="img_div">
      <img src="<?=$row['img']?>" alt="" id="img" name="img" style="width:500px;height:500px;">
    </div>
  </div>
  <div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label"><h3>카테고리</h3></label>
    <div class="col-sm-10">
      <input type='radio' id='category1' name='category' value='top' <?php if($row['category'] == 'top') echo 'checked'?>>
      <label class='form-check-label' for='category1'>상의</label>&nbsp;&nbsp;
      <input type='radio' id='category2' name='category' value='bottom' <?php if($row['category'] == 'bottom') echo 'checked'?>>
      <label class='form-check-label' for='category2'>하의</label>&nbsp;&nbsp;
      <input type='radio' id='category3' name='category' value='shoes' <?php if($row['category'] == 'shoes') echo 'checked'?>>
      <label class='form-check-label' for='category3'>신발</label>&nbsp;&nbsp;
      <input type='radio' id='category4' name='category' value='accesary'<?php if($row['category'] == 'accesary') echo 'checked'?>>
      <label class='form-check-label' for='category4'>악세사리</label>&nbsp;&nbsp;
    </div>
  </div>
  <div class="form-group row">
    <label for="goods_nm" class="col-sm-2 col-form-label"><h3>상품명</h3></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="goods_nm" name="goods_nm" value="<?=$row['goods_nm']?>"placeholder="상품명을 입력해주세요">
    </div>
  </div>
  <div class="form-group row">
    <label for="color" class="col-sm-2 col-form-label"><h3>색상</h3></label>
    <div class="container">
	<select class="form-control" name="color" id="color" multiple="multiple">
	  <option value="red" <?php if($row['size'] == 'red') echo 'selected'?>>red</option>
	  <option value="black" <?php if($row['size'] == 'black') echo 'selected'?>>black</option>
	  <option value="pink" <?php if($row['size'] == 'pink') echo 'selected'?>>green</option>
	  <option value="blue" <?php if($row['size'] == 'blue') echo 'selected'?>>blue</option>
	  <option value="green" <?php if($row['size'] == 'green') echo 'selected'?>>gray</option>
	  <option value="yellow" <?php if($row['size'] == 'yellow') echo 'selected'?>>yellow</option>
	  <option value="purple" <?php if($row['size'] == 'purple') echo 'selected'?>>purple</option>
	  <option value="white" <?php if($row['size'] == 'white') echo 'selected'?>>white</option>
	  <option value="sky blue" <?php if($row['size'] == 'sky blue') echo 'selected'?>>sky blue</option>
	  <option value="dark gray" <?php if($row['size'] == 'dark gray') echo 'selected'?>>dark gray</option>
	</select>
    </div>
    
  </div>
  <div class="form-group row">
    <label for="size" class="col-sm-2 col-form-label"><h3>사이즈</h3></label>
    <div class="container">
      <select class="form-control" name="size" id="size" >
          <option>사이즈를 선택하세요</option>
          <option value='XL' <?php if($row['size'] == 'XL') echo 'selected'?>>XL</option>
          <option value='L'<?php if($row['size'] == 'L') echo 'selected'?>>L</option>
          <option value='M'<?php if($row['size'] == 'M') echo 'selected'?>>M</option>
          <option value='S'<?php if($row['size'] == 'S') echo 'selected'?>>S</option>
          <option value='XS'<?php if($row['size'] == 'XS') echo 'selected'?>>XS</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label"><h3>가격</h3></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" value="<?=$row['price']?>" placeholder="가격을 입력해주세요" onkeyup="inputNumberFormat(this);">
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label"><h3>등록일자</h3></label>
    <div class="col-sm-10">
     <input type="text" class="form-control" value="<?=$row['rt']?>" disabled> 
    </div>
  </div>
  </form>
  <div class="col-sm-10" style="text-align:center;">
    <input type="button" value="수정" class="btn btn-success" id="mod_btn" onclick="AjaxCall2('POST');">
    <input type="button" value="삭제" class="btn btn-danger" id="del_btn" onclick="AjaxCall3('POST');">
    <button class="btn btn-warning" onclick="window.close()">취소</button>
  </div>

<!-- 가격 1000원 단위로 (,)찍는 스크립트 -->
<script>
 function comma(str) {
        str = String(str);
        return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
    }

    function uncomma(str) {
        str = String(str);
        return str.replace(/[^\d]+/g, '');
    } 
    
    function inputNumberFormat(obj) {
        obj.value = comma(uncomma(obj.value));
    }
    
    function inputOnlyNumberFormat(obj) {
        obj.value = onlynumber(uncomma(obj.value));
    }
    
    function onlynumber(str) {
	    str = String(str);
	    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g,'$1');
	}
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<!-- 수정 Ajax -->
<script>
function createData2(){
  var sendData = $('#AjaxForm2').serialize();
  var img = document.getElementById("img").src;
  sendData += "&img="+img;
  console.log(sendData);
  return sendData;
}

function AjaxCall2(method) {
    $.ajax({
        type: method,
        url : "json2.php?mode=" + method,
        data: createData2(),
        dataType:"json",
        success : function(data, status, xhr) {
            console.log(data);
            window.close();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

$(function(){
  $('#mod_btn').click(function(){
    if(!confirm('수정하시겠습니까?')){
      return false;
    }else{
      window.close();
      
    }
   
  })
});
</script>

<!-- 삭제 Ajax -->
<script>
function createData3(){
  var sendData = $('#AjaxForm2').serialize();

  console.log(sendData);

  return sendData;

}

function AjaxCall3(method) {
    $.ajax({
        type: method,
        url : "delete.php?mode=" + method,
        data: createData3(),
        dataType:"json",
        success : function(data, status, xhr) {
            console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

$(function(){
  $('#del_btn').click(function(){
    if(!confirm('정말 삭제하시겠습니까?')){
      return false;
    }else{
      window.close();
    }

  })
});
</script>

<script>
$.fn.category = function(val) {
    this.each(function() {    
      var $this = $(this);    
      if($this.val() == val)      
      $this.attr('checked', true); 
     
    });  
     
     return this;
    };


</script>

<!-- 이미지 base64로 변환 -->
<!-- <script>
      function readImage(input){
          if(input.files && input.files[0]){
              const reader = new FileReader();
            
              reader.onload = e => {
              const image = document.getElementById("img");
              image.src = e.target.result;
            }
              reader.readAsDataURL(input.files[0]);
            }
        }

        const inputImage = document.getElementById("input_image");
        inputImage.addEventListener("change", e => {
        readImage(e.target)
        });
    </script> -->

</body>
</html>