<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="GET" && realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

if($_SESSION["is_admin_user"] !== 1) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

if($_REQUEST['command'] === "create") {
    
}

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

if($_REQUEST['password-change'] === "edit")  {

}

if($_REQUEST['command'] === "delete") {
    $pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
    $sql_select = $pdo -> prepare('select * from user where id = ?');
    $sql_select -> execute([$_REQUEST['member_id']]);
    $result = $sql_select->fetch();
    if($result !== false) {
        $sql_delete = $pdo -> prepare('delete from user where id = ?');
        $sql_delete -> execute([$_REQUEST['member_id']]);
        $_SESSION['information'] = 'id({$_REQUEST["member_id"]})のメンバーデータを消去しました';
    }
}



$url = "./user_table.php";
header("Location:".$url);
exit();