<?php

require 'php/config.php';
if(isLoggedIn())
{header('location:index.php');}

else if(isset($_GET['username']) && isset($_GET['password'])){
    
   
   $username = mysqli_real_escape_string($link, $_GET['username']);

    $password = $_GET['password'];
    $query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password' ";
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
 
      header('location:index.php');
    }
  }
    

else{
  if(isset($_POST['username']) && isset($_POST['password'])){
   $username = mysqli_real_escape_string($link, $_POST['username']);

    $password = $_POST['password'];
    $query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password'";
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
 
      header('location:index.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'php/head.php.inc'; ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script>
    <title>Login admin!</title>

  </head>

  <body class="login">
    <div>
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
 <div class="row" ><label for="serial"><h2>Enter Serial Key</h2></label>
         <div>
                <input type="text" class="form-control" placeholder="e.g. HDF38-XXXXX-XXXXX-XXXXX" maxlength="23" name="key" required="" />
              </div>
 <button type="submit" class="btn btn-default submit" >Submit</button>   </div>
</form>
<h2 style="color:red"><?php echo " Enter Updated Serial Key Below <br><br> OR <br><br> <b>Contact on:</b>  +923076490559 <br><br> <b>Email on:</b>  rizwanali015@hotmail.com <br><br> for Serial Key:";?></h2>

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
header('location:login.php?msg= Access Granted');
exit();
}
else{
header('location:login.php?msg= Error while updating Serial Key'); }
 exit();
  } 
else{
header('location:login.php?msg= Serial Key Does Not Match'); }

}
     
 }
else{
 


 ?>
 <h2 style="color:green"> <?php error_reporting(0); echo $_GET['msg']; ?> </h2> 

<h2 style="color:red"> Your System Will Expire After  <?php echo date("d-m-Y", strtotime($ddate)); ?></h2> 
            <form action="login.php" method="post">
              <h1>Admin Login</h1>
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
