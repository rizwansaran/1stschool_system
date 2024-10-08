<?php

require 'php/config.php';
include 'php/db.php';

  if(isset($_POST['username']) && isset($_POST['password'])){
   $username = mysqli_real_escape_string($link, $_POST['username']);

    $password = $_POST['password'];


    $query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);

  $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['adminname'] = $row['name'];
      $_SESSION['picture'] = $row['picture'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
    $location='admin/production/login.php';
   
    }
else {

$query = "SELECT * FROM `staff` WHERE `login`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      
      $row = mysqli_fetch_assoc($result);
$status=$row['status'];
if($status=='Active'){
$_SESSION['cid'] = $cid;
     $_SESSION['username'] = $row['login'];
      $_SESSION['teachername'] = $row['fullname'];
      $_SESSION['picture'] = $row['image'];
$_SESSION['class'] = $row['class'];
$_SESSION['section'] = $row['section'];
$_SESSION['image2'] = $row['image2'];
      $_SESSION['id'] = $row['id'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
    $location='teacher/production/login_action.php';
}else{
header('location:index.php?msgg=Your Account is Inactive Please Contact Admin for Details!');


}
    }
else{
    
$query = "SELECT * FROM `student` WHERE `login`='$username' AND `password`='$password'OR `id`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
$status=$row['status'];
if($status=='Active'){

      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['login'];
      $_SESSION['name'] = $row['fullname'];
$_SESSION['class'] = $row['class'];
      $_SESSION['picture'] = $row['picture'];

 $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
          $location='std/production/login.php';
    }
else{
  echo "<script type='text/javascript'>window.location.href = 'index.php?msgg=Your Account is Inactive Plz Contact  Admin for Details!';</script>";
   
   } }
else {

$query = "SELECT * FROM `parent` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
$status=$row['status'];
if($status=='Active'){
      $_SESSION['username'] = $row['username'];
      $_SESSION['dad'] = $row['dad'];
      $_SESSION['fcnic'] = $row['fcnic'];
      $_SESSION['id'] = $row['id'];
$_SESSION['image2'] = $row['image2'];

$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 60 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
   $location='parent/production/login_action.php';
      //header('location:../../parent/production/index.php');
      }
else{
     echo "<script type='text/javascript'>window.location.href = 'index.php?msgg=Your Account is Inactive Plz Contact  Admin for Details!';</script>";
    
  
//header('location:index.php?msgg=Your Account is Inactive Plz Contact  Admin for Details!');

}
    }else{
        
          echo "<script type='text/javascript'>window.location.href = 'index.php?msgg=Incorrect username Or Password';</script>";
         

      //header('location:index.php?msgg=Incorrect username Or Password');
    }
}

    }
 }
 echo "<script type='text/javascript'>window.location.href = '$location?username=$username&password=$password';</script>";
  }

?>












<?php

 /*
include 'php/db.php';
 session_start();
  if(isset($_POST['username']) && isset($_POST['password'])){
   $username = mysqli_real_escape_string($link, $_POST['username']);

    $password = $_POST['password'];
  

    $query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['adminname'] = $row['name'];
      $_SESSION['picture'] = $row['picture'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
            $location='admin/production/login.php';
          }
else {

$query = "SELECT * FROM `staff` WHERE `login`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      
      $row = mysqli_fetch_assoc($result);
     $_SESSION['username'] = $row['login'];
      $_SESSION['teachername'] = $row['fullname'];
      $_SESSION['picture'] = $row['image'];
$_SESSION['class'] = $row['class'];
$_SESSION['section'] = $row['section'];
$_SESSION['image2'] = $row['image2'];
      $_SESSION['id'] = $row['id'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
              $location='teacher/production/login.php';
     }
else{
     
$query = "SELECT * FROM `student` WHERE `login`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password' ";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['login'];
      $_SESSION['name'] = $row['fullname'];
$_SESSION['class'] = $row['class'];
      $_SESSION['picture'] = $row['picture'];

 $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
              $location='std/production/login.php';
       }
else {

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
              $location='parent/production/login.php';
        
  
    }else{
          $location='index.php';
      
    
    }
}

    }
 

}
   echo "<script type='text/javascript'>window.location.href = '$location?username=$username&password=$password';</script>";
   
  }
*/
?>