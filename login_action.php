<?php

session_start();

$_SESSION["error"] = "error_test";

$account_name = "";
$account_password = "";

$urlLogin = "./login.php";

if(empty($_POST["account_name"])) {
    $_SESSION["error"] = "アカウント名が入力されていません";
    header("Location:".$urlLogin);
    exit();
} 

if(empty($_POST["account_passqord"])){
    $_SESSION["error"] = "パスワードが入力されていません";
    header("Location:".$urlLogin);
    exit();
}





