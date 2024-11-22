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
      <div class="main_container ">
 <div class="noprint">
<?php 
// if (!isset($_POST['class'])){
include 'php/topnav.php.inc';
//}
?>
        <?php include 'php/sidebar.php.inc'; ?>
       </div>
        <!-- page content -->
        <div class="right_col" role="main">
          
              
           
             <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >      

 


<?php 
 if (!isset($_POST['class'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                  
<div class="row">

   <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" >        

   <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="">Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `chalan` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?>"><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
              

<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" >
  <select id="period" class="form-control" name="period" style="width:100%;" >

 <option value="">Select Period </option>
<?php

 $query1 = "SELECT DISTINCT feemonth,year FROM `chalan` ORDER BY id ASC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$feemonth= $row1['feemonth'];
$year= $row1['year'];

$month_number=$feemonth;


if($month_number=='1'){

$month="January";


}
else if($month_number=='2'){

$month="February";


}
else if($month_number=='3'){

$month="March";


}
else if($month_number=='4'){

$month="April";


}
else if($month_number=='5'){

$month="May";


}
else if($month_number=='6'){

$month="June";


}
else if($month_number=='7'){

$month="July";


}
else if($month_number=='8'){

$month="August";


}
else if($month_number=='9'){

$month="September";


}
else if($month_number=='10'){

$month="October";


}
else if($month_number=='11'){

$month="November";


}
else if($month_number=='12'){

$month="December";


}












?>
   
                    
                        <option value="<?php echo $feemonth;?>-<?php echo $year;?>"><?php echo $month;?> - <?php echo $year;?></option>
                     <?php }?>  
                      </select>

             </div>


                        <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                 
   </div>


                    </form>
<?php }?>
                    <!-- end form for validations -->
                        
                    <?php

                    if (isset($_POST['class'])) {
?>
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" > 
   <button style="float:right;" class="noprint btn btn-primary" onClick="window.print()"><i class="fa fa-print"> </i> Print Challan
</button> </div>
<?php
                        
                        $class = $_POST['class'];
   $period1 = $_POST['period']; 
   
   $period2=explode("-",$period1);
   
   $period = $period2[0]; 
     $year1 = $period2[1]; 
   
   $month_number=$period;


if($month_number=='1'){

$month="January";


}
else if($month_number=='2'){

$month="February";


}
else if($month_number=='3'){

$month="March";


}
else if($month_number=='4'){

$month="April";


}
else if($month_number=='5'){

$month="May";


}
else if($month_number=='6'){

$month="June";


}
else if($month_number=='7'){

$month="July";


}
else if($month_number=='8'){

$month="August";


}
else if($month_number=='9'){

$month="September";


}
else if($month_number=='10'){

$month="October";


}
else if($month_number=='11'){

$month="November";


}
else if($month_number=='12'){

$month="December";


}                        
                   
                        $query5 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        $result5 = mysqli_query($link, $query5);

 $challan =1; 
                        while($student = mysqli_fetch_array($result5)){
                          $class= $student['class'];

 $id= $student['id'];
$batch = $month_number;
$batch1 = $batch - 1;
$batch2 = $batch - 2;




if ($batch1==0)
{
$batch1 = $batch1+12;
$year = $year1 - 1; 

}
else {

$batch1 = $batch1;
$year = $year1;

}


$query52 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `feemonth`<='$batch' AND `feeyear`='$year' ";
                        $result52 = mysqli_query($link, $query52);
if(mysqli_num_rows($result52) > 0){
  $remaining=0;
  $total_fee2=0;
  $paid_fee2=0;
while($row52 = mysqli_fetch_array($result52)){
 
  $total_fee2= $total_fee2 + $row52['tamount']; 

  $paid_fee2= $paid_fee2 + $row52['amount']; 
  

}


$remaining = $total_fee2 - $paid_fee2;
}
else {

$query6 = "SELECT * FROM `fee1` WHERE `studentid`='$id' AND `feemonth`='$batch1' AND `feeyear`='$year' ";
                        $result6 = mysqli_query($link, $query6);
if(mysqli_num_rows($result6)>0){

$row6 = mysqli_fetch_array($result6);

$total_fee1= $row6['tamount']; 

//$paid_fee= $row5['amount']; 

$remaining=$total_fee1 ;
}
else {

$remaining=0;


}

}






$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 50 ; 

                                                   ?>

                       

                         
 <div class="row" > 

  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" > 
                    
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


<td class=" " align="center">  Admin Copy <br/>   </td>


 </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><h2 style="text-transform: uppercase; font-family: "Times New Roman", Times, serif;"> <img src=" <?php echo $image;?>" class="" width='60' height='50'><b> <?php echo $name;?> </h2><br/> </td> 
 </tr>


		        
                            </tbody>  </table>

 <table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">
 <td class=" " align="left"><b>Challan No:  </b> <?php echo $month_number; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/>    </td> 
<td class=" " align="left">    </td>
 <td class=" " align="right"><b> Due Date:  </b> <?php echo "10";  ?>-<?php echo $month_number;  ?>-<?php echo $year1;  ?>  <br/>     </td> 

</tr>
 </tbody>
                      </table>

<table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?>  <br/></td> 

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?>   <br/></td> 
   </tr>

 </tbody>
                      </table>

<table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">   

<td class=" "> <b> Admission #:   </b>  <?php echo $id; ?> <br/> </td>
<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/> </td>

<td class=" "> <b>Fee Period: </b>   <?php echo $month; ?> -  <?php echo $year; ?><br/> </td> 
 
</tr>

                       
         </tbody>
                      </table>
  <table  class="table table-striped jambo_table ">
             
                        <thead>   
<tr class="headings"> 

 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>

                    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Amount </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 


$total=0;
                        $query = "SELECT * FROM `chalan` WHERE `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                        $result = mysqli_query($link, $query);
$count=1; 
                        while($row = mysqli_fetch_array($result)){
                          //Consession
                          $query_consession_admission = "SELECT * FROM `fee_concession` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession__admission = mysqli_query($link, $query_consession_admission);
                          $admission_consession=0;
                          while($row_consession_admission = mysqli_fetch_array($result_consession__admission)){

                              $admission_consession= $admission_consession +  $row_consession_admission['amount'];

                          }
                          $query_consession_registration = "SELECT * FROM `fee_concession` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_registration = mysqli_query($link, $query_consession_registration);
                          $registration_consession=0;
                          while($row_consession_registration = mysqli_fetch_array($result_consession_registration)){

                              $registration_consession= $registration_consession +  $row_consession_registration['amount'];

                          }
                          $query_consession_teution = "SELECT * FROM `fee_concession` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_teution = mysqli_query($link, $query_consession_teution);
                          $teution_consession=0;
                          while($row_consession_teution = mysqli_fetch_array($result_consession_teution)){

                              $teution_consession= $teution_consession +  $row_consession_teution['amount'];

                          }
                          $query_consession_transport = "SELECT * FROM `fee_concession` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_transport = mysqli_query($link, $query_consession_transport);
                          $transport_consession=0;
                          while($row_consession_transport = mysqli_fetch_array($result_consession_transport)){

                              $transport_consession= $transport_consession +  $row_consession_transport['amount'];

                          }
                          $query_consession_sports = "SELECT * FROM `fee_concession` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_sports = mysqli_query($link, $query_consession_sports);
                          $sports_consession=0;
                          while($row_consession_sports = mysqli_fetch_array($result_consession_sports)){

                              $sports_consession= $sports_consession +  $row_consession_sports['amount'];

                          }
                          $query_consession_paper_fund = "SELECT * FROM `fee_concession` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_paper_fund = mysqli_query($link, $query_consession_paper_fund);
                          $paper_fund_consession=0;
                          while($row_consession_paper_fund = mysqli_fetch_array($result_consession_paper_fund)){

                              $paper_fund_consession= $paper_fund_consession +  $row_consession_paper_fund['amount'];

                          }
                          $query_consession_annual_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_annual_charges = mysqli_query($link, $query_consession_annual_charges);
                          $annual_charges_consession=0;
                          while($row_consession_annual_charges = mysqli_fetch_array($result_consession_annual_charges)){

                              $annual_charges_consession= $annual_charges_consession +  $row_consession_annual_charges['amount'];

                          }
                          $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
                          $books_charges_consession=0;
                          while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

                              $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

                          }
                          $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
                          $books_charges_consession=0;
                          while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

                              $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

                          }
                          $query_consession_uniform_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_uniform_charges = mysqli_query($link, $query_consession_uniform_charges);
                          $uniform_charges_consession=0;
                          while($row_consession_uniform_charges = mysqli_fetch_array($result_consession_uniform_charges)){

                              $uniform_charges_consession= $uniform_charges_consession +  $row_consession_uniform_charges['amount'];

                          }
                          $query_consession_others = "SELECT * FROM `fee_concession` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_others = mysqli_query($link, $query_consession_others);
                          $others_consession=0;
                          while($row_consession_others = mysqli_fetch_array($result_consession_others)){

                              $others_consession= $others_consession +  $row_consession_others['amount'];

                          }
                          //Extra Charges

                          $query_extra_admission = "SELECT * FROM `fee_extra` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra__admission = mysqli_query($link, $query_extra_admission);
                          $admission_extra=0;
                          while($row_extra_admission = mysqli_fetch_array($result_extra__admission)){

                              $admission_extra= $admission_extra +  $row_extra_admission['amount'];

                          }
                          $query_extra_registration = "SELECT * FROM `fee_extra` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_registration = mysqli_query($link, $query_extra_registration);
                          $registration_extra=0;
                          while($row_extra_registration = mysqli_fetch_array($result_extra_registration)){

                              $registration_extra= $registration_extra +  $row_extra_registration['amount'];

                          }
                          $query_extra_teution = "SELECT * FROM `fee_extra` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_teution = mysqli_query($link, $query_extra_teution);
                          $teution_extra=0;
                          while($row_extra_teution = mysqli_fetch_array($result_extra_teution)){

                              $teution_extra= $teution_extra +  $row_extra_teution['amount'];

                          }
                          $query_extra_transport = "SELECT * FROM `fee_extra` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_transport = mysqli_query($link, $query_extra_transport);
                          $transport_extra=0;
                          while($row_extra_transport = mysqli_fetch_array($result_extra_transport)){

                              $transport_extra= $transport_extra +  $row_extra_transport['amount'];

                          }
                          $query_extra_sports = "SELECT * FROM `fee_extra` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_sports = mysqli_query($link, $query_extra_sports);
                          $sports_extra=0;
                          while($row_extra_sports = mysqli_fetch_array($result_extra_sports)){

                              $sports_extra= $sports_extra +  $row_extra_sports['amount'];

                          }
                          $query_extra_paper_fund = "SELECT * FROM `fee_extra` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_paper_fund = mysqli_query($link, $query_extra_paper_fund);
                          $paper_fund_extra=0;
                          while($row_extra_paper_fund = mysqli_fetch_array($result_extra_paper_fund)){

                              $paper_fund_extra= $paper_fund_extra +  $row_extra_paper_fund['amount'];

                          }
                          $query_extra_annual_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_annual_charges = mysqli_query($link, $query_extra_annual_charges);
                          $annual_charges_extra=0;
                          while($row_extra_annual_charges = mysqli_fetch_array($result_extra_annual_charges)){

                              $annual_charges_extra= $annual_charges_extra +  $row_extra_annual_charges['amount'];

                          }
                          $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
                          $books_charges_extra=0;
                          while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

                              $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

                          }
                          $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
                          $books_charges_extra=0;
                          while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

                              $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

                          }
                          $query_extra_uniform_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_uniform_charges = mysqli_query($link, $query_extra_uniform_charges);
                          $uniform_charges_extra=0;
                          while($row_extra_uniform_charges = mysqli_fetch_array($result_extra_uniform_charges)){

                              $uniform_charges_extra= $uniform_charges_extra +  $row_extra_uniform_charges['amount'];

                          }
                          $query_extra_others = "SELECT * FROM `fee_extra` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_others = mysqli_query($link, $query_extra_others);
                          $others_extra=0;
                          while($row_extra_others = mysqli_fetch_array($result_extra_others)){

                              $others_extra= $others_extra +  $row_extra_others['amount'];

                          }
                          


                      $registration_fee= $row['registration_fee'] - $registration_consession + $registration_extra; 

                      $admission_fee= $row['admission_fee'] - $admission_consession + $admission_extra; 
                      $tuition_fee= $row['teution_fee'] - $teution_consession + $teution_extra;

                      $transport_fee=   $row['transport_fee'] - $transport_consession + $transport_extra; 
                        $sports_fee=   $row['sports_fee'] - $sports_consession + $sports_extra; 
                      $paper_fund=   $row['paper_fund'] - $paper_fund_consession + $paper_fund_extra; 
                      $annual_fee=   $row['annual_charges'] - $annual_charges_consession + $annual_charges_extra; 
                      $books_fee=   $row['books_charges'] - $books_charges_consession + $books_charges_extra; 
                      $uniform_fee=   $row['uniform_charges'] - $uniform_charges_consession + $uniform_charges_extra; 
                      $others=   $row['others'] - $others_consession + $others_extra; 

                          


