<?php 
require 'php/config.php';


$date= $_POST['date'];
$sid=$_POST['sid'];
$atd = $_POST['atd'];
$remarks = $_POST['remarks']; 
$count = count($_POST['atd']);

for($i=0;$i<$count ;$i++){
   $_sid  = mysqli_real_escape_string($link,$sid[$i]);

     $_atd  = mysqli_real_escape_string($link,$atd[$i]);
$_remarks  = mysqli_real_escape_string($link,$remarks[$i]);

 

    $query ="UPDATE `atd` SET  `remarks`='$_remarks', `status`='$_atd'  WHERE std_id='$_sid'";
    $result = mysqli_query($link, $query); 
}


 if($result==TRUE){
header("location:edit_attendance.php?msg=Success");
exit();
}
else{
      $msg=mysqli_error($link);

header("location:edit_attendance.php?msg=$msg");
}

?>

