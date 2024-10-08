<?php
// Start the session
session_start();
?>

<?php
require 'php/db.php';

if(isset($_POST['value'])){

$value1=$_POST['value'];
 

$count = count($value1);


$remaining=0;
$fine=0;
$dues=0;
?>


<tr class="">  
<td class=" col-md-2 " style="text-align:center; border: 0px solid #dddddd;">


<?php


$total=0;
for($i=0;$i<$count ;$i++){
   

  
   $value21  = mysqli_real_escape_string($link,$value1[$i]);
$value_array=explode('-',$value21);

 $month_to=$value_array[0];
  $year_to=$value_array[1];

  $value211  = mysqli_real_escape_string($link,$value1[$i]);
$value_array1=explode('-',$value211);

  $value111=$value_array1[0];
  $year=$value_array1[1];

$prev_month=$value111-1;
if($prev_month==0){
$prev_month=$prev_month+12;
$year=$year-1;
}

 

$id=$_SESSION["std_id"];
//$id="S0024-23";

$total_amount=0;

$query2 = "SELECT * FROM `fee` WHERE `studentid`='$id'AND `feemonth` = '$value111' AND `feeyear`='$year' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) < 1) {









                        $query = "SELECT * FROM `chalan` WHERE `student_id`='$id' AND `feemonth` = '$month_to' AND `year`='$year_to' ";
   
                     $result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
// $registration_fee= $row['registration_fee']; 

// $admission_fee= $row['admission_fee']; 
// $tuition_fee= $row['teution_fee'];

// $transport_fee=   $row['transport_fee']; 
//   $sports_fee=   $row['sports_fee']; 
// $paper_fund=   $row['paper_fund']; 
// $annual_fee=   $row['annual_charges']; 
// $books_fee=   $row['books_charges']; 
// $uniform_fee=   $row['uniform_charges']; 
// $others=   $row['others']; 

//Consession
$query_consession_admission = "SELECT * FROM `fee_concession` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession__admission = mysqli_query($link, $query_consession_admission);
$admission_consession=0;
while($row_consession_admission = mysqli_fetch_array($result_consession__admission)){

    $admission_consession= $admission_consession +  $row_consession_admission['amount'];

}
$query_consession_registration = "SELECT * FROM `fee_concession` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_registration = mysqli_query($link, $query_consession_registration);
$registration_consession=0;
while($row_consession_registration = mysqli_fetch_array($result_consession_registration)){

    $registration_consession= $registration_consession +  $row_consession_registration['amount'];

}
$query_consession_teution = "SELECT * FROM `fee_concession` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_teution = mysqli_query($link, $query_consession_teution);
$teution_consession=0;
while($row_consession_teution = mysqli_fetch_array($result_consession_teution)){

    $teution_consession= $teution_consession +  $row_consession_teution['amount'];

}
$query_consession_transport = "SELECT * FROM `fee_concession` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_transport = mysqli_query($link, $query_consession_transport);
$transport_consession=0;
while($row_consession_transport = mysqli_fetch_array($result_consession_transport)){

    $transport_consession= $transport_consession +  $row_consession_transport['amount'];

}
$query_consession_sports = "SELECT * FROM `fee_concession` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_sports = mysqli_query($link, $query_consession_sports);
$sports_consession=0;
while($row_consession_sports = mysqli_fetch_array($result_consession_sports)){

    $sports_consession= $sports_consession +  $row_consession_sports['amount'];

}
$query_consession_paper_fund = "SELECT * FROM `fee_concession` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_paper_fund = mysqli_query($link, $query_consession_paper_fund);
$paper_fund_consession=0;
while($row_consession_paper_fund = mysqli_fetch_array($result_consession_paper_fund)){

    $paper_fund_consession= $paper_fund_consession +  $row_consession_paper_fund['amount'];

}
$query_consession_annual_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_annual_charges = mysqli_query($link, $query_consession_annual_charges);
$annual_charges_consession=0;
while($row_consession_annual_charges = mysqli_fetch_array($result_consession_annual_charges)){

    $annual_charges_consession= $annual_charges_consession +  $row_consession_annual_charges['amount'];

}
$query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
$books_charges_consession=0;
while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

    $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

}
$query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
$books_charges_consession=0;
while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

    $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

}
$query_consession_uniform_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_uniform_charges = mysqli_query($link, $query_consession_uniform_charges);
$uniform_charges_consession=0;
while($row_consession_uniform_charges = mysqli_fetch_array($result_consession_uniform_charges)){

    $uniform_charges_consession= $uniform_charges_consession +  $row_consession_uniform_charges['amount'];

}
$query_consession_others = "SELECT * FROM `fee_concession` WHERE `fee_type`='others' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_consession_others = mysqli_query($link, $query_consession_others);
$others_consession=0;
while($row_consession_others = mysqli_fetch_array($result_consession_others)){

    $others_consession= $others_consession +  $row_consession_others['amount'];

}
//Extra Charges

