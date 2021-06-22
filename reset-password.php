<?php 
session_start();
$ShowAlert=false;
$ShowError =false;
include('partials/dbconnect.php');

    
if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
    
    $token = $_GET['token'];

    $newpassword = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $pass = password_hash($newpassword, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    
    if($newpassword == $cpassword){
        $updatequery = "update signup set password='$pass' where token='$token'";
            
        $result = mysqli_query($conn, $updatequery);
        if($result){
            $_SESSION['status'] ="Your Password has been updated, Now you can login....";
            header('location:login.php');
        }
        else{
            $_SESSION['passing'] = "Your Password is not updated";
            header('location:reset-password.php');
        }
    }else{
        echo "Password are not matching";
    }
    
}else{
    echo "No token found";
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
<p><?php 
    if(isset($_SESSION['passing'])){
        echo $_SESSION['passing'];
    }else{
        echo $_SESSION['passing']= "";
    }
     ?></p>
    
    <div  class="container my-4 offset-3" >
        <h1 class="mx-5" >Update your password</h1>

        <form action="" method="POST">
        
            <div class="form-group col-md-6">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm yourPassword">
                <small id="pass" class="form-text text-muted">Make sure you typed the same password.</small>
            </div>
            
            <button type="submit" class="btn btn-primary mx-3" name="submit" >Update Password</button>
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