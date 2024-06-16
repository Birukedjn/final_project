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

    <title>Marriage Regisration Form </title> 
</head>
<body>
    <div class="container">
        <header> Marriage Registration</header>

        <form action="index.php" method="post" name="marriageForm">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label> Groom Full Name</label>
                            <input type="text" name="groom_name" placeholder="Enter Groom name" required>
                        </div>
                        <div class="input-field">
                            <label> Bride Full Name</label>
                            <input type="text" name="bride_name" placeholder="Enter Bride name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Marriage</label>
                            <input type="date" name="marriage_date" placeholder="Enter Marriage date" required>
                        </div>

                        
                        <div class="input-field">
                            <label>Institution</label>
                            <select name="institution" required>
                                <option disabled selected>Select institution </option>
                                <option>religious ins</option>
                                <option>court</option>
                                <option>traditional ins</option>
                              
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Groom's witness Name</label>
                            <input type="text" name="Groom_witness" placeholder="Enter Groom's witness name" required>
                        </div>
                        <div class="input-field">
                            <label>Bride's witness Name</label>
                            <input type="text" name="bride_witness" placeholder="Enter Bride's witness name" required>
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
                            <label> ID from INS</label>
                            <input type="text" name="idfromins" placeholder="Enter ID" >
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
    $groom_name = $_POST['groom_name'];
    $bride_name = $_POST['bride_name'];
    $marriage_date = $_POST['marriage_date'];
    $institution = $_POST['institution'];
    $Groom_witness = $_POST['Groom_witness'];
    $bride_witness = $_POST['bride_witness'];
    $kebele = $_POST['kebele'];
    $woreda = $_POST['woreda'];
    $zone = $_POST['zone'];
    $region = $_POST['region'];
    $Registration_address = $_POST['Registration_address'];
    $idfromins = $_POST['idfromins'];

    // SQL query
    $sql = "INSERT INTO marriage (groomfullname, bridefullname, dateofmarriage, institution, groomswitnessname, brideswitnessname, kebele, woreda, zone, region, registrationAddress, idfromins) 
            VALUES ('$groom_name','$bride_name' , '$marriage_date',  '$institution', '$Groom_witness', '$bride_witness', '$kebele', '$woreda', '$zone', '$region', '$Registration_address', '$idfromins')";

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