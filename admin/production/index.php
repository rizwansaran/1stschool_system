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
<!--script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script-->
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
              <span class="count_top"><i class="fa fa-user"></i> Active Students</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `student` WHERE `status`='Active'";
              $result = mysqli_query($link,$query);
              $count_students = mysqli_num_rows($result);
              echo $count_students;
               ?></div>

            </div>
            


                 
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Active Males</span>
              <div class="count green"><?php 
              $query = "SELECT * FROM `student` WHERE `gender`='M' AND `status`='Active'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Active Females</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `student`  WHERE `gender`='F' AND `status`='Active'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Staff</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `staff` WHERE `status`='Active'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Male Staff</span>
              <div class="count green"><?php 
              $query = "SELECT * FROM `staff` WHERE `gender`='M' AND  `status`='Active'";
              $result = mysqli_query($link,$query);
              $count = mysqli_num_rows($result);
              echo $count;
               ?></div>
            </div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Female Staff</span>
              <div class="count"><?php 
              $query = "SELECT * FROM `staff` WHERE `gender`='F' AND  `status`='Active'";
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
  <div class="fee-amount" style="cursor: pointer;">
    <i class="fee-amount-label" style="font-size:26px;">Fee Amount</i>
    <i class="fee-amount-value hidden"><?php
      $month1 = date("n", strtotime("+4 hours"));
      $year = date("Y", strtotime("+4 hours"));

      $query = "SELECT amount FROM fee WHERE `feemonth`= '$month1' AND `feeyear`='$year'";
      $result = mysqli_query($link,$query);

      $fee = 0;
      while ($row = mysqli_fetch_assoc($result))
      {    
        $fee = $fee + $row['amount'];        
      }
      echo $fee;    
      $batch=$month1;
      if($batch== "01"){
        $month= "January";
      }
      elseif($batch== "02")
      {
        $month= "February";
      }
      elseif($batch=="03")
      {
        $month= "March";
      }
      elseif($batch== "04")
      {
        $month= "April";
      }
      elseif($batch== "05")
      {
        $month= "May";
      }
      elseif($batch== "06")
      {
        $month= "June";
      }
      elseif($batch== "07")
      {
        $month= "July";
      }
      elseif($batch== "08")
      {
        $month= "August";
      }
      elseif($batch== "09")
      {
        $month= "September";
      }
      elseif($batch== "10")
      {
        $month= "October";
      }
      elseif($batch== "11")
      {
        $month= "November";
      }
      elseif($batch== "12")
      {
        $month= "December";
      }
    ?></i>
  </div>  </div>
  <span class="count_bottom">For <?php echo $month ;?>-<?php echo $year ;?>   </span> 
</div>
<script>
  // Add click event listener to fee amount element
  document.querySelector('.fee-amount').addEventListener('click', function() {
    // Toggle the visibility of the fee amount value and label
    document.querySelector('.fee-amount-value').classList.toggle('hidden');
    document.querySelector('.fee-amount-label').classList.toggle('hidden');
  });
</script>

<style>
  .fee-amount-value.hidden {
    display: none;
  }
  .fee-amount-label.hidden {
    display: none;
  }
</style>

     
     
     
     
     
     
     
     
     
     
              
<!--div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Fee Collected</span> 
              <div class="count"><?php
 $month1 = date("n", strtotime("+4 hours"));
 $year = date("Y", strtotime("+4 hours"));

                $query = "SELECT amount FROM fee WHERE `feemonth`= '$month1' AND `feeyear`='$year'";
  $result = mysqli_query($link,$query);
             
             $fee = 0;
while ($row = mysqli_fetch_assoc($result))
{    
       $fee = $fee + $row['amount'];        
   
}
       echo $fee;    
       $batch=$month1;
if($batch== "01"){
$month= "January";
}
elseif($batch== "02")
{
$month= "February";
}
elseif($batch=="03")
{
$month= "March";
}
elseif($batch== "04")
{
$month= "April";
}
elseif($batch== "05")
{
$month= "May";
}
elseif($batch== "06")
{
$month= "June";
}
elseif($batch== "07")
{
$month= "July";
}
elseif($batch== "08")
{
$month= "August";
}
elseif($batch== "09")
{
$month= "September";
}
elseif($batch== "10")
{
$month= "October";
}
elseif($batch== "11")
{
$month= "November";
}
elseif($batch== "12")
{
$month= "December";
}
           
               ?></div> 
