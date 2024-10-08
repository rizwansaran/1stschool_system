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
                 

                    	<?php
                     	 
          						
          						 $date = $_POST['date'];

 $query1 = "SELECT * FROM `staff_atd` WHERE `date`='$date'";
                        $result1 = mysqli_query($link, $query1);
if(mysqli_num_rows($result1)>0){


?>

                         <h2 style="color:red">Record Already Exists!...</h2>

<form action="action_atd1.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">



                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                         
                         
<?php
                     

      $date = $_POST['date'];
 
                         ?>
                        
                    
                    </div>
<input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">

                      <div class="form-group">
<button type="submit" name="submit1" class="form-control btn btn-primary pull-right" style="width:15%;">Delete</button>    
                       </form>
                      



<?php } else{ 
 $date = $_POST['date'];

                         
                        $query = "SELECT * FROM `staff` WHERE `status`='Active'";
                        $result = mysqli_query($link, $query);

                       
                         ?>

   <form action="action_attendance1.php" method="post">
                
                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                              <h2> Staff ( Attendance Date:  <?php echo date('d-m-Y',strtotime($date)) ;?> ) </h2>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Mark Attendance</th>
                           <th class="column-title" style="text-align:center;">Time </th>
                           
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))


                        {?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $row['fullname'];?></td>
                            <td class=" " style="text-align:center;">

 <p>
                       Present:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderM" value="1" checked required /> 
Absent:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="0" />
Leave:
 <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="2" />
                      </p>


                           
                             </td>
                             <td class=" " >
<?php  $time= date("H:i:s", strtotime("+3 hours"));?>
<div style="text-align:center;" >
 <input placeholder="Select Time" class="form-control" type="time" required="" name ="time" value ="<?php echo $time; ?>" style="width:50%;">
                </div> </td>
                           
                              </tr>
     <input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">
      <input  class="form-control" type="hidden" required="" name ="sid[]" value="<?php echo $row['id']; ?>" style="width:50%;">
                    
                        </tbody>
                           <?php
                         /*  $sid[]=$row['id'];
                           $_SESSION['date']=$date;
                           $_SESSION['sid'] = $sid; */
                            }?>
                      </table>
                    </div>
                       <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                  
                       </form>
                      
                     </div>
                  	 </div>
                  <?php }?>
                   
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
