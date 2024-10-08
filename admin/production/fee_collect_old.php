<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_POST['undo'])){
 $id = $_POST['id'];
 
    $payment_id = $_POST['payment_id'];
 
$query2 = "DELETE FROM `fee_paid` WHERE `id`='$payment_id' ";
                        $result2 = mysqli_query($link, $query2);
   
if($result2=="TRUE"){
          $error = "Updated Successfully";
header("location:fee_collect.php?id=$id");
exit();


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
                <h3>Fee Collection</h3>
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
 <?php
 if (!isset($_GET['id'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     
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

                    <?php }
 if (isset($_GET['id'])) {
 $id = $_GET['id']; 


 $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                        <br><br><br>
                        <div class="row">
 <div class="col-md-3"><h3>Admission #: <?php echo $student['id'];?></h3></div>
                          <div class="col-md-3"><h3>Name: <?php echo $student['fullname'];?></h3></div>
                          <div class="col-md-3"><h3>Father name: <?php echo $student['fname'];?></h3></div>
                          <div class="col-md-3"><h3>Class: <?php echo $student['class'];?></h3></div>
                        </div>
                        <br><br><br>

                         
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



 

$queryatd21 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year1'";
                        $resultatd21 = mysqli_query($link, $queryatd21);
                        $studentatd21 = mysqli_num_rows($resultatd21);
                          
 $fine21= $studentatd21 * 50 ;


 
 }
else
{

}







 ?>



  
   <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Fee Group</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Date </th>
                           
    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Amount </th>
                         <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Status </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Payment ID </th>
                <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Paid </th>
            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Balance </th>
                            
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;"> Action </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
$totalpaid=0;

$total_amount=0;
                        $query = "SELECT * FROM `fee_assigned` WHERE `student_id`='$id' ";
                        $result = mysqli_query($link, $query);

                        while($row = mysqli_fetch_array($result)){


              $fee_group= $row['fee_group'];

 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$fee_group' ";
                        $result1 = mysqli_query($link, $query1);
$amount=0;
        $count=1;                while($row1 = mysqli_fetch_array($result1)){

$amount = $amount + $row1['amount'];

                        ?>


<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_group']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_type']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['date']; ?></td>

<?php 
$paid=0;
$fee_type = $row1['fee_type'];


$query_concession = "SELECT * FROM `fee_concession` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_concession = mysqli_query($link, $query_concession);
if(mysqli_num_rows($result_concession) > 0){
                         while($row_concession = mysqli_fetch_array($result_concession)) {


$concession=$row_concession['amount'];
}}
else
{
$concession="0";

}

$query_extra = "SELECT * FROM `fee_extra` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_extra = mysqli_query($link, $query_extra);
if(mysqli_num_rows($result_extra) > 0){
                         while($row_extra = mysqli_fetch_array($result_extra)) {


$extra=$row_extra['amount'];
}}
else
{
$extra="0";

}
?>










<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  echo $row1['amount']+ $extra - $concession ;   ?></td>

<?php 

$total_amount=$total_amount + $row1['amount'] + $extra - $concession;




 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {


$paid=$paid+ $row2['amount'];
}
 ?>


			    <td class=" "style="text-align:center; border: 1px solid #dddddd;">
<?php $amount=$row1['amount']; $balance=$row1['amount'] - $paid;
 
if($balance==0){ echo "Paid";
} 


else if($balance > 0){ echo "Partial";
} 



 ?> </td>




    <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php  ?></td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $paid; ?></td>
   
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
      <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount']+ $extra - $concession  - $paid; echo $balance; ?></td>
    
    <?php  } else {  ?>

 <td class=" " style="text-align:center; border: 1px solid #dddddd;">Unpaid   </td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;">  </td>
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php echo "0"; ?> </td>
    
 <td class=" " style="text-align:center; border: 1px solid #dddddd;">  </td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount']+ $extra - $concession  ; echo $balance; ?></td>
   


          <?php }  ?>
         <td class=" " style="text-align:center; border: 1px solid #dddddd;">     


 <form action="fee_collect1.php" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="id"/>
  <input type="hidden" value="<?php echo $row1['fee_group']; ?>" name="feegroup"/>
 <input type="hidden" value="<?php echo $row1['fee_type']; ?>" name="feetype"/>
 <input type="hidden" value="<?php echo $balance; ?>" name="amount"/>
 
   <button type="submit" class="fa fa-plus"> </button>
                            

</form>
 

 

</td>

                          </tr>
<?php 

$fee_type = $row1['fee_type'];
 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {




 ?>
<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>

    
      <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php echo  $row2['id'] ; ?></td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row2['amount']; ?></td>
    
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $date_paid= $row2['date']; $month =date("d-m-Y", strtotime($date_paid)); echo $month; ?></td>
    
   
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>



<td class=" " style="text-align:center; border: 1px solid #dddddd;">
<form action="fee_collect.php" method="POST">
                          <input type="hidden" value="<?php $payment_id= $row2['id']; echo $payment_id; ?>" name="payment_id"/>
   <input type="hidden" value="<?php  echo $id; ?>" name="id"/>
  
   <button type="submit" name="undo" class="fa fa-undo"></button>
                            

</form></td>

 </tr>  <?php  }}   ?>


                      <?php 

$totalpaid=$totalpaid + $paid;
$count++; }  }?>

<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 3px solid #dddddd;"><b><?php echo "Total Amount:";  ?></b></td>
<td class=" " style="text-align:center; border: 3px solid #dddddd;"><?php echo $total_amount; ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; color:green; border: 3px solid #dddddd;"><b><?php echo "Total Paid:";  ?></b></td>

<td class=" " style="text-align:center; color:green; border: 3px solid #dddddd;"><?php echo $totalpaid;  ?></td>
<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Balance:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php $totalbalance=$total_amount - $totalpaid; echo $totalbalance;  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
    
     
 </tr>
    
               </tbody>

                   
                      </table>







                        <?php
                       
                        ?>
                        <br><br><br>
                       


 <?php
                       } 
                      
                   








                   else if (isset($_POST['id'])) {
                       $id = $_POST['id'];
                      

 $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                        <br><br><br>
                        <div class="row">
 <div class="col-md-3"><h3>Admission #: <?php echo $student['id'];?></h3></div>
                          <div class="col-md-3"><h3>Name: <?php echo $student['fullname'];?></h3></div>
                          <div class="col-md-3"><h3>Father name: <?php echo $student['fname'];?></h3></div>
                          <div class="col-md-3"><h3>Class: <?php echo $student['class'];?></h3></div>
                        </div>
                        <br><br><br>

                         
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



 

$queryatd21 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year1'";
                        $resultatd21 = mysqli_query($link, $queryatd21);
                        $studentatd21 = mysqli_num_rows($resultatd21);
                          
 $fine21= $studentatd21 * 50 ;


 
 }
