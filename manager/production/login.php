<?php

require 'php/config.php';
if(isLoggedIn()) echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    


//header('location:index.php');
else{
  if(isset($_POST['username']) && isset($_POST['password'])){
   $username = mysqli_real_escape_string($link, $_POST['username']);

    $password = $_POST['password'];
    $query = "SELECT * FROM `manager` WHERE `username`='$username' AND `password`='$password' OR `id`='$username' AND `password`='$password'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
     
      $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['picture'] = $row['picture'];
$_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
 
 echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    
     // header('location:index.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'php/head.php.inc'; ?>
    <title>Login SMS!</title>
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form action="login.php" method="post">
              <h1>Manager Login</h1>
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

          </section>
        </div>




      </div>
    </div>
  </body>
</html>
