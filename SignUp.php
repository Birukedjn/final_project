<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> SignUp Form</title>
  <link rel="stylesheet" href="CSS/SignUp.css">
  <link rel="stylesheet" href="CSS/Main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div class="container">

    <div class="title">
      <p>SignUp</p>
    </div>
    <div class="content">
      <form action="signup.PHP" method="post" name="myform">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" id="name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" id="username" required>
          </div>
          <div class="input-box">
            <span class="details">role</span>
            <input type="text" placeholder="Enter Role" name="role" id="role" value= "user" readonly>
          </div>
          <div class="input-box">
            <span class="details">registerdID</span>
            <input type="text" placeholder="Enter RegisteredID" name="RegisteredID" id="RegisteredID" >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" id="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" name="number" id="number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" id="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" id="cpassword" required>
          </div>
          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1"  value="male" required>
          <input type="radio" name="gender" id="dot-2"  value="female"required>
          <input type="radio" name="gender" id="dot-3"  value="prefer not to say"required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender" >Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" onclick="return validate();">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
<script src="Script/signup.js"> </script>
<?php
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
  $full_name = htmlspecialchars(trim($_POST['name']));
  $user_name = htmlspecialchars(trim($_POST['username']));
  $email = htmlspecialchars(trim($_POST['email']));
  $phone_number = htmlspecialchars(trim($_POST['number']));
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $gender = htmlspecialchars(trim($_POST['gender']));
  $role = htmlspecialchars(trim($_POST['role']));
  $RegisteredID = htmlspecialchars(trim($_POST['RegisteredID']));

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, phonenumber, password, gender,role, RegisteredID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $full_name, $user_name, $email, $phone_number, $password, $gender, $role, $RegisteredID);

  if ($stmt->execute()) { echo '<span style="color: green; font-size: 20px; font-weight: bold;" >you are registerd successfully<span><br>
    <div style="padding-left: auto; padding-right: auto;"><a href="../vers/login/login.php"><button style="margin-left: 100px; background-color: black; width:100px;height:40px; border-radius:5px; font-size: 20px; color: white; padding: 10px;">login</button></a></div>';
} else {
      echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $conn->close();
}


?>
