<?php

include ('db_conn.php'); //db connection
include ('session.php');

if (isset($_POST['delete'])){
  $name = $_POST['delname'];
  
}


  $delete = "DELETE FROM products WHERE name='$name'";


  $mysqli->query($delete);

   echo "<script type='text/javascript'>alert('You are successfully deleted product!');
  window.location='home.php';</script>"

  
 ?>
