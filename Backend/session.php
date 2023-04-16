<?php
//starting session
session_start();

//if the session has not been set, initialise it
if(!isset($_SESSION['session_id'])){
	$_SESSION['session_id']="";
	$_SESSION['session_email']="";
	$_SESSION['session_access']="";
}

//save id, email, and access in the session
$session_id = $_SESSION['session_id'];
$session_email = $_SESSION['session_email'];
$session_access = $_SESSION['session_access'];


?>
