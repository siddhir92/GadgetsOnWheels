<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin-login.php");
    exit;
}
include("config.php");
?>
<?php
  $query = "SELECT * FROM products";
  $query1 = "SELECT * FROM users";
  $query2 = "SELECT * FROM admin";
  $query3 = "SELECT * FROM orders";
  $result = $link->query($query);
  $result1 = $link->query($query1);
  $result2 = $link->query($query2);
  $result3 = $link->query($query3);
  $count = mysqli_num_rows ( $result );
  $user = mysqli_num_rows ( $result1 );
  $admin = mysqli_num_rows ( $result2 );
  $order = mysqli_num_rows ( $result3 );

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        table.table tf .add{
          display: none;
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Admin Panel</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a class="active" href="admin-dashboard.php">Dashboard</a></li>
        <li><a href="admin-page.php">Products</a></li>
        <li><a href="admin-page-addproducts.php">Add products</a></li>
        <li><a href="vieworders.php">Orders</a></li>
        <li><a href="viewfeedback.php">Feedbacks</a></li>
        <li><a href="viewlogs.php">My Logs</a></li>
      </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
      <li><a href="logout.php" class="btn">Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<br><br><br>
<h1 id="dash">Dashboard</h1>
<br><br><br><br>
<div class ="contain">
  <div class="box col-md-4">
    <p class="prod"><i><b>Number of Products</b></i></p>
    <p class="num"><?php echo "$count"; ?></p>
  </div>
  <div class="box col-md-4">
    <p class="prod"><i><b>Number of Users</b></i></p>
    <p class ="num"><?php echo "$user"; ?></p>
  </div>
  <div class="box col-md-4">
    <p class="prod"><i><b>Number of Admins</b></i></p>
    <p class ="num"><?php echo "$admin"; ?></p>
  </div>
  <div class="box col-md-4">
    <p class="prod"><i><b>Number of Orders</b></i></p>
    <p class="num"><?php echo "$order"; ?></p>
  </div>
</div>


</body>
</html>
