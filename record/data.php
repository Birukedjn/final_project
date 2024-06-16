<?php

$selectedTable = $_GET['table'];

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

$sql = "";
$tableHeaders = ""; // To store table headers dynamically

switch ($selectedTable) {
  case "birth":
    $sql = "SELECT * FROM birth";
    $tableHeaders = "<tr><th>ID</th><th>Child Name</th><th>Birth Date</th><th>Gender</th><th>Nationality</th><th>Father Name</th><th>Mother Name</th><th>Kebele</th><th>Woreda</th><th>Zone</th><th>Region</th><th>Registration Address</th><th>Healt_INS ID</th></tr>";
    break;
  case "adoption":
    $sql = "SELECT *  FROM adoption";
    $tableHeaders = "<tr><th>ID</th><th>Child Name</th><th>Birth Date</th><th>Gender</th><th>Nationality</th><th>Adopter Name</th><th>Court Name</th><th>Kebele</th><th>Woreda</th><th>Zone</th><th>Region</th><th>Registration Address</th><th>Court ID</th></tr>";
    break;
  case "marriage":
    $sql = "SELECT * FROM marriage";
    $tableHeaders = "<tr><th>ID</th><th>Groom Name</th><th>Bride Name</th><th>Marriage Date</th><th>Institution</th><th>Groom Witness</th><th>Bride Witness</th><th>Kebele</th><th>Woreda</th><th>Zone</th><th>Region</th><th>Registration Address</th><th>INS ID</th></tr>";
    break;
  case "divorce":
    $sql = "SELECT * FROM divorce";
    $tableHeaders = "<tr><th>ID</th><th>Spouse Male</th><th>Spouse Female</th><th>Divorce Date</th><th>Divorce Reason</th><th>Court Name</th><th>Court ID</th><th>Kebele</th><th>Woreda</th><th>Zone</th><th>Region</th><th>Registration Address</th><th>Nationality</th></tr>";
    break;
  case "death":
    $sql = "SELECT *  FROM death";
    $tableHeaders = "<tr><th>ID</th><th>Full Name</th><th>Death Date</th><th>Gender</th><th>Nationality</th><th>Death Reason</th><th>Approved INS</th><th>Kebele</th><th>Woreda</th><th>Zone</th><th>Region</th><th>Registration Address</th><th>INS ID</th></tr>";
    break;
  }

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $tableData = $tableHeaders;
  while($row = $result->fetch_assoc()) {
    $tableData .= "<tr>";
    $tableData .= "<td>" . $row["id"] . "</td>"; // Display ID
    // Add table data cells for other columns
    foreach ($row as $key => $value) {
      if ($key != "id") {
        $tableData .= "<td>" . $value . "</td>";
      }
    }
    
    // Add edit and delete buttons (replace with actual links or forms)
    $tableData .= "<td><a href='edit.php?table=" . $selectedTable . "&id=" . $row["id"] . "'>Edit</a></td>";
    $tableData .= "<td><a href='delete.php?table=" . $selectedTable . "&id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></td>";
    $tableData .= "</tr>";
  }
  echo $tableData;
} else {
  echo "No records found.";
}

$conn->close();
?>