//$total=$remaining+$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;
$total=$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;
          
                        ?>

<!-- <tr class="even pointer"> -->
<!-- <td class=" " style="border: 1px solid #dddddd;" > Pending Dues </td>-->
<!--<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $remaining; ?></td>-->
 
<tr class="even pointer"> 
<?php 
if($registration_fee!= 0) { ?>



<tr class="even pointer"> 
<td class=" " style=" border: 1px solid #dddddd;"><?php echo "Registration Fee"; ?></td>

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $registration_fee; ?></td>


<?php

}

if($admission_fee != 0) { ?>
 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Admission Fee  </td> 

    <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $admission_fee; ?></td>             
<?php

}

if($tuition_fee != 0) { ?>




<tr class="even pointer"> 

<td class=" " style="border: 1px solid #dddddd;"> Tuition Fee  </td> 

    <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $tuition_fee; ?></td>
<?php

}

if($transport_fee!= 0) { ?>




<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee  </td>
 <td class=" " style=" text-align:center; border: 1px solid #dddddd;">     <?php echo $transport_fee; ?></td>  </tr>

<?php

}

if($sports_fee!= 0) { ?>

<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Sports Fee<br/> </td> 

    <td class=" " style=" text-align:center; border: 1px solid #dddddd;">     <?php echo $sports_fee; ?></td>  </tr>


<?php

}

