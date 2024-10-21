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
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Delete Result <small>Subject wise!</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
  <?php if(!isset($_POST['submit'])) {  ?>
                    <form action="" method="post">

                  <div class="col-md-6">
                  <h2> Select the class:</h2>
                        <select id="class" class="form-control" name="class" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query1 = "SELECT DISTINCT class FROM `result1` WHERE `t_id`='$tid'";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];

?>

                        <option value="<?php echo $class?>"><?php echo $class ;?></option>
                     <?php }?>  
                      </select>
                       
                        </div>
                        <div class="col-md-6">

 <h2> Select Section:</h2>

                  <select id="section" class="form-control" name="section" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT section FROM `result1` WHERE `t_id`='$tid'";
                        $result11 = mysqli_query($link, $query11);
                        
while($row11 = mysqli_fetch_array($result11))
                        {

$section= $row11['section'];
if($section == 'M')
{
$sec= 'Boys';
}
elseif($section == 'F') {
$sec= 'Girls';
}
else{
$sec= 'Boys+Girls';
}

?>
                      
                    <option value="<?php echo $section?>"><?php echo $sec ;?></option>
                     <?php }?>  
 
                        
                  </select>
</div>
                  <div class="col-md-6">


<h2> Select Week:</h2>

                  <select id="term" class="form-control" name="term" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query12 = "SELECT DISTINCT term FROM `result1` WHERE `t_id`='$tid'";
                        $result12 = mysqli_query($link, $query12);
                        
while($row12 = mysqli_fetch_array($result12))
                        {

$term= $row12['term'];
if($term ==1)
{
$termm= '1st Week';
}
elseif($term ==2) {
$termm= '2nd Week';
}
elseif($term ==3) {
  $termm= '3rd Week';
  }
else{
$termm= '4th Week';
}

?>
                      
                    <option value="<?php echo $termm?>"><?php echo $termm ;?></option>
                     <?php }?>  
 
                        
                  </select>

                  </div>
                  <div class="col-md-6">
                  
                  <h2> Select Test Month:</h2>

                  <select id="month" class="form-control" name="month" style="width:100%;" >
<option value="" disabled>--Select--</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
 <option value="4">April</option>
 <option value="5">May</option>
 <option value="6">June</option>
 <option value="7">July</option>
 <option value="8">August</option>
 <option value="9">September</option>
 <option value="10">Octuber</option>
 <option value="11">November</option>
 <option value="12">December</option>
           
                  </select>
                  </div>
                  <div class="col-md-2">
                   <br>
                        <button type="submit" name="submit" class="form-control btn btn-primary">Next</button>
                  
                  </div>
                   </form>
                    <?php }
if(isset($_POST['submit'])) {
$class = $_POST['class'];
$section = $_POST['section'];
$term = $_POST['term'];
                      ?>
        <form action="" method="post">

                  <div class="row"> <div class="col-md-3">
<h2> Select the Class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="subject" class="form-control" name="subject" >
                                             
 <option value="" selected disabled >Select Subject</option>
<?php
 $teacher= $_SESSION['id'];
 $section=$_POST['section'];
$quer11 = "SELECT DISTINCT subject FROM `result1` WHERE `t_id`=' $teacher' AND `class`='$class' AND `section`='$section' AND `term`='$term' ";
                        $resul11 = mysqli_query($link, $quer11);
 while($row11 = mysqli_fetch_array($resul11))
                         {
                        


                          $subj=$row11['subject']; ?>
                          
   
                    
                        <option value="<?php echo $subj?>"><?php echo $subj?></option>
                     <?php }?>         </select>
                  </div>
                  <div class="col-md-1">
</div>

                      <input type="hidden" id="fullname" class="form-control" name="class" value="<?php echo $class; ?>"  required /> 
 <input type="hidden" id="fullname" class="form-control" name="section" value="<?php echo $section; ?>"  required /> 
  <input type="hidden" id="fullname" class="form-control" name="term" value="<?php echo $term; ?>"  required /> 
 <input type="hidden" id="fullname" class="form-control" name="tid" value="<?php echo $teacher; ?>"  required /> 
                 <div class="col-md-2">
                    
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="submit1" class="form-control btn btn-primary">Delete</button>
                    </div>
                  </div>
                   </form>
                      <br>
                    <div class="table-responsive">
                        <?php }
 if(isset($_POST['submit1'])){
$subject = $_POST['subject'];
                        $class = $_POST['class'];
$section = $_POST['section'];
$term = $_POST['term'];
 $teacher= $_SESSION['id'];
   $query3 ="DELETE FROM `result1` WHERE `t_id`=' $teacher' AND `class`='$class' AND `subject`='$subject' AND `section`='$section' AND `term`='$term'";
    $result3 = mysqli_query($link, $query3); 
 if($result3==TRUE){

echo "Record Deleted Successfully!";
}
else{
echo "Error While Deleting...!";  }
?>




                    </div>
                    <?php
                    }?>
                  </div>
            <br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br>      </div>
              </div>
            </div>
       
 </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
