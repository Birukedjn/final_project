<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = htmlspecialchars(trim($_POST['newUsername']));
    $newPassword = password_hash(trim($_POST['newPassword']), PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssi", $newUsername, $newPassword, $_SESSION['id']);

    if ($stmt->execute()) {
        $_SESSION["username"] = $newUsername;
        echo '<div class="success">Profile updated successfully.</div>';
    } else {
        echo '<div class="error">Error: ' . htmlspecialchars($stmt->error) . '</div>';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
        }
        .form-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Profile</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="updateProfileForm">
            <div class="form-group">
                <label for="newUsername">New Username</label>
                <input type="text" id="newUsername" name="newUsername" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
