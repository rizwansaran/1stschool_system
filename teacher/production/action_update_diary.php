<?php 
require 'php/config.php';




   echo $did=$_SESSION['did'];
   echo $date = $_POST['date'];
   echo $sub = $_POST['sub'];
   echo $class = $_POST['class']; 
   echo $text = $_POST['text'];  
   
   
 	$query ="UPDATE `diary` SET `text`='$text',`d_date`='$date',`class`='$class',`subject`='$sub'
 	 WHERE `id`='$did'";
    $result = mysqli_query($link, $query); 

    if($result==TRUE){
header("location:edit_diary.php?msg=Record Updated");
exit();
}
else{
header("location:edit_diary.php?msg=Record Updation Failed");
}





?>

