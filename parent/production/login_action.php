<?php
require 'php/config.php';
if(isLoggedIn()) {
header('location:index.php');
}
else if(isset($_GET['username']) && isset($_GET['password'])){
    
   
   $username = mysqli_real_escape_string($link, $_GET['username']);

    $password = $_GET['password'];
    
   $query = "SELECT * FROM `parent` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      $_SESSION['dad'] = $row['dad'];
      $_SESSION['fcnic'] = $row['fcnic'];
      $_SESSION['id'] = $row['id'];
$_SESSION['image2'] = $row['image2'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
 
      header('location:index.php');
    
}}


else{
  if(isset($_POST['username']) && isset($_POST['password'])){
$username = mysqli_real_escape_string($link, $_POST['username']);
  
 
    $password = ($_POST['password']);
    $query = "SELECT * FROM `parent` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      $_SESSION['dad'] = $row['dad'];
      $_SESSION['fcnic'] = $row['fcnic'];
      $_SESSION['id'] = $row['id'];
$_SESSION['image2'] = $row['image2'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 60 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
 
      header('location:index.php');
    }else{
      header('location:login.php');
    }
  }
}
?>