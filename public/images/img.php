<?php
 $conn = mysqli_connect('localhost','root','qwe123','dogimages');
 $sql = "
     select dogImages
     from dogImages
     where idx>=1
         ";
 $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <h1>이미지</h1>

    
    <img src="" alt="" id="img" name="img">
    <p><input type="file" name="file" accept="image/jpeg,image/gif,image/png" id="input_image"></p>
    <!-- <p><input type="submit" id="btn_files" value="등록"></p> -->
    <p><input type="button" value="등록" onclick="test();"></p>
    
    <img src="" alt="" id="img2">



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


    <script>
        function test(){
            const src = document.getElementById("img").src;
            // console.log(src);

            $.ajax({
                type: 'post',
                url : "img.php",
                data: src,
                success : function(data, status, xhr) {
                    console.log(src);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR,errorThrown,textStatus)
                }
            });
        };
    </script>




    <script>
    

    </script>

   
</body>
</html>