else
{

}







 ?>



  
   <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Fee Group</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Date </th>
                           
    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Amount </th>
                         <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Status </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Payment ID </th>
                <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Paid </th>
            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Balance </th>
                            
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;"> Action </th>
                          </tr>
                        </thead>

                                               <tbody>
                        <?php 
$totalpaid=0;
$amount=0;
$total_amount=0;
                        $query = "SELECT * FROM `fee_assigned` WHERE `student_id`='$id' ";
                        $result = mysqli_query($link, $query);

                        while($row = mysqli_fetch_array($result)){


              $fee_group= $row['fee_group'];

 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$fee_group' ";
                        $result1 = mysqli_query($link, $query1);

        $count=1;                while($row1 = mysqli_fetch_array($result1)){

$amount = $amount + $row1['amount'];

                        ?>


<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_group']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_type']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['date']; ?></td>






<?php 
$paid=0;
$fee_type = $row1['fee_type'];


$query_concession = "SELECT * FROM `fee_concession` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_concession = mysqli_query($link, $query_concession);
if(mysqli_num_rows($result_concession) > 0){
                         while($row_concession = mysqli_fetch_array($result_concession)) {


$concession=$row_concession['amount'];
}}
else
{
$concession="0";

}

$query_extra = "SELECT * FROM `fee_extra` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_extra = mysqli_query($link, $query_extra);
if(mysqli_num_rows($result_extra) > 0){
                         while($row_extra = mysqli_fetch_array($result_extra)) {


$extra=$row_extra['amount'];
}}
else
{
$extra="0";

}
?>










<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  echo $row1['amount']+ $extra - $concession ;   ?></td>

<?php 

$total_amount=$total_amount + $row1['amount'] + $extra - $concession;




 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {


$paid=$paid+ $row2['amount'];
}
 ?>


			    <td class=" "style="text-align:center; border: 1px solid #dddddd;">
<?php $amount=$row1['amount']; $balance=$row1['amount'] - $paid;
 
if($balance==0){ echo "Paid";
} 


else if($balance > 0){ echo "Partial";
} 



 ?> </td>




    <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php  ?></td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $paid; ?></td>
   
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
      <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount']+ $extra - $concession  - $paid; echo $balance; ?></td>
    
    <?php  } else {  ?>

 <td class=" " style="text-align:center; border: 1px solid #dddddd;">Unpaid   </td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;">  </td>
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php echo "0"; ?> </td>
    
 <td class=" " style="text-align:center; border: 1px solid #dddddd;">  </td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount']+ $extra - $concession  ; echo $balance; ?></td>
   


          <?php }  ?>
         <td class=" " style="text-align:center; border: 1px solid #dddddd;">     

