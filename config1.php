
<?php
$conn = new mysqli("localhost","root","","gadgetsonwheels");
if($conn->connect_error){
  die("Connection Failed!".$conn->connect_error);
}
?>
