<?php
include ('db_conn.php');
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
       <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="home.php">Goodthings</a>
                    </li>
                </ul>
                <?php if($session_id == ""){ //-------if there is no session, display login button ?>
                <div class="login">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item active float-right">
                            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#loginModal">Login</a>
                            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#regiModal">Create Account</a>
                        </li>
                    </ul>
                </div>    
                <?php } else { //else display logout button ?>
                <div class="logout">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a type = "button" class="nav-link float-right" href = "logout.php">Logout</a>
                            <a type = "button" class="nav-link float-right" href = "account.php">Account</a>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            </div> 
        </nav>
    </header>
    
    <?php


  
    $output ='';

    //collect
    if (isset($_POST['search'])){
        $searchq = $_POST['search'];
        $name = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $search = "SELECT * FROM products WHERE name LIKE '%$searchq%'";
        $mysqli->query($search);

                $output .= '<div>'.$name.'</div>';
            }
        
    
    

		
	
 ?>
