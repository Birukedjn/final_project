
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/adoption.jpg">
  <title>vital event registration</title>
  <link rel="stylesheet" href="CSS/Main.css">
  <link rel="stylesheet" href="CSS/Header.css">
  <link rel="stylesheet" href="CSS/Hero.css">
</head>
<body> 
  <?php
  include("header.php");
  ?>

  <div class="container">
    <div class="left-side" >
      <div class="homepage-text">
        <h1> <span> WELCOME TO VITAL EVENT <br> REGISTRATION SYSTEM </span> <br>&#66437 Register vital events such as births, adoption, marriages, divorce and deaths <br> </h1>
        <a href="AboutUs.php"><button class="readMore">About Us &#187;</button></a>
      </div>
      <div class="service">
        <h1>Visite our services</h1>
        <div class="All-features">
          <div>
            <a href="signup.php"><img class="Gym" src="Images/signup.png" alt="signup"></a>
              <p>signup</p>
            </div>
            <div>
                <a href="description/birth.php">
                <img class="Gym" src="Images/childbirth.png" alt="BIRTH">
              </a>
                <p>Birth</p>
              </div>
          <div>
            <a href="description/adoption.php">
            <img class="swimmingPool" src="Images/adoption1.png" alt="ADOPTION">
            </a>
            <p>Adoption</p>
          </div>
          <div>
          <a href="description/marriage.php">
            <img class="spa" src="Images/couple.png" alt="MARRIAGE">
          </a>  
          <p>Marriage</p>
          </div>
          <div>
            <a href="description/divorse.php">
            <img class="HotelTeller" src="Images/divorce.png" alt="DIVORCE">
          </a>
            <p>Divorce</p>
          </div>
        
          <div>
              <a href="description/death.php">
              <img class="MiniBar" src="Images/death.png" alt="DEATH">
            </a>
              <p>Death</p>
            </div>
              <div>
                <a href="Registrar/dashboard.php">
                  <img class="CarParking" src="Images/website.png" alt="REGISTER">
                </a>
                <p>Register</p>
              </div>
          <div>
            <a href="admin/manage.php">
              <img class="CarAirport" src="Images/manage.png" alt="MANAGE">
            </a>
            <p>Manage</p>
          </div>
        </div>
      </div>
    </div>
    <div class="right-side">
      
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <img src="Photos/home.jpg" alt="VERS photo">
          </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="Script/Index.js"> </script>
</body>
</html>