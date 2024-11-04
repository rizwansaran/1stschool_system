
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

<?php if(!isset($_POST['class'])) { ?>
                    <form action="" method="post">
                  <div class="col-md-10">
                    <div class="row">

                   
                        <div class="col-md-6">
  <input type="hidden" name="id" value="<?php echo $_GET['sid']; ?>"  class="form-control"/>
<h3>CLass</h3>   
<select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" disabled>Select Class </option>
<?php
 $query1 = "SELECT DISTINCT class FROM `student`  ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>


<h3>Section</h3>   
<select id="class" class="form-control" name="section" style="width:100%;" >

 <option value="" disabled >Select Section </option>
<?php
 $query1 = "SELECT DISTINCT gender FROM `student`  ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['gender'];
if($class=='M'){

$class1="Boys";
}
else if($class=='F'){

$class1="Girls";
}
?>
   
                    
                        <option value="<?php echo $class;?> "><?php echo $class1;?></option>
 


                     <?php }?> 
<option value="M+F">Boy and Girls</option>
 
                      </select>

                   <br/><br/>

                                          <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Next</button>
                       </form>

<?php } if(isset($_POST['class'])){ ?>

                    <form action="sms_attendance_monthlyy.php" method="post">
                  <div class="col-md-10">
                    <div class="row">

                   
                        <div class="col-md-6">
  <input type="hidden" name="class" value="<?php echo $_POST['class']; ?>"  class="form-control"/>
 <input type="hidden" name="section" value="<?php echo $_POST['section']; ?>"  class="form-control"/>
 
<h3>CLass</h3>   
 <input type="text" name="id" value="<?php echo $_POST['class']; ?>"  class="form-control" disabled/>
<h3>Section</h3>   
 <input type="text" name="id" value="<?php echo $_POST['section']; ?>"  class="form-control" disabled/>

  <h3>Month</h3>
        <select id="batch" class="form-control" name="month" >
<?php 
$class=$_POST['class'];
$section=$_POST['section'];
$query2 = "SELECT DISTINCT `month` FROM `atd` WHERE `class`='$class' AND `section`='$section'  ORDER BY month ASC ";
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
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Send SMS</button>
                       </form>
<?php } ?>
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

                    
                  