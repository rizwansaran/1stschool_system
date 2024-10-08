<?php 
require 'php/config.php';



$t_id=$_POST['t_id'];
$salary = $_POST['salary'];
$year=date("Y");
$count = count($_POST['salary']);
for($i=0;$i<$count ;$i++){

  $_sid  = mysqli_real_escape_string($link,$t_id[$i]);
   $_salary  = mysqli_real_escape_string($link,$salary[$i]);
    
 

   $queryq ="UPDATE `salary` SET `salary`='$_salary',`year`='$year' WHERE t_id='$_sid'";
    $result = mysqli_query($link, $queryq); 

}

 if($result==TRUE){
header("location:action_edit_salary.php?msg=Updated Successfully");
exit();
}
else{
header("location:action_edit_salary.php?msg=Failed to update Salary");
}

?>

