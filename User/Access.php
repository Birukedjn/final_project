<?php
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
} else {
$username = "login";
}

if(!isset($_SESSION['username'])){
    header('location: ../login/login.php');
    exit();
}
?>