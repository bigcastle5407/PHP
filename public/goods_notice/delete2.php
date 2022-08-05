<?
require_once('./db/db.php');

$chk = $_POST['chk'];
$idx = $_POST['idx'];
$cnt = count($chk);
$subqry='';
for($i=0;$i<$cnt;$i++){
    if($subqry) $subqry.= ',';
    $subqry.=$chk[$i];
}

if($subqry){
    mysqli_query('delete from table where col in ('.$subqry.')');
}


?>