if($paper_fund!= 0) { ?>

<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Paper Fund<br/> </td> 

    <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $paper_fund; ?></td>  </tr>
<?php

}

if($annual_fee!= 0) { ?>


 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Annual Charges<br/> </td> 
  <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $annual_fee; ?></td>  </tr>
<?php

}

if($books_fee!= 0) { ?>

 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Books Charges<br/> </td>   

    <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $books_fee; ?></td>  </tr>
<?php

}

if($uniform_fee!= 0) { ?>

 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Uniform Charges<br/> </td>   

    <td class=" " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $uniform_fee; ?></td>  </tr>
<?php

}

?>
<!-- <tr class="even pointer"> -->
<!--<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> -->
<!-- <td class=" " style="text-align:center; border: 1px solid #dddddd;">      <?php echo $fine; ?></td>  </tr>-->
<?php



if($others!= 0) { ?>
                         
<tr class="even pointer">  
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;">      <?php echo $others; ?></td>
<?php

}

?>
                            
                        
<?php     
     ?>









                

<?php    ?>

                      <?php 

//$totalpaid=$totalpaid + $paid;
$count++; }   ?>
</tr>


               </tbody>

                   
                      </table>





   

<table class= "" width='100%'>
		        
                            <tbody>

 <tr class=""> 

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Due Amount Before Due Date:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php  echo $total;  ?></td>
    
     
 </tr>

 
 </tbody>
