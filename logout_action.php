<?php

//if($_SERVER["REQUEST_METHOD"]=="GET" && realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
//    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
//}

session_start();
if(!empty($_SESSION["account_id"])) {
    $information_message = "ログアウトしました";
}


$_SESSION = array();
session_destroy();

session_start();
if(!empty($information_message)){
    $_SESSION["information"] = $information_message;
}

$urlLogin = "./login.php";
header("Location:".$urlLogin);