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
         
        <!-- page content -->
        <div class="right_col" role="main">
         
            
            <div class="row">
              <div class="col-md-12 col-xs-12">
                

<?php 
 if (!isset($_GET['sid'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>
<div class="col-md-6" >
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="">Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
                        
                        <div class="col-md-3" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
<?php }?>
                    <!-- end form for validations -->

                        <div class="row">
<div class="col-md-4" >
                    <?php

                    if (isset($_GET['sid'])) {
                        
                        $id = $_GET['sid'];
                        $query5 = "SELECT * FROM `student` WHERE `id`='$id' AND `status`='Active'";
                        $result5 = mysqli_query($link, $query5);

 $challan =1; 
                        while($student = mysqli_fetch_array($result5)){
                          $class= $student['class'];
 $id= $student['id'];
$batch = date("n");
$batch1 = date("n") - 1;
$batch2 = date("n") - 2;

$year = date("Y"); 
$year1 = date("Y") - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;

}
else {

$batch1 = $batch1;

}


$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 20 ; 

                                                   ?>

                       

                         
                       
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>

<?php $day1 = date("d");
if($day1<20) {
$day = date("d") + 6; }
else {

$day = date("d");
}

 ?>  
<tr class=" ">  
<td class=" " align="center">  Bank Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/> </td> 
 </tr>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/><br/>     </td> 

 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/> <br/>     </td> 

<td class=" ">          </td>
</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>
<td class=" ">               </td>   </tr>

<tr class=" ">  

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>

</tr>
<tr class=" ">   

<td class=" "> <b> Roll No.:   </b>  <?php echo $id; ?><br/>  <br/> </td> 
<td class=" ">               </td>
</tr>
<tr class=" ">  

<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/><br/> </td> 
<td class=" ">               </td>
 </tr>
   
<tr class=" ">  
<?php  
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
$year=date('Y');
?>

<td class=" "> <b>Fee Month: </b>   <?php echo $month; ?> - <?php echo $year; ?> <br/><br/> </td> 

<td class=" ">               </td>   </tr>                        
         </tbody>
                      </table>
 <table class=" table jambo_table " >  
		        
                            <tbody>

 <?php
                      
                        $query11 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch' AND year='$year'";
                       $result11 = mysqli_query($link, $query11);
                       if(mysqli_num_rows($result11) <1){

 echo "No fee History found!";
}
else {
                       
                        $fee = mysqli_fetch_array($result11);
                          ?>
<tr class="even pointer">  
<td class="" style="text-align:left; border: 1px solid #dddddd;"   > <b> Sr.# </b>  </td>
<td class="" style="text-align:left; border: 1px solid #dddddd;"  > <b> Details </b>  </td> 
                            <td class=" " style="border: 1px solid #dddddd;" > <b>  Amount  </b>  <br/></td>

                           
 </tr>
                         
                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 1 <br/> </td> 
 <td class=" " style="border: 1px solid #dddddd;" > Pending Dues </td>
<?php
$month= $batch1-1;



$queryatd1 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year1'";
                        $resultatd1 = mysqli_query($link, $queryatd1);
                        $studentatd1 = mysqli_num_rows($resultatd1);
                          
 $fine1= $studentatd1 * 20 ;

$query2 = "SELECT * FROM `fee` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year' ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']-$fe['amount']; 


 
}
else
{
 $query2 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year'";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']; 

}
else
{

  $query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch1' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];
 }
else
{
$class=$student['class'];
 $query2 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch1' AND year= '$year' ";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                        $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];

}
else {

 $remainings=0;
}

}
}}


 ?>
 <td class=" " style="border: 1px solid #dddddd;">   <?php echo $remainings; ?> </td>

                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 2  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Tuition Fee<br/> </td> 
<?php 

