<?php
include("Access.php");

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

// Fetch user's records using RegistrationID
$registrationID = $_SESSION["registrationID"];
$sql = "
    SELECT id, 'birth' AS event, name, date FROM birth WHERE RegistrationID = '$registrationID'
    UNION
    SELECT id, 'adoption' AS event, name, date FROM adoption WHERE RegistrationID = '$registrationID'
    UNION
    SELECT id, 'marriage' AS event, name, date FROM marriage WHERE RegistrationID = '$registrationID'
    UNION
    SELECT id, 'divorce' AS event, name, date FROM divorce WHERE RegistrationID = '$registrationID'
    UNION
    SELECT id, 'death' AS event, name, date FROM death WHERE RegistrationID = '$registrationID'
";
$result = $conn->query($sql);

$records = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
} else {
    $records = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
        }
        .table {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>

        <h2>Your Records</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($records): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record["id"]); ?></td>
                            <td><?php echo htmlspecialchars($record["event"]); ?></td>
                            <td><?php echo htmlspecialchars($record["name"]); ?></td>
                            <td><?php echo htmlspecialchars($record["date"]); ?></td>
                            <td><button class="btn btn-primary" onclick="editRecord(<?php echo htmlspecialchars($record['id']); ?>)">Edit</button></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function editRecord(recordId) {
            // Logic to edit the record
            alert('Edit record ' + recordId);
        }
    </script>
</body>
</html>
