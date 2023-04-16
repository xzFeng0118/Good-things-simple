<?php

include ('db_conn.php'); //db connection
include ('session.php');

if (isset($_POST['register'])){
  $username = $_POST['username'];
  $email = $_POST['regiemail'];
  $mobile = $_POST['regimobile'];
  $password = $_POST['regipwd'];
}


  $register = "INSERT INTO `user` (`username`, `email`, `mobile`, `password`) VALUES ('$username',  '$email', '$mobile', '$password')";


  $mysqli->query($register);

   echo "<script type='text/javascript'>alert('You are successfully registered!');
  window.location='home.php';</script>"

  
 ?>