$query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         + $fe['transportfee'] + $fine1 + $fe['others'];


 ?>

    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fe['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fe['others']; ?></td>
                            
                        
<?php     
$total = $fe['registrationfee'] + $remainings + $fe['teutionfee'] + $fe['transportfee'] + $fine + $fe['others'];
     ?>


<?php } else { ?>
    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fee['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fee['others']; ?></td>
                            
                        
<?php     
$total = $fee['registrationfee'] + $remainings + $student['fee'] + $fee['transportfee'] + $fine + $fee['others'];
   
}
  ?>
<tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 7  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> <b>Total  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> <b>   <?php echo $total; ?></td>
                        </tr>


                          <?php
 $query21 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
                       $result21 = mysqli_query($link, $query21);
                       if($result21 && mysqli_num_rows($result21) < 1){
 $query = "INSERT INTO `fee1`(`studentid`, `feemonth`, `feeyear`, `tamount`) VALUES ('$id', '$batch', '$year','$total')";
    $result = mysqli_query($link, $query);
   
                       
} else {

 $query = "UPDATE `fee1` SET `tamount`='$total'WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
          $result = mysqli_query($link, $query);


}

                        }

 
                        ?>
                        </tbody>
                      </table>
<table class= "" width='100%'>
		        
                            <tbody>
  
<tr class=" ">   
 <td class=" " align="right"><b>Note:</b>There will be 20 rupees per  </td> 
<td class=" " align="">_day fine  after due date </td> </tr>



<tr class=" ">   
 <td class=" " align=""> <br><br> <br> Cashier Sign:_____________  </td> 
<td class=" " align="right"> <br><br> <br>Date:____________  </td> </tr>

</tbody>
                      </table>


  </div>
<P style="page-break-after: always">
 <?php
                        }

 
                        ?>


                       
                       </div>
<?php
                      
                     
                    ?>

                 <?php
                      } 
                     
                    ?>

<div class="col-md-4" >
                    <?php

                   if (isset($_GET['sid'])) {
                        
                        $id = $_GET['sid'];
                        $query5 = "SELECT * FROM `student` WHERE `id`='$id' AND `status`='Active'";
                        $result5 = mysqli_query($link, $query5);

 $challan =1; 
                        while($student = mysqli_fetch_array($result5)){
                          $class= $student['class'];
 $id= $student['id'];
$batch = date("n");
$batch1 = date("n") - 1;
$batch2 = date("n") - 2;

$year = date("Y"); 
$year1 = date("Y") - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;

}
else {

$batch1 = $batch1;

}


$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 20 ; 

                                                   ?>

                       

                         
                       
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>

<?php $day1 = date("d");
if($day1<20) {
$day = date("d") + 6; }
else {

$day = date("d");
}

 ?>  
<tr class=" ">  
<td class=" " align="center">  Admin Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/> </td> 
 </tr>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/><br/>     </td> 

 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/> <br/>     </td> 

<td class=" ">          </td>
</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>
<td class=" ">               </td>   </tr>

<tr class=" ">  

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>

</tr>
<tr class=" ">   

<td class=" "> <b> Roll No.:   </b>  <?php echo $id; ?><br/>  <br/> </td> 
<td class=" ">               </td>
</tr>
<tr class=" ">  

<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/><br/> </td> 
<td class=" ">               </td>
 </tr>
   
<tr class=" ">  
<?php  
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
$year=date('Y');
?>

<td class=" "> <b>Fee Month: </b>   <?php echo $month; ?> - <?php echo $year; ?> <br/><br/> </td> 

<td class=" ">               </td>   </tr>                        
         </tbody>
                      </table>
 <table class=" table jambo_table " >  
		        
                            <tbody>

 <?php
                      
                        $query11 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch' AND year='$year'";
                       $result11 = mysqli_query($link, $query11);
                       if(mysqli_num_rows($result11) <1){

 echo "No fee History found!";
}
else {
                       
                        $fee = mysqli_fetch_array($result11);
                          ?>
<tr class="even pointer">  
<td class="" style="text-align:left; border: 1px solid #dddddd;"   > <b> Sr.# </b>  </td>
<td class="" style="text-align:left; border: 1px solid #dddddd;"  > <b> Details </b>  </td> 
                            <td class=" " style="border: 1px solid #dddddd;" > <b>  Amount  </b>  <br/></td>

                           
 </tr>
                         
                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 1 <br/> </td> 
 <td class=" " style="border: 1px solid #dddddd;" > Pending Dues </td>
<?php
$month= $batch1-1;



$queryatd1 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year1'";
                        $resultatd1 = mysqli_query($link, $queryatd1);
                        $studentatd1 = mysqli_num_rows($resultatd1);
                          
 $fine1= $studentatd1 * 20 ;

$query2 = "SELECT * FROM `fee` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year'  ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']-$fe['amount']; 


 
}
else
{
 $query2 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year'  ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']; 

}
else
{

  $query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch1' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];
 }
