

<?php
session_start();

// Check if the user is logged in and has the role 'registrar'
if (isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'registrar') {
    $username = $_SESSION['username'];
} else {
    // Redirect to login page if the user is not logged in or not a registrar
    header('Location: ../login/login.php');
    exit();
}
?>
