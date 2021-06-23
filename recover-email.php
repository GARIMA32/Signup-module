<?php 
$ShowAlert=false;
$ShowError =false;
session_start();
//include('signup.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include('partials/dbconnect.php');

    
    $email = $_POST["email"];
    
    //check whether username exists or not 
    $existsSql = "select * from signup where email='$email'";
    
    $result = mysqli_query($conn, $existsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows){

        $userdata = mysqli_fetch_array($result);
        $username= $userdata['username'];
        $token = $userdata['token'];

        $subject = "Password Reset";
        $body = "Hi, $username. Click here to reset your password http://localhost/signup-module/reset-password.php?token=$token";
        $sender_email = "From:chauhangarima525@gmail.com";

        if(mail($email, $subject, $body, $sender_email)){
            $_SESSION['status'] = "check your mail to reset your password $email";
            header('location:login.php');
        }else{
            echo "Email sending failed......";
        }
    }else{
        echo "No email found";
    }
}


//         $result = mysqli_query($conn, $sql);
//         if($result){
//             $ShowAlert=true;
//         }
//     }
//     else{
//         $ShowError = "Password do not macth ";
//     }
// }
// }


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

    <title>forgot password</title>
</head>
<body>
<?php require 'partials/nav.php' ?>


    <div  class="container my-4 offset-3" >
        <h1 class="mx-5" >Recover your account</h1>

        <form action="" method="POST">
        
            <div class="form-group col-md-6 my-4">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            
            <button type="submit" class="btn btn-primary mx-3">Send Mail</button>
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