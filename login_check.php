<?php

session_start();

$_SESSION["error"] = "error_test";

$account_name = "";
$account_password = "";





$urlLogin = "./login.php";
header("Location:".$urlLogin);