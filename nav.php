<?php 

if(!isset($_SESSION['logged']) || $_SESSION['logged']!== true)
{
    $logged = true;
}
else{
  $logged=false;
}


echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/signup-module">Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/signup-module/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if($logged){
      echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>';
      
      }

      if(!$logged){
      echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userProfile.php">Update Your Profile</a>
      </li>';
      }  
      
    echo '
  </div>
</nav>';


?>