<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_POST['student'])){
   
$date = $_POST['date'];
 
 $month =date("m", strtotime($date));
$day =date("d", strtotime($date));
    $year = date("Y", strtotime($date));

   $id = $_POST['student'];
 $class = $_POST['class'];
    //$year = $_POST['batch'];
    $month_year = $_POST['month_year'];
  $month_total = $_POST['month_total'];

    $challan_number = $_POST['chalan_no'];

$count = count($month_year);

 $total_amount1 = $_POST['tamount'];
  $paid_amount1 = $_POST['amount'];

 $paid_amount= $paid_amount1;
 $paid_amount2= $paid_amount1;

$total_all_months=$total_amount1;



echo " Total of All Months : "; echo $total_all_months;

//$paid_all_months = $paid_amount1;

// 1st loop for Count checking


/*

for($j=0;$j<$count ;$j++)
{

 $value21  = mysqli_real_escape_string($link, $month_year[$j]);

$challan  = mysqli_real_escape_string($link, $challan_number[$j]);
$value_array=explode('-',$value21);

 echo "Month:";  echo $month=$value_array[0]; echo "\n";
 echo "Year:";   echo $year=$value_array[1]; echo "\n";

 echo "Challan #:"; echo $challan; echo "\n";

 echo "Student ID: "; echo $id; echo "\n";
 echo "Class:"; echo $class; echo "\n";






$query22 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `challan_no`='$challan_number[$j]' ";
                        $result22 = mysqli_query($link, $query22);
if(mysqli_num_rows($result22) > 0) {

$row22 = mysqli_fetch_array($result22);
//$tamount= $row22['tamount']; 

$amount_already_paid= $row22['amount']; 



$month_total[$j]= $month_total[$j] + $amount_already_paid;
    $paid_amount2 = $paid_amount2 + $amount_already_paid ;

}
else {

$month_total[$j] = $month_total[$j];
    $paid_amount2 = $paid_amount2;

}





if ($total_amount1 == $paid_amount1) {
 $total_amount_per_month2 = $month_total[$j] ;
    $amount_per_month2 = $month_total[$j] ;
$amount_last_month2 = $month_total[$j];

} 

else 

{
 $total_amount_per_month2 = $month_total[$j] ;
  $amount_per_month2 = $month_total[$j] ;


//$amount_last_month = $paid_amount % $amount_per_month;


//if($paid_amount < $month_total[$j]) { }














//if($i==($count-1)) {

if($paid_amount2 < $month_total[$j]) {


$amount_last_month2= $paid_amount2 ;

if($amount_last_month2 > 0){

 echo " Paid Last Month:"; echo $amount= $amount_last_month2; echo "\n";

}
else {


//echo "Paid Last Month:"; echo $amount= $amount_per_month2; echo "\n";


if($amount_last_month <= 0){
$count=$count + 1 - $j;

}

}


}
else {




echo "Paid Per Month:"; echo    $total_amount_per_month2;



 



}


$paid_amount2 -= $month_total[$j];


// $paid_all_months -= $monthly_amounts[$i];





}









echo "Total Per Month:"; echo $total_amount_per_month2; echo "\n";
 

}




*/





// 2nd loop



for($i=0;$i<$count ;$i++)
{

 $value21  = mysqli_real_escape_string($link, $month_year[$i]);

$challan  = mysqli_real_escape_string($link, $challan_number[$i]);
$value_array=explode('-',$value21);

 echo "Month:";  echo $month=$value_array[0]; echo "\n";
 echo "Year:";   echo $year=$value_array[1]; echo "\n";

 echo "Challan #:"; echo $challan; echo "\n";

 echo "Student ID: "; echo $id; echo "\n";
 echo "Class:"; echo $class; echo "\n";






$query22 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `challan_no`='$challan_number[$i]' ";
                        $result22 = mysqli_query($link, $query22);
if(mysqli_num_rows($result22) > 0) {

$row22 = mysqli_fetch_array($result22);
//$tamount= $row22['tamount']; 

$amount_already_paid= $row22['amount']; 



$month_total[$i]= $month_total[$i] + $amount_already_paid;
    $paid_amount = $paid_amount + $amount_already_paid ;

}
else {

$month_total[$i] = $month_total[$i];
    $paid_amount = $paid_amount;

}





if ($total_amount1 == $paid_amount1) {
 $total_amount_per_month = $month_total[$i] ;
    $amount_per_month = $month_total[$i] ;
$amount_last_month = $month_total[$i];
$amount= $amount_last_month;

} else {
 $total_amount_per_month = $month_total[$i] ;
  $amount_per_month = $month_total[$i] ;


//$amount_last_month = $paid_amount % $amount_per_month;

$amount_last_month= $paid_amount ;






//if($i==($count-1)) {


if($paid_amount < $month_total[$i]) {



 echo " Paid Last Month:"; echo $amount= $amount_last_month; echo "\n";




}
else {




echo "Paid Per Month:"; echo   $amount= $total_amount_per_month;



 


}






// $paid_all_months -= $monthly_amounts[$i];


$paid_amount -= $month_total[$i];





}






echo "Total Per Month:"; echo $tamount=$total_amount_per_month; echo "\n";
 

if($amount_last_month > 0){






$query2 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `challan_no`='$challan' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) < 1) {
 $query = "INSERT INTO `fee`(`studentid`,`class`, `feemonth`, `feeyear`, `challan_no`, `tamount`, `amount`, `date`) VALUES ('$id','$class', '$month', '$year','$challan', '$tamount', '$amount', '$date')";
    $result = mysqli_query($link, $query);
   



}
else {
$query1 ="UPDATE `fee` SET `amount`='$amount', `tamount`='$tamount', `date`='$date' WHERE `studentid`='$id' AND `challan_no`='$challan'";
   
                        $result1 = mysqli_query($link, $query1);
 
 


}


}







}


