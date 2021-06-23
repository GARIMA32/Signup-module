<!-- <?php 
// $login=false;
// $ShowError =false;
// $logged=false;
// if($_SERVER["REQUEST_METHOD"]=="POST"){
    
//     include('partials/dbconnect.php');

//     $username = $_POST["username"];
//     $password = $_POST["password"];
  
//       $sql = "select * from signup where username='$username'";
//         $result = mysqli_query($conn, $sql);
//         $num = mysqli_num_rows($result);
//         if($num == 1){
//           while($row=mysqli_fetch_assoc($result)){
//             if(password_verify($password, $row['password'])){
//               $login = true;
//               session_start();
//               $_SESSION['logged'] = true;
//               $_SESSION['username'] = $username;
//               header("location:welcome.php");
//             }
//             else{
//               $ShowError = "Invaid credentials ";
//           }
//           }
          
//         }
//     else{
//         $ShowError = "Invaid credentials ";
//     }
//   }



?> -->
 <?php include('partials/dbconnect.php');

 include('update.php');
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
    <div align="center">
    <hr>
        <h3>Update User Information</h3>
    <hr>
        <div class="row">
        <div class="col-md-6 offset-3">
        
            <form action="update.php" method="POST">
           
            
            <?php 
            
            
                $currentUser= $_SESSION['username'];
                $sql = "select * from signup where username = '$currentUser'";

                $gotResults = mysqli_query($conn, $sql);
                if($gotResults){
                    if(mysqli_num_rows($gotResults)>0){
                        while($row = mysqli_fetch_array($gotResults)){
                            //print_r($row['username']);
                            ?>
                            <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"  />
                                <input type="text" class="form-control" value="<?php echo $row['username'] ?>" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="update"  name="update">
                            </div>

                            <?php
                    }
                    }
                }
            ?>
                
            </form>
        </div>
            
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>