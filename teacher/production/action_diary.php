<?php 
require 'php/config.php';


 $class = $_SESSION['class'];
 $section = $_SESSION['section'];  
   
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
     $d =date("Y"); 
    $year =date("Y-m-d"); 
    $tid=$_SESSION['id'];
   
  $query ="INSERT INTO `diary`(`t_id`,`year`, `text`, `p_date`, `d_date`, `class`,`section`, `subject`) 
                    VALUES ('$tid','$year','$text','$d','$date','$class','$section','$subject')";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
header("location:add_diary.php?msg=Record Inserted");
exit();
}
else{
header("location:add_diary.php?msg=Record Insertion Failed");
}


?>


