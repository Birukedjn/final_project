<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            color: #fff;
            text-align: center;
        }
        .message-container {
            margin: 0 auto;
            padding: 20px;
            width: 50%;
            background-color: #333;
            border-radius: 8px;
        }
        .message-container button {
            background-color: white;
            color: black;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            margin: 10px;
        }
        .message-container button:hover {
            background-color: black;
            color: white;
        }
        .message-container button:active {
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
    $id = $_POST["id"];

    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='message-container'>User deleted successfully. <br><a href='registrars.php'><button>Back to List</button></a></div>";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $stmt->close();
} else {
    $id = $_GET["id"];
    echo "<div class='message-container'>";
    echo "<form method='post' action='delete_user.php'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<p>Are you sure you want to delete this user?</p>";
    echo "<button type='submit'>Yes</button>";
    echo "<a href='registrars.php'><button type='button'>No</button></a>";
    echo "</form>";
    echo "</div>";
}

$conn->close();
?>

</body>
</html>
