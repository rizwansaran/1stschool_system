<?php 
require 'php/config.php';


 $class = $_SESSION['class'];
 $section = $_SESSION['section'];  
   
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $text = $_POST['text']; 
    $d =date("Y-m-d"); 
    $tid=$_SESSION['id'];
   
  $query ="INSERT INTO `videos`(`id`, `name`, `t_id`, `p_date`, `d_date`, `class`,`section`, `subject`) 
                    VALUES ('','$text','$tid', '$d','$date','$class','$section','$subject')";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
header("location:add_video.php?msg=Record Inserted");
exit();
}
else{
header("location:add_video.php?msg=Record Insertion Failed");
}


?>


