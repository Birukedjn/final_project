<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../CSS/Main.css">

    <link rel="stylesheet" href="../CSS/Header.css">
</head>
<body>
<?php
include ('access.php');
  ?>
    <header class="Header-nav">

    <div class="container">

  <div class="Logo-div">
    <a class="alogo" href="../Index.php"><img class="logo" src="../Images/logo.png" alt="VERS"></a>
  </div>

  <div class="hamburger-div">
    <img id="mobile-form" class="mobile-menu" src="../Images/Humbergur-Menu.png" alt="Hamburger Logo">
  </div>

  <nav class="navigation-bar">
    <img id="mobile-exit" class="mobile-menu-close" src="../Images/exitSVG.svg" alt="Exit Logo">
    <ul class="Primary-nav">
      <li class="nav-choose"><a href="../index.php">Home</a></li>
      <li class="nav-choose" id="dropdown">
        <a href="#">services</a>
        <div class="dropdown-content">
            <a href="../Login/login.php" target="_blank">view record</a>
            <a href="../description/birth.php">Birth</a>
            <a href="../description/adoption.php">Adoption</a>
            <a href="../description/marriage.php">Marriage</a>
            <a href="../description/divorse.php">Divorce</a>
            <a href="../description/death.php">Death</a>

        </div>
    </li>
      <li class="nav-choose"><a href="../AboutUs.php">AboutUs</a></li>
      <li class="nav-choose"><a href="../Contact.php">Contacts</a></li>
      <li class="nav-choose"> <a href="../registrar/profile.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
    </ul>
  </nav>

    </div>

    </header>
    <div class="container">  
        <div class="sidebar">
          <aside class="sidebar">
              <h3> events</h3>
              <ul>
                <li><a href="#" data-table="birth">Birth </a></li>
                <li><a href="#" data-table="adoption">Adoption </a></li>
                <li><a href="#" data-table="marriage">Marriage </a></li>
                <li><a href="#" data-table="divorce">Divorce </a></li>
                <li><a href="#" data-table="death">Death </a></li>
                
              </ul> 
            
            </aside>
        
          </div>
        
        <div class="content">
            <h2>Record List</h2>
            <table id="records-table">
                <thead>
              </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>


