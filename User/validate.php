<?php
session_start();

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

// Get username and password from the form
$username = $_POST["username"];
$password = $_POST["password"];

// Escape special characters to prevent SQL injection attacks
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// SQL query to fetch user data from the admins table
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, handle successful login (e.g., start a session, redirect to a different page)
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;
    header("Location: dashboard.php"); // Replace with your success page
} else {
    echo "Invalid username or password";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>user Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="loginForm" action="validate.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in as user
					</span>
					<?php if(isset($error)): ?>
							<div class="alert alert-danger" role="alert">
							<?php echo $error; ?>
							</div>
					<?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="adminlogin" type="submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="../resetpass/resetpassword.php">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../login/vendor/animsition/js/animsition.min.js"></script>
	<script src="../login/vendor/bootstrap/js/popper.js"></script>
	<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../login/vendor/select2/select2.min.js"></script>
	<script src="../login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../login/vendor/countdowntime/countdowntime.js"></script>
	<script src="../login/js/main.js"></script>
</body>
</html>
