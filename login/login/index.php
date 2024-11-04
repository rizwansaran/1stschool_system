

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
 
      header('location:../../admin/production/index.php');
    }
else {

$query = "SELECT * FROM `staff` WHERE `login`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
      
      $row = mysqli_fetch_assoc($result);
$status=$row['status'];
if($status=='Active'){

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
 
      header('location:../../teacher/production/index.php');
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
           
      header('location:../../std/production/index.php');}
else{
header('location:index.php?msgg=Your Account is Inactive Please Contact Admin for Details!');

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
 
      header('location:../../parent/production/index.php');}
else{
header('location:index.php?msgg=Your Account is Inactive Plz Contact  Admin for Details!');

}
    }else{
      header('location:index.php?msgg=Incorrect username Or Password');
    }
}

    }
 

}
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'php/head.php.inc'; ?>
    <title>Login Panel...</title>



<style>
blink {
  -webkit-animation: 1s linear infinite condemned_blink_effect; // for Safari 4.0 - 8.0
  animation: 1s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for Safari 4.0 - 8.0
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
}
@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
}

</style>


  </head>

  <body class="">
    <div>
<?php
$d =date("Y-m-d"); 
$query = "SELECT * FROM `insti_name` ";
                          $result1 = mysqli_query($link, $query);
if(mysqli_num_rows($result1)>0) {
                         $res = mysqli_fetch_array($result1);
$name = $res['full_name'];
$logo = $res['logo'];

?>
<br><br>
<h1 align="center" font_size="30" style="color:white"> <img src="<?php echo $res['logo']; ?>" class="" width='50' height='50'> <?php echo $name; ?></h1>
<?php

 } else {
?>

<h1 align="center" font_size="30" style="color:white"> Institute name has not been Added Yet!</h1>

<?PHP }



 ?>
      <div class="login_wrapper">
        <div class="animate form login_form">




          <section class="login_content">
<?php
$d =date("Y-m-d"); 
$query = "SELECT * FROM `sys` ";
                          $result1 = mysqli_query($link, $query);
                         $res = mysqli_fetch_array($result1);
$ddate = $res['d_date'];
if($d > $ddate) {
?>
 <h2 style="color:red"> <?php error_reporting(0); echo $_GET['msg']; ?> </h2> <br>
 <form id="form" method="post" action="">
 <div class="row" ><label for="serial"><h2 style="color:white">Enter Serial Key</h2></label>
         <div>
                <input type="text" class="form-control" placeholder="e.g. HDF38-XXXXX-XXXXX-XXXXX" maxlength="23" name="key" required="" />
              </div>
 <button type="submit" class="btn btn-default submit" >Submit</button>   </div>
</form>
<h2 style="color:red"><?php echo " Enter Updated Serial Key <br><br> OR <br><br> <b>Contact on:</b>  +923076490559 <br><br> <b>Email on:</b>  rizwanali015@hotmail.com <br><br> for Serial Key:";?></h2>

<?php

if(isset($_POST['key'])){
   

    $key = $_POST['key'];
    $query43 = "SELECT * FROM `maintain` WHERE `serial_key`='$key' ";
    $result43 = mysqli_query($link, $query43);
    if(mysqli_num_rows($result43) > 0){
$row43 = mysqli_fetch_array($result43);
  $date = $row43['date'];
$query56 ="UPDATE `sys` SET `d_date`='$date'";
    $result56 = mysqli_query($link, $query56); 

   if($result56==TRUE){
header('location:index.php?msg= Access Granted');
exit();
}
else{
header('location:index.php?msg= Error while updating Serial Key'); }
 exit();
  } 
else{
header('location:index.php?msg= Serial Key Does Not Match'); }

}
     
 }
else{
 
$ddate11=date("Y", strtotime($ddate));
$ddate12=date("m", strtotime($ddate));
$ddate13=date("d", strtotime($ddate))-10;
$ddate14=date("d", strtotime($ddate));

$ddate111=date("Y");
$ddate121=date("m");
$ddate131=date("d");




if($ddate131>=$ddate13 && $ddate121==$ddate12 && $ddate111==$ddate11)
{
?>

<blink><h1 style="color:red"> Expiration Date: <?php echo date("d-m-Y", strtotime($ddate)); ?></h1></blink> 


<?php
}

else {

?>

<br><br>

<?php
}



 ?>



 <h2 style="color:green"> <?php error_reporting(0); echo $_GET['msg']; ?> </h2> 

<blink><h2 style="color:red"> <?php error_reporting(0); echo $_GET['msgg']; ?> </h2> </blink>




            <form action="authentication_user.php" method="post">
              <h1 style="color:white">Login Panel</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username OR Registration No." name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>             <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
            </form>
<?php }?>
          </section>
        </div>




      </div>
    </div>
 
  </body>
</html>




