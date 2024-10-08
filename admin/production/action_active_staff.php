<?php
require 'php/config.php';
$error = "";
$selected = 0;
$fullname ="";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 
   if(isset($_GET['sid'])){
   
    $status = $_GET['status'];
    $id = $_GET['sid'];

 
if($status=="Active")  { 

$status1="Inactive";
} else {

$status1="Active";
  }

    $query = "UPDATE `staff` SET `status`='$status1' WHERE `id`='$id'";
        
$result = mysqli_query($link, $query);
if($result=="TRUE"){
          $error = "Updated Successfully";
header("location:active_staff.php?msg=Updated Successfully");
exit();


 }
else {
  $error = "Error While Updating...";
header("location:active_staff.php?msg=Error While Updating...");
}



}}
?>
