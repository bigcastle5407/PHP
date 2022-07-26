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

</head>
<body style="margin-left:30px; margin-right:30px; margin-top:30px;">
<h1 style="text-align:center; padding-bottom:20px; border-bottom:1px gray solid;">상품등록</h1>

<form id="AjaxForm" name="AjaxForm" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label"><h3>카테고리</h3></label>
    <div class="col-sm-10">
      <label><input type="radio" id="category1" name="category" value="top">상의</label>&nbsp;&nbsp;
      <label><input type="radio" id="category2" name="category" value="bottom">하의</label>&nbsp;&nbsp;
      <label><input type="radio" id="category3" name="category" value="shoes">신발</label>&nbsp;&nbsp;
      <label><input type="radio" id="category4" name="category" value="accesary">악세사리</label>&nbsp;&nbsp;
    </div>
  </div>
  <div class="form-group row">
    <label for="goods_nm" class="col-sm-2 col-form-label"><h3>상품명</h3></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="goods_nm" name="goods_nm" placeholder="상품명을 입력해주세요">
    </div>
  </div>
  <div class="form-group row">
    <label for="color" class="col-sm-2 col-form-label"><h3>색상</h3></label>
    <div class="container">
	<select class="form-control" name="color" id="color" multiple="multiple">
	  <option value="red">red</option>
	  <option value="black">black</option>
	  <option value="green">green</option>
	  <option value="blue">blue</option>
	  <option value="green">gray</option>
	  <option value="yellow">yellow</option>
	  <option value="purple">purple</option>
	  <option value="white">white</option>
	  <option value="sky blue">sky blue</option>
	  <option value="dark gray">dark gray</option>
	</select>
    </div>
    
  </div>
  <div class="form-group row">
    <label for="size" class="col-sm-2 col-form-label"><h3>사이즈</h3></label>
    <div class="container">
      <select class="form-control" name="size" id="size">
        <option>사이즈를 선택하세요</option>
        <option value="XL">XL</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="S">S</option>
        <option value="XS">XS</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label"><h3>가격</h3></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" placeholder="가격을 입력해주세요" onkeyup="inputNumberFormat(this);">
    </div>
  </div>
</form>
<div class="form-group row">
  <label for="img" class="col-sm-2 col-form-label"><h3>사진</h3></label>
  <div class="col-sm-10">
    <input type="file" name="file" class="form-control" accept="image/jpeg,image/gif,image/png" id="input_image">
  </div><br><br>
  <div style="text-align:center;" id="img_div">
    <img src="" alt="" id="img" name="img" style="width:500px;height:500px;">
  </div>
</div>
  <div class="col-sm-10" style="text-align:center;">
    <input type="button" value="등록" class="btn btn-success" id="reg_btn" onclick="AjaxCall('POST');">
    <button class="btn btn-warning" onclick="window.close()">취소</button>
  </div><br><br><br>


<!-- 이미지 base64로 변환 -->
  <script>
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
    </script>

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

<script>

 function createData(){
  
  var category = $('input[name=category]:checked').val();
  var goods_nm = document.getElementById('goods_nm').value;
  var color = document.getElementById('color').value;
  var size = document.getElementById('size').value;
  var price = document.getElementById('price').value;
  var img = document.getElementById("img").src;

  return {
    category : category,
    goods_nm : goods_nm,
    color : color,
    size : size,
    price : price,
    img : img
  }


 }

 
function AjaxCall(method) {
  $.ajax({
    type: method,
    url : "json.php?mode=" + method,
    data: createData(),
    dataType: 'json',
    success : function(data, status, xhr) {
            console.log(createData());
            window.close();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
          }
        });
}

$(function(){
  $('#reg_btn').click(function(){
    if(!confirm('등록하시겠습니까?')){
      return false;
    }else{
      window.close();
      opener.location.reload();
    }
   
  })
});
</script>

<!-- 사진 선택시 이미지 보이는 기능 -->
<script>
  $(document).ready(function(){
    $('#img_div').hide();
    $("input[name='file']").change(function(){
        $('#img_div').show();
    });
  });

</script>

</body>
</html>