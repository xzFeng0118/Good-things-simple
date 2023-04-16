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
    
    
    <!-- Registration Modal Form -->
    <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CREATE ACCOUNT</h5>
                </div>
                <div class="modal-body">
                    <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
                        <!-- <div class="form-row col-12">
                            <label for="inputaccess">Are you registering as a client or host?</label>
                            <select id="regiaccess" name = "regiaccess"  class="form-control">
                                <option disabled id="regiaccess" name = "regiaccess">Select your choice</option>
                                <option id="regiaccess" name = "regiaccess" value="host">host</option>
                                <option id="regiaccess" name = "regiaccess" value="client">client</option>
                            </select>
                        </div> -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="regifname">First Name</label>
                                <input class = "form-control" type="text" id="regifname" name = "regifname" placeholder="Enter your first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="regilname">Last Name</label>
                                <input class = "form-control" type="text" id="regilname" name = "regilname" placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="regiemail">Email address</label>
                                <input class = "form-control" type="email" id="regiemail" name = "regiemail" placeholder="Enter email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="regimobile">Mobile</label>
                                <input class = "form-control" type="text" id="regimobile" name = "regimobile" placeholder="Enter your mobile number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="regipwd">Password</label>
                                <input class = "form-control" type="password" id="regipwd" name = "regipwd" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="comfirmpwd">Confirm password</label>
                                <input class = "form-control" type="password" id="comfirmpwd" name = "comfirmpwd" placeholder="Re-type your password">
                            </div>
                        </div>
                        
                            <p><span id = "msg"></span></p>
                            <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancel</button>
                            <button class = "btn btn-primary col-3 float-right" type = "submit" id = "register" name = "register">Register</button>
                    </form>
                </div>             
            </div>
        </div>
    </div>

    




    <?php include ('login.php'); ?>
    <script type="text/javascript" src = "script.js"></script>
</body>
</html>