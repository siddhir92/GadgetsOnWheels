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
$message="";
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && !empty($_GET['id'])) {
  $query = "DELETE FROM products WHERE p_id='".$_GET['id']."'";
  $link->query($query);
  header("location:admin-page.php");
  exit();
}
if(isset($_POST['submit']) && isset($_POST['id'])){
  $name = $_POST['name'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];
  $cat_id = $_POST['cat_id'];
  $query = "UPDATE products SET p_name = '".$name."', qty = '".$qty."',price = '".$price."', cat_num = '".$cat_id."'  WHERE p_id = '".$_POST['id']."'";
  $query = $link->query($query);
  if($query){
    $message = "<div class='alert alert-success'>Updated Successfully!!</div>";
  }else{
    $message = "<div class = 'alert alert-danger'>Update failed</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="CSS/style4.css">
    <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
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
      <li><a href="logout.php" class="btn">Sign Out</a></li>
  </ul>
</div>
</div>
</nav>
<br><br>
<p id="feed">Products</p>
  <?php echo $message; ?>
  <div class="row1">
    <table class ="table text-center mt-1 table-bordered"style="border-color: black;" >
      <thead style="background-color:#3cb371; font-size: 1.5em;">
        <tr>
          <th style="border-color: black;">Image</th>
          <th style="border-color: black;">P_ID</th>
          <th style="border-color: black;">Name</th>
          <th style="border-color: black;">Quantity</th>
          <th style="border-color: black;">Category ID</th>
          <th style="border-color: black;"> Price</th>
          <th style="border-color: black;"class="text-center">Action</th>
        </tr>
      </thead>
      <?php
        $query = "SELECT * FROM products";
        $result = $link->query($query);
        if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
              $id = $rows['p_id'];
              $name = $rows['p_name'];
              $qty = $rows['qty'];
              $price = $rows['price'];
              $cat_id = $rows['cat_num'];
              $image = $rows['p_image'];
              ?>
        <tbody style="background-color:#f0e68c; border-color: black">
          <tr>
            <form method = "POST" enctype="multipart/form-data">
              <td style="border-color: black;"><img src="<?php echo $image;?>" name="" class="" style="width: 100px; height: 100px;"></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="id" value="<?php echo $id; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="name" value="<?php echo $name; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="qty" value="<?php echo $qty; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="cat_id" value="<?php echo $cat_id; ?>" disabled></td>
              <td style="border-color: black;"><input type="text" class = "form-control form-control-sm" name="price" value="<?php echo $price; ?>" disabled></td>
              <td style="border-color: black;">
                <div class = "btn-group">
                  <button  type="submit" name="submit" class="add btn fa fa-save" title="save"><a href="id=<?php echo $id ?>"></a></button><br><br>
                </form>
                  <a class="edit glyphicon glyphicon-edit" title="edit"></a>&nbsp;&nbsp;<a href="?action=delete&id=<?php echo $id ?>" class="delete fa fa-remove fa-2x" title="delete" onclick="return confirm('Are you sure to Delete this data') style="font-size:20px ""></a>

              </td>
              </tr>
            </tbody>
          <?php }} ?>
        </table>
      </div>

    <script type="text/javascript">
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

      $(document).on("click",".edit",function(){
        var input = $(this).parents("tr").find("input[type='text']");
        input.each(function(){
          $(this).removeAttr('disabled');
        });
        $(this).parents("tr").find("add,.edit").toggle();
      });
    });
    </script>
</body>
</html>
