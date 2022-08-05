<?php
//오늘 날짜
$thisyear = date('Y');
$thismonth = date('m');
$today = date('j');

//$year, $month 값이 없으면 현재 날짜
$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$pre_month = $month - 1;
$next_month = $month + 1;
$pre_year = $next_year = $year;

if ($month == 1) {
    $pre_month = 12;
    $pre_year = $year - 1;
} else if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
}
$preyear = $year - 1;
$nextyear = $year + 1;

$predate = date("Y-m-d", mktime(0, 0, 0, $month - 1, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));

//총일수 구하기
$max_day = date('t', mktime(0, 0, 0, $month, 1, $year));

//시작요일 구하기
$start_week = date("w", mktime(0, 0, 0, $month, 1, $year));

//총 몇 주인지 구하기
$total_week = ceil(($max_day + $start_week) / 7);

//마지막 요일 구하기
$last_week = date('w', mktime(0, 0, 0, $month, $max_day, $year));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <style>
    font.holy {font-family: tahoma;font-size: 20px;color: #FF6C21;}
    font.blue {font-family: tahoma;font-size: 20px;color: #0000FF;}
    font.black {font-family: tahoma;font-size: 20px;color: #000000;}
  </style>
</head>
<body>
<div class="container" style="margin-top:60px;">
<table class="table table-bordered table-responsive">
  
    <div style="text-align:center;font-size:large;">
        <a href=<?='main.php?year='.$pre_year.'&month='.$pre_month . '&day=1'; ?>><<</a>
        <a href=<?='main.php?year=' . $thisyear . '&month=' . $thismonth . '&day=1'; ?>>
        <?="&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
        <a href=<?='main.php?year='.$next_year.'&month='.$next_month.'&day=1'; ?>>>></a>
    </div>
  
  <tr>
    <th>일</td>
    <th>월</th>
    <th>화</th>
    <th>수</th>
    <th>목</th>
    <th>금</th>
    <th>토</th>
  </tr>

  <?php
    //매월 1일부터 시작이니까 1로 초기화
    $day=1;

    //총 week 수에 맞춰 세로칸 만들기
    for($i=1; $i <= $total_week; $i++){
    ?>
  <tr>
    <?php
    //총 가로칸 만들기
    for ($j = 0; $j < 7; $j++) {
        echo '<td style="height:80px;test-align:center;">';
        if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {

            if ($j == 0) {
                $style = "holy";
            } else if ($j == 6) {
                $style = "blue";
            } else {
                $style = "black";
            }

            if ($year == $thisyear && $month == $thismonth && $day == date("j")) {
                echo '<font class='.$style.'>';
                echo $day;
                echo '</font>';
            
            } else {
                echo '<font class='.$style.'>';
                echo $day;
                echo '</font>';
            }
            //날짜 증가
            $day++;
        }
        echo '</td>';
    }
 ?>
  </tr>
  <?php } ?>
</table>
</div>

</body>
</html>