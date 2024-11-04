<?php
require 'php/config.php';

if(!isLoggedIn()){
  header('location:login.php');
}
 ?>
<?php
  $tid= $_POST['id'];
$new_password = $_POST['pass1'];

$query = "UPDATE `student` SET `password`='$new_password' WHERE `id`= '$tid' ";
          $result = mysqli_query($link, $query);

if ( $result == TRUE) {
	header("location:profile_std.php?msg=Password Updated");
exit();
}
else{
header("location:profile_std.php?msg=Record updating Failed");
}

?>
