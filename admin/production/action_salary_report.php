<?php 
require 'php/config.php';

$month=$_POST['month'];
$year=$_POST['year'];
$date1= date("d-m-Y h:i:sa", strtotime("+4 hours")); 
 

$sid = $_POST['t_id']; 
                                                    
$salary = $_POST['salary']; 
$paid = $_POST['paid']; 

$count = count($_POST['paid']);


$query1 = "SELECT * FROM `salary_report` WHERE `month`='$month' AND `year`='$year' ";
                        $result1 = mysqli_query($link, $query1);
                        if(mysqli_num_rows($result1) > 0) {
                            
                            for($i=0;$i<$count ;$i++){

  $_sid  = mysqli_real_escape_string($link,$sid[$i]);
   $_salary  = mysqli_real_escape_string($link,$salary[$i]);
    $_paid  = mysqli_real_escape_string($link,$paid[$i]);
    
     $query ="UPDATE `salary_report` SET `salary`='$_salary', `paid`='$_paid', `date`='$date1' WHERE `t_id`='$_sid' AND `month`='$month' AND `year`='$year' "; 
    $result = mysqli_query($link, $query); 
                            }
                          if($result==TRUE){
header("location:salary_status.php?msg=Record Updated");
exit();
}
else{
     $error=mysqli_error($link);
    
header("location:salary_status.php?msg=$error");
}    
                        }
                        else {

for($i=0;$i<$count ;$i++){

  $_sid  = mysqli_real_escape_string($link,$sid[$i]);
   $_salary  = mysqli_real_escape_string($link,$salary[$i]);
    $_paid  = mysqli_real_escape_string($link,$paid[$i]);
    
    
    
    

   $query ="INSERT INTO `salary_report`( `t_id`,`month`,`year`, `salary`,`paid`) VALUES ('$_sid','$month','$year','$_salary','$_paid')"; 
    $result = mysqli_query($link, $query); 

}

 if($result==TRUE){
header("location:salary_status.php?msg=Record Inserted");
exit();
}
else{
    $error=mysqli_error($link);
    
header("location:salary_status.php?msg= $error");
} 
}
?>

