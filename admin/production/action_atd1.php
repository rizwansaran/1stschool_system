<?php 


require 'php/config.php';



if(isset($_POST['submit1'])){

                        $date = $_POST['date'];

   $query3 ="DELETE FROM `staff_atd` WHERE `date`='$date'";
   $result3 = mysqli_query($link, $query3); 
 if($result3==TRUE){

header("location:add_attendance.php?msg=Record Deleted Successfully!");

echo "Record Deleted Successfully!";
}
else{
echo "Error While Deleting...!";  }}
?>