</table>
<br>
<table class= "" width='100%'>
		        
    <tbody>
        <tr class=""> 
            <td class=" " style="text-align:center; color:black; border: 3px solid #dddddd;" colspan="2"><b><?php echo "Fee Slab";   ?></b></td>
        </tr>
        <tr class=""> 
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Amount for period (".date('11-M')." to ". date('20-M').")";   ?></b></td>
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php if($total > 0) echo $total+100; else echo 0;  ?></td>  
        </tr>
        <tr class=""> 
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Amount for period (".date('21-M')." to ". date('t-M').")";   ?></b></td>
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php if($total > 0)  echo $total+200;  else echo 0; ?></td>  
        </tr>

 
    </tbody>
 </table>

<table class= "" width='100%'>
		        
                            <tbody>

    
<tr class=" ">   
 <td class=" " align=""><br><br>Cashier Sign:________________  </td> <td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>

<td class=" " align="right"><br><br>Date:_________________  </td> </tr>

 </tbody>
                      </table>


 
</div></div>
                             <?php                         
                                                   ?>

                       

                         
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-16" > 
                   
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>

<tr class=" "style="text-align:center; border: 0px solid #dddddd;">
<td class=" " style="text-align:center; border: 0px solid #dddddd;">  Student Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><h2 style="text-transform: uppercase; font-family: "Times New Roman", Times, serif;"> <img src=" <?php echo $image;?>" class="" width='60' height='50'><b> <?php echo $name;?> </h2><br/> </td> 
 </tr>


        
                            </tbody>  </table>

 <table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $month_number; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/>    </td> 
