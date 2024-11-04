<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student result!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
 <?php if(!isset($_POST['class'])){
                      
        include 'php/topnav.php.inc';} ?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">

                  <div class="x_content">
        <?php if(!isset($_POST['class'])){
                      ?>
  <form action=" " method="post">
             <div class="row">     <div class="col-md-3 col-xs-12">
 <h3>Class*:</h3>
                        <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `result1` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>
 </div>
 <div class="col-md-1"> </div>
                 
                  <div class="col-md-3 col-xs-12">
             <h3>Month*:</h3>
<select id="class" class="form-control" name="month" style="width:100%;" >

 <option value="" selected disabled >Select Month </option>
<?php

 $query1 = "SELECT DISTINCT month FROM `result1` ORDER BY month DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$month= $row1['month'];
?>
   
                    
                        <option value="<?php echo $month;?> "><?php echo $month;?></option>
                     <?php }?>  
                      </select><br/><br/>

                        </div>
                 

                   <div class="col-md-1"> </div>
                 
                  <div class="col-md-3 col-xs-12">
              <h3>Year*:</h3>   
<select id="class" class="form-control" name="batch" style="width:100%;" >

 <option value="" selected disabled >Select Session </option>
<?php

 $query1 = "SELECT DISTINCT year FROM `result1` ORDER BY year DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$batch= $row1['year'];
?>
   
                    
                        <option value="<?php echo $batch?> "><?php echo $batch?></option>
                     <?php }?>  
                      </select><br/><br/>

                        </div>
                  </div>
                    <br/><br/>   
                  <div class="col-md-3 col-xs-6" style="align:right;">
                    
                        <button type="submit"  class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>

                    <?php }

if(isset($_POST['class'])){
                      ?>
                      
                    <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
 $year = $_POST['year']; 
 $month = $_POST['month'];
                       $query = "SELECT * FROM `student` WHERE `class`='$class' AND `batch`='$year' AND `status`='Active'";
                        $result1 = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result1)){
                          $id = $row['id'];
$mobileno = $row['mobile'];
                         $batch = date("Y");
                                                   ?>


<?php 

 $query123 = "SELECT * FROM `insti_name` ";
                       $result123 = mysqli_query($link, $query123);
                      
                        $row123 = mysqli_fetch_array($result123);
$name= $row123['full_name'];
$image= $row123['logo'];

?>

		
        



 <?php $stdname=$row['fullname'];    ?>  
  <?php $fname=$row['fname'];  ?>
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

$class = $_POST['class'];
$batch = $_POST['batch'];
 $month =$_POST['month'];
$query23 = "SELECT DISTINCT `subject` FROM `result1` WHERE `class`= '$class' AND `month`='$month' AND `year`='$batch'";
                          $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;


            while($sub = mysqli_fetch_array($result23)){ ?>



<?php 
$subject=$sub['subject'];
   $id = $row12['studentid'];
$class = $_POST['class'];
 $month =$_POST['month'];
                       	$batch = $_POST['batch'];
                          $query9 = "SELECT * FROM `result1` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `month`='$month' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            
$totalmarks = 0;  $marks = 0;

if(mysqli_num_rows($result14) > 0){

                         

$res = mysqli_fetch_array($result14);
 ?>
                            
                             

   <?php
       $totalmarks = $totalmarks + $res['total'];        
   
  $marks = $marks + $res['marks'];        
   
}
else {
?>


<?php
} 


$id = $row12['studentid'];
$class = $_POST['class'];
 $month =$_POST['month'];
                       	$batch = $_POST['batch'];
                          $query9 = "SELECT * FROM `result1` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `month`='$month' AND `year`= '$batch' ";
                          $result15 = mysqli_query($link, $query9);
            

                          $totalmarks2 = 0;  $marks2 = 0;

if(mysqli_num_rows($result15)>0){

                         $res2 = mysqli_fetch_array($result15);

 ?>


 
<?php
   
       $totalmarks2 = $totalmarks2 + $res2['total'];        
  $marks2 = $marks2 + $res2['marks'];        
}

else {
?>


<?php
} 

 
  
           
$id = $row12['studentid'];
$class = $_POST['class'];
 $month =$_POST['month'];
                      
				$batch = $_POST['batch'];
                          $query222= "SELECT * FROM `result1` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `month`='$month' AND `year`= '$batch' ";
                          $result222 = mysqli_query($link, $query222);
            
$totalmarks3 = 0;  $marks3 = 0;
if (mysqli_num_rows($result222)>0) {

                         $res3 = mysqli_fetch_array($result222); ?>
                         


<?php 
  $totalmarks3 = $totalmarks3 + $res3['total'];        
       
       $marks3 = $marks3 + $res3['marks'];   

}
else {
?>


<?php
} 

           



$id = $row12['studentid'];
$class = $_POST['class'];
 $month =$_POST['month'];
                      
				$batch = $_POST['batch'];
                          $query2221= "SELECT * FROM `result1` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '4' AND `month`='$month' AND `year`= '$batch' ";
                          $result2221 = mysqli_query($link, $query2221);
            
$totalmarks4 = 0;  $marks4 = 0;
if (mysqli_num_rows($result2221) > 0) {

                         $res4 = mysqli_fetch_array($result2221); ?>
 
                          
            
<?php
   
         $totalmarks4 = $totalmarks4 + $res4['total'];        
           
       $marks4 = $marks4 + $res4['marks']; 

}

else {
?>


<?php
} 
?> 
   
   <?php
            if(($totalmarks +  $totalmarks2 + $totalmarks3 + $totalmarks4) > 0){               
            
$result2=(($marks + $marks2 + $marks3 + $marks4)/($totalmarks +  $totalmarks2 + $totalmarks3 + $totalmarks4))*100;
if($result2>=33)
{
$status1= 'Pass';}
else{

$status1= 'Fail';}
?>
<?php if($status1== 'Fail'){?>
                            <?php }
                            else{?> 
                            <?php } }
else {
$status1= 'Fail';
 ?>
                          
<?php 
}
  ?>

 </tr>
                          
                           

                            <?php 

                          
          

       $totalmark = $totalmark + ($totalmarks +  $totalmarks2 + $totalmarks3 + $totalmarks4);        
   

                             
                   
             
       $mark = $mark + ($marks + $marks2 + $marks3 + $marks4);        
   
 }
                        
               ?>




     <?php



$stdid=$row['id'];
$class=$row['class'];
$status1=$status;


$message = ////sending sms

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
        "message" => "Student Result Report <br> Student Name: $stdname <br> Father Name:$fname <br> Total Marks: $totalmark <br> Obtained Marks: $mark <br> Result: $status ",
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


 echo "<script type='text/javascript'>window.location.href ='sms_result_test.php?msg=$msg';</script>";
  


 }

?>   
        
                        </div>
                       
</div>
                    </div>
                    <?php
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