else
{
$class=$student['class'];
 $query2 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch1' AND year= '$year'";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                        $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];

}
else {

 $remainings=0;
}

}
}}


 ?>
 <td class=" " style="border: 1px solid #dddddd;">   <?php echo $remainings; ?> </td>

                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 2  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Tuition Fee<br/> </td> 
<?php 

$query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         + $fe['transportfee'] + $fine1 + $fe['others'];


 ?>

    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fe['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fe['others']; ?></td>
                            
                        
<?php     
$total = $fe['registrationfee'] + $remainings + $fe['teutionfee'] + $fe['transportfee'] + $fine + $fe['others'];
     ?>


<?php } else { ?>
    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fee['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fee['others']; ?></td>
                            
                        
<?php     
$total = $fee['registrationfee'] + $remainings + $student['fee'] + $fee['transportfee'] + $fine + $fee['others'];
   
}
  ?>
<tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 7  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> <b>Total  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> <b>   <?php echo $total; ?></td>
                        </tr>


                          <?php
 $query21 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
                       $result21 = mysqli_query($link, $query21);
                       if($result21 && mysqli_num_rows($result21) < 1){
 $query = "INSERT INTO `fee1`(`feeid`, `studentid`, `feemonth`, `feeyear`, `tamount`) VALUES ('', '$id', '$batch', '$year','$total')";
    $result = mysqli_query($link, $query);
   
                       
} else {

 $query = "UPDATE `fee1` SET `tamount`='$total'WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
          $result = mysqli_query($link, $query);


}

                        }

 
                        ?>
                        </tbody>
                      </table>
<table class= "" width='100%'>
		        
                            <tbody>
  
<tr class=" ">   
 <td class=" " align="right"><b>Note:</b>There will be 20 rupees per  </td> 
<td class=" " align="">_day fine  after due date </td> </tr>



<tr class=" ">   
 <td class=" " align=""> <br><br> <br> Cashier Sign:_____________  </td> 
<td class=" " align="right"> <br><br> <br>Date:____________  </td> </tr>


 </tbody>
                      </table>


  </div>
<P style="page-break-after: always">
 <?php
                        }

 
                        ?>


                       
                       </div>
<?php
                      
                     
                    ?>

                 <?php
                      } 
                     
                    ?>

<div class="col-md-4" >
                    <?php

                    if (isset($_GET['sid'])) {
                        
                        $id = $_GET['sid'];
                        $query5 = "SELECT * FROM `student` WHERE `id`='$id' AND `status`='Active'";
                        $result5 = mysqli_query($link, $query5);

 $challan =1; 
                        while($student = mysqli_fetch_array($result5)){
                          $class= $student['class'];
 $id= $student['id'];
$batch = date("n");
$batch1 = date("n") - 1;
$batch2 = date("n") - 2;

$year = date("Y"); 
$year1 = date("Y") - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;

}
else {

$batch1 = $batch1;

}


$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 20 ; 

                                                   ?>

                       

                         
                       
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>

<?php $day1 = date("d");
if($day1<20) {
$day = date("d") + 6; }
else {

$day = date("d");
}

 ?>  
<tr class=" ">  
<td class=" " align="center"> Student Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/> </td> 
 </tr>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/><br/>     </td> 

 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/> <br/>     </td> 

<td class=" ">          </td>
</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>
<td class=" ">               </td>   </tr>

<tr class=" ">  

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>

</tr>
<tr class=" ">   

<td class=" "> <b> Roll No.:   </b>  <?php echo $id; ?><br/>  <br/> </td> 
<td class=" ">               </td>
</tr>
<tr class=" ">  

<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/><br/> </td> 
<td class=" ">               </td>
 </tr>
   
<tr class=" ">  
<?php  
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
$year=date('Y');
?>

<td class=" "> <b>Fee Month: </b>   <?php echo $month; ?> - <?php echo $year; ?> <br/><br/> </td> 

<td class=" ">               </td>   </tr>                        
         </tbody>
                      </table>
 <table class=" table jambo_table " >  
		        
                            <tbody>

 <?php
                      
                        $query11 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch' AND year='$year'";
                       $result11 = mysqli_query($link, $query11);
                       if(mysqli_num_rows($result11) <1){

 echo "No fee History found!";
}
else {
                       
                        $fee = mysqli_fetch_array($result11);
                          ?>
<tr class="even pointer">  
<td class="" style="text-align:left; border: 1px solid #dddddd;"   > <b> Sr.# </b>  </td>
<td class="" style="text-align:left; border: 1px solid #dddddd;"  > <b> Details </b>  </td> 
                            <td class=" " style="border: 1px solid #dddddd;" > <b>  Amount  </b>  <br/></td>

                           
 </tr>
                         
                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 1 <br/> </td> 
 <td class=" " style="border: 1px solid #dddddd;" > Pending Dues </td>
<?php
$month= $batch1-1;



$queryatd1 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year' OR `std_id`='$id' AND `status`='0' AND `month` = '$month' AND `year` = '$year1'";
                        $resultatd1 = mysqli_query($link, $queryatd1);
                        $studentatd1 = mysqli_num_rows($resultatd1);
                          
 $fine1= $studentatd1 * 20 ;

$query2 = "SELECT * FROM `fee` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year' ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']-$fe['amount']; 


 
}
else
{
 $query2 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch1' AND feeyear= '$year'  ";
                       $result2 = mysqli_query($link, $query2);
                       if($result2 && mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                       $remainings=$fe['tamount']; 

}
else
{

  $query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch1' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];
 }
else
{
$class=$student['class'];
 $query2 = "SELECT * FROM `classchalan` WHERE class = '$class' AND feemonth= '$batch1' AND year= '$year'";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                        $fe = mysqli_fetch_array($result2);
                         $remainings=$fe['registrationfee'] + $fe['examsfee'] + $fe['teutionfee'] + $fe['transportfee'] + $fine1 + $fe['others'];

}
else {

 $remainings=0;
}

}
}}


 ?>
 <td class=" " style="border: 1px solid #dddddd;">   <?php echo $remainings; ?> </td>

                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 2  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Tuition Fee<br/> </td> 
