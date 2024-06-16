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

    <title>Birth Regisration Form </title> 
</head>
<body>
    <div class="container">
        <header> Birth Registration</header>

        <form action="index.php" method="post" name ="birthform">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label >Full Name</label>
                            <input type="text" name="child_name"  placeholder="Enter Child name"  required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="birth_date" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required >
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter nationality" required>
                        </div>
                        <div class="input-field">
                            <label>father's Name</label>
                            <input type="text" name="father_name" placeholder="Enter father's name" required>
                        </div>
                        <div class="input-field">
                            <label>mother's Name</label>
                            <input type="text" name="mother_name" placeholder="Enter mother's name" required>
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
                            <label> ID from health INS</label>
                            <input type="text" name="health_ins_id" placeholder="Enter ID" >
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
    $child_name = $_POST['child_name'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $kebele = $_POST['kebele'];
    $woreda = $_POST['woreda'];
    $zone = $_POST['zone'];
    $region = $_POST['region'];
    $Registration_address = $_POST['Registration_address'];
    $health_ins_id = $_POST['health_ins_id'];

    // SQL query
    $sql = "INSERT INTO Birth (fullname, DateOfBirth, Gender, nationality, FatherName, MotherName, kebele, Woreda, zone, region, RegistrationAddress, IdFromHealthINS) 
            VALUES ('$child_name', '$birth_date', '$gender', '$nationality', '$father_name', '$mother_name', '$kebele', '$woreda', '$zone', '$region', '$Registration_address', '$health_ins_id')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
       echo '<span style="color: green; font-size: 20px; font-weight: bold;" >New record created successfully<span><br>
                <div style="padding-left: auto; padding-right: auto;"><a href="../dashboard.php"><button style="margin-left: 100px; background-color: blue; color: white; padding: 5px;">Go to home</button></a></div>';
    } else {
        echo "Error: " . $sql . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

