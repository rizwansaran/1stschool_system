
<?php 
require 'php/config.php';


 

$term=$_SESSION['term'];
$date=$_SESSION['date'];
$class =$_SESSION['class']; 
$orderdate = explode('-', $date);
$year = $orderdate[0];

$sid=$_POST['sid'];
$subject =  $_SESSION['subject'];
           $marks = $_POST['marks'];
   

 
  echo "  $sid: "; echo "  $subject : "; echo " $marks <br />";                        
 $query ="UPDATE `result` SET `marks`='$marks' WHERE `studentid`='$sid' AND `subject`='$subject'";

        $result = mysqli_query($link, $query); 

  if($result==TRUE){
header("location:edit_res.php?msg=Record updated");
exit();
}
else{
header("location:edit_res.php?msg=Record updation Failed");
}


?>

   




