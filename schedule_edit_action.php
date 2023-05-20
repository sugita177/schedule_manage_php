<?php
if($_REQUEST['command'] === "edit") {
    $pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
    $sql_select = $pdo -> prepare('select content from schedule where member_id = ? and schedule_year =? and schedule_month = ? and schedule_day = ?');
    $sql_select -> execute([$_REQUEST['member_id'], $_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']]);
    $result = $sql_select->fetch();
    if($result !== false) {
        $sql_update = $pdo -> prepare('update schedule set content = ? where member_id = ? and schedule_year =? and schedule_month = ? and schedule_day = ?');
        $sql_update -> execute([$_REQUEST['content'], $_REQUEST['member_id'], $_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']]);
        
    } else {
        $sql_update = $pdo -> prepare('insert into schedule values(?, ?, ?, ?, ?)');
        $sql_update -> execute([$_REQUEST['member_id'], $_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day'], $_REQUEST['content']]);
    }
    
}

$url = "./schedule_table.php?year={$_REQUEST['year']}&month={$_REQUEST['month']}";
header("Location:".$url);
exit();