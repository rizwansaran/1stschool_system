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
                <h3>Student Attendance </h3>
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
                     	 
          						  $class=$_POST['class'];
 $section=$_POST['section'];
                        $date=$_POST['date'];

                        $query = "SELECT * FROM `atd` WHERE `date`='$date'";
                        $result = mysqli_query($link, $query);
                        
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2>Class: <?php echo $class;?> - <?php 
if($section == 'M')
{
$sec= 'Boys';
}
elseif($section == 'F') {
$sec= 'Girls';
}
else{
$sec= 'Boys+Girls';
}
 echo  $sec;?></h2><hr>
                            <thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center;">Admission #</th>
                           
                            <th class="column-title" style="text-align:center;">Student Name</th>
  <th class="column-title" style="text-align:center;">Father Name</th>
                          
                            <th class="column-title" style="text-align:center;">Date</th>
                            <th class="column-title" style="text-align:center;">Marked Attendance</th>
                            
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))
                        {
                          $s_id=$row['std_id'];
                          $class=$_POST['class'];

$section=$_POST['section'];
if ($section=='M+F')
{
  $query1 = "SELECT * FROM `student` WHERE `id`='$s_id' AND `class`='$class' AND `status`='Active'";
}                          
   
else 
                       $query1 = "SELECT * FROM `student` WHERE `id`='$s_id' AND `class`='$class' AND `gender`='$section' AND `status`='Active'";
                          $result1 = mysqli_query($link, $query1);
                          while($r = mysqli_fetch_array($result1))
                          {
                          
                        ?>
                            
                        <tbody>
                          <tr class="even pointer">
  <td class=" " style="text-align:center;"><?php echo $r['id'];?></td>
                         
                            <td class=" " style="text-align:center;"><?php echo $r['fullname'];?></td>
                              <td class=" " style="text-align:center;"><?php echo $r['fname'];?></td>
                           
                            <td class=" " style="text-align:center;"><?php echo $date?>
                            </td>

                            

                            <?php if($row['status'] =='0'){ ?> 
                            <td class=" " style="text-align:center;color:red;">Absent</td>
                            <?php } 
else if($row['status'] =='2'){ ?> 
                            <td class=" " style="text-align:center;color:blue;">Leave</td>
                            <?php } 
                            else{?>
                            <td class=" " style="text-align:center;color:green;">Present</td>
                             <?php }?>




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
