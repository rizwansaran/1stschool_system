<?php
require 'php/config.php';
$error = "";


if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['submit'])){
$id = $_POST['id'];
$class = $_POST['class'];
   $month= $_POST['month'];
  $year= $_POST['year'];
    $registration_fee = $_POST['registration_fee'];
$admission_fee = $_POST['admission_fee'];
$tuition_fee = $_POST['tuition_fee'];
    $sports_fee = $_POST['sports_fee'];
    $paper_fund = $_POST['paper_fund'];
$annual_fee = $_POST['annual_fee'];
    $transport_fee = $_POST['transport_fee'];
 $books_fee = $_POST['books_fee'];
 $uniform_fee = $_POST['uniform_fee'];
   
    $others = $_POST['others'];
$count = count($tuition_fee);


for($i=0;$i<$count ;$i++){
    $_id  = $id;
    $_class  = $class;
    $_month  = mysqli_real_escape_string($link,$month[$i]);
 $_year  = mysqli_real_escape_string($link,$year[$i]);

   $_registration_fee  = mysqli_real_escape_string($link,$registration_fee[$i]);


  $_admission_fee  = mysqli_real_escape_string($link,$admission_fee[$i]);
 $_tuition_fee  = mysqli_real_escape_string($link,$tuition_fee[$i]);
 $_transport_fee  = mysqli_real_escape_string($link,$transport_fee[$i]);

 $_sports_fee  = mysqli_real_escape_string($link,$sports_fee[$i]);
 $_paper_fund  = mysqli_real_escape_string($link,$paper_fund[$i]);
 $_annual_fee  = mysqli_real_escape_string($link,$annual_fee[$i]);
  $_books_fee = mysqli_real_escape_string($link,$books_fee[$i]);
 $_uniform_fee  = mysqli_real_escape_string($link,$uniform_fee[$i]);
  $_others  = mysqli_real_escape_string($link,$others[$i]);



  $query_update = "SELECT * FROM `chalan` WHERE `student_id`='$_id' AND `feemonth`='$_month' AND `year`='$_year' ";
                     $result_update = mysqli_query($link, $query_update);
                       if(mysqli_num_rows($result_update) > 0){ 
                           
                         
                      $query = "UPDATE `chalan` SET   `class`='$_class', `registration_fee`='$_registration_fee', `admission_fee`='$_admission_fee', `teution_fee`='$_tuition_fee', `transport_fee`='$_transport_fee', `sports_fee` = '$_sports_fee', `paper_fund`= '$_paper_fund', `annual_charges`= '$_annual_fee', `books_charges`= '$_books_fee', `uniform_charges`= '$_uniform_fee', `others`= '$_others'   WHERE `student_id`='$_id' AND `class`='$_class' AND `feemonth`='$_month' AND `year`='$_year'";
    $result = mysqli_query($link, $query);    
                         
                           
                           
                       }

else {
    
    
    



  
    $query = "INSERT INTO `chalan`(`student_id`, `class`, `feemonth`,`year`, `registration_fee`, `admission_fee`, `teution_fee`, `transport_fee`, `sports_fee`, `paper_fund`, `annual_charges`, `books_charges`, `uniform_charges`, `others`)
 VALUES ('$_id','$_class','$_month','$_year','$_registration_fee','$_admission_fee','$_tuition_fee','$_transport_fee','$_sports_fee','$_paper_fund','$_annual_fee','$_books_fee','$_uniform_fee','$_others')";
    $result = mysqli_query($link, $query);

}
}
    if($result) {
$error = "Submitted succesfully!";
header("location:addstudent.php?error=$error");

 }
else
{
$error = mysqli_error($link);
}




    }
  }


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
 <h2>New fee Structure<?php
                  echo '    -    '.$error; 
                  ?></h2>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Name:<?php
if(isset($_GET['std_id']) && isset($_GET['std_name']) && isset($_GET['class'])){
$std_id=$_GET['std_id'];
$std_name=$_GET['std_name'];
$class=$_GET['class'];

}
                  echo '    -    '.$std_name; 
                  ?>    &nbsp; &nbsp; Class:  <?php  echo '    -    '.$class; 
                  ?>  </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<div class="table-responsive">



  <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
           
            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr. #</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;"> Financial Periods </th>
                           <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Registration Fee </th>
               
 
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Admission Fee </th>
                            
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Tuition Fee </th>
  <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Transport Fee</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sports Fee</th>
    <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Paper Fund</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Annual Charges</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Books Charges</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Uniform Charges</th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Others</th>

                          </tr>
                        </thead>

                        <tbody>
   <form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $std_id;?>"   class="form-control"/>
<input type="hidden" name="class" value="<?php echo $class;?>"   class="form-control"/>

<?php
                      
$c=1;
                        ?>

<?php 





$query2 = "SELECT * FROM `financial_year`WHERE `status`='active' ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
$start_date= $fe['year_start_date'];
$end_date= $fe['year_end_date'];



$installments= $fe['installments'];














