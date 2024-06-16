<?php
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
} else {
$username = "login";
}

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login/login.php");
    exit;
}
?>

