<?php 
$ShowAlert=false;
$ShowError =false;
include('partials/dbconnect.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    $token = bin2hex(random_bytes(15));
    //check whether username exists or not 
    $existsSql = "select * from signup where email='$email'";
    $result = mysqli_query($conn, $existsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows >0){
        //$exists = true;
        $ShowError="email alreaady exists";
    }
    else{
        //$exists = false;
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into signup(username,email,password,token,dt) values('$username','$email','$hash','$token',current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if($result){
                $ShowAlert=true;
            }
        }
        else{
            $ShowError = "Password do not macth ";
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
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
<?php require 'partials/nav.php' ?>
<?php
if($ShowAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is created now you can login .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
if($ShowError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $ShowError.' .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>
    <div  class="container my-4 offset-3" >
        <h1 class="mx-5" >Sign up yourself</h1>
        <form action="/signup-module/signup.php" method="POST">
        <div  class="form-group col-md-6 my-4">
                <label for="username">Username</label>
                <input type="user" maxlength="11" class="form-control" id="username" name="username" aria-describedby="user" placeholder="Enter your name">
                <small id="user" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm yourPassword">
                <small id="pass" class="form-text text-muted">Make sure you typed the same password.</small>
            </div>
            <button type="submit" class="btn btn-primary mx-3">Sign Up</button>
            <p class="mx-3 my-3">Already have an account? <a href="login.php">Login Here</a></p>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
