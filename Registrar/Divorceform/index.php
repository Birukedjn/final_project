<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Divorce Regisration Form </title> 
</head>
<body>
    <div class="container">
        <header> Divorce Registration</header>

        <form action="index.php" method="post" name="divorceForm">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label> spouseMale Full Name</label>
                            <input type="text" name="spousemale" placeholder="Enter spouseMale name" required>
                        </div>
                        <div class="input-field">
                            <label> SpouseFemale Full Name</label>
                            <input type="text" name="spousefemale" placeholder="Enter SpouseFemale name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Divorce</label>
                            <input type="date" name="divorce_date" placeholder="Enter Marriage date" required>
                        </div>

                        
                        <div class="input-field">
                            <label>Reason of Divorce</label>
                            <input type="text" name="reason" placeholder="Enter Reason of Divorce" required>
                            
                        </div>
                        <div class="input-field">
                            <label>Court Name</label>
                            <input type="text" name="Court_Name" placeholder="Enter Court name" required>
                        </div>
                        <div class="input-field">
                            <label>ID from Court</label>
                            <input type="text" name="IDfromCourt" placeholder="Enter Divorce id" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title"> Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>kebele</label>
                            <input type="text" name="kebele" placeholder="Enter kebele" required>
                        </div>

                        <div class="input-field">
                            <label>woreda</label>
                            <input type="text" name="woreda" placeholder="Enter woreda" required>
                        </div>

                        <div class="input-field">
                            <label>zone</label>
                            <input type="text" name="zone" placeholder="Enter zone" required>
                        </div>


                        <div class="input-field">
                            <label>region</label>
                            <input type="text" name="region" placeholder="Enter region" required>
                        </div>

                        <div class="input-field">
                            <label>Registration address </label>
                            <input type="text" name="Registration_address" placeholder="Enter registration address" required>
                        </div>

                        <div class="input-field">
                            <label> Nationality</label>
                            <input type="text" name="nationality" placeholder="Nationality" >
                        </div>
                    </div>


                    <button class="sumbit">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>




<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
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

    // Set parameters and execute
    $spousemale = $_POST['spousemale'];
    $spousefemale = $_POST['spousefemale'];
    $divorce_date = $_POST['divorce_date'];
    $reason = $_POST['reason'];
    $Court_Name = $_POST['Court_Name'];
    $IDfromCourt = $_POST['IDfromCourt'];
    $kebele = $_POST['kebele'];
    $woreda = $_POST['woreda'];
    $zone = $_POST['zone'];
    $region = $_POST['region'];
    $Registration_address = $_POST['Registration_address'];
    $nationality = $_POST['nationality'];

    // SQL query
    $sql = "INSERT INTO divorce (spousemalefullname, spousefemalefullname, dateofdivorce, reasonofdivorce, courtname, divorceidfromcourt, kebele, woreda, zone, region, registrationAddress, nationality) 
            VALUES ('$spousemale','$spousefemale' , '$divorce_date',  '$reason', '$Court_Name', '$IDfromCourt', '$kebele', '$woreda', '$zone', '$region', '$Registration_address', '$nationality')";

    // Execute the SQL statement 
    if ($conn->query($sql) === TRUE) {
        echo '<span style="color: green; font-size: 20px; font-weight: bold;" >New record created successfully<span><br>
                <div style="padding-left: auto; padding-right: auto;"><a href="../dashbord.php"><button style="margin-left: 100px; background-color: blue; color: white; padding: 5px;">Go to home</button></a></div>';
    
    } else {
        echo "Error: " . $sql . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>