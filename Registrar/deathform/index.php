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

    <title>Death Regisration Form </title> 
</head>
<body>
    <div class="container">
        <header> Death Registration</header>

        <form action="index.php" method="post" name ="deathform">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="dead_name" placeholder="Enter Dead full name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Death</label>
                            <input type="date"  name="death_date" placeholder="Enter date of Death" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select  name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>                       
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text"  name="nationality" placeholder="Enter nationality" required>
                        </div>
                        <div class="input-field">
                            <label>Death reason</label>
                            <input type="text"  name="reason" placeholder="Enter reason of Death" required>
                        </div>
                        <div class="input-field">
                            <label>Approved health ins</label>
                            <input type="text"  name="approvedhealthins" placeholder="Enter Approved health ins" required>
                        </div>


                       
                    </div>
                </div>

                <div class="details ID">
                    <span class="title"> Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>kebele</label>
                            <input type="text"  name="kebele" placeholder="Enter kebele" required>
                        </div>

                        <div class="input-field">
                            <label>woreda</label>
                            <input type="text"  name="woreda" placeholder="Enter woreda" required>
                        </div>

                        <div class="input-field">
                            <label>zone</label>
                            <input type="text"  name="zone" placeholder="Enter zone" required>
                        </div>

                       

                        <div class="input-field">
                            <label>region</label>
                            <input type="text"  name="region" placeholder="Enter region" required>
                        </div>

                        <div class="input-field">
                            <label>Registration address </label>
                            <input type="text"  name="Registration_address" placeholder="Enter registration address" required>
                        </div>

                        <div class="input-field">
                            <label> ID from health INS</label>
                            <input type="text"  name="IDfromhealthINS" placeholder="Enter state" >
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
    $dead_name = $_POST['dead_name'];
    $death_date = $_POST['death_date'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $reason = $_POST['reason'];
    $approvedhealthins = $_POST['approvedhealthins'];
    $kebele = $_POST['kebele'];
    $woreda = $_POST['woreda'];
    $zone = $_POST['zone'];
    $region = $_POST['region'];
    $Registration_address = $_POST['Registration_address'];
    $IDfromhealthINS = $_POST['IDfromhealthINS'];

    // SQL query
    $sql = "INSERT INTO death (fullname, dateOfDeath, Gender, nationality, deathReason, approvedHealthINS, kebele, Woreda, zone, region, RegistrationAddress, idFromHealthINS) 
            VALUES ('$dead_name', '$death_date', '$gender', '$nationality', '$reason', '$approvedhealthins', '$kebele', '$woreda', '$zone', '$region', '$Registration_address', '$IDfromhealthINS')";

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

