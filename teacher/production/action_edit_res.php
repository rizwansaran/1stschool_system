
<?php 
require 'php/config.php';


 

$term=$_SESSION['term'];
$date=$_SESSION['date'];
$class =$_SESSION['class']; 
$sid=$_SESSION['sid'];

$count = count($sid);
$subject =  $_SESSION['subject'];
$year =  $_SESSION['year'];
$marks = $_POST['marks'];
$total = $_POST['total'];
$teacher= $_SESSION['id'];
$section = $_SESSION['section'];

$query3 ="DELETE FROM `result` WHERE `t_id`=' $teacher' AND `class`='$class' AND `subject`='$subject' AND `section`='$section' AND `term`='$term' AND `year`='$year'";
$result3 = mysqli_query($link, $query3); 
if($result3==TRUE){

        for($i=0;$i<$count ;$i++){ 

                $_sid  = mysqli_real_escape_string($link,$sid[$i]);
                $_marks  = mysqli_real_escape_string($link,$marks[$i]);
                
                if($total < $_marks) { header("location:add_res.php?msg= Obtained Marks Are Greater Than Total Marks");
                exit();
                }
                else{   
                        
                        $query ="INSERT INTO `result`(`t_id`, `subject`, `total`, `marks`, `studentid`, `term`, `year`, `class`, `section`) 
                        VALUES ('$teacher','$subject','$total','$_marks','$_sid','$term','$year','$class', '$section')";
                        $result = mysqli_query($link, $query); 
                }
        }
}

if($result==TRUE){
header("location:add_res.php?msg=Record updated");
exit();
}
else{
header("location:add_res.php?msg=Record updation Failed");
}


?>

   




