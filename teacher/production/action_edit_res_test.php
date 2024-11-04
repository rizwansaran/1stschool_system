
<?php 
require 'php/config.php';

$month = $_POST['month'];
$sid=$_SESSION['sid'];
 $count = count($sid);


$term=$_SESSION['term'];
$date=$_SESSION['date'];
$class =$_SESSION['class']; 
$orderdate = explode('-', $date);
$year = $orderdate[0];


$subject =  $_SESSION['subject'];
           $marks = $_POST['marks'];
   
$total = $_POST['total'];
for($i=0;$i<$count ;$i++){ 
 
  $_sid  = mysqli_real_escape_string($link,$sid[$i]);

$_marks  = mysqli_real_escape_string($link,$marks[$i]);
   
if($total < $_marks) { header("location:add_res_test.php?msg= Obtained Marks Are Greater Than Total Marks");
exit();
}
 else{
  
   $query ="UPDATE `result1` SET `total`='$total', `marks`='$_marks' WHERE `studentid`='$_sid' AND `class`='$class' AND `subject`='$subject' AND `term`='$term' AND `month`='$month'";
    

        $result = mysqli_query($link, $query); 
}}

 
  if($result==TRUE){
header("location:add_res_test.php?msg=Record updated");
exit();
}
else{
header("location:add_res_test.php?msg=Record updation Failed");
}


?>

   




