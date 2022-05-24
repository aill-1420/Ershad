<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';
$_SESSION = [];
redirect('../index.php');
die();
?>