<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../CSS/Main.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Contact.css">
    <style>
        .comments-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            
        }

        .comments-table,
        .comments-table th,
        .comments-table td {
            border: 1px solid #ccc;
        }

        .comments-table th,
        .comments-table td {
            padding: 10px;
            text-align: left;
        }

        .comments-table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['fullname'])) {
        $fullname = $_SESSION['fullname'];
    } else {
        $fullname = "login";
    }
    ?>
    <header class="Header-nav">
        <div class="container">
            <div class="Logo-div">
                <a class="alogo" href="Index.php"><img class="logo" src="../Images/logo.png" alt="VERS"></a>
            </div>
            <div class="hamburger-div">
                <img id="mobile-form" class="mobile-menu" src="../Images/Humbergur-Menu.png" alt="Hamburger Logo">
            </div>
            <nav class="navigation-bar">
                <img id="mobile-exit" class="mobile-menu-close" src="../Images/ExitSVG.svg" alt="Exit Logo">
                <ul class="Primary-nav">
                    <li class="nav-choose"><a href="index.php">Home</a></li>
                    <li class="nav-choose" id="dropdown">
                        <a href="#">services</a>
                        <div class="dropdown-content">
                            <a href="Login/login.php" target="_blank">view record</a>
                            <a href="description/birth.php">Birth</a>
                            <a href="description/adoption.php">Adoption</a>
                            <a href="description/marriage.php">Marriage</a>
                            <a href="description/divorse.php">Divorce</a>
                            <a href="description/death.php">Death</a>
                        </div>
                    </li>
                    <li class="nav-choose"><a href="AboutUs.php">AboutUs</a></li>
                    <li class="nav-choose"><a href="Contact.php">Contacts</a></li>
                    <li class="nav-choose"><a class="login" href="../Login/login.php" target="_blank"><button
                                class="loginbutton">login</button></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="contact-section">
        <div class="h1">
            <h1>Comments</h1>
        </div>
        <div class="contact-div">
            <!-- Optional: Additional content can go here if needed -->
        </div>
    </section>

    <section class="comments-section">
        <?php
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

        // Fetch and display comments
        $sql = "SELECT id, name, email, phone, message, submitted_at FROM contacts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='comments-table'>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Comment</th><th>Submitted At</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td>" . $row["submitted_at"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>0 comments</p>";
        }
        $conn->close();
        ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="Script/Contact.js"></script>
</body>

</html>
