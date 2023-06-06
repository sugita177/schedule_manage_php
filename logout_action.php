<?php

if($_SERVER["REQUEST_METHOD"]=="GET" && realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

session_start();
$_SESSION = array();
session_destroy();

session_start();
$_SESSION["information"] = "ログアウトしました";


$urlLogin = "./login.php";
header("Location:".$urlLogin);