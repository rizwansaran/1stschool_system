<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_POST['student'])){
    $id = $_POST['student'];
 $class = $_POST['class'];
    $year = $_POST['batch'];
    $month = $_POST['month'];
    $total = $_POST['challan_no'];
$tamount = $_POST['tamount'];
    $amount = $_POST['amount'];
 $d =date("Y-m-d"); 
$query2 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `challan_no`='$total' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) < 1) {
 $query = "INSERT INTO `fee`(`studentid`,`class`, `feemonth`, `feeyear`, `challan_no`, `tamount`, `amount`, `date`) VALUES ('$id','$class', '$month', '$year','$total', '$tamount', '$amount', '$d')";
    $result = mysqli_query($link, $query);
   
if($result=="TRUE"){
          $error = "Updated Successfully";
header("location:active_students.php?msg=Fee Added Successfully");
exit();


 }
else {
  $error = "Error While Updating...";
header("location:active_students.php?msg=Error While Adding Fee...");
}


}
else {
$query ="UPDATE `fee` SET `amount`='$amount', `tamount`='$tamount', `date`='$d' WHERE `studentid`='$id' AND `challan_no`='$total'";
   
                        $result = mysqli_query($link, $query);
 
 if($result=="TRUE"){
          $error = "Updated Successfully";


 }
else {
  $error = "Error While Updating...";

}


}


    }


 

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receive fee!</title>
    <?php include 'php/head.php.inc'; ?>
<style>
blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; // for Safari 4.0 - 8.0
  animation: 2s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for Safari 4.0 - 8.0
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}
@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

</style>

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
                    <form id="demo-form" data-parsley-validate action="addfee.php" method="post" enctype="multipart/form-data">
                     
                      <div class="row"?>
                        <div class="col-md-6">
                      <select id="class" class="form-control" name="id" style="width:100%;" >

 <option value="">Select Student </option>
<?php

  $query11 = "SELECT * FROM `student` WHERE `status`='Active' ORDER BY fullname ASC ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];
$stfname= $row11['fname'];


?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname;?> S/D/O <?php echo $stfname;?></option>
                     <?php }?>  
                      </select>
  </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php
                    if (isset($_POST['id'])) {
                       $id = $_POST['id'];
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

                          <form action="addfee.php" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="student"/>
<input type="hidden" value="<?php echo $student['class']; ?>" name="class"/>
                          

<?php
$batch = date("n");
$batch1 = date("n") - 1;
$year = date("Y"); 
$year1 = date("Y") - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;

}
else {

$batch1 = $batch1;

}



$month= $batch1-1;



$queryatd1 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year1'";
                        $resultatd1 = mysqli_query($link, $queryatd1);
                        $studentatd1 = mysqli_num_rows($resultatd1);
                          
 $fine1= $studentatd1 * 20 ;
 

 $query2 = "SELECT * FROM `fee` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year' OR `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year1' ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']-$fe['amount']; 
}
else
{
 $query2 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year' OR `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year1' ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']; 

}

else
{
  $query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch1' AND year= '$year' OR studentid = '$id' AND feemonth= '$batch1' AND year= '$year1'";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];
 }
else
{
$class=$student['class'];
 $query2 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch1' AND year= '$year' OR class = '$class' AND feemonth= '$batch1' AND year= '$year1'";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                        $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $student['fee'] + $fe['transportfee'] + $fine1 + $fe['others'];

}
else {

 $remainings=0;
}

}
}

$queryatd21 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year1'";
                        $resultatd21 = mysqli_query($link, $queryatd21);
                        $studentatd21 = mysqli_num_rows($resultatd21);
                          
 $fine21= $studentatd21 * 20 ;


  $query21 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch' AND year= '$year'";
                     $result21 = mysqli_query($link, $query21);
                       if(mysqli_num_rows($result21) > 0){
                       $fe = mysqli_fetch_array($result21);
                         $total=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine21 + $fe['others'];
 }
else
{
$class=$student['class'];
 $query21 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch' AND year= '$year' ";
                       $result21 = mysqli_query($link, $query21);
                       if(mysqli_num_rows($result21) > 0){
                       $fe = mysqli_fetch_array($result21);
                         $total=$fe['registrationfee'] + $fe['examsfee'] +$student['fee'] + $fe['transportfee'] + $fine21 + $fe['others'];

}
else{
$total=0;

}}

$fees=$total+$remainings;
if($fees==0){




 ?>



   <div class="col-md-11" style="color:red"> <blink><h3 >Challan Form is not Genrated Yet! </h3> </blink> </div>  
<br><br><br><br>
<div class="col-md-2"> <a href="abc2.php?sid=<?php echo $student['id'];?>"><button type="button" class="form-control btn btn-primary">Genrate Chalan</button></a></div>  

<?php } else { ?>



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
$year = date("Y"); 

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
                                <h3>Challan No.</h3>
                                <input type="text" name="challan_no" value="<?php echo $batch; ?><?php echo $year;  ?><?php echo $id;  ?> " required class="form-control"/>
                              </div>
 <div class="col-md-2"></div>
                              <div class="col-md-4">
                              <h3>Total Fee </h3>


       
                        <input type="text" name="tamount" value="<?php echo $fees; ?>" required class="form-control"/>
                              </div>
                            
                         
                             
                              <div class="col-md-4">
<br><br>
                              <h3>Received Amount</h3>
                                <input type="number" name="amount" required class="form-control"/>
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
                    }   }
                        ?>
                        <br><br><br>
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
