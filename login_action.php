<?php

session_start();

$account_name = "";
$account_password = "";

$urlLogin = "./login.php";
$urlScheduleTable = "./schedule_table.php";

if(empty($_POST["account_name"])) {
    $_SESSION["error"] = "アカウント名が入力されていません";
    header("Location:".$urlLogin);
    exit();
} 

if(empty($_POST["account_password"])){
    $_SESSION["error"] = "パスワードが入力されていません";
    header("Location:".$urlLogin);
    exit();
}

//todo: validation with database

header("Location:".$urlScheduleTable);
exit();
