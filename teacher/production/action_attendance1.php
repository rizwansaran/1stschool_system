<?php 
require 'php/config.php';

if(isset($_POST['submit'])){


/*
$date=$_SESSION['date'];
$sid=$_SESSION['sid'];
$class= $_SESSION['class'];
$section= $_SESSION['section'];
   */
$date = $_POST['date']; 
$sid = $_POST['sid'];
$class = $_POST['class'];
$section = $_POST['section'];
$remarks = $_POST['remarks']; 
$atd = $_POST['atd']; 
$month= date("n", strtotime($date)); 
$year= date("Y", strtotime($date)); 

$day = date("d", strtotime($date));

$count = count($_POST['atd']);

for($i=0;$i<$count ;$i++){
    $_sid  = mysqli_real_escape_string($link,$sid[$i]);
    $_atd  = mysqli_real_escape_string($link,$atd[$i]);
 $_remarks  = mysqli_real_escape_string($link,$remarks[$i]);

   $query ="INSERT INTO `atd`(`std_id`, `class`, `section`,`remarks`, `status`,`date`, `day`, `month`, `year`) VALUES ('$_sid','$class','$section','$_remarks', '$_atd','$date','$day','$month','$year')";
    $result = mysqli_query($link, $query); 
}


 if($result==TRUE){
header("location:add_attendance.php?msg=Record Inserted");
exit();
}
else{
    $msg=mysqli_error($link);
header("location:add_attendance.php?msg=$msg");
} 
}
?>

