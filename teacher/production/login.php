<?php
require 'php/config.php';
if(isLoggedIn()) {
    header('location:index.php'); 
    
}
else {
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
<?php
$d =date("Y-m-d"); 
$query = "SELECT * FROM `sys` ";
                          $result1 = mysqli_query($link, $query);
                         $res = mysqli_fetch_array($result1);
$ddate = $res['d_date'];
if($d > $ddate) { 
?>

<h2 style="color:red"><?php echo "Your Access Time is Expired Contact on 03076490559 or rizwanali015@hotmail.com for Access:";?></h2>

<?php
}
else{

 ?>
            <form action="login_action.php" method="post">
              <h1>Teacher Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username OR Registration No." name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>
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
<?php }?>

