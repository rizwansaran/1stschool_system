<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
             
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
$query121 = "SELECT * FROM `insti_name` ";
                          $result121 = mysqli_query($link, $query121);
 $res121 = mysqli_fetch_array($result121);
                       
                       
$name = $res121['abri'];

          			 $class=$_POST['class'];
 $section=$_POST['section'];			 
 
 $date1=$_POST['date'];
$year = date("Y"); 

 $query = "SELECT * FROM `atd` WHERE `class`='$class' AND `section`='$section' AND `date`='$date1' ";
                        $result = mysqli_query($link, $query);
                  if(mysqli_num_rows($result)>0){ 
 while($row = mysqli_fetch_array($result))
                        {
$date=$row['date'];
$student_id=$row['std_id'];
                  
 $query1 = "SELECT * FROM `student` WHERE `id`='$student_id' AND `status`='Active' ";

                          $result1 = mysqli_query($link, $query1);
                      $r = mysqli_fetch_array($result1);
                          
 $mobileno = $r['mobile'];
                       
                       $stdname= $r['fullname']; 


$status1=$row['status'];
if($status1=='0'){
$status="Absent";
}
else if($status1=='1'){
$status="Present";
}
else {
$status="leave";

}


                        

                       

 
 $querysms= "SELECT * FROM `sms_confg` ";
                          $resultsms = mysqli_query($link, $querysms);
            

if (mysqli_num_rows($resultsms) > 0) {

                         $ressms = mysqli_fetch_array($resultsms);
                           $api_token = $ressms['api_token']; 
                         
                           $api_secret = $ressms['api_secret']; 
                         
}
else {
    
     $api_token = "000000000000000";
     
                         
                           $api_secret = "00000000"; 
    
}

$url = "https://lifetimesms.com/plain";

    $parameters = [
        "api_token" => "$api_token",
        "api_secret" => "$api_secret",
          "to" => "$mobileno",
        "from" => "$name",
        "message" => " Student Name: $stdname Attendance Date: $date1 Attendance Status:$status ",
    ];

    $ch = curl_init();
    $timeout  =  30;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response ;




}
$msg=$response;

}
else {
$msg="No Attendance Uploaded On this Date";

}
 echo "<script type='text/javascript'>window.location.href ='sms_attendance_daily11.php?msg=$msg';</script>";
  

?>
                
     
                       
                    
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
