<?php 
require 'php/config.php';


$year=date("Y");
$sid=$_POST['t_id'];
$salary = $_POST['salary']; 

$count = count($salary);

for($i=0; $i < $count ;$i++){
    $_sid  = mysqli_real_escape_string($link,$sid[$i]);
    $_salary  = mysqli_real_escape_string($link,$salary[$i]);


 echo  $_sid;
   echo "<br>";
    // echo  $_salary;
   echo "<br>";

 $queryw ="SELECT * FROM `salary` WHERE `t_id`='$_sid' ";
    $resultw = mysqli_query($link, $queryw); 
if(mysqli_num_rows($resultw) > 0){
 $query ="UPDATE `salary` SET `salary`='$_salary', `year`='$year' WHERE `t_id`='$_sid' ";
    $result = mysqli_query($link, $query); 
//header("location:action_salary.php?msg=Record Already Exists...!");

}
else{
  
   $query ="INSERT INTO `salary`( `t_id`, `salary`,`year`) VALUES ('$_sid','$_salary','$year')";
    $result = mysqli_query($link, $query); 

    
    
    



}



}  

if($result==TRUE){
     
  echo "<script type='text/javascript'>window.location.href = 'action_edit_salary.php?msg=Updated Successfully';</script>";
    
     
//header("location:action_salary.php?msg=Record Inserted");
exit();
}
else{
    echo "<script type='text/javascript'>window.location.href = 'action_edit_salary.php?msg=Record Insertion Failed';</script>";
  
//header("location:action_salary.php?msg=Record Insertion Failed");

}



?>