<td class=" " align="left">    </td>
 <td class=" " align="right"><b> Due Date:  </b> <?php echo "10";  ?>-<?php echo $month_number;  ?>-<?php echo $year1;  ?>  <br/>     </td> 

</tr>
 </tbody>
                      </table>

<table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?>  <br/></td> 

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?>   <br/></td> 
   </tr>

 </tbody>
                      </table>

<table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">   

<td class=" "> <b> Admission #:   </b>  <?php echo $id; ?> <br/> </td>
<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/> </td>

<td class=" "> <b>Fee Period: </b>   <?php echo $month; ?> -  <?php echo $year; ?><br/> </td> 
</tr>

                       
                       
         </tbody>
                      </table>
   <table  class="table table-striped jambo_table ">
             
                        <thead>   
<tr class="headings"> 

 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>

                    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Amount </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                       <?php 


$total=0;
                        $query = "SELECT * FROM `chalan` WHERE `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                        $result = mysqli_query($link, $query);
$count=1; 
                        while($row = mysqli_fetch_array($result)){
                          //Consession
                          $query_consession_admission = "SELECT * FROM `fee_concession` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession__admission = mysqli_query($link, $query_consession_admission);
                          $admission_consession=0;
                          while($row_consession_admission = mysqli_fetch_array($result_consession__admission)){

                              $admission_consession= $admission_consession +  $row_consession_admission['amount'];

                          }
                          $query_consession_registration = "SELECT * FROM `fee_concession` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_registration = mysqli_query($link, $query_consession_registration);
                          $registration_consession=0;
                          while($row_consession_registration = mysqli_fetch_array($result_consession_registration)){

                              $registration_consession= $registration_consession +  $row_consession_registration['amount'];

                          }
                          $query_consession_teution = "SELECT * FROM `fee_concession` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_teution = mysqli_query($link, $query_consession_teution);
                          $teution_consession=0;
                          while($row_consession_teution = mysqli_fetch_array($result_consession_teution)){

                              $teution_consession= $teution_consession +  $row_consession_teution['amount'];

                          }
                          $query_consession_transport = "SELECT * FROM `fee_concession` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_transport = mysqli_query($link, $query_consession_transport);
                          $transport_consession=0;
                          while($row_consession_transport = mysqli_fetch_array($result_consession_transport)){

                              $transport_consession= $transport_consession +  $row_consession_transport['amount'];

                          }
                          $query_consession_sports = "SELECT * FROM `fee_concession` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_sports = mysqli_query($link, $query_consession_sports);
                          $sports_consession=0;
                          while($row_consession_sports = mysqli_fetch_array($result_consession_sports)){

                              $sports_consession= $sports_consession +  $row_consession_sports['amount'];

                          }
                          $query_consession_paper_fund = "SELECT * FROM `fee_concession` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_paper_fund = mysqli_query($link, $query_consession_paper_fund);
                          $paper_fund_consession=0;
                          while($row_consession_paper_fund = mysqli_fetch_array($result_consession_paper_fund)){

                              $paper_fund_consession= $paper_fund_consession +  $row_consession_paper_fund['amount'];

                          }
                          $query_consession_annual_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_annual_charges = mysqli_query($link, $query_consession_annual_charges);
                          $annual_charges_consession=0;
                          while($row_consession_annual_charges = mysqli_fetch_array($result_consession_annual_charges)){

                              $annual_charges_consession= $annual_charges_consession +  $row_consession_annual_charges['amount'];

                          }
                          $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
                          $books_charges_consession=0;
                          while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

                              $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

                          }
                          $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
                          $books_charges_consession=0;
                          while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

                              $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

                          }
                          $query_consession_uniform_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_uniform_charges = mysqli_query($link, $query_consession_uniform_charges);
                          $uniform_charges_consession=0;
                          while($row_consession_uniform_charges = mysqli_fetch_array($result_consession_uniform_charges)){

                              $uniform_charges_consession= $uniform_charges_consession +  $row_consession_uniform_charges['amount'];

                          }
                          $query_consession_others = "SELECT * FROM `fee_concession` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_consession_others = mysqli_query($link, $query_consession_others);
                          $others_consession=0;
                          while($row_consession_others = mysqli_fetch_array($result_consession_others)){

                              $others_consession= $others_consession +  $row_consession_others['amount'];

                          }
                          //Extra Charges

                          $query_extra_admission = "SELECT * FROM `fee_extra` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra__admission = mysqli_query($link, $query_extra_admission);
                          $admission_extra=0;
                          while($row_extra_admission = mysqli_fetch_array($result_extra__admission)){

                              $admission_extra= $admission_extra +  $row_extra_admission['amount'];

                          }
                          $query_extra_registration = "SELECT * FROM `fee_extra` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_registration = mysqli_query($link, $query_extra_registration);
                          $registration_extra=0;
                          while($row_extra_registration = mysqli_fetch_array($result_extra_registration)){

                              $registration_extra= $registration_extra +  $row_extra_registration['amount'];

                          }
                          $query_extra_teution = "SELECT * FROM `fee_extra` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_teution = mysqli_query($link, $query_extra_teution);
                          $teution_extra=0;
                          while($row_extra_teution = mysqli_fetch_array($result_extra_teution)){

                              $teution_extra= $teution_extra +  $row_extra_teution['amount'];

                          }
                          $query_extra_transport = "SELECT * FROM `fee_extra` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_transport = mysqli_query($link, $query_extra_transport);
                          $transport_extra=0;
                          while($row_extra_transport = mysqli_fetch_array($result_extra_transport)){

                              $transport_extra= $transport_extra +  $row_extra_transport['amount'];

                          }
                          $query_extra_sports = "SELECT * FROM `fee_extra` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_sports = mysqli_query($link, $query_extra_sports);
                          $sports_extra=0;
                          while($row_extra_sports = mysqli_fetch_array($result_extra_sports)){

                              $sports_extra= $sports_extra +  $row_extra_sports['amount'];

                          }
                          $query_extra_paper_fund = "SELECT * FROM `fee_extra` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_paper_fund = mysqli_query($link, $query_extra_paper_fund);
                          $paper_fund_extra=0;
                          while($row_extra_paper_fund = mysqli_fetch_array($result_extra_paper_fund)){

                              $paper_fund_extra= $paper_fund_extra +  $row_extra_paper_fund['amount'];

                          }
                          $query_extra_annual_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_annual_charges = mysqli_query($link, $query_extra_annual_charges);
                          $annual_charges_extra=0;
                          while($row_extra_annual_charges = mysqli_fetch_array($result_extra_annual_charges)){

                              $annual_charges_extra= $annual_charges_extra +  $row_extra_annual_charges['amount'];

                          }
                          $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
                          $books_charges_extra=0;
                          while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

                              $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

                          }
                          $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
                          $books_charges_extra=0;
                          while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

                              $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

                          }
                          $query_extra_uniform_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_uniform_charges = mysqli_query($link, $query_extra_uniform_charges);
                          $uniform_charges_extra=0;
                          while($row_extra_uniform_charges = mysqli_fetch_array($result_extra_uniform_charges)){

                              $uniform_charges_extra= $uniform_charges_extra +  $row_extra_uniform_charges['amount'];

                          }
                          $query_extra_others = "SELECT * FROM `fee_extra` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth`='$period' AND `year`='$year1' ";
                          $result_extra_others = mysqli_query($link, $query_extra_others);
                          $others_extra=0;
                          while($row_extra_others = mysqli_fetch_array($result_extra_others)){

                              $others_extra= $others_extra +  $row_extra_others['amount'];

                          }
                          


                      $registration_fee= $row['registration_fee'] - $registration_consession + $registration_extra; 

                      $admission_fee= $row['admission_fee'] - $admission_consession + $admission_extra; 
                      $tuition_fee= $row['teution_fee'] - $teution_consession + $teution_extra;

                      $transport_fee=   $row['transport_fee'] - $transport_consession + $transport_extra; 
                        $sports_fee=   $row['sports_fee'] - $sports_consession + $sports_extra; 
                      $paper_fund=   $row['paper_fund'] - $paper_fund_consession + $paper_fund_extra; 
                      $annual_fee=   $row['annual_charges'] - $annual_charges_consession + $annual_charges_extra; 
                      $books_fee=   $row['books_charges'] - $books_charges_consession + $books_charges_extra; 
                      $uniform_fee=   $row['uniform_charges'] - $uniform_charges_consession + $uniform_charges_extra; 
                      $others=   $row['others'] - $others_consession + $others_extra; 

                        



