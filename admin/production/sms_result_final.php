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
                    <form action="" method="post">
             <div class="row">     <div class="col-md-3">
                        <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php
$query12 = "SELECT DISTINCT batch FROM `student` ORDER BY batch DESC ";
                        $result12 = mysqli_query($link, $query12);
                        
$row12 = mysqli_fetch_array($result12);
                        

$batch= $row12['batch'];

 $query1 = "SELECT DISTINCT class FROM `result` WHERE `year`='$batch' ORDER BY class DESC ";
 
                        $result1 = mysqli_query($link, $query1);
                        if(mysqli_num_rows($result1) > 0){
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }}
                     
                
                     
                     
                     ?>  
                      </select>
 </div>
                   <div class="col-md-1"> </div>
                
                        <input id="class" type="hidden" class="form-control" name="year" value="<?php echo $batch ?>" style="width:100%;" >

 
                       
 <div class="col-md-1"> </div>
                  <div class="col-md-3">
                    
                        <button type="submit" class="form-control btn btn-primary">View</button>
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
                       $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
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
 $year = $_POST['year'];
$query23 = "SELECT DISTINCT `subject` FROM `result` WHERE `class`= '$class' AND `year`='$year' ";
                          $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;
            while($sub = mysqli_fetch_array($result23)){ ?>
<?php  $sub['subject']; ?>



<?php 
$subject=$sub['subject'];
$id = $row['id'];
$class = $row['class'];
 $batch = $_POST['year'];
                          //$batch = date("Y");
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            
$totalmarks = 0;  $marks = 0;
                         

$res = mysqli_fetch_array($result14)
 ?>



                           
                       
                    <?php  $res['marks'] ; ?> 
                             

   <?php
       $totalmarks = $totalmarks + $res['total'];        
   
  $marks = $marks + $res['marks'];        
   



$id = $row['id'];
$class = $row['class'];
 $batch = $_POST['year'];
                          //$batch = date("Y");
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            

                          $totalmarks2 = 0;  $marks2 = 0;
                         $res2 = mysqli_fetch_array($result14) ?>
<?php  $res2['marks'] ; ?>
                         
 
<?php
   
       $totalmarks2 = $totalmarks2 + $res2['total'];        
  $marks2 = $marks2 + $res2['marks'];        
   
           

$id = $row['id'];
$class = $row['class'];
 $batch = $_POST['year'];
                          //$batch = date("Y");
				//$batch = $student['batch'];
                          $query222= "SELECT * FROM `result` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `year`= '$batch' ";
                          $result222 = mysqli_query($link, $query222);
            
$totalmarks3 = 0;  $marks3 = 0;
                         $res3 = mysqli_fetch_array($result222) ?>
                         
<?php  $res3['marks'] ; ?>
<?php  $res['total'] +  $res2['total'] + $res3['total'] ; ?>

<?php  $res['marks'] + $res2['marks'] + $res3['marks'] ; ?>
                          
            
<?php
   
       $totalmarks3 = $totalmarks3 + $res3['total'];        
   

                             
                     
             
       $marks3 = $marks3 + $res3['marks'];        
   
            if(($res['total'] +  $res2['total'] + $res3['total']) > 0){               
            
$result2=(($res['marks'] + $res2['marks'] + $res3['marks'])/($res['total'] +  $res2['total'] + $res3['total']))*100;
if($result2>=33)
{
$status1= 'Pass';}
else{

$status1= 'Fail';} }
?>

                          
                           

                            <?php 

                          
          

       $totalmark = $totalmark + ($res['total'] +  $res2['total'] + $res3['total']);        
   

                             
                   
             
       $mark = $mark + ($res['marks'] + $res2['marks'] + $res3['marks']);        
   
 }
                        
               ?>


                           
                        
 
                  

   
                            <?php  $totalmark; ?>
                   <?php  $mark; ?>

                            
<?php 
   if($totalmark > 0){  
$result=($mark/$totalmark)*100; 
if($result>=33)
{
$status= 'Pass';}
else{

$status= 'Fail';}


}
else {
$status= 'no result';

}


?>


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
         "message" => "Student Result Report <br> Student Name: $stdname <br> Father Name: $fname <br> Total Marks: $totalmark <br> Obtained Marks: $mark <br> Result: $status ",
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


 echo "<script type='text/javascript'>window.location.href ='sms_result_final.php?msg=$msg';</script>";
  

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





