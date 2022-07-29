<?php
$thisyear = date('Y');
$thismonth = date('N');
$today = date('j');

$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$pre_month = $month-1;
$next_month = $month+1;
$pre_year = $next_year = $year;

if($month == 1){
    $pre_month = 12;
    $pre_year = $year -1;
}else if($month == 12){
    $next_month = 1;
    $next_year = $year +1;
}

$preyear = $year -1;
$nextyear = $year +1;

$predate = date("Y-m-d", mktime(0,0,0,$month -1,1,$year));
$nextdate = date("Y-m-d", mktime(0,0,0,$month +1,1,$year));

$max_day = date("t",mktime(0,0,0,$month,1,$year));

$start_week = date("w", mktime(0,0,0,$month,1,$year));

$total_week = ceil(($max_day + $start_week)/7);

$last_week = date("w", mktime(0,0,0,$month,$max_day,$year));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    <style>
    font.holy {font-family:tahoma; font-size:20px; color:#FF6C21;}
    font.blue {font-family:tahoma; font-size:20px; color:#0000FF;}
    font.black {font-family:tahoma; font-size:20px; color:#000000;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <table class="table table-bordered table-responsive">
            <tr style="text-align:center;">
                <td>
                    <a href=<?='main.php?year='.$preyear.'&month='.$month . '&day=1'; ?>><<</a>
                </td>
                <td>
                    <a href=<?='main.php?year='.$pre_year.'&month='.$pre_month . '&day=1'; ?>><</a>
                </td>
                <td height="50" backgroundcolor="#FFFFFF" colspan="3">
                    <a href=<?='main.php?year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
                    <?="&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
                </td>
                <td>
                    <a href=<?='main.php?year='.$next_year.'&month='.$next_month.'&day=1'; ?>>></a>
                </td>
                <td>
                    <a href=<?= 'main.php?year='.$nextyear.'&month='.$month.'&day=1'; ?>>>></a>
                </td>
            </tr>
            <tr class="info">
                <th hight="30">일</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
            </tr>
    <?php
        $day = 1;

        for($i=1;$i<=$total_week;$i++){?>
            <tr>
        <?php
            for($j=0;$j<7;$j++){
                echo "<td height='50' valign='top'>";
                if(!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
                
                    if($j == 0){
                        $style = "holy";
                    }else if($j == 6){
                        $style = "blue";
                    }else{
                        $style = "black";
                    }
                }
            }

           echo "</td>";
           
           ?>

        </tr>
        <?php }?>
        </table>
    </div>    
</body>
</html>