<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
$_SESSION['sid'] = $_GET['id'];
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
          <!-- top tiles -->
          <div class="row tile_count">
            <h1 style="margin-left:20px;"><a href ="index.php">Dashboard</h1></a><hr>
            </div>
          
          <!-- /top tiles -->

         


            
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Welcome to the Student Dashboard</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="text-align:center;">

                        <div class="col-md-4 ">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                        <h3 >Attendance</h3> <hr> 
                        <p><a href ="atd_all.php">View Attendance</a></p>
                     
                        </div>
                        </div>
                        </div>

                        <div class="col-md-4 ">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                        <h3>Result</h3>
                        <hr> 
                        <p><a href ="res_all.php">View Result</a></p>
                        </div>
                        </div>
                        </div>

                         <div class="col-md-4 ">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                        <h3>Diary</h3><hr> 
                        <p><a href ="diary_all.php">View Daily Diary</a></p>
                        </div>
                        </div>
                        </div>

                        

                    </div>
                  </div>
                </div>
                <!-- End to do list -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
