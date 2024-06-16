<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            color: #fff;
        }
        .form-container {
            margin: 0 auto;
            padding: 20px;
            width: 50%;
            background-color: #333;
            border-radius: 8px;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: none;
        }
        .form-container button {
            background-color: white;
            color: black;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .form-container button:hover {
            background-color: black;
            color: white;
        }
        .form-container button:active {
            background-color: grey;
            color: black;
        }
    </style>
</head>
<body>

<?php
include ('access.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $gender = $_POST["gender"];

        $sql = "UPDATE users SET fullname=?, email=?, phonenumber=?, gender=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $fullname, $email, $phonenumber, $gender, $id);

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Invalid request.";
    }
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();
    } else {
        echo "Invalid request.";
        exit();
    }
}

$conn->close();
?>

<?php if (isset($user)): ?>
<div class="form-container">
    <form method="post" action="edit_user.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label for="phonenumber">Phone Number</label>
        <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $user['phonenumber']; ?>" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>

        <button type="submit">Save Changes</button>
    </form>
</div>
<?php else: ?>
<div style="text-align: center; color: white;">
    <p>User not found.</p>
    <a href="registrars.php"><button>Back to List</button></a>
</div>
<?php endif; ?>

</body>
</html>
