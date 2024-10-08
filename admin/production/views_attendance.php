
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
                <h3>Add Attendance </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


                    <form action="view_attendance.php" method="post">
                   <div class="row">

                     
 <div class="col-md-4 col-xs-12">
                
                  <div class="form-group">
                  <label>Select a Date: *:</label>  
                  <input placeholder="Select Date" class="form-control" type="date" required="" name ="date" value ="<?php echo date("d-m-Y");?>" style="width:80%;">
                  </div>
</div>
                                       <div class="form-group"> <div class="col-md-6 col-xs-12">  <br/>    
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Select</button>
                  </div>    
</div>          </form>

                       <div>
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

                    
                  