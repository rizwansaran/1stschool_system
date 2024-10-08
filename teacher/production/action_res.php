<?php 

require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
exit();
} 


$sid=$_SESSION['sid'];
$term=$_SESSION['term'];
$date=$_SESSION['date'];
$class =$_SESSION['class']; 
$count = count($sid);
$orderdate = explode('-', $date);
//$year = $orderdate[0];

$year= $_SESSION['year'];
$t_id= $_POST['tid']; 
$subject = $_SESSION['subject'];
$section = $_SESSION['section'];
$total = $_POST['total'];

           $marks = $_POST['marks'];

 for($i=0;$i<$count ;$i++){ 
 
  $_sid  = mysqli_real_escape_string($link,$sid[$i]);

$_marks  = mysqli_real_escape_string($link,$marks[$i]);
   
if($total < $_marks) { header("location:add_res.php?msg= Obtained Marks Are Greater Than Total Marks");
exit();
}
 else{
  
    $query ="INSERT INTO `result`(`t_id`, `subject`, `total`, `marks`, `studentid`, `term`, `year`, `class`, `section`) 
    			          VALUES ('$t_id','$subject','$total','$_marks','$_sid','$term','$year','$class', '$section')";
       

        $result = mysqli_query($link, $query); 
}}

  if($result==TRUE){
header("location:add_res.php?msg=Record Inserted");
exit();
}
else{
  $msg = urlencode(mysqli_error($link));
header("Location: add_res.php?msg=$msg");
exit;
}

?>

   



