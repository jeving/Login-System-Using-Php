<?php
// connecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "users218";

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die If connection not successful
if(!$conn){
    die("Sorry we Failed to cinnet:". mysqli_connect_error());
}
// else{
//     echo"successfull <br>";  
// }
 
?>