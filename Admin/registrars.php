<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {

            color: #fff;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #fff;
            padding: 20px;
            text-align: center;
        }
        th {
            background-color: #333;
        }
        tr:hover {
            background-color: #444;
        }
        .action-buttons {
            display: flex;
            justify-content: space-evenly;
            padding: 5px;

        }
        .action-buttons button {
            background-color: white;
            color: black;
            margin: 5px;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .action-buttons button:hover {
            background-color: black;
            color: white;

        }
        .action-buttons button:active {
            background-color: grey;
            color: black;
        }
    </style>
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

    $sql = "SELECT * FROM users where role= 'registrar'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div style="text-align: center; color: white; font-size: 20px;">';
        echo '  <h1 style="color: white;">Registrars list</h1>';  // Add this line for the title
        echo '  <table style="margin: 0 auto; border-collapse: collapse;">';
        echo '    <tr style="border: 1px solid white;">';
        echo '      <th style="border: 1px solid white; padding: 20px;">ID</th>';  
        echo '      <th style="border: 1px solid white; padding: 20px;">Name</th>';
        echo '      <th style="border: 1px solid white; padding: 20px;">Email</th>';
        echo '      <th style="border: 1px solid white; padding: 20px;">Phone Number</th>';
        echo '      <th style="border: 1px solid white; padding: 20px;">Gender</th>';
        echo '      <th style="border: 1px solid white; padding: 20px;">Created_at</th>';
        echo '      <th style="border: 1px solid white; padding: 20px;">Actions</th>';
        echo '    </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '    <tr style="border: 1px solid white;">';
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["id"] . '</td>';  
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["fullname"] . '</td>';
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["email"] . '</td>';
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["phonenumber"] . '</td>';
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["gender"] . '</td>';
            echo '      <td style="border: 1px solid white; padding: 20px;">' . $row["created_at"] . '</td>';
            echo '      <td style="border: 1px solid white; padding: 20px;">';
            echo '        <div class="action-buttons">';
            echo '          <button onclick="editUser(' . $row["id"] . ')">Edit</button>';
            echo '          <button onclick="deleteUser(' . $row["id"] . ')">Delete</button>';
            echo '        </div>';
            echo '      </td>';
            echo '    </tr>';
        }

        echo '  </table>';
        echo '</div>';
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

    <script>
        function editUser(id) {
            window.location.href = 'edit_user.php?id=' + id;
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this registrar?')) {
                window.location.href = 'delete_user.php?id=' + id;
            }
        }
    </script>

</body>
</html>
