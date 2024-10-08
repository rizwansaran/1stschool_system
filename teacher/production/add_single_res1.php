<?php 
require 'php/config.php';





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
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="action_attendance1.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                    


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2>Name</h2><hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Student Name</th>
                            <th class="column-title" style="text-align:center;">Urdu</th>
                            <th class="column-title" style="text-align:center;">Maths</th>
                            <th class="column-title" style="text-align:center;">English</th>
                            <th class="column-title" style="text-align:center;">Islamiat</th>
                            <th class="column-title" style="text-align:center;">Social Study</th>
                            <th class="column-title" style="text-align:center;">Science</th>

                            
                            
                          </tr>
                        </thead>
                       	
                     
                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center;">Name</td>
                            <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required  style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                             <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                             <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                             <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                             <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                             <td class=" " style="text-align:center;">
                           <div class="input-box fullname">
                            <input type="text" placeholder="Your Name" name="name" value="100" required style="width:50%;text-align:center;">
                            </div>                         
                            </td>
                            
                         
                          </tr>

                         
                        </tbody>
                         
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                      
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