<span class="count_bottom">For <?php echo $month ;?>-<?php echo $year ;?>   </span> 
</div-->   
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
               <span class="count_top" style="color:red "><i class="fa fa-user"></i> Absent Students</span> 
              <div class="count" style="color:red "><?php
 $day = date("d", strtotime("+4 hours"));
 $month = date("m", strtotime("+4 hours"));
 $year = date("Y", strtotime("+4 hours"));
              $query31 = "SELECT * FROM `atd` WHERE `day`= '$day' AND `month`= '$month'AND `year`= '$year' AND `status`= '0' ";
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
 $month = date("m", strtotime("+4 hours"));
 $year = date("Y", strtotime("+4 hours"));
   
              $query31 = "SELECT * FROM `atd` WHERE `day`= '$day'  AND `month`= '$month'AND `year`= '$year' AND `status`= '1' ";
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
              <span class="count_top" style="color:red "><i class="fa fa-clock-o"></i> Expiration Date </span>
              <div class="count red"><?php 
              $querys = "SELECT * FROM `sys`";
              $results = mysqli_query($link,$querys);
              $row = mysqli_fetch_assoc($results);
              $ddate= $row['d_date'];
echo date("d-m-Y", strtotime($ddate));
               ?></div>
            </div>
            </div>
            <b> <hr> </b>
          <!-- top tiles -->
          <div class="row tile_count">
              
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Fee</span>
              
              <div class="count">
            
 <div class="fee-amount1" style="cursor: pointer;">
               <i class="fee-amount-label1" style="font-size:26px;">Total Fee</i>
    <i class="fee-amount-value1 hidden">


              <?php 
           // First, retrieve the IDs of all active students from the `student` table
$student_query = "SELECT id FROM `student` WHERE `status` = 'Active'";
$student_result = mysqli_query($link, $student_query);

if ($student_result) {
    // Initialize total fees for all active students
    $total_fee = 0;

    // Loop through each active student
    while ($student_row = mysqli_fetch_assoc($student_result)) {
        // Get the student ID
        $student_id = $student_row['id'];

        // Calculate the total fees for the student for the specified month and year
        $query = "SELECT 
            SUM(teution_fee) AS total_fee, 
            SUM(registration_fee) AS total_reg_fee, 
            SUM(admission_fee) AS total_adm_fee, 
            SUM(transport_fee) AS total_trans_fee, 
            SUM(sports_fee) AS total_sports_fee, 
            SUM(paper_fund) AS total_paper_fund, 
            SUM(books_charges) AS total_books_charges, 
            SUM(uniform_charges) AS total_uniform_charges, 
            SUM(annual_charges) AS total_annual_charges, 
            SUM(others) AS total_others 
            FROM chalan 
            WHERE `feemonth` = '$month1' AND `year` = '$year' AND `student_id` = '$student_id'";

        $result = mysqli_query($link, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Add the student's fees to the total
            $total_fee += $row['total_fee'] + $row['total_reg_fee'] + $row['total_adm_fee'] + $row['total_trans_fee'] + $row['total_sports_fee'] + $row['total_paper_fund'] + $row['total_books_charges'] + $row['total_uniform_charges'] + $row['total_annual_charges'] + $row['total_others'];
        } else {
            echo "Error executing the query: " . mysqli_error($link);
        }
    }

    // Now you have the total fees for all active students
    echo $total_fee;
} else {
    echo "Error executing the query: " . mysqli_error($link);
}

                               ?>
                               </i>
                               </div>
                                </div>
            </div>
             <script>
  // Add click event listener to fee amount element
  document.querySelector('.fee-amount1').addEventListener('click', function() {
    // Toggle the visibility of the fee amount value and label
    document.querySelector('.fee-amount-value1').classList.toggle('hidden');
    document.querySelector('.fee-amount-label1').classList.toggle('hidden');
  });
</script>

<style>
  .fee-amount-value1.hidden {
    display: none;
  }
  .fee-amount-label1.hidden {
    display: none;
  }
</style> 
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Pending  Fee</span>
              <div class="count">
              <div class="fee-amount2" style="cursor: pointer;">
               <i class="fee-amount-label2" style="font-size:26px;">Pending Fee</i>
    <i class="fee-amount-value2 hidden">
              <?php 
             $pending_fee=$total_fee - $fee;
              echo $pending_fee;
               ?>
               </i></div>
            </div>
            </div>
            
            
             <script>
  // Add click event listener to fee amount element
  document.querySelector('.fee-amount2').addEventListener('click', function() {
    // Toggle the visibility of the fee amount value and label
    document.querySelector('.fee-amount-value2').classList.toggle('hidden');
    document.querySelector('.fee-amount-label2').classList.toggle('hidden');
  });
</script>

<style>
  .fee-amount-value2.hidden {
    display: none;
  }
  .fee-amount-label2.hidden {
    display: none;
  }
