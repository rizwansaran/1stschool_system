<?php 
require 'php/config.php';

$date = $_POST['date']; 
$sid = $_POST['sid'];

//$date=$_SESSION['date'];
//$sid=$_SESSION['sid'];

$atd = $_POST['atd']; 
$month= date("n", strtotime($date)); 
$year= date("Y", strtotime($date)); 

$time= date("H:i:s", strtotime("+4 hours")); 
$count = count($_POST['atd']);

for($i=0;$i<$count ;$i++){
    $_sid  = mysqli_real_escape_string($link,$sid[$i]);
    $_atd  = mysqli_real_escape_string($link,$atd[$i]);

   $query ="INSERT INTO `staff_atd`(`id`, `t_id`, `status`,`date`, `ctime`, `gtime`,`month`,`year`) VALUES ('','$_sid','$_atd','$date','$time','$time','$month','$year')";
    $result = mysqli_query($link, $query); 
}


 if($result==TRUE){
header("location:add_attendance.php?msg=Record Inserted");
exit();
}
else{
header("location:add_attendance.php?msg=Record Insertion Failed");
} 

?>

