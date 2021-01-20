<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome!</title>
  <!--icon link-->
  <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
  <!--font awesome icon link--->
  <script src="https://kit.fontawesome.com/db47262ed8.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="CSS/style3.css" <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
      font: 14px sans-serif;
      text-align: center;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
        <img src="img/logonew.png" width="80px" style="margin-right: 30px;">
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>

        <li><a href="feedback.php">Feedback</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
        <label class="dropdown">


          <div class="dd-button" width="152px" ;="" style="width: 152px;">
          <li><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>

          </div>

          <input type="checkbox" class="dd-input" id="test">

          <ul class="dd-menu">
            <li><a href="orders.php">Orders</li>
            <li><a href="reset-password.php">Reset Password</a>
              <a href="logout.php">Sign Out</a>
            </li>


          </ul>

        </label>

      </ul>
    </div>
    </div>
  </nav>
 
  <div class="page-header" style="
    padding-top: 40px";>

<h2>Browse from our various categories!</h2>
  </div>

  
  <br>
  <!--Product categories will be displayed here -->
  <div class="box col-md-3">
    <p> <a href="phone.php">
        <b>Mobiles</b>
    </p><br>
    <img src="img/mobile.jpg" class="image">
    </a>
  </div>


  <div class="box col-md-3">
    <p> <a href="laptop.php">
        <b>Laptops</b>
    </p><br>
    <img src="img/laptop.jpg" class="image">
    </a>
  </div>


  <div class="box col-md-3">
    <p><a href="tv.php">
        <b>TVs</b></p><br>
    <img src="img/tv.jfif" class="image">
    </a>
  </div>


  <div class="box col-md-3">
    <p><a href="camera.php">
        <b>Cameras</b></p><br>
    <img src="img/camera.jfif" class="image">
    </a>
  </div>

  <div class="box col-md-3">
    <a href="game.php">
      <img src="img/gaming.jpg" class="image">
      <p>
        <b>Gaming and accesories</b></p><br>
    </a>
  </div>


  <div class="box col-md-3">
    <a href="headphone.php">
      <img src="img/headphones.jpg" class="image">
      <p><b>Headphones</b></p><br>
    </a>
  </div>


  <div class="box col-md-3">
    <a href="speaker.php">
      <img src="img/speakers.png" class="image">
      <p><b>Speakers</b></p><br>
    </a>
  </div>


  <div class="box col-md-3">
    <a href="projector.php">
      <img src="img/projector.jpg" class="image">
      <p><b>Projectors</b></p><br>
    </a>
  </div>
<br>
<br>

</body>
<!-- Site footer -->
<footer class="site-footer" style="margin-top:450px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Our website allows customers to rent from various categories of electronic devices according to their needs and return them with care after Use! This Way You Can Rent Products on an Monthy affordable Fee and also get
                        Hands on The latest technologies in the market without Having to worry about Being On A Budget.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="">Mobiles</a></li>
                        <li><a href="">TV</a></li>
                        <li><a href="">Laptops</a></li>
                        <li><a href="">Cameras</a></li>
                        <li><a href="">Speakers</a></li>
                        <li><a href="">Gaming And Accesories</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Contribute</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">&copy; 2020
                        <a href="#">GadgetsOnWheels</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
  
  </div>
</html>