if($installments=='12'){  

$start_month=date('n',strtotime("$start_date"));

$start_year=date('Y',strtotime("$start_date"));




for($i=1;$i<=$installments;$i++) {
if($i==1){

$month_number1=$start_month;
}
else {
$month_number1=$start_month + $i - 1;

}


if($month_number1<=12){

$month_number=$month_number1;
$year=$start_year;

}

if($month_number1>12){

$month_number=$month_number1-12;
$year=$start_year+1;


 }

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



$query_update = "SELECT * FROM `chalan` WHERE `student_id`='$std_id' AND `feemonth`='$month_number1' AND `year`='$year' || `student_id`='$std_id' AND `feemonth`='$month_number' AND `year`='$year' ";
                     $result_update = mysqli_query($link, $query_update);
                       if(mysqli_num_rows($result_update) > 0){
                       while($fe_update = mysqli_fetch_array($result_update)){ 
                           
                           
              $registration_fee= $fe_update['registration_fee']; 

$admission_fee= $fe_update['admission_fee']; 
$tuition_fee= $fe_update['teution_fee'];

$transport_fee=   $fe_update['transport_fee']; 
  $sports_fee=   $fe_update['sports_fee']; 
$paper_fund=   $fe_update['paper_fund']; 
$annual_fee=   $fe_update['annual_charges']; 
$books_fee=   $fe_update['books_charges']; 
$uniform_fee=   $fe_update['uniform_charges']; 
$others=   $fe_update['others']; 
             
        


?>


                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>




<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $month;?> - <?php echo $year;?> <input type="hidden" name="month[]" value="<?php echo $month_number;?>"   class="form-control"/> <input type="hidden" name="year[]" value="<?php echo $year;?>"   class="form-control"/>  </td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="registration_fee[]" value="<?php echo $registration_fee;?>"    class="form-control"/></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;">  <input type="number" name="admission_fee[]" value="<?php echo $admission_fee;?>"     class="form-control"/></td>

                            
<td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="text"  name="tuition_fee[]" id="input<?php echo $i; ?>" value="<?php echo $tuition_fee;?>"     class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="transport_fee[]" value="<?php echo $transport_fee;?>"     class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="sports_fee[]"  value="<?php echo $sports_fee;?>"    class="form-control"/></td>

                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="paper_fund[]" value="<?php echo $paper_fund;?>"    class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="annual_fee[]"   value="<?php echo $annual_fee;?>"   class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="books_fee[]"  value="<?php echo $books_fee;?>"    class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="uniform_fee[]"   value="<?php echo $uniform_fee;?>"   class="form-control"/></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="number" name="others[]"   value="<?php echo $others;?>"  class="form-control"/></td>


                          </tr>
                          <?php $c++; ?>


<?php

}


?>

<script> 

const input1 = document.getElementById("input1");
input1.addEventListener("input", function() {
  const value = input1.value;
  for (let j = 2; j <= 12; j++) {
    const input = document.getElementById("input" + j);
    input.value = value;
  }
});

</script>



<?php } else { ?>




                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>




<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $month;?> - <?php echo $year;?> <input type="hidden" name="month[]" value="<?php echo $month_number;?>"   class="form-control"/> <input type="hidden" name="year[]" value="<?php echo $year;?>"   class="form-control"/>  </td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="registration_fee[]" value="<?php echo "0";?>"    class="form-control"/></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;">  <input type="number" name="admission_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>

                            
<td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="text" id="input<?php echo $i;?>" name="tuition_fee[]"      class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="transport_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="sports_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>

                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="paper_fund[]" value="<?php echo "0";?>"    class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="annual_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="books_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="uniform_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="number" name="others[]"   value="<?php echo "0";?>"  class="form-control"/></td>


                          </tr>
                          <?php $c++; ?>


<?php

}


?>

<script> 

const input1 = document.getElementById("input1");
input1.addEventListener("input", function() {
  const value = input1.value;
  for (let j = 2; j <= 12; j++) {
    const input = document.getElementById("input" + j);
    input.value = value;
  }
});

</script>



<?php } ?>
<?php
}

if($installments=='4'){  

$start_month=date('m',strtotime("$start_date"));

$start_year=date('Y',strtotime("$start_date"));




for($i=0;$i<12;$i=$i+3) {


$month_number1=$start_month + $i;

if($month_number1<=12){

$month_number=$month_number1;
$year=$start_year;

}

if($month_number1>12){

$month_number=$month_number1-12;
$year=$start_year+1;


 }


$month_number3=$month_number1+2;

if($month_number3<=12){

$month_number2=$month_number3;
$year2=$start_year;

}

if($month_number3>12){

$month_number2=$month_number3-12;
$year2=$start_year+1;


 }

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



if($month_number2=='1'){

$month2="January";


}
else if($month_number2=='2'){

$month2="February";


}
else if($month_number2=='3'){

$month2="March";


}
else if($month_number2=='4'){

$month2="April";


}
else if($month_number2=='5'){

$month2="May";


}
else if($month_number2=='6'){

$month2="June";


}
else if($month_number2=='7'){

$month2="July";


}
else if($month_number2=='8'){

$month2="August";


}
else if($month_number2=='9'){

$month2="September";


}
else if($month_number2=='10'){

$month2="October";


}
else if($month_number2=='11'){

$month2="November";


}
else if($month_number2=='12'){

$month2="December";


}












?>


   
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>



                       <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?> <input type="hidden" name="month[]" value="<?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?>"   class="form-control"/> </td>
                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="registration_fee[]" value="<?php echo "0";?>"    class="form-control"/></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;">  <input type="number" name="admission_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="tuition_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="transport_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="sports_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>

                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="paper_fund[]" value="<?php echo "0";?>"    class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="annual_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="books_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="uniform_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="number" name="others[]"   value="<?php echo "0";?>"  class="form-control"/></td>

                          </tr>
                          <?php $c++; ?>



<?php



} } 



