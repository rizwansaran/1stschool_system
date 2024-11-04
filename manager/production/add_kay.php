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
                <h3>Add Serial Key </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">



                    <form action="action_key1.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                     

                  <div class="form-group">
<input  class="form-control" type="text" required="" name ="key" placeholder="Enter Serial Key" value="" style="width:50%;">
                 <h2> Select a Date:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;"> 
                  
                  <input placeholder="Select Date" class="form-control" type="text" required="" name ="date" value ="<?php echo date("Y-m-d", strtotime("+5 hours"));?>" style="width:50%;">
                </div>   </div><br/><br/><br/>

                                          <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Submit</button>
                       </form>

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
