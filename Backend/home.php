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
    
    <!-- Login Modal Form -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <p class="statusMsg"></p>
            <form class="loginForm" id = "login_form" method="post">
              <label for="email">Email/Mobile</label>
              <input class = "form-control" type="email" name="login_email" id = "login_email">
              <label for="password">Password</label>
              <input class = "form-control" type="password" name="login_password"  id= "login_password">
            </form>
          </div>
          <div class="modal-footer">
            <button class = "btn btn-danger float-right" type = "submit" id = "login_button" name = "login_button">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $('#login_button').click(function(){
     event.preventDefault();
     console.log('button clicked');
     if($('#login_email').val() == "" ||$('#login_password').val() == "" ){
       $('.statusMsg').html('<span style="color:red;">You have to enter your email or password. Please try again.</span>');
     } else {

       $.ajax({
        url: "login_engine.php",
        method: "POST",
        data:  $("#login_form").serialize(),
        beforeSend: function (){
          $('.statusMsg').html('<span style="color:green;">Loading process...</span>');
        },
        success: function (response){
         if(response == 'Successful！'){
           $('.statusMsg').html('<span style="color:green;">We are logging into your account..Wait a second.. </span>');
          setTimeout(' window.location.href = "home.php"; ',500);

       } else{
          $('.statusMsg').html('<span style="color:red;">'+response+'</span>');
        }
        }
      });
    }});
    </script>

    
    <!-- Registration Modal Form -->
    <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CREATE ACCOUNT</h5>
                </div>
                <div class="modal-body">
                    <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="regifname">User Name</label>
                                <input class = "form-control" type="text" id="username" name = "username" placeholder="Enter your user name">
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
    
    <?php if($session_id !== ""){ ?>
        <div class="product">
        <h1>Products</h1><br><br>
        <table class="table table-bordered table-striped">
            <?php
            $query = "SELECT * FROM products";
            $result= $mysqli->query($query);
            while($row = mysqli_fetch_array($result)){
            ?>
            <thead>
                <th>Productname</th>
                <th>code</th>
                <th>price</th>
                <th>color</th>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row ['name'] ;?></td>
                    <td><?php echo $row ['code'] ;?></td>
                    <td><?php echo $row ['price'] ;?></td>
                    <td><?php echo $row ['color'] ;?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button></td>
                    <td><a href="process.php?delete=" class = "btn btn-danger"> Delete</a></td>
                </tr>
            </tbody>
            <?php };
            ?>
        </table>
        </div>
    <?php }?>
    
    <?php if($session_id !== ""){ ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add</button>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Delete</button>
     <?php }?>
    
    <!-- Add product Modal Form -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                </div>
                <div class="modal-body">
                    <form role = "form" class="addForm" action = "add.php" method = "post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="addname">Product Name</label>
                                <input class = "form-control" type="text" id="addname" name = "addname" placeholder="Enter the product name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="addcode">Code</label>
                                <input class = "form-control" type="text" id="addcode" name = "addcode" placeholder="Enter code">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="addprice">Price</label>
                                <input class = "form-control" type="text" id="addprice" name = "addprice" placeholder="Enter the price of the product">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="addcolor">Color</label>
                                <input class = "form-control" type="text" id="addcolor" name = "addcolor" placeholder="Color">
                            </div>
                            
                        </div>
                        
                            <p><span id = "msg"></span></p>
                            <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancel</button>
                            <button class = "btn btn-primary col-3 float-right" type = "submit" id = "add" name = "add">Add</button>
                    </form>
                </div>             
            </div>
        </div>
    </div>
    
    <!-- Edit product Modal Form -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <form role = "form" class="editForm" action = "edit.php" method = "post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editname">Product Name</label>
                                <input class = "form-control" type="text" id="editname" name = "editname" placeholder="Edit the product name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="addcode">Code</label>
                                <input class = "form-control" type="text" id="editcode" name = "editcode" placeholder="Enter code">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editprice">Price</label>
                                <input class = "form-control" type="text" id="editprice" name = "editprice" placeholder="Edit the price of the product">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editcolor">Color</label>
                                <input class = "form-control" type="text" id="editcolor" name = "editcolor" placeholder="Color">
                            </div>
                            
                        </div>
                        
                            <p><span id = "msg"></span></p>
                            <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancel</button>
                            <button class = "btn btn-primary col-3 float-right" type = "submit" id = "edit" name = "edit">Update</button>
                    </form>
                </div>             
            </div>
        </div>
    </div>
    
    <!-- Delete product Modal Form -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                </div>
                <div class="modal-body">
                    <form role = "form" class="deleteForm" action = "delete.php" method = "post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="delname">Product Name</label>
                                <input class = "form-control" type="text" id="delname" name = "delname" placeholder="Which product you want to delete">
                            </div>
                        </div>
                        
                            <p><span id = "msg"></span></p>
                            <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancel</button>
                            <button class = "btn btn-primary col-3 float-right" type = "submit" id = "delete" name = "delete">Delete</button>
                    </form>
                </div>             
            </div>
        </div>
    </div>
    
    <?php if($session_id !== ""){ ?>
    
    <form role = "form" class="searchForm" action = "searchresult.php" method = "post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="searchcontent">Search</label>
                <input class = "form-control" type="text" id="searchcontent" name = "searchcontent" placeholder="Search...">
            </div>
        </div>
                        
        <p><span id = "msg"></span></p>
        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Cancel</button>
        <button class = "btn btn-primary col-3 float-right" type = "submit" id = "search" name = "search">Search</button>
    </form>
    <?php } ?>
    
    
    
</body>
</html>