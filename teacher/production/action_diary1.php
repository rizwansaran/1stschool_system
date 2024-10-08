<?php 
require 'php/config.php';

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $class = $_POST['class'];
 $section = $_POST['section'];  
   
    $date = $_POST['date'];
    //$subject = $_POST['subject'];
    //$text = $_POST['text'];
    $year  =date("Y"); 
     $d = date("Y-m-d"); 
    $tid=$_SESSION['id'];
    
    $query1 ="SELECT * FROM `diary1` WHERE `d_date`='$date' AND `class`='$class'AND `section`='$section' AND `t_id`='$tid'";
    $result1 = mysqli_query($link, $query1); 
    if(mysqli_num_rows($result1)>0){
        
    $query ="UPDATE `diary1` SET `text`='$image',`p_date`='$d'  WHERE  `d_date`='$date' AND `class`='$class'AND `section`='$section' AND `t_id`='$tid'";
    $result = mysqli_query($link, $query); 
    $msg="Record Updated ";
 } else {
   
  $query ="INSERT INTO `diary1`(`t_id`,`year`, `text`, `p_date`, `d_date`, `class`,`section`) 
                    VALUES ('$tid','$year','$image','$d','$date','$class','$section')";
    $result = mysqli_query($link, $query); 
$msg="Record Inserted ";
}

 if($result==TRUE){
header("location:add_diary2.php?msg=$msg");
exit();
}
else{
header("location:add_diary2.php?msg=Record Insertion Failed");
}


?>