<?php 

$query2 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch' AND year= '$year' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
                         + $fe['transportfee'] + $fine1 + $fe['others'];


 ?>

    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fe['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fe['others']; ?></td>
                            
                        
<?php     
$total = $fe['registrationfee'] + $remainings + $fe['teutionfee'] + $fe['transportfee'] + $fine + $fe['others'];
     ?>


<?php } else { ?>
    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $student['fee']; ?></td> 
                          <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $fee['transportfee']; ?></td> 
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" " style="border: 1px solid #dddddd;">      <?php echo $fine; ?></td> 
  </tr>
                         
<tr class="even pointer">  
<td class="" style="border: 1px solid #dddddd;" > 5 <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;">      <?php echo $fee['others']; ?></td>
                            
                        
<?php     
$total = $fee['registrationfee'] + $remainings + $student['fee'] + $fee['transportfee'] + $fine + $fee['others'];
   
}
  ?>
<tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 7  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> <b>Total  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> <b>   <?php echo $total; ?></td>
                        </tr>


                          <?php
 $query21 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
                       $result21 = mysqli_query($link, $query21);
                       if($result21 && mysqli_num_rows($result21) < 1){
 $query = "INSERT INTO `fee1`(`feeid`, `studentid`, `feemonth`, `feeyear`, `tamount`) VALUES ('', '$id', '$batch', '$year','$total')";
    $result = mysqli_query($link, $query);
   
                       
} else {

 $query = "UPDATE `fee1` SET `tamount`='$total'WHERE `studentid` = '$id' AND feemonth= '$batch' AND feeyear= '$year'";
          $result = mysqli_query($link, $query);


}

                        }

 
                        ?>
                        </tbody>
                      </table>
<table class= "" width='100%'>
		        
                            <tbody>
  
<tr class=" ">   
 <td class=" " align="right"><b>Note:</b>There will be 20 rupees per  </td> 
<td class=" " align="">_day fine  after due date </td> </tr>



<tr class=" ">   
 <td class=" " align=""> <br><br> <br> Cashier Sign:_____________  </td> 
<td class=" " align="right"> <br><br> <br>Date:____________  </td> </tr>


 </tbody>
                      </table>


  </div>
<P style="page-break-after: always">
 <?php
                        }

 
                        ?>


                       
                       </div>
<?php
                      
                     
                    ?>

                 <?php
                      } 
                     
                    ?>



          
        </div>
        <!-- /page content -->

      <?php include 'php/footer.php.inc'; ?>
  </body>
</html>



