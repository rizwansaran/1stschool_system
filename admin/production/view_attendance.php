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
                <h3>Staff Attendance </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                 

                    	<?php
                     	 
          									 
                        $date=$_POST['date'];

                        $query = "SELECT * FROM `staff_atd` WHERE `date`='$date' ORDER BY t_id ASC";
                        $result = mysqli_query($link, $query);



?>

                      




 

   <form action="index.php" method="post">
                
                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                        
                            <thead>
                          <tr class="headings">
  <th class="column-title" style="text-align:center;">Staff ID</th>
                          
                            <th class="column-title" style="text-align:center;">Staff Name</th>
  <th class="column-title" style="text-align:center;">Date</th>
                          
                            <th class="column-title" style="text-align:center;">Attendance</th>
                           
                            
                          </tr>
                        </thead>
                       	
                       	 <?php

 while($row = mysqli_fetch_array($result))
                        {
                          $s_id=$row['t_id'];
                        
                          
                          $query1 = "SELECT * FROM `staff` WHERE `id`='$s_id'  ";
                          $result1 = mysqli_query($link, $query1);
                          while($r = mysqli_fetch_array($result1))
                          {
                          
                      
                       
                         ?>
                            
                        <tbody>
                          <tr class="even pointer">
  <td class=" " style="text-align:center;"><?php echo $r['id'];?></td>
                            <td class=" " style="text-align:center;"><?php echo $r['fullname'];?></td>
  <td class=" " style="text-align:center;"><?php echo $date;?></td>
                            <td class=" " style="text-align:center;">

 <p>
                       Present:
                        <input type="radio" class="flat" name="atd[]<?php echo $r['id']; ?>" id="genderM" value="1" <?php if($row['status'] =='1'){ echo "checked";} ?> /> 
Absent:
                        <input type="radio" class="flat" name="atd[]<?php echo $r['id']; ?>" id="genderF" value="0" <?php if($row['status'] =='0'){ echo "checked";} ?>/>
Leave:
 <input type="radio" class="flat" name="atd[]<?php echo $r['id']; ?>" id="genderF" value="2"  <?php if($row['status'] =='2'){ echo "checked";} ?>/>
                      </p>


                           
                             </td>
                           
                           
                              </tr>

                         
                        </tbody>
                           <?php
                           
                            }}?>
                      </table>
                    </div>
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                  
                       </form>
                      
                     </div>
                  	 </div>
                  <?php ?>
                   
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





















