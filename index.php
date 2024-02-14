<?php

$login = 0;
$invalid = 0; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // $sql = "insert into 'signup'(username,email,password)
  // values('$username','$email','$password')";

  // $result = mysqli_query($con, $sql);

  // if ($result){
  // 	echo "Data Inserted Successfully";
  // }
  // else {
  // 	die(mysqli_error($con)); 
  // }


  $sql = "SELECT * FROM signup WHERE username = '$username' AND email = '$email'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    $login = 1;
  } else {
    $invalid = 1;
  }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentify</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>
  <header>
    <div class="navbar_out-box">
      <div class="navbar-box">
        <div class="logo-box">
          <img class="logo" src="./images/logo6.jpg" alt="logo image" />
          <p class="logo-name" href="">Rentify</p>
        </div>
        <div class="menu-box">
          <nav class="menu">
            <ul class="link_text-box">
              <li><a class="link-text" href="#home">HOME</a></li>
              <li><a class="link-text" href="#services">SERVICES</a></li>
              <li><a class="link-text" href="#contact">CONTACT US</a></li>
              <li><a class="link-text" href="#sign-in">SIGN IN</a></li>
              <li>
                <a class="link" href="./sign-up.php"><button class="signup-btn">REGISTER</button></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div id="home">
    <div class="main-box">
      <div class="col-1">
        <h1 class="main-headline">Simplifying Rentals, Redefining Living.</h1>
      </div>
      <div class="col-2">
        <img class="main-img" src="./images/main.jpg" alt="property image" />
      </div>
    </div>
  </div>

  <div id="services">
    <div class="headline-box">
      <h1 class="headline">SERVICES</h1>
    </div>
    <div class="service_out-box">
      <div class="service_in-box">
        <div class="service-tabs">
          <div class="service">
          <a class="service-name" href="./index_apartment.php">
            <img class="service-img" src="./images/rental_assistant.jpg" />
            <p>Appartment</p>
            </a>
          </div>
          <div class="service">
             <a class="service-name" href="./index_apartment.php">
            <img class="service-img" src="./images/prop_managment.jpg" />
            <p>PropManage</p>
             </a>
          </div>
          <div class="service">
             <a class="service-name" href="./index_apartment.php">
            <img class="service-img" src="./images/tenet_match.jpg" />
            <p>TenanntMatch</p>
             </a>
          </div>
          <div class="service">
             <a class="service-name" href="./index_apartment.php">
            <img class="service-img" src="./images/prop_advice.webp" />
            <p>PropAdvice</p>
             </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="gallery">
    <div class="headline-box">
      <h1 class="headline">GALLERY</h1>
    </div>
    <div class="gallery-box">
      <!-- Slideshow container -->
      <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <img src="./images/img-1.avif" style="width: 100%" />
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <img src="./images/img-2.avif" style="width: 100%" />
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <img src="./images/img-3.jpg" style="width: 100%" />
        </div>
        <div class="mySlides fade">
          <div class="numbertext">4 / 4</div>
          <img src="./images/img-4.jpg" style="width: 100%" />
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </div>
  </div>

  <div id="contact">
    <div class="headline-box">
      <h1 class="headline">CONTACT US</h1>
    </div>
    <div class="contact-box">
      <div class="contact_col-1">
        <div class="contact_logo-box">
          <img class="contact-logo" src="./images/logo6.jpg" />
          <p class="logo-name" href="">Rentify</p>
        </div>
        <div class="social_icons">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-youtube"></i>
        </div>
        <div class="contact-details">
          <h3>Contact</h3>
          <br />
          <p><i class="fa-solid fa-phone"></i>+91 1400-6500</p>
          <br />
          <p><i class="fa-solid fa-envelope"></i> rentify@gmail.com</p>
          <br />
          <h3>Address</h3>
          <address>
            409, Shri Krishna Temple Rd,<br />
            Kalyan Nagar, Indira Nagar 1st Stage,<br />
            H Colony, Indiranagar, Bengaluru, Karnataka 560038
          </address>
        </div>
      </div>
      <div class="contact_col-2">
        <div class="form-box" id="sign-in">
          <h1>Sign In</h1>
          <form action="index.php" method="post">
            <div class="input-group">
              <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="" placeholder="Enter Your username" required/>
              </div>
              <div class="input-field">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" id="" placeholder="Enter Your email" required/>
              </div>
              <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="" placeholder="Enter Your password" required/>
              </div>
            </div>
            <div class="comment-box">
              <?php
              if ($invalid == 1) {
                echo '<script>';
								echo 'alert("Invalid username or password!");';
								echo 'window.location.href = "index.php";';
								echo '</script>';
              }

              if ($login == 1) {
                echo '<script>';
								echo 'alert("login successfull!");';
								echo 'window.location.href = "index.php";';
								echo '</script>';
              }
              ?>
              <a class="go-to" href="./sign-up.php">Create an account</a>
            </div>
            <div class="btn-field">
              <button type="submit">Sign In</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="./src/slide_show1.js"></script>
  <script src="https://kit.fontawesome.com/62713cab29.js" crossorigin="anonymous"></script>
</body>

</html>