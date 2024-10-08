<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>School Management System!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                   <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 

                      <div class="">
                      
 <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              
                        <h3>Choose File to upload</h3>  
                           
                               <form id="demo-form" data-parsley-validate action="upload_video.php" method="post" enctype="multipart/form-data">

<?php   $date = $_POST['date'];
    $subject = $_POST['subject']; ?>
                 
      
  <input type="hidden" id="confirm_password" class="form-control" name="date" value="<?php  echo $date; ?> " required placeholder="">
                              
 <input type="hidden" id="confirm_password" class="form-control" name="subject" value="<?php  echo $subject; ?> " required placeholder="">
 
              
                      <input type="file" id="image" class="form-control btn btn-primary" name="file" data-parsley-trigger="change" required />
 <br>
                      <button type="submit" name="submit" class="btn btn-primary">Upload</button>

                    </form>


             
              </div>
            </div>  </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
