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
                    <form action="action_edit_attendance1.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                      <?php 

          						 $date = $_POST['date'];
                         
                          $query = "SELECT * FROM `staff_atd`WHERE  `date`='$date' ";
                            $result = mysqli_query($link, $query);
                            $r = mysqli_fetch_array($result);
                            $status=$r['status'];

  						
                        $query = "SELECT * FROM `staff` WHERE `status`='Active' ";
                        $result = mysqli_query($link, $query);

                       
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                              <h2> Staff ( Attendance Date:  <?php echo date('d-m-Y',strtotime($date)) ;?> ) </h2><hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Mark Attendance</th>
                            
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))
                        {?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $row['fullname']?></td>
                            <td class=" " style="text-align:center;">
                          
                            <?php 

$std_id=$row['id'];
$query12 = "SELECT * FROM `staff_atd` WHERE `t_id`='$std_id' AND `date`='$date' ";
                        $result12 = mysqli_query($link, $query12);
$row12 = mysqli_fetch_array($result12)
 ?>

 <p>
                       Present:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderM" value="1" <?php if($row12['status'] =='1'){ echo "checked";} ?> /> 
Absent:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="0" <?php if($row12['status'] =='0'){ echo "checked";} ?>/>
Leave:
 <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="2"  <?php if($row12['status'] =='2'){ echo "checked";} ?>/>
                      </p>
                             </td>
                            
                         
                          </tr>

                         
                        </tbody>
                           <?php
                           $sid[]=$row['id'];
                           $_SESSION['date']=$date;
                           $_SESSION['sid'] = $sid;
                            }?>
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
