<?php
require 'php/config.php';

if(!isLoggedIn()){
  header('location:login.php');
}
 ?>
<?php
  $tid= $_SESSION['id'];
$new_password = $_POST['pass1'];

$query = "UPDATE `parent` SET `password`='$new_password' WHERE `id`= '$tid' ";
          $result = mysqli_query($link, $query);

if ( $result == TRUE) {
	header("location:profile.php?msg=Password Updated");
exit();
}
else{
header("location:profile.php?msg=Record updating Failed");
}

?>
