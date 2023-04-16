<?php

include ('db_conn.php'); //db connection
include ('session.php');

if (isset($_POST['add'])){
  $name = $_POST['addname'];
  $code = $_POST['addcode'];
  $price = $_POST['addprice'];
  $color = $_POST['addcolor'];
}


  $add = "INSERT INTO `products` (`name`, `code`, `price`, `color`) VALUES ('$name',  '$code', '$price', '$color')";


  $mysqli->query($add);

   echo "<script type='text/javascript'>alert('You are successfully added product!');
  window.location='home.php';</script>"

  
 ?>
