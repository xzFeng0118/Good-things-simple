<?php

include ('db_conn.php'); //db connection
include ('session.php');

if (isset($_POST['edit'])){
  $name = $_POST['editname'];
  $code = $_POST['editcode'];
  $price = $_POST['editprice'];
  $color = $_POST['editcolor'];
}


  $edit = "UPDATE products SET name = '$name', price = '$price', color = '$color' WHERE code = '$code'";


  $mysqli->query($edit);

   echo "<script type='text/javascript'>alert('You are successfully edit product!');
  window.location='home.php';</script>"

  
 ?>
