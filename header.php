<?php
session_start();
  ?>
 <header class="Header-nav">
    <div class="container">
      <div class="Logo-div">
        <a class="alogo" href="Index.php"><img class="logo" src="Images/logo.png" alt="VERS"></a>
      </div>
      <div class="hamburger-div">
        <img id="mobile-form" class="mobile-menu" src="Images/Humbergur-Menu.png" alt="Hamburger Logo">
      </div>
      <nav class="navigation-bar">
        <img id="mobile-exit" class="mobile-menu-close" src="Images/ExitSVG.svg" alt="Exit Logo">
        <ul class="Primary-nav">
          <li class="nav-choose"><a href="index.php">Home</a></li>
          <li class="nav-choose" id="dropdown">
            <a href="#">services</a>
            <div class="dropdown-content">
                <a href="user/dashboard.php">view record</a>
                <a href="description/birth.php">Birth</a>
                <a href="description/adoption.php">Adoption</a>
                <a href="description/marriage.php">Marriage</a>
                <a href="description/divorse.php">Divorce</a>
                <a href="description/death.php">Death</a>
            </div>
        </li>
          <li class="nav-choose"><a href="AboutUs.php">AboutUs</a></li>
          <li class="nav-choose"><a href="Contact.php">Contacts</a></li>
        <li class="nav-choose">
    <?php if(isset($_SESSION['username'])): ?>
        <h3 style="color: white">
            <a href="profile.php" style="text-decoration:none">
                <?php echo htmlspecialchars($_SESSION['username']); ?>
            </a>
        </h3>
    <?php else: ?>
        <a class="login" href="Login/login.php" >
            <button class="loginbutton">login</button>
        </a>
    <?php endif; ?>
</li>

</ul>
      </nav>
    </div>
  </header>