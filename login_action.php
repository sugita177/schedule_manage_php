<?php





session_start();

if($_SERVER["REQUEST_METHOD"]=="GET" && realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
    $_SESSION["error"] = "this url is forbidden";
    die(header("Location:"."./login.php"));
    
}

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