//$total=$remaining+$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;
$total=$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;
          
                        ?>

<!-- <tr class="even pointer"> -->
<!-- <td class=" " style="border: 1px solid #dddddd;" > Pending Dues </td>-->
<!--<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $remaining; ?></td>-->
 
<tr class="even pointer"> 
<?php 
if($registration_fee!= 0) { ?>



<tr class="even pointer"> 
<td class=" " style=" border: 1px solid #dddddd;"><?php echo "Registration Fee"; ?></td>

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $registration_fee; ?></td>


<?php

}

if($admission_fee!= 0) { ?>
 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Admission Fee  </td> 

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $admission_fee; ?></td>             
<?php

}

if($tuition_fee!= 0) { ?>




<tr class="even pointer"> 

<td class=" " style="border: 1px solid #dddddd;"> Tuition Fee  </td> 

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $tuition_fee; ?></td>
<?php

}

if($transport_fee!= 0) { ?>




<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Transport Fee  </td>
 <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $transport_fee; ?></td>  </tr>

<?php

}

if($sports_fee!= 0) { ?>

<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Sports Fee<br/> </td> 

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $sports_fee; ?></td>  </tr>


<?php

}

if($paper_fund!= 0) { ?>

<tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Paper Fund<br/> </td> 

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $paper_fund; ?></td>  </tr>
<?php

}

