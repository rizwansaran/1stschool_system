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
            <form action="login_action.php" method="post">
              <h1>Parent Login</h1>
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
          </section>
        </div>




      </div>
    </div>
  </body>
</html>
<?php }?>