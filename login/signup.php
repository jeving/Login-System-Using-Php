<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"]; 
  // $exists = false;
  // check username 
  $existssql = "SELECT * FROM `users` WHERE username = '$username' ";
  $result = mysqli_query($conn, $existssql);
  $numExistRows =  mysqli_num_rows($result);
  if ($numExistRows > 0){
    $showError = "Username already Exists"; 
    // $exists =true;
  }
  else {
    // $exists = false;
    if (($password == $cpassword)){
      $hash = password_hash($password,PASSWORD_DEFAULT);  
      $sql = "INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES (NULL, '$username', '$hash', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result){
        $showAlert = true;
    }
  }
    else {
      $showError = "Passwors don't Match"; 
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>
 
  <?php require 'partials/_nav.php';  ?>
 
 <?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Welcome!</strong> successfull sign up
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }

    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Welcome!</strong> '. $showError .' 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
?>

<div class="container">
    <h1 class = "text-center">Welcome!  </h1>
  <form action="/login/signup.php" method="POST">
  <div class="form-group">
    <label for="username">User Name address</label>
    <input type="text" maxlength="11" class="form-control" name="username" id="username" aria-describedby="username" placeholder="Enter user name">
  </div>

  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" maxlength="30" name="password" id="Password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" maxlength="30" name="cpassword" id="cPassword" class="form-control" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>







  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>