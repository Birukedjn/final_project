<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view record</title>
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/main.php.css">
</head>
<body>


<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: ../login/login.php");
  exit;
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's records
$user = $_SESSION["username"];
$sql = "SELECT * FROM events WHERE username = '$user'";
$result = $conn->query($sql);

$records = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

$conn->close();
?>

    <header class="Header-nav">

        <div class="container">
    
          <div class="Logo-div">
            <a class="alogo" href="../Index.php"><img class="logo" src="../Images/logo.png" alt="VERS"></a>
          </div>
    
          <div class="hamburger-div">
            <img id="mobile-form" class="mobile-menu" src="Images/Humbergur-Menu.png" alt="Hamburger Logo">
          </div>
    
          <nav class="navigation-bar">
            <img id="mobile-exit" class="mobile-menu-close" src="Images/ExitSVG.svg" alt="Exit Logo">
            <ul class="Primary-nav">
              <li class="nav-choose"><a href="../index.php">Home</a></li>
              <li class="nav-choose" id="dropdown">
                <a href="#">services</a>
                <div class="dropdown-content">
                    <a href="../user/viewrecord.php">view record</a>
                    <a href="../description/birth.php">Birth</a>
                    <a href="../description/adoption.php">Adoption</a>
                    <a href="../description/marriage.php">Marriage</a>
                    <a href="../description/divorse.php">Divorce</a>
                    <a href="../description/death.php">Death</a>
    
                </div>
            </li>
              <li class="nav-choose"><a href="../AboutUs.php">About_Us</a></li>
              <li class="nav-choose"><a href="../Contact.php">Contacts</a></li>
              <li class="nav-choose"><h3 style="color: white" ><a href="profile.php" style ="text-decoration:none" ><?php echo htmlspecialchars($_SESSION['username']); ?></a></h3></li>
            </ul>
          </nav>
    
        </div>
    
      </header>
</body>
</html>

