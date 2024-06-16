<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>manage</title>
  <link rel="stylesheet" href="../CSS/Main.css">
  <link rel="stylesheet" href="../registrar/style1.css">
  <link rel="stylesheet" href="../CSS/Header.css">
</head>
<body>
<?php
include ('access.php');
?>

  <style>
  a {
            text-decoration: none;
            color: white; 
        }
        h3{
          margin-left:101px;
        }
</style>

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
          <li class="nav-choose"> <a href="profile.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
        </ul>
      </nav>
  
    </div>
  
  </header>

  <div class="container">
    <aside class="sidebar">
        <h3 style="color: white" ><a href="profile.php" style ="text-decoration:none" ><?php echo htmlspecialchars($_SESSION['username']); ?></a></h3>
        <ul>
          <li> <a href="registrars.php" class="btn">Registrars <br> list</a> </li>
          <li><a href="users.php" class="btn">users list</a></li>
          <li><a href="CreateRegistrar.php" class="btn">create <br> account</a></li>
          <li><a href="updateAccount.php" class="btn">update <br> account</a></li>
          <li><a href="comments.php" class="btn">Comments</a></li>
          
        </ul>
    </aside>

    <main>
        <section class="hero">
            <h2>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> <br>  Vital Event Registration System</h2>
            
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