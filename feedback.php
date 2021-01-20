<?php
$connect = mysqli_connect("localhost","root","","gadgetsonwheels");
if(isset($_POST['submit'])){
  $sql = "CALL insertData('".$_POST["name"]."', '".$_POST["email"]."','".$_POST["comments"]."')";
if(mysqli_query($connect, $sql))
{
  header("location: index.php?inserted=1");
}
}
if(isset($_GET["inserted"]))
{
  echo '<script> alert("Feedback Submitted!!") </script>';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <!--icon link-->
  <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
    <link rel="stylesheet" href="CSS/feedback.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
        <img src="img/logonew.png" width="80px" style="margin-right: 30px;">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>

        <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" class="btn">Sign Out</a></li>
      </ul>

    </div>
    </div>
  </nav><br><br>
  <div id="feedback-main">
  <div id="feedback-div"style="margin-top:100px;">
    <form method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
      <p class="name">
        <input name="name" type="name" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="Name" id="feedback-name" />
      </p>
      <p class="email">
        <input name="email" type="email" class="validate[required,custom[email]] feedback-input" id="feedback-email" placeholder="Email" required />
      </p>
      <p class="text">
        <textarea name="comments" type="comment" class="validate[required,length[6,300]] feedback-input" id="feedback-comment" placeholder="Enter Your Feedback!"></textarea>
      </p>
      <div class="feedback-submit">
        <button type="submit" name = "submit" value="SEND" id="feedback-button-blue">Send</button>
        <div class="feedback-ease"></div>
      </div>
    </form>
  </div>
</div>
<button id="popup" class="feedback-button" onclick="toggle_visibility()">Feedback</button>
<script src="js/feedback.js"></script>
  </body>
</html>