</style> 
            
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Students Fee Paid</span>
              <div class="count"><?php 
              $record_count = 0;
             $query = "SELECT COUNT(*) AS record_count FROM fee  WHERE `feemonth` = '$month1' AND `feeyear` = '$year'";
                $result = mysqli_query($link, $query);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $record_count = $row['record_count'];
                    echo $record_count;
                } 
               ?></div>
            </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Students Fee Pending</span>
              <div class="count"><?php 
              $pending_fee_count=$count_students - $record_count;
              echo $pending_fee_count;
               ?></div>
            </div>
            </div>
          <!-- /top tiles -->
 


          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Inventory</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                    <?php
                    $query = "SELECT * FROM `inventory` ORDER BY id DESC LIMIT 5";
                    $result = mysqli_query($link,$query);
                    while($row = mysqli_fetch_array($result)){
                     ?>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php echo $row[1]; ?></a>
                                          </h2>
                            <div class="byline">
                              <span><?php echo $row[2]; ?></span> at <a><?php echo $row[3]; ?></a>
                            </div>
                          </div>
                        </div>
                      </li>

                      <?php }?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
<h2>Subjects Added </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">
                           <?php
$insti = "SELECT * FROM `insti_name`";
          $rinsti = mysqli_query($link, $insti);
    if(mysqli_num_rows($rinsti) < 1){ ?>
 
                      <h2>Insitution Details</h2>
                            <p>
                               <h2><a href="institution.php">Add Details</a></h2>
                          <?php }?>

  <?php 
$quera1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC";
          $resulta = mysqli_query($link, $quera1);
if(mysqli_num_rows($resulta) < 1){?> 
 <h2 style="color:red "><?php echo "No Record Found..."; ?> <hr> </h2>
   
  <?php }
else{
 while($row12 = mysqli_fetch_array($resulta)){
$class= $row12['class'];

 ?>

                    
                             <h2  style="color:green "><?php echo $class; ?> <hr> </h2>
                          <?php }}?>
                           </ul>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End to do list -->
<!-- Start to do list -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
<h2>Result Added</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
 
                      <div class="">
                        <ul class="to_do">
 <?php if(!isset($_POST['submit'])){ ?>
<form action="index.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                     

                 <h2> Select the Term:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="term" style="width:100%;" >

                        <option value="1 ">1st</option>
                        <option value="2 ">2nd</option>
                        <option value="3 ">3rd</option>
                  </select>
<br/>
                                          <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary" style="width:100%;">Select</button>
                       </form>
                         
  <?php }
if(isset($_POST['submit'])){
$year= date("Y");
$term= $_POST['term'];
$quera1 = "SELECT DISTINCT class, section FROM `result` WHERE `term`='$term' AND `year`='$year' ORDER BY class ASC ";
          $resulta = mysqli_query($link, $quera1);
if(mysqli_num_rows($resulta)>0){
    while($row12 = mysqli_fetch_array($resulta)){
$class= $row12['class'];
$section= $row12['section'];
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


 ?>
 
                      
                            <p>
                              <h2 style="color:green "><?php echo $class; echo $sec; ?>  <hr> </h2>
                          <?php }}
else{ ?>
 <h2  style="color:red "><?php echo "Result Not Uploaded Yet...!"; ?> <hr> </h2>
<?php }}
?>
                           </ul>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End to do list -->

 <!-- Start to do list -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
<h2>Today Atend.</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">
                          
  <?php 

$day= date("d", strtotime("+4 hours"));
$month = date("m", strtotime("+4 hours"));
 $year = date("Y", strtotime("+4 hours"));
   
  

$quera11 = "SELECT DISTINCT class, section FROM `atd` WHERE `day`='$day'  AND `month`= '$month'AND `year`= '$year' ORDER BY class ASC ";
          $resulta1 = mysqli_query($link, $quera11);
if(mysqli_num_rows($resulta1)>0){
    while($row121 = mysqli_fetch_array($resulta1)){
$class1= $row121['class'];
$section1= $row121['section'];
if($section1 == 'M')
{
$sec1= 'Boys';
}
elseif($section1 == 'F') {
$sec1= 'Girls';
}
else{
$sec1= 'Boys+Girls';
}

 ?>
 
                      
                            <p>
                              <h2 style="color:green "><?php echo $class1;?> <?php echo $sec1; ?>  <hr> </h2>
                          <?php }}
else{ ?>
 <h2  style="color:red "><?php echo "Attendance Not Uploaded Yet...!"; ?> <hr> </h2>
<?php }
?>

                           </ul>



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
