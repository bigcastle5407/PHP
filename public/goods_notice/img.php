<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>이미지</h1>

    <input type="file" name="filename" accept="image/jpeg,image/gif,image/png" id="input-image">
    <img src="" alt="" id = "img">
    


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

        const inputImage = document.getElementById("input-image");
        inputImage.addEventListener("change", e => {
        readImage(e.target)
        });
        

        
    </script>
</body>
</html>