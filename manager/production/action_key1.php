<?php 
require 'php/config.php';



   $key = $_POST['key'];
$date = $_POST['date']; 

    $query43 = "SELECT * FROM `maintain` WHERE `serial_key`='$key' ";
    $result43 = mysqli_query($link, $query43);
    
if( mysqli_num_rows($result43) > 0){
header("location:add_kay.php?msg= Key Already Exists!...");
exit();
}
else{
   $query ="INSERT INTO `maintain`(`id`, `serial_key`,`date`) VALUES ('','$key','$date')";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
header("location:add_kay.php?msg=Record Inserted");
exit();
}
else{
header("location:add_kay.php?msg=Record Insertion Failed");
} 
}
?>

