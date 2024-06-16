<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete data</title>
    <link rel="stylesheet" href="edelete.css">
</head>
<body>
    
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $selectedTable = $_GET['table'];
  $id = $_GET['id'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vers";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM $selectedTable WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
  alert('Record deleted successfully');
  window.location.href = 'record.php';
    
    </script>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
}


?>


