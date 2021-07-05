<?php 
$login=false;
$ShowError =false;
$logged=false;

session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include('partials/dbconnect.php');

    $username = $_POST["username"];
    $password = $_POST["password"];
  
      $sql = "select * from signup where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
          while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
              $login = true;
              session_start();
              $_SESSION['logged'] = true;
              $_SESSION['username'] = $username;
              header("location:welcome.php");
            }
            else{
              $ShowError = "Invaid credentials ";
            }
          }          
        }
    else{
        $ShowError = "Invaid credentials ";
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
    <title>Log In</title>
</head>
<body>
<?php require 'partials/nav.php' ?>

<?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in....
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
      <?php 
        if(isset($_SESSION['status']) && $_SESSION != '')
        {
            ?>
    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              </button>
            </div>
                    
             <?php
                unset($_SESSION['status']);
        }
             ?>
    <div class="container my-4 offset-3" >
    <?php 
        if(isset($_SESSION['status']) && $_SESSION != '')
        {
            ?>
                                
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              </button>
            </div>
                    
             <?php
                unset($_SESSION['status']);
        }
             ?>
        <h1 class="mx-5" >Log In yourself</h1>
        <?php 
        if(isset($_SESSION['status']) && $_SESSION != '')
        {
            ?>
                                
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              </button>
            </div>
                    
             <?php
                unset($_SESSION['status']);
        }
             ?> 

        <form action="/signup-module/login.php" method="POST">
        <div class="form-group col-md-6 ">
                <label for="username">Username</label>
                <input type="user" class="form-control" id="username" name="username" aria-describedby="user" placeholder="Enter your name">
                <small id="user" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>  
            <button type="submit" class="btn btn-primary mx-3">Login</button>
            <p class="mx-3 my-3">Forgot your password no worry? <a href="recover-email.php">Click Here</a></p>
            <p class="mx-3 my-3">Not have an account? <a href="signup.php">Signup Here</a></p>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
