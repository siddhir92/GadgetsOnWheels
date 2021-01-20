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
$user = htmlspecialchars($_SESSION["id"]);
$message="";
$user = htmlspecialchars($_SESSION["id"]);
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && !empty($_GET['id'])) {
  $query = "DELETE FROM orders WHERE id ='".$_GET['id']."'";
  $link->query($query);
  header("location:orders.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link rel="stylesheet" href="CSS/style4.css">
    <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">GadgetsOnWheels</a>
      </div>
      
      <ul class="nav navbar-nav">
        <li><a class="active" href="welcome.php">Home</a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" class="btn">Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<br><br>
<p id="feed">My Orders</p>
  <div class="row1">
    <table class ="table text-center mt-1 table-bordered"style="border-color: black;" >
      <thead style="background-color:#3cb371;font-size: 1.5em;">
        <tr>
          <th style="border-color: black;">Name</th>
          <th style="border-color: black;">Email</th>
          <th style="border-color: black;">Phone</th>
          <th style="border-color: black;">Address</th>
          <th style="border-color: black;">Payment</th>
          <th style="border-color: black;">Due Date</th>
          <th style="border-color: black;">Products</th>
          <th style="border-color: black;">Amount</th>
          <th style="border-color: black;">Return</th>
        </tr>
      </thead>
      <?php
        $query = "SELECT * FROM orders WHERE user_id = $user;";
        $result = $link->query($query);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
              $d_id= $rows['id'];
              $id = $rows['user_id'];
              $name = $rows['name'];
              $email = $rows['email'];
              $phone = $rows['phone'];
              $address = $rows['address'];
              $pmode = $rows['pmode'];
              $due = $rows['due_date'];
              $products = $rows['products'];
              $amount = $rows['amount_paid'];
              ?>
        <tbody style="background-color:#f0e68c; border-color: black">
          <tr>
            <form method = "POST" enctype="multipart/form-data">
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="name" value="<?php echo $name; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="email" value="<?php echo $email; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="phone" value="<?php echo $phone; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="address" value="<?php echo $address; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="pmode" value="<?php echo $pmode; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="due" value="<?php echo $due; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="products" value="<?php echo $products; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="amount" value="<?php echo $amount; ?>" disabled></td>
              <td style="border-color: black;"><a href="?action=delete&id=<?php echo $d_id ?>"<button type="button" class="btn btn-danger">Return</button></a>
              </td>
              </tr>
            </tbody>
          <?php }} ?>
        </table>
      </div>
</body>
</html>