if($installments=='2'){  

$start_month=date('m',strtotime("$start_date"));

$start_year=date('Y',strtotime("$start_date"));




for($i=0;$i<12;$i=$i+6) {


$month_number1=$start_month + $i;

if($month_number1<=12){

$month_number=$month_number1;
$year=$start_year;

}

if($month_number1>12){

$month_number=$month_number1-12;
$year=$start_year+1;


 }


$month_number3=$month_number1+5;

if($month_number3<=12){

$month_number2=$month_number3;
$year2=$start_year;

}

if($month_number3>12){

$month_number2=$month_number3-12;
$year2=$start_year+1;


 }





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



if($month_number2=='1'){

$month2="January";


}
else if($month_number2=='2'){

$month2="February";


}
else if($month_number2=='3'){

$month2="March";


}
else if($month_number2=='4'){

$month2="April";


}
else if($month_number2=='5'){

$month2="May";


}
else if($month_number2=='6'){

$month2="June";


}
else if($month_number2=='7'){

$month2="July";


}
else if($month_number2=='8'){

$month2="August";


}
else if($month_number2=='9'){

$month2="September";


}
else if($month_number2=='10'){

$month2="October";


}
else if($month_number2=='11'){

$month2="November";


}
else if($month_number2=='12'){

$month2="December";


}












?>


   
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>


    <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?> <input type="hidden" name="month[]" value="<?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?>"   class="form-control"/> </td>
                             <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="registration_fee[]" value="<?php echo "0";?>"    class="form-control"/></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;">  <input type="number" name="admission_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="tuition_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="transport_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="sports_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>

                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="paper_fund[]" value="<?php echo "0";?>"    class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="annual_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="books_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="uniform_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="number" name="others[]"   value="<?php echo "0";?>"  class="form-control"/></td>
 </tr>
                          <?php $c++; ?>




<?php



} } 







if($installments=='1'){  

$start_month=date('m',strtotime("$start_date"));

$start_year=date('Y',strtotime("$start_date"));




for($i=0;$i<12;$i=$i+12) {


$month_number1=$start_month + $i;

if($month_number1<=12){

$month_number=$month_number1;
$year=$start_year;

}

if($month_number1>12){

$month_number=$month_number1-12;
$year=$start_year+1;


 }


$month_number3=$month_number1+11;

if($month_number3<=12){

$month_number2=$month_number3;
$year2=$start_year;

}

if($month_number3>12){

$month_number2=$month_number3-12;
$year2=$start_year+1;


 }





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



if($month_number2=='1'){

$month2="January";


}
else if($month_number2=='2'){

$month2="February";


}
else if($month_number2=='3'){

$month2="March";


}
else if($month_number2=='4'){

$month2="April";


}
else if($month_number2=='5'){

$month2="May";


}
else if($month_number2=='6'){

$month2="June";


}
else if($month_number2=='7'){

$month2="July";


}
else if($month_number2=='8'){

$month2="August";


}
else if($month_number2=='9'){

$month2="September";


}
else if($month_number2=='10'){

$month2="October";


}
else if($month_number2=='11'){

$month2="November";


}
else if($month_number2=='12'){

$month2="December";


}












?>


   
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>



                        <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?> <input type="hidden" name="month[]" value="<?php echo $month;?> - <?php echo $year;?>  to <?php echo $month2;?> - <?php echo $year2;?>"   class="form-control"/> </td>
                         <td class=" " style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="registration_fee[]" value="<?php echo "0";?>"    class="form-control"/></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;">  <input type="number" name="admission_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="tuition_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="transport_fee[]" value="<?php echo "0";?>"     class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="sports_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>

                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="paper_fund[]" value="<?php echo "0";?>"    class="form-control"/></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="annual_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="books_fee[]"  value="<?php echo "0";?>"    class="form-control"/></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"> <input type="number" name="uniform_fee[]"   value="<?php echo "0";?>"   class="form-control"/></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="number" name="others[]"   value="<?php echo "0";?>"  class="form-control"/></td>
     </tr>
                          <?php $c++; ?>




<?php



} } 



}



?>




                      
                        </tbody>
                      </table>





 <br>
                             
                             
                             
                                <button type="submit" style="float:right; width:100px;" name="submit" class="form-control btn btn-primary">Submit</button>
                             
                       

</form>





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
