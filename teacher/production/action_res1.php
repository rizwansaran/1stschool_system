<?php 


require 'php/config.php';

if(isset($_POST['submit1'])){
$subject = $_POST['subject'];
                        $class = $_POST['class'];
$section = $_POST['section'];
$term = $_POST['term'];
 $teacher= $_POST['tid'];
   $query3 ="DELETE FROM `result` WHERE `t_id`=' $teacher' AND `class`='$class' AND `subject`='$subject' AND `section`='$section' AND `term`='$term'";
    $result3 = mysqli_query($link, $query3); 
 if($result3==TRUE){

header("location:add_res.php?msg=Record Deleted Successfully!");

echo "Record Deleted Successfully!";
}
else{
echo "Error While Deleting...!";  }}
?>
