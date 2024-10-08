
                  <?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Income </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
<div class="col-xl-6 col-md-6 col-xs-12">
  <h2>Edit Income <?php echo '    -    '.$error; 
                  ?></h2>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="fullname"> Name * :</label>
                      <input type="text" id="fullname" class="form-control" value="<?php echo  ?>" name="name" required /> <br> <br>
                      <label for="city">Date * :</label>
                      <input type="date" id="cityofbirth" class="form-control" value="<?php echo  ?>" name="date" data-parsley-trigger="change" required /> <br><br>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control" value="<?php echo  ?>" name="price" data-parsley-trigger="change" required /> <br><br>
                      <br>
                      <button type="submit" name="submit" class="btn btn-primary">update</button>

                    </form>
                    <!-- end form for validations -->

                  </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
                  </div>
                  
                </div>
          
                   
                      <br>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