$query_extra_admission = "SELECT * FROM `fee_extra` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra__admission = mysqli_query($link, $query_extra_admission);
$admission_extra=0;
while($row_extra_admission = mysqli_fetch_array($result_extra__admission)){

    $admission_extra= $admission_extra +  $row_extra_admission['amount'];

}
$query_extra_registration = "SELECT * FROM `fee_extra` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_registration = mysqli_query($link, $query_extra_registration);
$registration_extra=0;
while($row_extra_registration = mysqli_fetch_array($result_extra_registration)){

    $registration_extra= $registration_extra +  $row_extra_registration['amount'];

}
$query_extra_teution = "SELECT * FROM `fee_extra` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_teution = mysqli_query($link, $query_extra_teution);
$teution_extra=0;
while($row_extra_teution = mysqli_fetch_array($result_extra_teution)){

    $teution_extra= $teution_extra +  $row_extra_teution['amount'];

}
$query_extra_transport = "SELECT * FROM `fee_extra` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_transport = mysqli_query($link, $query_extra_transport);
$transport_extra=0;
while($row_extra_transport = mysqli_fetch_array($result_extra_transport)){

    $transport_extra= $transport_extra +  $row_extra_transport['amount'];

}
$query_extra_sports = "SELECT * FROM `fee_extra` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_sports = mysqli_query($link, $query_extra_sports);
$sports_extra=0;
while($row_extra_sports = mysqli_fetch_array($result_extra_sports)){

    $sports_extra= $sports_extra +  $row_extra_sports['amount'];

}
$query_extra_paper_fund = "SELECT * FROM `fee_extra` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_paper_fund = mysqli_query($link, $query_extra_paper_fund);
$paper_fund_extra=0;
while($row_extra_paper_fund = mysqli_fetch_array($result_extra_paper_fund)){

    $paper_fund_extra= $paper_fund_extra +  $row_extra_paper_fund['amount'];

}
$query_extra_annual_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_annual_charges = mysqli_query($link, $query_extra_annual_charges);
$annual_charges_extra=0;
while($row_extra_annual_charges = mysqli_fetch_array($result_extra_annual_charges)){

    $annual_charges_extra= $annual_charges_extra +  $row_extra_annual_charges['amount'];

}
$query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
$books_charges_extra=0;
while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

    $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

}
$query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
$books_charges_extra=0;
while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

    $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

}
$query_extra_uniform_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
$result_extra_uniform_charges = mysqli_query($link, $query_extra_uniform_charges);
$uniform_charges_extra=0;
while($row_extra_uniform_charges = mysqli_fetch_array($result_extra_uniform_charges)){

    $uniform_charges_extra= $uniform_charges_extra +  $row_extra_uniform_charges['amount'];

}
$query_extra_others = "SELECT * FROM `fee_extra` WHERE `fee_type`='others' AND `student_id`='$id' AND  `feemonth` = '$month_to' AND `year`='$year_to' ";
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




$batch = $month_to;
$batch1 = $batch - 1;

//$year1 = $value12 - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;
$year = $year_to - 1; 

}
else {

$batch1 = $batch1;

$year = $year_to; 


}



$month= $batch1-1;



 

$queryatd21 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year'";
                        $resultatd21 = mysqli_query($link, $queryatd21);
if(mysqli_num_rows($resultatd21) > 0) {
                        $studentatd21 = mysqli_num_rows($resultatd21);
                          
 $fine= $studentatd21 * 50 ;


 
 }
else
{

$fine=0;

}












$total1=$remaining+$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;




} else {
$row2 = mysqli_fetch_array($result2);
$tamount= $row2['tamount']; 

$amount= $row2['amount']; 
$dues=$tamount - $amount;
$total1=$dues;


}


$total=$total+$total1;

?>

  <input type="hidden"  name="month_total[]"  value="<?php echo  $total1; ?>"     class="form-control"  /> 

<input type="hidden"  name="month_year[]"  value="<?php echo  $value21; ?>"     class="form-control"  /> 

 <input type="hidden"  name="chalan_no[]"  value="<?php echo $month_to; ?><?php echo $year_to; ?><?php echo $id; ?>"     class="form-control"  />


<?php

}
                        ?>

</td>

</tr>



<tr class="">  
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> Date: <hr> </td>

<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> Total Due Amount: <hr> </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> Amount Paid: <hr> </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> Balance: <hr> </td>

</tr>

<tr class="">    
                       
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> <input type="date"  name="date"  value="<?php echo date('d-m-Y'); ?>"     class="form-control" required /> </td>


<td class=" column-title col-md-4 col-lg-4 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 0px solid #dddddd;">  
<input type="text"  name="" id="" value="<?php echo $total; ?>"     class="form-control" disabled  />

<input type="hidden"  name="tamount" id="num1" value="<?php echo $total; ?>"     class="form-control"  </td>
<td class="column-title col-md-4 col-lg-4 col-sm-4 col-sm-4 col-xs-4"style="text-align:center; border: 0px solid #dddddd;">  <input type="number"  name="amount" id="num2" max="<?php echo $total; ?>" min="0" placeholder="Paid Amount:"      class="form-control" required/></td>
 <td class="column-title col-md-4 col-lg-4 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 0px solid #dddddd;"> <p id='answer'>  Balance: <?php echo $total; ?> </p> </td>


                        
                       

</tr>
<tr class="">  
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> <hr> </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> <hr> </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> <hr> </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;"> <hr> </td>

</tr>
<tr class=""> 

<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;">  </td>

<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;">  </td>
<td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;">  </td>



  <td class=" column-title col-md-2 col-lg-2 col-sm-2 col-sm-2 col-xs-2" style="text-align:center; border: 0px solid #dddddd;">
  <button type="submit" name="submit_fee" style="float:right; width:140px;" class="btn btn-primary form-control"> Save </button>
</td>
</tr>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>


<script>

    $("#num2").keyup(function(){
        $("#answer").html('');
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var ans = n1 - n2;
        $("#answer").html('Balance: ' +ans);
 





    }); 
    $("#num1").keyup(function(){
        $("#answer").html('');
        var n1 = $("#num1").val();
        var n2 = $("#num2").val();
        var ans = n1 - n2;
        $("#answer").html('Balance: ' +ans);


    });




</script>






<?php    } ?>



