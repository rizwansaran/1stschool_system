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
             
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
          			 $staff=$_POST['id'];			 
                       
 $query1 = "SELECT * FROM `student` WHERE `id`='$staff' ";
                          $result1 = mysqli_query($link, $query1);
                         $r = mysqli_fetch_array($result1);
                          
 
                       
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h3>Name of Student: <?php echo $r['fullname'];?></h3> <hr>
<h2>Monthly Attendance Report for 


<?php

$year = $_POST['year']; 

  $batch= $_POST['month'];


if($batch== 1){
$month= "January";
}
elseif($batch== 2)
{
$month= "February";
}
elseif($batch== 3)
{
$month= "March";
}
elseif($batch== 4)
{
$month= "April";
}
elseif($batch== 5)
{
$month= "May";
}
elseif($batch== 6)
{
$month= "June";
}
elseif($batch== 7)
{
$month= "July";
}
elseif($batch== 8)
{
$month= "August";
}
elseif($batch== 9)
{
$month= "September";
}
elseif($batch== 10)
{
$month= "October";
}
elseif($batch== 11)
{
$month= "November";
}
elseif($batch== 12)
{
$month= "December";
}


echo $month;

 ?> - <?php echo $year; ?> </h2>
                            <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

                         
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Date</th>
   <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Day</th>
   
                          
   
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Marked Attendance</th>
                            
                            
                          </tr>
                        </thead>
                       	
                            
                        <tbody>
                          <tr class="even pointer">
                           
                       	 <?php
$id=$r['id'];
 $date1=$_POST['month'];
$year = $_POST['year']; 

 $query = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1' AND `year`='$year'";
                        $result = mysqli_query($link, $query);
              $total= mysqli_num_rows( $result); 
$count=1;          
 while($row = mysqli_fetch_array($result))
                        {
                     $timestamp = strtotime($row['date']);

                          $day1 = date('l', $timestamp);
                          
                         
                          
                        ?>
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  $dd=$row['date']; echo date("d-m-Y", strtotime($dd))?>
                            </td>

                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $day1; ?></td>

   

                            <?php if($row['status'] =='0'){ ?> 
                            <td class=" " style="text-align:center;color:red; border: 1px solid #dddddd;">A</td>
                            <?php } 
                            else if($row['status'] =='1'){?>
                            <td class=" " style="text-align:center;color:green; border: 1px solid #dddddd;">P</td>
                             <?php }

                            else {?>
                            <td class=" " style="text-align:center;color:blue; border: 1px solid #dddddd;">L</td>
                             <?php }?>





                          </tr>

                         
                        </tbody>
                           <?php

                        $count++;   
                            }?>
                      </table>


   
 </div>

<div class="row">    <table class= "col-md-12"  width='100%'> <tbody>

<?php
$id=$r['id'];
 $date1=$_POST['month'];
$year = $_POST['year']; 

$query11 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1'AND `year`='$year' AND `status`='0'";
                        $result11 = mysqli_query($link, $query11);
                        $absents= mysqli_num_rows( $result11);
$query12 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1' AND `year`='$year' AND `status`='1'";
                        $result12 = mysqli_query($link, $query12);
                        $presents= mysqli_num_rows( $result12);

 ?>
 <tr class="even pointer">
                            <td class=" "><h2>Total Absents: <?php echo $absents; ?></h2></td>
                            <td class=" "><h2>Total Presents: <?php echo $presents; ?></h2> </td>
  <td class=" "><h2>Total Leaves: <?php echo   $total-($presents+$absents); ?></h2> </td>
                           
                            
</tbody>
  
                      </table>


   </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                      
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
