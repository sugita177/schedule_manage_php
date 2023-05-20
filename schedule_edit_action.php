<?php
if($_REQUEST['command'] === "edit") {
    
}

$url = "./schedule_table.php?year={$_REQUEST['year']}&month={$_REQUEST['month']}";
header("Location:".$url);
exit();