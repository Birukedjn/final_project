<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/logo.png">
  <title>Contact</title>
  <link rel="stylesheet" href="../CSS/Main.css">
  <link rel="stylesheet" href="../CSS/Header.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="../CSS/Contact.css">

</head>

  

  
<body>
<?php
  include ('access.php');
  ?>
  <header class="Header-nav">

    <div class="container">

      <div class="Logo-div">
        <a class="alogo" href="Index.php"><img class="logo" src="../Images/logo.png" alt="VERS"></a>
      </div>

      <div class="hamburger-div">
        <img id="mobile-form" class="mobile-menu" src="Images/Humbergur-Menu.png" alt="Hamburger Logo">
      </div>

      <nav class="navigation-bar">
        <img id="mobile-exit" class="mobile-menu-close" src="Images/ExitSVG.svg" alt="Exit Logo">
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
          <li class="nav-choose"><a href="profile.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
        </ul>
      </nav>

    </div>

  </header>
  
  <div class="container">
    <aside class="sidebar">
        <h3>Quick Links</h3>
        <ul>
        <li> <a href="birthform/index.php" class="btn">Register Birth</a> </li>
          <li><a href="adoptionform/index.php" class="btn">Register Adoption</a></li>
          <li><a href="marriageform/index.php" class="btn">Register Marriage</a></li>
          <li><a href="Divorceform/index.php" class="btn">Register Divorce</a></li>
          <li><a href="deathform/index.php" class="btn">Register Death</a></li>


        
        </ul>
    </aside>

    <main>
        <section class="hero">
            <h2>Welcome to our Vital Event Registration System</h2>
            <p>Register vital events such as births, deaths, and marriages conveniently online.</p>
            <a href="updateAccount.php" class="btn">Manage your profile</a>
            <a href="../record/record.php" class="btn">Manage Records</a>
            <a href="logout.php" class="btn">logout</a>
        
        </section>

        <section class="features">
            <h2>Key Features</h2>
            <ul>
                <li>Easy online registration process</li>
                <li>Secure storage of vital event records</li>
                <li>Accessible anytime, anywhere</li>
                <li>24/7 customer support</li>
            </ul>
        </section>
    </main>
</div>
</body>
</html>