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
                     	 
          			 $staff=$_POST['id'];			 
                       
 $query1 = "SELECT * FROM `student` WHERE `id`='$staff' ";
                          $result1 = mysqli_query($link, $query1);
                         $r = mysqli_fetch_array($result1);
                          
 $mobileno = $r['mobile'];
                       
                         ?>


                        
                       
                          <?php echo $r['fullname'];?>

<?php

$year = date("Y");

  $batch= $_POST['month'];


if($batch== 1){
$month= "January";
}
elseif($batch== 2)
{
$month= "February";
}
elseif($batch== 3)
{
$month= "March";
}
elseif($batch== 4)
{
$month= "April";
}
elseif($batch== 5)
{
$month= "May";
}
elseif($batch== 6)
{
$month= "June";
}
elseif($batch== 7)
{
$month= "July";
}
elseif($batch== 8)
{
$month= "August";
}
elseif($batch== 9)
{
$month= "September";
}
elseif($batch== 10)
{
$month= "October";
}
elseif($batch== 11)
{
$month= "November";
}
elseif($batch== 12)
{
$month= "December";
}


echo $month;

 ?> - <?php echo $year; ?> 


   
                       	 <?php
$id=$r['id'];
 $date1=$_POST['month'];
$year = date("Y"); 

 $query = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1' AND `year`='$year'";
                        $result = mysqli_query($link, $query);
              $total= mysqli_num_rows( $result); 
$count=1;          
 while($row = mysqli_fetch_array($result))
                        {
$date=$row['date'];
                     $timestamp = strtotime($date);

                          $day1 = date('l', $timestamp);
                          
                         
                          
                        ?>
<?php echo $count; ?>

                            <?php  $dd=$row['date']; echo date("d-m-Y", strtotime($dd))?>
                           

                            <?php echo $day1; ?>

   

                            <?php if($row['status'] =='0'){ ?> 
                            <?php echo "A"; ?> 
   <?php } 
                            else if($row['status'] =='1'){?>
                            <?php echo "P"; ?>   <?php }

                            else {?>
                           <?php echo "L"; ?>    <?php }?>





                          <?php

                        $count++;   
                            }?>
                     


   
 
<?php
$id=$r['id'];
 $date1=$_POST['month'];
$year = date("Y"); 

$query11 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1'AND `year`='$year' AND `status`='0'";
                        $result11 = mysqli_query($link, $query11);
                        $absents= mysqli_num_rows( $result11);
$query12 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `month`='$date1' AND `year`='$year' AND `status`='1'";
                        $result12 = mysqli_query($link, $query12);
                        $presents= mysqli_num_rows( $result12);

 ?>
                     
 <?php $stdname= $r['fullname']; 
$leaves=$total-($presents+$absents);

?>          
<?php

 $query121 = "SELECT * FROM `insti_name` ";
                          $result121 = mysqli_query($link, $query121);
 $res121 = mysqli_fetch_array($result121);
                       
                       
$name = $res121['abri'];
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
        "message" => " Student Name: $stdname Attendance Month: $month - $year Total Absents: $absents Total Presents: $presents Total Leaves:$leaves ",
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



$msg=$response;


 echo "<script type='text/javascript'>window.location.href ='sms_attendance_monthly11.php?msg=$msg';</script>";
  

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