if($annual_fee!= 0) { ?>


 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Annual Charges<br/> </td> 
  <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $annual_fee; ?></td>  </tr>
<?php

}

if($books_fee!= 0) { ?>

 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Books Charges<br/> </td>   

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $books_fee; ?></td>  </tr>
<?php

}

if($uniform_fee!= 0) { ?>

 <tr class="even pointer"> 
<td class=" " style="border: 1px solid #dddddd;"> Uniform Charges<br/> </td>   

    <td class=" " style="text-align:center;border: 1px solid #dddddd;">     <?php echo $uniform_fee; ?></td>  </tr>
<?php

}

?>
<!-- <tr class="even pointer"> -->
<!--<td class=" " style="border: 1px solid #dddddd;"> Absent Fine <br/></td> -->
<!-- <td class=" " style="text-align:center;border: 1px solid #dddddd;">      <?php echo $fine; ?></td>  </tr>-->
<?php



if($others!= 0) { ?>
                         
<tr class="even pointer">  
<td class=" " style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" " style="text-align:center;border: 1px solid #dddddd;">      <?php echo $others; ?></td>
<?php

}

?>
  


 <?php



 $query21 = "SELECT * FROM `fee1` WHERE `studentid` = '$id' AND feemonth= '$period' AND feeyear= '$year1'";
                       $result21 = mysqli_query($link, $query21);
                       if($result21 && mysqli_num_rows($result21) < 1){
 $query3 = "INSERT INTO `fee1`(`studentid`, `feemonth`, `feeyear`, `tamount`) VALUES ('$id', '$period', '$year1','$total')";
    $result3 = mysqli_query($link, $query3);
   
                       
} else {

 $query3 = "UPDATE `fee1` SET `tamount`='$total' WHERE `studentid` = '$id' AND feemonth= '$period' AND feeyear= '$year1'";
          $result3 = mysqli_query($link, $query3);


}

                        

 
                        ?>



                          
                        

                      <?php 

