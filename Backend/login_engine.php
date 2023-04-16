<?php
include ('db_conn.php');
include ('session.php');

//retrieve email and password
$user_email = trim($_POST['login_email']);
$user_password = trim($_POST['login_password']);



//query from database based on the retrieved email
$query = "SELECT * FROM members where email = '$user_email'";
$result = $mysqli -> query($query);
$row = $result -> fetch_array(MYSQLI_ASSOC);

//if no data found, display we cannot find your account
// else, if the password is the same, add to $_session, else invalid password
if($row['email'] != $user_email){
	echo "We cannot find your account.";
}else{
	//if the emails are the same, check the password
	if($row['password'] == $user_password){
		//login successful
		$_SESSION['session_id'] = $row['id'];
		$_SESSION['session_email'] = $row['email'];
		$_SESSION['session_access'] = $row['access'];
	echo "Successful！"; //test line
	} else {
		echo "Invalid password!";
	}
}


?>
