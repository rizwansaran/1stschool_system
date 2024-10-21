<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>results</title>
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
                <h3>Upload Result </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
<br/> <?php
if(!isset($_POST['submit'])){
?>

     <form action="add_res.php" method="post">
                  <div class="col-md-12">
                    <div class="row">

                  <div class="form-group">
 <div class="col-md-3 col-sm-12 col-xs-12">
                                   <h2> Select the class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="class" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query1 = "SELECT DISTINCT class FROM `subject` WHERE `t_id`='$tid' ORDER BY class DESC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/>
                      </div>
                      
                       <div class="col-md-3 col-sm-12 col-xs-12">
                      
 <h2> Select the Section:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="section" class="form-control" name="section" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT section FROM `subject` WHERE `t_id`='$tid' ORDER BY section DESC";
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
 
 
                      </select><br/> 
                      
                      </div>
               <div class="col-md-3 col-sm-12 col-xs-12">        
                      
                      
<h2> Select the Session:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="year" class="form-control" name="year" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT batch FROM `student` ORDER BY batch DESC";
                        $result11 = mysqli_query($link, $query11);
                        
while($row11 = mysqli_fetch_array($result11))
                        {

$batch= $row11['batch'];


?>
                      
                    <option value="<?php echo $batch?>"><?php echo $batch ;?></option>
                     <?php }?>  
 
 
                      </select><br/>
<br/>
</div>
 <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary" style="width:70%; margin-top:60px;">Select</button>
                       
                       
                       </div>
                       </form>
<br><br><br><br><br><br> 
<br/><br/><br/><br/><br/>

<?php }


if(isset($_POST['submit'])){
                           
                          $class = $_POST['class'];
 $section = $_POST['section'];
 $year = $_POST['year'];
                          $_SESSION['class'] = $class;
 $_SESSION['section'] = $section;

                          $_SESSION['year'] = $year;

 ?>
     <form action="add_res1.php" method="post">
                  <div class="col-md-12">
                    <div class="row">

                  <div class="form-group">
<div class="col-md-3 col-sm-12 col-xs-12">
                  <h2> Select the Term:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="term" style="width:100%;" >

                        <option value="1 ">1st</option>
                        <option value="2 ">2nd</option>
                        <option value="3 ">3rd</option>
                  </select>
<br/>

</div>
<div class="col-md-3 col-sm-12 col-xs-12">
                 <h2> Select the Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="subject" class="form-control" name="subject" style="width:100%;" >

<?php
$tid= $_SESSION['id'];
 $query1 = "SELECT * FROM `subject` WHERE `t_id`='$tid' AND `class`='$class' AND `section`='$section'";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$subject= $row1['subject'];

?>

                        <option value="<?php echo $subject?> "><?php echo $subject?></option>
                     <?php }?>  
                      </select><br/>
                 </div>     
                     
<input  class="form-control" type="hidden"  name ="section" value="<?php echo $section; ?>" style="width:50%;">


<br/><br/>
 <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group"> 
                        
                       <button type="submit" name="submit" class="form-control btn btn-primary" style="width:70%; margin-top:23px;">Select</button>
                       </div>
                       </div>
                       </form>
<?php }?>
<br/><br/><br/><br/><br/> 
<br/><br/><br/><br/><br/>

                       <div>

                  </div>
                  
                </div>
                  
                  
                   
                      <br>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         </div>  </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
