<?php
session_start();
include('partials/dbconnect.php');



if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $username= $_POST['username'];
    $email= $_POST['email'];

    $query = "update signup set username='$username', email='$email' where id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        // echo "data updated successfully";
        $_SESSION['status'] = "data updated successfully";
        header('Location: login.php');
    }else{
        // echo "data not updated ";
        $_SESSION['status'] = "data not updateed";
        header('Location: login.php');
    }
}

    ?>