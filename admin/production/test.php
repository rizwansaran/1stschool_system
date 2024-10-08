<?php
// Start the session
session_start();
?>

<?php
require 'php/db.php';

if(isset($_POST['value'])){

$value1=$_POST['value'];

 
$count = count($value1);

$total=0;
 
$registration_fee= 0; 

$admission_fee= 0; 
$tuition_fee= 0;

$transport_fee=   0; 
  $sports_fee=   0; 
$paper_fund=   0; 
$annual_fee=   0; 
$books_fee=   0; 
$uniform_fee=  0; 
$others=   0; 
$dues=0;

$remaining=0;
$fine=0;

for($i=0;$i<$count ;$i++){
   

   $value21  = mysqli_real_escape_string($link,$value1[$i]);
$value_array=explode('-',$value21);

 echo $value11=$value_array[0];
 echo $value12=$value_array[1];




 $value211  = mysqli_real_escape_string($link,$value1[$i]);
$value_array1=explode('-',$value211);

 echo $value111=$value_array1[0];
 echo $year=$value_array1[1];

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






                        $query = "SELECT * FROM `chalan` WHERE `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
   
                     $result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
    //Consession
    $query_consession_admission = "SELECT * FROM `fee_concession` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession__admission = mysqli_query($link, $query_consession_admission);
    $admission_consession=0;
    while($row_consession_admission = mysqli_fetch_array($result_consession__admission)){

        $admission_consession= $admission_consession +  $row_consession_admission['amount'];

    }
    $query_consession_registration = "SELECT * FROM `fee_concession` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_registration = mysqli_query($link, $query_consession_registration);
    $registration_consession=0;
    while($row_consession_registration = mysqli_fetch_array($result_consession_registration)){

        $registration_consession= $registration_consession +  $row_consession_registration['amount'];

    }
    $query_consession_teution = "SELECT * FROM `fee_concession` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_teution = mysqli_query($link, $query_consession_teution);
    $teution_consession=0;
    while($row_consession_teution = mysqli_fetch_array($result_consession_teution)){

        $teution_consession= $teution_consession +  $row_consession_teution['amount'];

    }
    $query_consession_transport = "SELECT * FROM `fee_concession` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_transport = mysqli_query($link, $query_consession_transport);
    $transport_consession=0;
    while($row_consession_transport = mysqli_fetch_array($result_consession_transport)){

        $transport_consession= $transport_consession +  $row_consession_transport['amount'];

    }
    $query_consession_sports = "SELECT * FROM `fee_concession` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_sports = mysqli_query($link, $query_consession_sports);
    $sports_consession=0;
    while($row_consession_sports = mysqli_fetch_array($result_consession_sports)){

        $sports_consession= $sports_consession +  $row_consession_sports['amount'];

    }
    $query_consession_paper_fund = "SELECT * FROM `fee_concession` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_paper_fund = mysqli_query($link, $query_consession_paper_fund);
    $paper_fund_consession=0;
    while($row_consession_paper_fund = mysqli_fetch_array($result_consession_paper_fund)){

        $paper_fund_consession= $paper_fund_consession +  $row_consession_paper_fund['amount'];

    }
    $query_consession_annual_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_annual_charges = mysqli_query($link, $query_consession_annual_charges);
    $annual_charges_consession=0;
    while($row_consession_annual_charges = mysqli_fetch_array($result_consession_annual_charges)){

        $annual_charges_consession= $annual_charges_consession +  $row_consession_annual_charges['amount'];

    }
    $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
    $books_charges_consession=0;
    while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

        $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

    }
    $query_consession_books_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_books_charges = mysqli_query($link, $query_consession_books_charges);
    $books_charges_consession=0;
    while($row_consession_books_charges = mysqli_fetch_array($result_consession_books_charges)){

        $books_charges_consession= $books_charges_consession +  $row_consession_books_charges['amount'];

    }
    $query_consession_uniform_charges = "SELECT * FROM `fee_concession` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_uniform_charges = mysqli_query($link, $query_consession_uniform_charges);
    $uniform_charges_consession=0;
    while($row_consession_uniform_charges = mysqli_fetch_array($result_consession_uniform_charges)){

        $uniform_charges_consession= $uniform_charges_consession +  $row_consession_uniform_charges['amount'];

    }
    $query_consession_others = "SELECT * FROM `fee_concession` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_consession_others = mysqli_query($link, $query_consession_others);
    $others_consession=0;
    while($row_consession_others = mysqli_fetch_array($result_consession_others)){

        $others_consession= $others_consession +  $row_consession_others['amount'];

    }
    //Extra Charges

    $query_extra_admission = "SELECT * FROM `fee_extra` WHERE `fee_type`='admission_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra__admission = mysqli_query($link, $query_extra_admission);
    $admission_extra=0;
    while($row_extra_admission = mysqli_fetch_array($result_extra__admission)){

        $admission_extra= $admission_extra +  $row_extra_admission['amount'];

    }
    $query_extra_registration = "SELECT * FROM `fee_extra` WHERE `fee_type`='registration_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_registration = mysqli_query($link, $query_extra_registration);
    $registration_extra=0;
    while($row_extra_registration = mysqli_fetch_array($result_extra_registration)){

        $registration_extra= $registration_extra +  $row_extra_registration['amount'];

    }
    $query_extra_teution = "SELECT * FROM `fee_extra` WHERE `fee_type`='teution_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_teution = mysqli_query($link, $query_extra_teution);
    $teution_extra=0;
    while($row_extra_teution = mysqli_fetch_array($result_extra_teution)){

        $teution_extra= $teution_extra +  $row_extra_teution['amount'];

    }
    $query_extra_transport = "SELECT * FROM `fee_extra` WHERE `fee_type`='transport_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_transport = mysqli_query($link, $query_extra_transport);
    $transport_extra=0;
    while($row_extra_transport = mysqli_fetch_array($result_extra_transport)){

        $transport_extra= $transport_extra +  $row_extra_transport['amount'];

    }
    $query_extra_sports = "SELECT * FROM `fee_extra` WHERE `fee_type`='sports_fee' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_sports = mysqli_query($link, $query_extra_sports);
    $sports_extra=0;
    while($row_extra_sports = mysqli_fetch_array($result_extra_sports)){

        $sports_extra= $sports_extra +  $row_extra_sports['amount'];

    }
    $query_extra_paper_fund = "SELECT * FROM `fee_extra` WHERE `fee_type`='paper_fund' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_paper_fund = mysqli_query($link, $query_extra_paper_fund);
    $paper_fund_extra=0;
    while($row_extra_paper_fund = mysqli_fetch_array($result_extra_paper_fund)){

        $paper_fund_extra= $paper_fund_extra +  $row_extra_paper_fund['amount'];

    }
    $query_extra_annual_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='annual_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_annual_charges = mysqli_query($link, $query_extra_annual_charges);
    $annual_charges_extra=0;
    while($row_extra_annual_charges = mysqli_fetch_array($result_extra_annual_charges)){

        $annual_charges_extra= $annual_charges_extra +  $row_extra_annual_charges['amount'];

    }
    $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
    $books_charges_extra=0;
    while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

        $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

    }
    $query_extra_books_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='books_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_books_charges = mysqli_query($link, $query_extra_books_charges);
    $books_charges_extra=0;
    while($row_extra_books_charges = mysqli_fetch_array($result_extra_books_charges)){

        $books_charges_extra= $books_charges_extra +  $row_extra_books_charges['amount'];

    }
    $query_extra_uniform_charges = "SELECT * FROM `fee_extra` WHERE `fee_type`='uniform_charges' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_uniform_charges = mysqli_query($link, $query_extra_uniform_charges);
    $uniform_charges_extra=0;
    while($row_extra_uniform_charges = mysqli_fetch_array($result_extra_uniform_charges)){

        $uniform_charges_extra= $uniform_charges_extra +  $row_extra_uniform_charges['amount'];

    }
    $query_extra_others = "SELECT * FROM `fee_extra` WHERE `fee_type`='others' AND `student_id`='$id' AND `feemonth` = '$value11' AND `year`='$value12' ";
    $result_extra_others = mysqli_query($link, $query_extra_others);
    $others_extra=0;
    while($row_extra_others = mysqli_fetch_array($result_extra_others)){

        $others_extra= $others_extra +  $row_extra_others['amount'];

    }
    