<form action="fee_collect1.php" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="id"/>
  <input type="hidden" value="<?php echo $row1['fee_group']; ?>" name="feegroup"/>
 <input type="hidden" value="<?php echo $row1['fee_type']; ?>" name="feetype"/>
 <input type="hidden" value="<?php echo $balance; ?>" name="amount"/>
 
   <button type="submit" class="fa fa-plus"> </button>
                            

</form>
 

 

</td>

                          </tr>
<?php 

$fee_type = $row1['fee_type'];
 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {




 ?>
<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>

    
      <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <?php echo  $row2['id'] ; ?></td>
     <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row2['amount']; ?></td>
    
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $date_paid= $row2['date']; $month =date("d-m-Y", strtotime($date_paid)); echo $month; ?></td>
    
   
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>



<td class=" " style="text-align:center; border: 1px solid #dddddd;">
<form action="fee_collect.php" method="POST">
                          <input type="hidden" value="<?php $payment_id= $row2['id']; echo $payment_id; ?>" name="payment_id"/>
   <input type="hidden" value="<?php  echo $id; ?>" name="id"/>
  
   <button type="submit" name="undo" class="fa fa-undo"></button>
                            

</form></td>

 </tr>  <?php  }}   ?>


                      <?php 

$totalpaid=$totalpaid + $paid;
$count++; }  }?>

<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 3px solid #dddddd;"><b><?php echo "Total Amount:";  ?></b></td>
<td class=" " style="text-align:center; border: 3px solid #dddddd;"><?php echo $total_amount; ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; color:green; border: 3px solid #dddddd;"><b><?php echo "Total Paid:";  ?></b></td>

<td class=" " style="text-align:center; color:green; border: 3px solid #dddddd;"><?php echo $totalpaid;  ?></td>
<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Balance:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php $totalbalance=$total_amount - $totalpaid; echo $totalbalance;  ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  ?></td>
    
     
 </tr>
    
               </tbody>
                   
                      </table>







                        <?php
                       
                        ?>
                        <br><br><br>
                       






                          
                        
                        <?php
                       
                        ?>
                        <br><br><br>
                        <?php
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
