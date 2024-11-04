<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise result!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
<?php if(!isset($_POST['class'])){
                    include 'php/topnav.php.inc';

} ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
           

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">

                  <div class="x_content">
 <?php if(!isset($_POST['class'])){
                      ?>
                    <form action="" method="post">
             <div class="row">     <div class="col-md-3">
                       <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php
$query12 = "SELECT DISTINCT batch FROM `student`  ORDER BY batch DESC ";
                        $result12 = mysqli_query($link, $query12);
                        
$row12 = mysqli_fetch_array($result12);
                        

$batch= $row12['batch'];

 $query1 = "SELECT DISTINCT class FROM `result` WHERE `year`='$batch' ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
                   <div class="col-md-1"> </div>
                
                        <input id="class" type="hidden" class="form-control" name="year" value="<?php echo $batch ?>" style="width:100%;" >

       
                        <div class="col-md-3">  <select id="term" class="form-control" name="term" >
 <option value="" selected disabled>Select Term</option>   
<?php
$query123 = "SELECT DISTINCT batch FROM `student`  ORDER BY batch DESC ";
                        $result123 = mysqli_query($link, $query123);
                        
$row123 = mysqli_fetch_array($result123);
                        

$batch= $row123['batch'];


 $query13 = "SELECT DISTINCT term FROM `result` WHERE `year`='$batch'  ORDER BY term ASC ";
                        $result13 = mysqli_query($link, $query13);
                        
while($row13 = mysqli_fetch_array($result13))
                        {

$term= $row13['term'];
if($term==1){

$term1="1st Term";
}
else if($term==2){

$term1="2nd Term";
}
else{
$term1="3rd Term";
}
?>
                        
<option value="<?php echo $term; ?>"><?php echo $term1; ?></option>
<?php }?> 
                         </select> </div>
 <div class="col-md-1"> </div>
                  <div class="col-md-3">
                    
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php }

if(isset($_POST['class'])){
                      ?>
                      <br>
                   <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
     $year = $_POST['year'];
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND `batch`='$year' AND `status`='Active'";
                        $result1 = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result1)){
                          $id = $row['id'];

$mobileno = $row['mobile'];
                         $batch = date("Y");



 $query123 = "SELECT * FROM `insti_name` ";
                       $result123 = mysqli_query($link, $query123);
                      
                        $row123 = mysqli_fetch_array($result123);
$name= $row123['full_name'];
$image= $row123['logo'];

  $stdname=$row['fullname']; 
 $fname= $row['fname']; ?>

 <?php $g=  $row['gender'];
if($g == 'M')
{
$sec= 'Male';
}
elseif($g == 'F') {
$sec= 'Female';
}


?>
 





               
                        <?php

$student= $row['id'];
$class = $row['class'];
$term = $_POST['term'];
$batch = date("Y");

 $query1 = "SELECT * FROM `result` WHERE `studentid`= '$student' AND `class`= '$class' AND `term`= '$term' AND `year`= '$year' ";
                                        $result2 = mysqli_query($link, $query1);
             

                          if(mysqli_num_rows($result2) < 1){  ?>
<tr class=" " style="border: 1px solid black;"> 

                           <td class=" "><h2 style="color:red">Result Not Uploaded Yet!...</h2></td>

                          

<?php } else {?>
                          </tr>

<?php

$totalmarks = 0;  $marks = 0;
                          while($res = mysqli_fetch_array($result2)){
                            ?>
                            
                       <?php 
$result3=($res['marks']/$res['total'])*100;
if($result3>=33)
{
$status1= 'Pass';}
else{

$status1= 'Fail';}
?>

<?php


                        
       $totalmarks = $totalmarks + $res['total'];        
   

                             
               ?>
 
 <?php 
                          
             
       $marks = $marks + $res['marks'];        

 }?>
                          
 
                       
<?php 
$result=($marks/$totalmarks)*100;
if($result>=33)
{
$status= 'Pass';}
else{

$status= 'Fail';}
?>

                         <?php }?>

 
<?php



$stdid=$row['id'];
$class=$row['class'];
$status1=$status;

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
        "message" => "Student Result Report <br> Student Name: $stdname <br> Father Name:$fname <br> Term: $term <br> Total Marks: $totalmarks <br> Obtained Marks: $marks <br> Result: $status "
,
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


 echo "<script type='text/javascript'>window.location.href ='sms_result_term.php?msg=$msg';</script>";
  
 
 ?>

                    </div>
                    <?php
                    }




?>
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
