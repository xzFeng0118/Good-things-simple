<?php
include ('session.php');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "goodthings";

$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['search'])) { 
    $searchcontent = mysqli_real_escape_string($connection, $_POST['searchcontent']); 

    $query = "SELECT * FROM products WHERE name LIKE '%" . $searchcontent . "%'"; 
    $result = mysqli_query($connection, $query); 
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Product Name: " . $row['name'] . "<br>";
            echo "Product Price: " . $row['price'] . "<br>";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}


?>