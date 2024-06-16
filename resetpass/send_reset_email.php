<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Additional CSS can be added here */
  </style>
</head>
<body>

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate email format using JavaScript
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error">Invalid email format</div>';
    } else {
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sss", $token, $expiry, $email);

        if ($stmt->execute()) {
            $resetLink = "https://yourwebsite.com/reset_password.php?token=" . $token;
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $resetLink";

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'your-email@gmail.com'; // Use your Gmail address
                $mail->Password = 'your-app-password'; // Use an app-specific password if using 2FA
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('your-email@gmail.com', 'Your Name');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();
                echo '<div class="success">A password reset link has been sent to your email.</div>';
            } catch (Exception $e) {
                echo '<div class="error">Failed to send email. Mailer Error: ' . $mail->ErrorInfo . '</div>';
            }
        } else {
            echo '<div class="error">Error: ' . htmlspecialchars($stmt->error) . '</div>';
        }

        $stmt->close();
    }
}

$conn->close();
?>

<div class="container">
  <div class="title">
    <p>Password Reset</p>
  </div>
  <div class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="myform">
      <div class="input-box">
        <span class="details">Email</span>
        <input type="email" placeholder="Enter your email" name="email" id="email" required>
      </div>
      <div class="button">
        <input type="submit" value="Reset Password">
      </div>
    </form>
  </div>
</div>

<script>
  // JavaScript email validation
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  document.querySelector('form').addEventListener('submit', function(event) {
    const emailInput = document.getElementById('email');
    if (!validateEmail(emailInput.value)) {
      event.preventDefault();
      alert('Please enter a valid email address.');
      emailInput.focus();
    }
  });
</script>

</body>
</html>
