<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="GET" && realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
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

$account_name = filter_input(INPUT_POST, "account_name");
$account_password = filter_input(INPUT_POST, "account_password");

//todo: deal with PDOException later
$pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
$sql_select = $pdo -> prepare('select * from user where account_name =?');
$sql_select -> execute([$account_name]);
$result = $sql_select->fetch();
if($result === false) {
    $_SESSION["error"] = "アカウント名またはパスワードが間違っています";
    header("Location:".$urlLogin);
    exit();
} else {
    $correct_password = $result["account_password"];
    $account_id = $result["id"];
}

if($correct_password !== $account_password) {
    $_SESSION["error"] = "アカウント名またはパスワードが間違っています";
    header("Location:".$urlLogin);
    exit();
}

//if(!password_verify($account_password, $hash)) {
//    die('アカウント名またはパスワードが間違っています');
//}


session_regenerate_id(true);
$_SESSION["account_id"] = $account_id;
$_SESSION["account_name"] = $account_name;
$_SESSION["is_schedule_member"] = $result["is_schedule_member"];
$_SESSION["is_admin_user"] = $result["is_admin_user"];

header("Location:".$urlScheduleTable);
exit();
