<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php
include ('access.php');
?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vers";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users where role= 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div style="text-align: center; color: white; font-size: 20px;">';
echo '  <h1 style="color: white;">users list</h1>';  // Add this line for the title
echo '  <table style="margin: 0 auto; border-collapse: collapse;">';
echo '    <tr style="border: 1px solid white;">';
echo '      <th style="border: 1px solid white; padding: 20px;">ID</th>';  // Adjust padding here
echo '      <th style="border: 1px solid white; padding: 20px;">Name</th>';
echo '      <th style="border: 1px solid white; padding: 20px;">Email</th>';
echo '      <th style="border: 1px solid white; padding: 20px;">Phone Number</th>';
echo '      <th style="border: 1px solid white; padding: 20px;">Gender</th>';
echo '      <th style="border: 1px solid white; padding: 20px;">Created_at</th>';
echo '    </tr>';

while ($row = $result->fetch_assoc()) {
    echo '    <tr style="border: 1px solid white;">';
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["id"] . '</td>';  // Adjust padding here
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["fullname"] . '</td>';
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["email"] . '</td>';
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["phonenumber"] . '</td>';
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["gender"] . '</td>';
    echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["created_at"] . '</td>';
    echo '    </tr>';
}

echo '  </table>';
echo '</div>';

    } else {
        echo "0 results";
    }
    $conn->close();
    ?>



</body>
</html>
