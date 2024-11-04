<?php 
require 'php/config.php';


$date=$_SESSION['date'];
$sid=$_SESSION['sid'];
$atd = $_POST['atd'];
$count = count($_POST['atd']);

for($i=0;$i<$count ;$i++){
   $_sid  = mysqli_real_escape_string($link,$sid[$i]);

   echo  $_atd  = mysqli_real_escape_string($link,$atd[$i]);


    $query ="UPDATE `atd` SET `status`='$_atd' WHERE std_id='$_sid'";
    $result = mysqli_query($link, $query); 
}


 if($result==TRUE){
header("location:edit_attendance.php?msg=Success");
exit();
}
else{
header("location:edit_attendance.php?msg=Failed");
}

?>

