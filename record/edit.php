<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data</title>
    <link rel="stylesheet" href="edelete.css">
</head>
<body>
    <?php
    include '../access.php';
    ?>
    
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

    $sql = "SELECT * FROM $selectedTable WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display form populated with the current data
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='table' value='$selectedTable'>";
        echo "<input type='hidden' name='id' value='$id'>";
        foreach ($row as $key => $value) {
            echo "<label for='$key'>$key:</label>";
            echo "<input type='text' name='$key' value='$value'><br>";
        }
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTable = $_POST['table'];
    $id = $_POST['id'];
    $fields = [];
    foreach ($_POST as $key => $value) {
        if ($key != "table" && $key != "id") {
            $fields[] = "$key='$value'";
        }
    }
    $updateFields = implode(", ", $fields);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vers";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE $selectedTable SET $updateFields WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Record updated successfully');
                window.location.href = 'record.php';
              </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>
