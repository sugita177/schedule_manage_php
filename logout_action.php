<?php

session_start();
$_SESSION = array();
session_destroy();

session_start();
$_SESSION["information"] = "ログアウトしました";


$urlLogin = "./login.php";
header("Location:".$urlLogin);