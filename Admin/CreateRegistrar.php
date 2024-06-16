<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> CREATE REGISTRAR</title>
  <link rel="stylesheet" href="../CSS/SignUp.css">
  <link rel="stylesheet" href="../CSS/Main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php
include ('access.php');
?>
  <div class="container">

    <div class="title">
      <p>CREATE REGISTRAR </p>
    </div>

    <div class="content">

      <form action="createRegistrar.php" method="post" name="myform">
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
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" id="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" name="number" id="number"  required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" id="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" id="cpassword" required>
          </div>
          <div class="input-box">
            <span class="details">role</span>
            <input type="text" placeholder="Enter Role" name="role" id="role" value= "registrar" readonly>
          </div>
        </div>


        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male" required>
          <input type="radio" name="gender" id="dot-2" value="female" required>
          <input type="radio" name="gender" id="dot-3" value="prefer not to say" required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
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

  <script src="../Script/signup.js"> </script>



</body>

</html>



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

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, phonenumber, password, gender,role) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $full_name, $user_name, $email, $phone_number, $password, $gender, $role);

  if ($stmt->execute()) { echo '<span style="color: green; font-size: 20px; font-weight: bold;" >Registrar registerd successfully<span><br>
    <div style="padding-left: auto; padding-right: auto;"><a href="../admin/manage.php"><button style="margin-left: 100px; background-color: blue; color: white; padding: 5px;">Dashboard</button></a></div>';
} else {
      echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}


?>
