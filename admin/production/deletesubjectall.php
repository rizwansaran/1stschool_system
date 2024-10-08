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
                <h3>Delete Subject <small>Class wise!</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
  <?php if(!isset($_POST['submit'])) {  ?>
                    <form action="" method="post">

                  <div class="col-md-3"><div class="row">
<h2> Select the Class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="class" class="form-control" name="class" >
                                             
 <option value="" selected disabled >Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?>"><?php echo $class?></option>
                     <?php }?>         </select>
                  </div></div>
                  <div class="col-md-1">
</div>
<div class="col-md-3"><div class="row">
<h2> Select Section:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="class" class="form-control" name="section" >
                                             
 <option value="" selected disabled >Select Section </option>
<?php

 $query1 = "SELECT DISTINCT section FROM `subject` ORDER BY section ASC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$section= $row1['section'];
if($section=='M'){
$section1="Boys";
}
else if($section=='F'){
$section1="Girls";
}
else 
$section1="Both";
?>
   
                    
                        <option value="<?php echo $section?>"><?php echo $section1?></option>
                     <?php }?>         </select>
                  </div></div>
                  <div class="col-md-2">
                    <div class="row">
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="submit" class="form-control btn btn-primary">Next</button>
                    </div>
                  </div>
                   </form>
                    <?php }
if(isset($_POST['submit'])) {
$class = $_POST['class'];
$section = $_POST['section'];
                      
       
                   
   $query3 ="DELETE FROM `subject` WHERE `class`='$class' AND `section`='$section'";
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
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
