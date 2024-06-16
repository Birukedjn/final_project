<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<title>Update Account</title>
<link rel="stylesheet" href="../CSS/SignUp.css">
<link rel="stylesheet" href="../CSS/Main.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include("access.php");


  // Fetch current user details
$servername = "localhost";
$dbusername = "root";
$password = ""; 
$dbname = "vers";
$conn = new mysqli($servername, $dbusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("SELECT fullname, username, email, phonenumber, gender FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($fullname, $user_name, $email, $phone_number, $gender);
$stmt->fetch();
$stmt->close();
?>
<div class="container">
<div class="title">
    <p>Update Account</p>
    </div>
    <div class="content">
    <form action="updateAccount.php" method="post" name="myform">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" id="name" value="<?php echo $fullname; ?>" required>
        </div>
        <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" id="username" value="<?php echo $user_name; ?>" required readonly>
        </div>
        <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" id="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" name="number" id="number" value="<?php echo $phone_number; ?>" required>
        </div>
        <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter new password" name="password" id="password">
        </div>
        <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm new password" name="cpassword" id="cpassword">
        </div>
        </div>
        <div class="gender-details">
        <input type="radio" name="gender" id="dot-1" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?> required>
        <input type="radio" name="gender" id="dot-2" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?> required>
        <input type="radio" name="gender" id="dot-3" value="prefer not to say" <?php echo ($gender == 'prefer not to say') ? 'checked' : ''; ?> required>
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
        <input type="submit" value="Update" onclick="return validate();">
        </div>
        </form>
    </div>
</div>
<script src="Script/signup.js"> </script>
</body>
</html>



<?php

$servername = "localhost";
$dbusername = "root";
$password = ""; 
$dbname = "vers";

$conn = new mysqli($servername, $dbusername, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$full_name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone_number = htmlspecialchars(trim($_POST['number']));
$gender = htmlspecialchars(trim($_POST['gender']));

$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if ($password && $password === $cpassword) {
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("UPDATE users SET fullname = ?, email = ?, phonenumber = ?, gender = ?, password = ? WHERE username = ?");
    $stmt->bind_param("ssssss", $full_name, $email, $phone_number, $gender, $password_hash, $username);
} else {
    $stmt = $conn->prepare("UPDATE users SET fullname = ?, email = ?, phonenumber = ?, gender = ? WHERE username = ?");
    $stmt->bind_param("sssss", $full_name, $email, $phone_number, $gender, $username);
}

if ($stmt->execute()) {
echo '<span style="color: green; font-size: 20px; font-weight: bold;">Account updated successfully<span><br>

<div style="padding-left: auto; padding-right: auto;"><a href="manage.php"><button style="margin-left: 100px; background-color: white; color: black; padding: 5px;">Go To Dashboard</button></a></div>';
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
}
?>
