<!DOCTYPE html>
<?php include("header.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Speakers</title>
    <!--icon link-->
  <link rel="shortcut icon" type="image/png" href="img/logonew.png" />
  <link rel="stylesheet" href="CSS/products.css">

</head>



<body>

<div class="container">
<h1 style="margin-top: 60px;">Speakers</h1>
<div id="message" ></div>
    <div class="row mt-2 pb-3">


  <?php include("config1.php");
$message="";
?>
  <?php echo $message; ?>
      <?php
      include 'config1.php';
      $stmt = $conn->prepare('SELECT p_id,p_name,qty,price,p_image,description FROM products,categories
      WHERE cat_id = cat_num and cat_id = 7');
      $stmt->execute();
      $result = $stmt->get_result();
      while ($rows = $result->fetch_assoc()):

              $id = $rows['p_id'];
              $name = $rows['p_name'];
              $price = $rows['price'];
              $image = $rows['p_image'];
              $des = $rows['description'];
              ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $rows['p_image'] ?>" class="card-img-top" height="150" width="150">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $rows['p_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($rows['price'],2) ?>/-</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity</b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $rows['qty'] ?>" style="width:55px;">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $rows['p_id'] ?>">
                <input type="hidden" class="pname" value="<?= $rows['p_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $rows['price'] ?>">
                <input type="hidden" class="pimage" value="<?= $rows['p_image'] ?>">

                <button class="btn btn-info btn-block addItemBtn" style="margin-bottom: 30px;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
              </form>
            </div>
            </div>
        </div>
      </div>
          <?php endwhile; ?>


    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();


      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,

        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
</html>
