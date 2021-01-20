<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin-login.php");
    exit;
}
?>
<?php include("config.php");
$error = "";
if(isset($_POST['submit'])){
  $p_name = $_POST['p_name'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $cat_num = $_POST['cat_num'];
  $uploadfile = $_FILES['uploadfile']['name'];
  $tmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = "img/".$uploadfile;
  move_uploaded_file($tmpname,$folder);

  if($p_name!="" && $qty!="" && $price!="" && $description!="" && cat_num!="" && $folder!=""){
    $q = "INSERT INTO products VALUES ('','$p_name','$qty','$price','$description','$cat_num','$folder')";
    $link->query($q);
    $error .= "<div class='alert alert-success'>Data Inserted !!</div>";
  }
  else{
    $error = "<div class='alert alert-danger'>All fields are required..</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Products</title>
    <link rel="stylesheet" href="CSS/style4.css">
    <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
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
      <li><a href="logout.php" class="btn">Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<br><br>
<p id="prod">Add Products</p>
<div class="contain">
  <span class="text-danger"><?php echo $error; ?></span>
  <form method = "POST" class = "text-white" enctype="multipart/form-data">
    <div class="row">
      <div class ="form-group col-md-6">
        <label>Product Name </label>
          <input type = "text" name ="p_name" class="form-control form-control-sm">
      </div>
      <div class ="form-group col-md-6">
        <label>Product price $</label>
          <input type = "text" name ="price" class="form-control form-control-sm">
      </div>
      <div class ="form-group col-md-6">
        <label>Product Qty </label>
          <input type = "number" name ="qty" class="form-control form-control-sm">
      </div>
      <div class ="form-group col-md-6">
        <label>Category Number </label>
          <input type = "number" name ="cat_num" class="form-control form-control-sm">
      </div>
      <div class ="form-group col-md-6">
        <label>Product Description </label>
          <input type = "text" name ="description" class="form-control form-control-sm">&nbsp;
      </div>
      <label for="customFile">product Image</label>
      <div class ="custom-file mb-3">
        <input type="file" name="uploadfile" class="custom-file-input" id="customFile">
      </div>
      <button type="submit" name="submit" class="btn text-white shadow" style = "background-color: #008080">Add Item</button>
    </form>


</body>
</html>