//$totalpaid=$totalpaid + $paid;
$count++; }   ?>
</tr>


               </tbody>

                   
                      </table>





   

<table class= "" width='100%'>
		        
                            <tbody>

 <tr class=""> 

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Due Amount Before Due Date:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php  echo $total;  ?></td>
    
     
 </tr>
 </tbody>
</table>

<br>
<table class= "" width='100%'>
		        
    <tbody>
        <tr class=""> 
            <td class=" " style="text-align:center; color:black; border: 3px solid #dddddd;" colspan="2"><b><?php echo "Fee Slab";   ?></b></td>
        </tr>
        <tr class=""> 
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Amount for period (".date('11-M')." to ". date('20-M').")";   ?></b></td>
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php if($total > 0) echo $total+100; else echo 0;  ?></td>  
        </tr>
        <tr class=""> 
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Amount for period (".date('21-M')." to ". date('t-M').")";   ?></b></td>
            <td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php if($total > 0)  echo $total+200;  else echo 0; ?></td>  
        </tr>

 
    </tbody>
 </table>

<table class= "" width='100%'>
		        
                            <tbody>

    
<tr class=" ">   
 <td class=" " align=""><br><br>Cashier Sign:________________  </td> <td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>

<td class=" " align="right"><br><br>Date:_________________  </td> </tr>

 </tbody>
                      </table> 

</div> </div>
 </div> 
<p style="page-break-after: always">

 <?php
                        

 }
 }   ?>
                   

                  



          </div></div></div></div>  
       
        <!-- /page content -->

      <?php
 include 'php/footer.php.inc'; 
?>
  </body>
</html>



