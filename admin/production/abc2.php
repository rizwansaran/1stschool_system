<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['student'])){
    $id = $_POST['student'];
    $month = $_POST['month'];
$class = $_POST['class'];
$year = $_POST['batch'];
    $rfee = $_POST['registrationfee'];
    $efee = $_POST['examsfee'];
$tefee = $_POST['teutionfee'];
    $tfee = $_POST['transportfee'];
   
    $others = $_POST['others'];
    
    $query = "INSERT INTO `chalan`(`id`,`studentid`, `class`, `feemonth`, `year`, `registrationfee`, `examsfee`, `teutionfee`, `transportfee`, `others`) VALUES ('', '$id','$class', '$month', '$year','$rfee', '$efee', '$tefee', '$tfee', '$others')";
    $result = mysqli_query($link, $query);
   if($result=="TRUE"){
          $error = "Updated Successfully";
header("location:active_students.php?msg=Chalan Genrated Successfully");
exit();


 }
else {
  $error = "Error While Updating...";
header("location:active_students.php?msg=Error While Genrating Chalan...");
}

    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receive fee!</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script>
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
                <h3>Ledger</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New fee<?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->

  <?php if(!isset($_GET['sid'])){
                      
         ?>

                    <form id="demo-form" data-parsley-validate action="abc.php" method="post" enctype="multipart/form-data">
                      <label for="id">Student  * :</label>
                      <div class="row"?>
                        <div class="col-md-6">
                         <select id="class" class="form-control" name="id" style="width:100%;" >

 <option value="">Select Student </option>
<?php

  $query11 = "SELECT * FROM `student` ORDER BY fullname ASC ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];


?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname?></option>
                     <?php }?>  
                      </select>
</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php }
                    if (isset($_GET['sid'])) {
                       $id = $_GET['sid'];
$batch = date("n");
$year = date("Y"); 

                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>Name: <?php echo $student['fullname'];?></h3></div>
                          <div class="col-md-4"><h3>Father name: <?php echo $student['fname'];?></h3></div>
                          <div class="col-md-4"><h3>Class: <?php echo $student['class'];?></h3></div>
                        </div>
                        <br><br><br>
                          <form action="" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="student"/>
		    <input type="hidden" value="<?php echo $student['class'];?>" name="class"/>

                            <div class="row">
                              <div class="col-md-4">
                                <h3>Year</h3>
                                <select id="batch" class="form-control" name="batch" >
                                     <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
         <option value="<?php echo date("Y")-1;?>"><?php echo date("Y")-1;?></option>
                                                          
   </select>
                                    
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                                <h3>Month</h3>
                                <div class="row">
                                  <select id="batch" class="form-control" name="month" >
<?php  
$batch = date("n");
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
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                  
                                    <option value="09">September</option>
  <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>\
                                  </select>
                                </div>
                              </div>
                              
                            </div>
                            <br><br>
                            <div class="row">
                              <div class="col-md-4">
                              
                                <input type="hidden" name="registrationfee" value="0" class="form-control"/>
<input type="hidden" name="examsfee" value="0"  class="form-control"/>
<h3>Tuition fee</h3>




<input type="text" name="teutionfee"  class="form-control"/>
<h3>Transport fee</h3>
<input type="number" name="transportfee"  class="form-control"/>

                              
                              
                                                           
 </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                              
                              
<h3>Others</h3>
<input type="number" name="others"  class="form-control"/>
                              
                              </div>
                            </div>
                            <br><br>
                            <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                              </div>
                              
                            </div>
                          </form>
                          
                        
                        <?php
                       }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No student found!</h3></div>                
                        </div>
                        <?php
                       }
                     } 
                    ?>
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
