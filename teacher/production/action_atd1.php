<?php 


require 'php/config.php';



if(isset($_POST['delete'])){

                        $date = $_POST['date'];
$class = $_POST['class'];
$section = $_POST['section'];
   $query3 ="DELETE FROM `atd` WHERE `date`='$date' AND `class`='$class' AND `section`='$section'";
   $result3 = mysqli_query($link, $query3); 
 if($result3==TRUE){

header("location:add_attendance.php?msg=Record Deleted Successfully!");

echo "Record Deleted Successfully!";
}
else{
echo "Error While Deleting...!";  }}
?>



