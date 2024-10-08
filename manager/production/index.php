<?php
$page = $_SERVER['PHP_SELF'];
$sec = "60";
$sec1 = "0";
?>
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
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='index.php'">

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
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `student`";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>

            </div>
            


                 
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green"><?php 
              $query = "SELECT * FROM `student` WHERE `gender`='M'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `student`  WHERE `gender`='F'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Staff</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `staff`";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Male Staff</span>
              <div class="count green"><?php 
              $query = "SELECT * FROM `staff` WHERE `gender`='M'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Female Staff</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `staff` WHERE `gender`='F'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
          
          </div>
          <!-- /top tiles -->
 <b> <hr> </b>
          <!-- top tiles -->
          <div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Fee Collected</span> 
              <div class="count">
<?php
 $month = date("m", strtotime("+4 hours"));
              $query9 = "SELECT amount FROM fee WHERE feemonth= $month ";
  $result5 = mysqli_query($link,$query9);
             
             $fee = 0;
while ($row = mysqli_fetch_assoc($result5))
{    
       $fee = $fee + $row['amount'];        
   
}
       echo $fee;    
                  
               ?></div> 
<span class="count_bottom">This Month</span> 
</div>   
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
               <span class="count_top" style="color:red "><i class="fa fa-user"></i> Absent Students</span> 
              <div class="count" style="color:red "><?php
 $day = date("d", strtotime("+4 hours"));
              $query31 = "SELECT * FROM `atd` WHERE `day`= '$day' AND `status`= '0' ";
              $result31 = mysqli_query($link,$query31);
             
           
 $count1 = mysqli_num_rows($result31);
              echo $count1;
             
                  
               ?>  </div> 
<span class="count_bottom">Today</span> 
               

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top" ><i class="fa fa-user"></i> Present Students</span> 
              <div class="count" style="color:Green "><?php
 $day = date("d", strtotime("+4 hours"));
              $query31 = "SELECT * FROM `atd` WHERE `day`= '$day' AND `status`= '1' ";
              $result31 = mysqli_query($link,$query31);
             
           
 $count1 = mysqli_num_rows($result31);
              echo $count1;
             
                  
               ?></div> 
<span class="count_bottom">Today</span> 
</div>   

<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Inventory</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `inventory`";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
                 <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> System  Expiration Date</span>
              <div class="count red"><?php 
              $querys = "SELECT * FROM `sys`";
              $results = mysqli_query($link,$querys);
              $row = mysqli_fetch_assoc($results);
             $ddate= $row['d_date'];
echo date("d-m-Y", strtotime($ddate));
               ?></div>
            </div>
            </div>
          <!-- /top tiles -->
 


          <div class="row">
            </div>
            
              <div class="row">
<!-- Start to do list -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                     
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="text-align:center;">

                       

                        <div class="col-md-6 ">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                        <h3>Access Control</h3>
                        <hr> 
                        <p><a href="access.php">Grant Access</a></p>
<p><a href="access.php">Update Access</a></p>
                      
                        
                        </div>
                        </div>
                        </div>

                      
                       

                        <div class="col-md-6 ">
                        <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                        <h3>Key Control</h3>
                        <hr> 
                        <p><a href="add_kay.php">Add Serial Key</a></p>
<p><a href="#">Update Serial Key</a></p>
                      
                        
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
