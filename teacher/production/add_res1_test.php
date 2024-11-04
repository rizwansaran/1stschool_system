<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>add result</title>
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
                <h3>Add Result </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


                          <?php
if(isset($_POST['submit'])){


$d =date("Y-m-d"); 
$query = "SELECT * FROM `access` ";
                          $result1 = mysqli_query($link, $query);
                         $res = mysqli_fetch_array($result1);
$ddate = $res['d_date'];
if($d > $ddate) {
$teacher= $_SESSION['id'];
                 
$query1 = "SELECT * FROM `access_single` WHERE `t_id`='$teacher' ";
                          $result2 = mysqli_query($link, $query1);
                         $res1 = mysqli_fetch_array($result2);
$date1 = $res1['d_date'];

if($d > $date1) {
echo "Your Access Time is Expired Contact Admin For Access";
}
elseif($d <= $date1){
  $date = date("Y-m-d");
                          
                          
                         
                          $class =  $_POST['class'];
                        
                     $subject = $_POST['subject'];

                  $section = $_POST['section'];

                         $year = $_POST['year'];
                    $_SESSION['year']= $year;
                    $month = $_POST['month'];

  $term = $_POST['term'];
 $query17 = "SELECT * FROM `result1` WHERE `class`='$class' AND `subject`='$subject' AND `term`='$term' AND `t_id`='$teacher' AND `section`='$section' AND `month`='$month' AND `year`='$year' ";
                        $result17 = mysqli_query($link, $query17);

                        
   if(mysqli_num_rows($result17) > 0){
                        
?>

                         <h2 style="color:red">Record Already Exists!...</h2>


                   

                    
                         
                         
<?php
                      $teacher= $_SESSION['id'];
                           $term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class = $_SESSION['class'] ;
$subject = $_POST['subject'];
$_SESSION['subject']=$subject;
$section= $_SESSION['section'];
$year= $_SESSION['year'];


 

     
 
                         ?>
                        
             <div class="row">
<div class="col-md-6 col-sm-12 col-xs-12">

<form action="action_res1_test.php" method="post">
<input  class="form-control" type="hidden" required="" name ="term" value="<?php echo $term; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="month" value="<?php echo $month; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="year" value="<?php echo $year; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="subject" value="<?php echo $subject; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                       <div class="form-group">
<button type="submit" name="submit1" class="form-control btn btn-primary pull-right" style="width:40%;">Delete</button>    
                       </form>
     
   </div>
<div class="col-md-6 col-sm-12 col-xs-12">
              
<form action="edit_res1_test.php" method="post">
<input  class="form-control" type="hidden" required="" name ="term" value="<?php echo $term; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="month" value="<?php echo $month; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="year" value="<?php echo $year; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="subject" value="<?php echo $subject; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                      
<button type="submit" name="submit1" class="form-control btn btn-primary pull-left" style="width:40%;">Edit</button>    
                       </form>
</div> </div>
<?php                        
 ?>





<?php } else{ ?>
         
<form action="action_res_test.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">



                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2><?php echo $class; echo $subject; echo $term;?> </h2><hr>

 <h2> Total Marks:</h2><hr style="width:40%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="total" style="width:40%;" >
  <option value="10">10</option> 
<option value="15">15</option>  
<option value="20">20</option> 
 <option value="25">25</option>  
<option value="30">30</option> 
 <option value="35">35</option> 
<option value="40">40</option>
 <option value="45">45</option> 
  <option value="50">50</option>
 <option value="55">55</option> 
   <option value="60">60</option>
 <option value="65">65</option> 
 <option value="70">70</option> 
			  <option value="75">75</option>
 <option value="80">80</option> 
                        <option value="85"> 85</option>
 <option value="90">90</option> 
 <option value="95">95</option> 
                    <option value="100">100</option>
                      </select><br/>
 

 

                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Student Name</th>

                             <th class="column-title" style="text-align:center;">Obtained Marks</th>

             
                                       </tr>
                        </thead>
                      
                      <?php


?>
                        <tbody>
<?php
                      $teacher= $_SESSION['id'];
$subject = $_POST['subject'];

 $query12 = "SELECT * FROM `subject` WHERE `t_id`=' $teacher' AND `class`='$class' AND `subject`='$subject'";
                        $result12 = mysqli_query($link, $query12);
                        
while($row12 = mysqli_fetch_array($result12))
                        {


$section= $row12['section'];

 if($section=='M+F'){
 $sql = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active' ";
                          $teachers = mysqli_query($link, $sql);
}
else{

                          $sql = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
                          $teachers = mysqli_query($link, $sql);
}
$a=1;
                          while ($row = mysqli_fetch_assoc($teachers)) {

                          ?>

                          <tr class="even pointer">
 
                          <td class=" " style="text-align:center;"><?php echo $section; echo $row['fullname'];?>

</td>


                         
  <td class=" " style="text-align:center;">

                           <div class="input-box fullname">
<input type="number"  name="marks[]" value=""  style="width:15%;text-align:center;">             
          </div>                         
                            </td>

                  
                       
                          </tr>

                         
                        </tbody>

                         <?php
                          $sid[]=$row['id'];
                          $_SESSION['sid'] = $sid;
$date = date("Y-m-d");
                          $_SESSION['date'] = $date;
                           $term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class = $_SESSION['class'] ;
$subject = $_POST['subject'];
$_SESSION['subject']=$subject;
$section= $row12['section'];
$_SESSION['section']= $section;


 

      $a++;                  } }
 
                         ?>
                        
                      </table>
                    </div>
<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                       <div class="form-group">
<button type="submit" name="submit1" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>    
                       </form>
                      

<?php                        
}}}
 

else
{
                     $date = date("Y-m-d");
                          
                        
                      $teacher= $_SESSION['id'];  
                         
                          $class = $_SESSION['class'] ;
                      $subject = $_POST['subject'];
   $section = $_SESSION['section'];

                         $year = $_POST['year'];


$term = $_POST['term'];
$month = $_POST['month'];
$query1 = "SELECT * FROM `result1` WHERE `class`='$class' AND `subject`='$subject' AND `term`='$term' AND `month`='$month' AND `t_id`='$teacher' AND `section`='$section' AND `year`='$year' ";
                                           $result2 = mysqli_query($link, $query1);
             

                          if(mysqli_num_rows($result2) > 0){  
                        
?>

                       
                         <h2 style="color:red">Record Already Exists!... </h2>

                      
                          <h2><?php echo $class?> </h2><hr>

                         
<?php
                      $teacher= $_SESSION['id'];
                           $term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class = $_SESSION['class'] ;
$subject = $_POST['subject'];
$_SESSION['subject']=$subject;
$section = $_POST['section'];
$year= $_POST['year'];
 

     
 
                         ?>
              <div class="row">
<div class="col-md-6 col-sm-12 col-xs-12">

                    
<form action="action_res1_test.php" method="post">
<input  class="form-control" type="hidden" required="" name ="term" value="<?php echo $term; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="month" value="<?php echo $month; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="subject" value="<?php echo $subject; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="year" value="<?php echo $year; ?>" style="width:50%;">


<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                    
 <button type="submit" name="submit1" class="form-control btn btn-primary" style="width:40%;">Delete</button>
                                             </form>
</div>

<div class="col-md-6 col-sm-12 col-xs-12">

<form action="edit_res1_test.php" method="post">
<input  class="form-control" type="hidden" required="" name ="term" value="<?php echo $term; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="month" value="<?php echo $month; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="year" value="<?php echo $year; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="subject" value="<?php echo $subject; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                      
<button type="submit" name="submit" class="form-control btn btn-primary pull-left" style="width:40%;">Edit</button>    
                       </form>
                     </div></div>

   

<?php } else{ 
                       
                      
                     
?>
   <form action="action_res_test.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">



                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2><?php echo $class?>  <?php echo $subject?> </h2><hr>
 <h2> Total Marks:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="total" style="width:20%;" >

  <option value="10">10</option> 
<option value="15">15</option>  
<option value="20">20</option> 
 <option value="25">25</option>  
<option value="30">30</option> 
 <option value="35">35</option> 
<option value="40">40</option>
 <option value="45">45</option> 
  <option value="50">50</option>
 <option value="55">55</option> 
   <option value="60">60</option>
 <option value="65">65</option> 
 <option value="70">70</option> 
			  <option value="75">75</option>
 <option value="80">80</option> 
                        <option value="85"> 85</option>
 <option value="90">90</option> 
 <option value="95">95</option> 
                    <option value="100">100</option>
                      </select><br/>
 <br/>
 
                            <thead>
                          <tr class="headings">

                            <th class="column-title" style="text-align:center;">Admission #</th>

                            <th class="column-title" style="text-align:center;">Student Name</th>

                             <th class="column-title" style="text-align:center;">Obtained Marks</th>

             
                                       </tr>
                        </thead>
                      
                      <?php


?>
                        <tbody>
<?php
                     $teacher= $_SESSION['id'];
$subject = $_POST['subject'];
$year= $_POST['year'];

 $query12 = "SELECT * FROM `subject` WHERE `t_id`='$teacher' AND `class`='$class' AND `subject`='$subject' ";
                        $result12 = mysqli_query($link, $query12);
                        
while($row12 = mysqli_fetch_array($result12))
                        {

$subject= $row12['subject'];
$section= $row12['section'];
 if($section=='M+F'){
 $sql = "SELECT * FROM `student` WHERE `class`='$class' AND `batch`='$year' AND `status`='Active' ";
                          $teachers = mysqli_query($link, $sql);
}
else{
                          $sql = "SELECT * FROM `student` WHERE `class`='$class' AND `batch`='$year' AND `gender`='$section' AND `status`='Active'";
                          $teachers = mysqli_query($link, $sql); }
$a=1;
                          while ($row = mysqli_fetch_assoc($teachers)) {

                          ?>

                          <tr class="even pointer">
  <td class=" " style="text-align:center;"><?php echo $row['id']?>

</td>
 
                          <td class=" " style="text-align:center;"><?php echo $row['fullname']?>

</td>

<input  class="form-control" type="hidden" required="" name ="sid[]" value="<?php echo $row['id']; ?>" style="width:50%;">
                 
                         
  <td class=" " style="text-align:center;">

                           <div class="input-box fullname">
<input type="number"  name="marks[]" value=""  style="width:15%;text-align:center;">             
          </div>                         
                            </td>

                  
                       
                          </tr>

                         
                        </tbody>

                         <?php
                          $sid[]=$row['id'];
                          $_SESSION['sid'] = $sid;
$date = date("Y-m-d");
                          $_SESSION['date'] = $date;
                           $term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class =  $_SESSION['class'];
$subject = $_POST['subject'];
$_SESSION['subject']= $subject;
$section= $row12['section'];
$_SESSION['section']= $section;

 
 

      $a++;                 } } 
 
                         ?>
                        
                      </table>
                    </div>
                     <input  class="form-control" type="hidden" required="" name ="year" value="<?php echo $_POST['year']; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="month" value="<?php echo $_POST['month']; ?>" style="width:50%;">

                       <div class="form-group">
<button type="submit" name="submit1" class="form-control btn btn-primary pull-right" style="width:20%;">Done</button>    
                       </form>
                      

<?php
                        } }}
                         ?>
                    
                                         </div>

                  	 </div>
     

                      
                      <br>
                    
                    </div>
                           </div>
                </div>
              </div>
           

        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
