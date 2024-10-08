
                         <?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['submit'])){
 $month = $_POST['month'];
$class = $_POST['class'];
$year = $_POST['batch'];
    $rfee = $_POST['registrationfee'];
    $efee = $_POST['examsfee'];
$tefee = $_POST['teutionfee'];
    $tfee = $_POST['transportfee'];
   
    $others = $_POST['others'];
$query2 = "SELECT * FROM `classchalan` WHERE `feemonth`='$month' AND `year`='$year' AND `class`='$class'";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){


 $query = "UPDATE `classchalan` SET `registrationfee`=' $rfee',`examsfee`='$efee',`teutionfee`='$tefee',`transportfee`='$tfee',`others`='$others' WHERE `feemonth`='$month' AND `year`='$year' AND `class`='$class'";
          $result = mysqli_query($link, $query);
 $error = "Chalan Updated Successfully...!";
                       
}
else {

    
    $query = "INSERT INTO `classchalan`(`id`, `class`, `feemonth`, `year`, `registrationfee`, `examsfee`, `teutionfee`, `transportfee`, `others`) VALUES ('', '$class', '$month', '$year','$rfee', '$efee', '$tefee', '$tfee', '$others')";
    $result = mysqli_query($link, $query);
    if($result== TRUE) 
$error = "Submitted succesfully!";
 else
{
$error = "Error....!";
}

    }
  }}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receive fee!</title>
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
                    <h2>Chalan!<?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                 
                        <br>
                          <form action="classchalan.php" method="POST">
                          <label for="class"> <h3>Class  :</h3></label>
                                             <select id="class" class="form-control" name="class" style="width:30%;" >

 <option value="">Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class, class FROM `subject` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>

                            <div class="row">
                              <div class="col-md-4">
                                <h3>Year</h3>
                                <div class="row">
                                  <select id="batch" class="form-control" name="batch" >
                                    
                                    <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
  <option value="<?php echo date("Y")-1;?>"><?php echo date("Y")-1;?></option>
     
                                   </select>
                                </div>
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
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">October</option>
                                    <option value="10">September</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>\
                                  </select>
                                </div>
                              </div>
 <div class="col-md-2"></div>
                              <div class="col-md-4">
                              
                                <div class="row">
                              
 <h3>Tiution Fee</h3>
                              
                                  <select id="batch" class="form-control" name="teutionfee" >
                                    
                                    <option value="1500"> 1500</option>
  <option value="1800">1800</option>
 <option value="2000">2000</option>
     
                                   </select>
                                </div>
                              </div>
                              
                            </div>
                            <br><br>
                            <div class="row">
                              <div class="col-md-4">
                               
                                <input type="hidden" name="registrationfee" value="0"  class="form-control"/>


<input type="hidden" name="examsfee" value="0"  class="form-control"/>

<h3>Transport Fee</h3>

<input type="number" name="transportfee" class="form-control"/>

                              
                              
                                                           
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
                                <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button>
                              </div>
                              
                            </div>
                          </form>
                          
                        
                       
                        <br><br><br>
                        <div class="row">
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
