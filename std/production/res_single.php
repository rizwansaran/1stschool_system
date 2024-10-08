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
                      <h2>Subject Name Result</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >

                    <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr >
                          
                          <th style="text-align:center;">Total Marks</th>
                          <th style="text-align:center;">Obtained Marks</th>
                          <th style="text-align:center;">Term</th>
                          <th style="text-align:center;">Year</th>
                          <th style="text-align:center;">Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="text-align:center;">100</td>
                          <td style="text-align:center;">10</td>
                          <td style="text-align:center;">2nd</td>
                          <td style="text-align:center;">2016</td>
                          <td style="text-align:center;">9th</td>
                        </tr>
                        
                      </tbody>
                    </table>

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
