<?php
include("adminheader.php");
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
<br><br><br><br>
<div class = "container mt-10">
  <?php echo $message; ?>
  <div class="row">
    <table class ="table text-center mt-1 table-bordered">
      <thead>
        <tr>
          <th>Image</th>
          <th>P_ID</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Category ID</th>
          <th>Price</th>
          <th class="text-center">Action</th>
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
        <tbody>
          <tr>
            <form method = "POST" enctype="multipart/form-data">
              <td><img src="<?php echo $image;?>" name="" class="" style="width: 100px; height: 100px;"></td>
              <td><input type="text" class = "form-control form-control-sm" name="id" value="<?php echo $id; ?>" disabled></td>
              <td><input type="text" class = "form-control form-control-sm" name="name" value="<?php echo $name; ?>" disabled></td>
              <td><input type="text" class = "form-control form-control-sm" name="qty" value="<?php echo $qty; ?>" disabled></td>
              <td><input type="text" class = "form-control form-control-sm" name="cat_id" value="<?php echo $cat_id; ?>" disabled></td>
              <td><input type="text" class = "form-control form-control-sm" name="price" value="<?php echo $price; ?>" disabled></td>
              <td>
                <div class = "btn-group">
                  <button  type="submit" name="submit" class="add btn fa fa-save" title="save"><a href="id=<?php echo $id ?>"></a></button><br><br>
                </form>
                  <a class="edit glyphicon glyphicon-edit" title="edit"></a>&nbsp;&nbsp;<a href="?action=delete&id=<?php echo $id ?>" class="delete fa fa-remove" title="delete" onclick="return confirm('Are you sure to Delete this data') style="font-size:20px ""></a>

              </td>
              </tr>
            </tbody>
          <?php }} ?>
        </table>
      </div>
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
