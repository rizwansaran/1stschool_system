<?php 
require 'php/config.php';


$date=$_SESSION['date'];
$sid=$_SESSION['sid'];
$class= $_SESSION['class'];
$section= $_SESSION['section'];
   
$atd = $_POST['atd']; 
$month= date("n", strtotime($date)); 
$year= date("Y", strtotime($date)); 

$day = date("d", strtotime($date));

$count = count($_POST['atd']);

for($i=0;$i<$count ;$i++){
    $_sid  = mysqli_real_escape_string($link,$sid[$i]);
    $_atd  = mysqli_real_escape_string($link,$atd[$i]);

   $query ="INSERT INTO `atd`(`std_id`, `class`, `section`, `status`,`date`, `day`, `month`, `year`) VALUES ('$_sid','$class','$section','$_atd','$date','$day','$month','$year')";
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

