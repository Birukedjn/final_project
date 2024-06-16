<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/logo.png">
  <title>Contact</title>
  <link rel="stylesheet" href="CSS/Main.css">
  <link rel="stylesheet" href="CSS/Header.css">

  <link rel="stylesheet" href="CSS/Contact.css">

</head>

<body>

<?php
  session_start();
  if (isset($_SESSION['fullname'])) {
      $fullname = $_SESSION['fullname'];
  } else {
      $fullname = "login";
  }
  ?> 
  <header class="Header-nav">

    <div class="container">

      <div class="Logo-div">
        <a class="alogo" href="Index.php"><img class="logo" src="Images/logo.png" alt="VERS"></a>
      </div>

      <div class="hamburger-div">
        <img id="mobile-form" class="mobile-menu" src="Images/Humbergur-Menu.png" alt="Hamburger Logo">
      </div>

      <nav class="navigation-bar">
        <img id="mobile-exit" class="mobile-menu-close" src="Images/ExitSVG.svg" alt="Exit Logo">
        <ul class="Primary-nav">
          <li class="nav-choose"><a href="index.php">Home</a></li>
          <li class="nav-choose" id="dropdown">
            <a href="#">services</a>
            <div class="dropdown-content">
                <a href="Login/login.php" target="_blank">view record</a>
                <a href="description/birth.php">Birth</a>
                <a href="description/adoption.php">Adoption</a>
                <a href="description/marriage.php">Marriage</a>
                <a href="description/divorse.php">Divorce</a>
                <a href="description/death.php">Death</a>

            </div>
        </li>
          <li class="nav-choose"><a href="AboutUs.php">AboutUs</a></li>
          <li class="nav-choose"><a href="Contact.php">Contacts</a></li>
          <li class="nav-choose"><a class="login" href="Login/login.php" target="_blank"><button class="loginbutton">login</button></a></li>
        </ul>
      </nav>

    </div>

  </header>


  <section class="contact-section">
    <div class="h1">
      <h1>Contact</h1>
    </div>
    <div class="contact-div">
      <div class="left-section">
        <form action="Contact.php" method="post" name="myform">
          <label for="">Name </br>
            <input class="placeholder" type="text" name="name" placeholder="Full Name" required>
          </label> </br>
          <label for="">Email </br>
            <input class="placeholder" type="email" name="email" placeholder="Email Address" required>
          </label> </br>
          <label for="">Phone </br>
            <input class="placeholder" type="number" name="number" placeholder="Phone #" required>
          </label> </br>
          <label for="">Message </br>
            <textarea class="placeholder-Area" placeholder="Say hello to us" name="area" id="" cols="70"
              rows="8" required></textarea>
          </label> </br>
          <label for=""> </br>
            <input type="submit" class="sumbit" value="Send Message" onclick="return validate();">
          </label>
        </form>
      </div>
      <div class="right-section">
        <h3>Address</h3>
        <p class="address">Addis Ababa, Ethiopia</p>
        <h3>Phone</h3>
        <p><a href="#">+251 11 647 8888</a></p>
        <h3>Email Address</h3>
        <p><a href="#">FAO-ET@fao.org</a></p>
          <h3>Address</h3>
          <p class="address">Hawassa, Ethiopia</p>
          <h3>Phone</h3>
          <p><a href="#">+251 974247872</a></p>
          <h3>Email Address</h3>
          <p><a href="#">huressa2021@gmail.com</a></p>
        
      </div>
      <div class="right-section">
        <h3>Address</h3>
        <p class="address">Hossana, Ethiopia</p>
        <h3>Phone</h3>
        <p><a href="#">+251 912732842</a></p>
        <h3>Email Address</h3>
        <p><a href="#">tafessa@gmail.com</a></p>  
          <h3>Other contacts</h3>
          <p class="address">IOM, Addis Ababa</p>
          <h3>Phone</h3>
          <p><a href="#">+251115571802</a></p>
          <h3>Email Address</h3>
          <p><a href="#">iomaddis@iom.int</a></p>
        </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="Script/Contact.js"> </script>

</body>


</html>

<?php
// Database credentials
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $message = $_POST['area'];
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
