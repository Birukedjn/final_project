<?php
session_start();

// Database connection details (replace with your actual details)
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
$form_username = $_POST["username"];
$form_password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
$stmt->bind_param("s", $form_username);

// Execute the statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $username, $hashed_password, $role);

// Fetch the result
if ($stmt->fetch()) {
    // Verify password
    if (password_verify($form_password, $hashed_password)) {
        // Password correct, set session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $form_username;
        $_SESSION["role"] = $role;

        // Redirect based on role
        if ($role === 'admin') {
            header("Location: ../admin/manage.php");
        } elseif ($role === 'registrar') {
            header("Location: ../registrar/Dashboard.php");
        } elseif ($role === 'user') {
            header("Location: ../user/dashboard.php");
        } else {
            echo "Invalid role";
        }
        exit; // Ensure script stops execution after redirect
    } else {
        $error = "Invalid username or password";
    }
} else {
    $error = "Invalid username or password";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="loginForm" action="validate.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Login
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