if($result=="TRUE"){
        echo  $error = "Fee Added Successfully";
        ?>
   
    <script>    
    
    window.location.href = 'active_students.php?msg=<?php echo $error;?>'; 
    
        </script>
        
//header("location:active_students.php?msg=Fee Added Successfully");
//exit();

<?php 
 }
else if($result1=="TRUE"){
          $error = "Updated Successfully";
 echo $error;
 
   ?>
   
    <script>    
    
    window.location.href = 'active_students.php?msg=<?php echo $error;?>'; 
    
        </script>
        
//header("location:active_students.php?msg=Fee Added Successfully");
//exit();

<?php 

 }
else {
  $error = mysqli_error($link);
  echo $error;
  
  ?>
   
    <script>    
    
    window.location.href = 'active_students.php?msg=<?php echo $error;?>'; 
    
        </script>
        
//header("location:active_students.php?msg=Fee Added Successfully");
//exit();

<?php 

  
//header("location:active_students.php?msg= $error");

}




}}










 //$d =date("Y-m-d"); 











/*


$query2 = "SELECT * FROM `fee` WHERE `studentid`='$id' AND `challan_no`='$total' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) < 1) {
 $query = "INSERT INTO `fee`(`studentid`,`class`, `feemonth`, `feeyear`, `challan_no`, `tamount`, `amount`, `date`) VALUES ('$id','$class', '$month', '$year','$total', '$tamount', '$amount', '$date')";
    $result = mysqli_query($link, $query);
   
if($result=="TRUE"){
        echo  $error = "Updated Successfully";
//header("location:active_students.php?msg=Fee Added Successfully");
exit();


 }
else {
 echo $error = "Error While Updating...";
//header("location:active_students.php?msg=Error While Adding Fee...");
}


}
else {
$query ="UPDATE `fee` SET `amount`='$amount', `tamount`='$tamount', `date`='$date' WHERE `studentid`='$id' AND `challan_no`='$total'";
   
                        $result = mysqli_query($link, $query);
 
 if($result=="TRUE"){
          $error = "Updated Successfully";


 }
else {
  $error = "Error While Updating...";

}


}






  }
*/



/*

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
                   <div class="x_content">

                    <!-- start form for validation -->
                 

                    <?php
                    if (isset($_POST['id'])) {
                       $id = $_POST['id'];
 $fee_group = $_POST['feegroup'];
 $fee_type = $_POST['feetype'];
 $amount = $_POST['amount'];
                        ?>
                        
                        <div class="row">
<div class="col-md-3 col-xs-3"> </div>
  <div class="col-md-6 col-xs-12">
        

                         <form action="" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="student"/>
<input type="hidden" value="<?php echo $student['class']; ?>" name="class"/>
     <input type="hidden" id="fullname" class="form-control" value="<?php echo $fee_group; ?>" name="feegroup"  required /> <br/>
            <input type="hidden" id="fullname" class="form-control" value="<?php echo $fee_type; ?>" name="feetype"  required /> <br/>
            
                           <div class="col-md-12 col-xs-12">
             
                       <label for="fullname">Date* :</label>
                      <input type="date" id="fullname" class="form-control" name="date"  required /> <br/>
</div>

 <div class="col-md-12 col-xs-12">
             
                       <label for="fullname">Fee Group* :</label>
                      <input type="text" id="fullname" class="form-control" value="<?php echo $fee_group; ?>" name="feegroup"  disabled /> <br/>
</div>
 <div class="col-md-12 col-xs-12">
             
                       <label for="fullname">Fee Type* :</label>
                      <input type="text" id="fullname" class="form-control" value="<?php echo $fee_type; ?>" name="feetype"  disabled /> <br/>
</div>
 <div class="col-md-12 col-xs-12">
              <script>
function cal_mpPercentage(){
	
		var mp = "mp";
		var MP_ObtMarks = Number($("#MP_ObtMarks").val());
		var t_marks = Number($("#MP_MaxMarks").val());	
		if(t_marks !=""){
			if(MP_ObtMarks > t_marks)
			{
				alert("Obtiained marks must be less than total marks");
				$("#MP_ObtMarks").val(t_marks);
				$("#MP_MaxMarks").val(t_marks);
				$("#MP_MaxMarks").focus();
				return false;
			}
		}

	}
 </script>
                       <label for="fullname">Total Amount* :</label>
                      <input type="text" id="MP_MaxMarks" onChange="cal_mpPercentage();" class="form-control" value="<?php echo $amount; ?>" name="MP_MaxMarks" disabled  /> <br/>
</div>

 <div class="col-md-12 col-xs-12">
             
                       <label for="fullname">Paid Amount * :</label>
                      <input type="text" id="MP_ObtMarks" onChange="cal_mpPercentage();" class="form-control" value="<?php echo $amount; ?>" name="MP_ObtMarks"  required /> <br/>
</div>







                              <div class="col-md-6 col-xs-6">
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                              </div>
                              
                            </div>
                          </form>
                          
                        
                        <?php
                    }
                        ?>
                      
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

<?php */ ?>