$registration_fee1= $row['registration_fee'] - $registration_consession + $registration_extra; 

$admission_fee1= $row['admission_fee'] - $admission_consession + $admission_extra; 
$tuition_fee1= $row['teution_fee'] - $teution_consession + $teution_extra;

$transport_fee1=   $row['transport_fee'] - $transport_consession + $transport_extra; 
  $sports_fee1=   $row['sports_fee'] - $sports_consession + $sports_extra; 
$paper_fund1=   $row['paper_fund'] - $paper_fund_consession + $paper_fund_extra; 
$annual_fee1=   $row['annual_charges'] - $annual_charges_consession + $annual_charges_extra; 
$books_fee1=   $row['books_charges'] - $books_charges_consession + $books_charges_extra; 
$uniform_fee1=   $row['uniform_charges'] - $uniform_charges_consession + $uniform_charges_extra; 
$others1=   $row['others'] - $others_consession + $others_extra; 


   
$registration_fee=$registration_fee + $registration_fee1 ; 

$admission_fee= $admission_fee + $admission_fee1; 
$tuition_fee= $tuition_fee + $tuition_fee1;

$transport_fee=   $transport_fee + $transport_fee1; 
  $sports_fee=   $sports_fee + $sports_fee1; 
$paper_fund=   $paper_fund + $paper_fund1; 
$annual_fee=   $annual_fee + $annual_fee1; 
$books_fee=   $books_fee + $books_fee1; 
$uniform_fee=  $uniform_fee + $uniform_fee1; 
$others=  $others + $others1; 





