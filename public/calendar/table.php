<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td{border:1px solid black; text-align:center};
    </style>
</head>
<body>
    <script>
        var num = 1;
        document.write("<table>");
        for(i=1;i<=7;i++){
            document.write("<tr>");
            for(j=1;j<=5;j++){
                if(num>27){
                    document.write("<td>"+" "+"</td>");
                }else{
                    document.write("<td>"+num+"</td>");
                    num++;
                }
            }
            document.write("</td>");

        }
        
        
        
        document.write("</table>")

    </script>
</body>
</html>