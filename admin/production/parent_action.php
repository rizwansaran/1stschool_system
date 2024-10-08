<?php
require 'php/config.php';

if(isset($_POST['submit'])){

  $login = $_POST['login'];
    $password = $_POST['password']; 
 $fname = $_POST['fathername'];
    $mname = $_POST['fcnic'];
  $mobile = $_POST['mobile'];
  
  $query9 = "SELECT * FROM `parent` WHERE `username`= '$login' ";
                          $result14 = mysqli_query($link, $query9);
            

                          if($result14 && mysqli_num_rows($result14) < 1){
  
  
 
 $querea = "INSERT INTO `parent`(`id`, `username`, `password`, `dad`, `fcnic`, `mobile`, `image2`) VALUES ('','$login','$password','$fname','$mname','$mobile','')";
          $resultp = mysqli_query($link, $querea);
          
 
if($resultp==TRUE) {
header("location:active_students.php?msg= Parent Account Registered Succesfully");
exit();
}

else {
    
header("location:active_students.php?msg= mysqli_error($link);");
}
                          }
                          else {
                              
                              
              header("location:active_students.php?msg= Parent User Name Already exists please choose a different User Name...!");
exit();                
                              
                              
                          }
                              
                              
                              
                          }

?>