$batch = $value11;
$batch1 = $batch - 1;

//$year1 = $value12 - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;
$year = $value12 - 1; 

}
else {

$batch1 = $batch1;

$year = $value12; 


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








} else {
$row2 = mysqli_fetch_array($result2);
$tamount= $row2['tamount']; 

$amount= $row2['amount']; 
$dues=$tamount - $amount;

}


}
                        ?>



<?php 

if($registration_fee != 0) { ?>



<tr class="even pointer"> 

<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style=" border: 1px solid #dddddd;"!=<?php echo "Registration Fee"; ?></td>

<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4"style="text-align:center; border: 1px solid #dddddd;"><?php echo $registration_fee; ?></td>


<?php

}

if($admission_fee != 0) { ?>
 <tr class="even pointer"> 
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="border: 1px solid #dddddd;"> Admission Fee  </td> 

    <td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">     <?php echo $admission_fee; ?></td>             
<?php

}

if($tuition_fee != 0) { ?>




<tr class="even pointer"> 

<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="border: 1px solid #dddddd;"> Tuition Fee  </td> 

    <td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">     <?php echo $tuition_fee; ?></td>
<?php

}

if($transport_fee != 0) { ?>




<tr class="even pointer"> 
<td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Transport Fee  </td>
 <td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style=" text-align:center; border: 1px solid #dddddd;">     <?php echo $transport_fee; ?></td>  </tr>

<?php

}

if($sports_fee != 0) { ?>

<tr class="even pointer"> 
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Sports Fee<br/> </td> 

    <td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style=" text-align:center; border: 1px solid #dddddd;">     <?php echo $sports_fee; ?></td>  </tr>


<?php

}

if($paper_fund != 0) { ?>

<tr class="even pointer"> 
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Paper Fund<br/> </td> 

    <td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $paper_fund; ?></td>  </tr>
<?php

}

if($annual_fee != 0) { ?>


 <tr class="even pointer"> 
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="border: 1px solid #dddddd;"> Annual Charges<br/> </td> 
  <td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">     <?php echo $annual_fee; ?></td>  </tr>
<?php

}

if($books_fee != 0) { ?>

 <tr class="even pointer"> 
<td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Books Charges<br/> </td>   

    <td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $books_fee; ?></td>  </tr>
<?php

}

if($uniform_fee != 0) { ?>

 <tr class="even pointer"> 
<td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Uniform Charges<br/> </td>   

    <td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4 " style="text-align:center; border: 1px solid #dddddd;">     <?php echo $uniform_fee; ?></td>  </tr>
<?php

}

if($fine != 0) {
?>


 <tr class="even pointer"> 
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Absent Fine <br/></td> 
 <td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">      <?php echo $fine; ?></td>  </tr>



<?php

}

if($others != 0) { ?>
                         
<tr class="even pointer">  
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Miscellaneous Fee <br/> </td> 
<td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">      <?php echo $others; ?></td>
<?php

}


if($dues != 0) { ?>

                            

<tr class="even pointer">  
<td class="col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="border: 1px solid #dddddd;"> Pending Dues <br/> </td> 
<td class=" col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4" style="text-align:center; border: 1px solid #dddddd;">      <?php echo $dues; ?></td>

<?php

}




?>










<?php


   }  ?>



