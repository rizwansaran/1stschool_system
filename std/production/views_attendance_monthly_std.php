
                  <?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
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
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


                    <form action="view_attendance_monthly_std.php" method="post">
                  <div class="col-md-10">
                    <div class="row">

                   
                        <div class="col-md-6">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"  class="form-control"/>
  
  <h3>Month</h3>
        <select id="batch" class="form-control" name="month" >
<?php 
$query2 = "SELECT DISTINCT `month` FROM `atd` ORDER BY month ASC ";
                       $result2 = mysqli_query($link, $query2);
 while($fee12 = mysqli_fetch_array($result2)){

   $batch= $fee12['month']; 
//$batch = date("n"); 
//$year = date("Y"); 

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
?>
                                      <option value="<?php echo $batch; ?>"><?php echo $month; ?></option>
                                   <?php }?>
                                  </select>
  

                 <br/><br/>

                                          <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">View</button>
                       </form>

                       <div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
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

                    
                  