<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Result</title>
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
                <h3>View Result </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="view_result_test.php" method="post">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row">

                     

                  

                  <h2> Select the class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
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
                      </select><br/>
 <h2> Select Section:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="section" style="width:100%;" >
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


<h2> Select Week of the Month :</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">

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
else if($term ==2) {
$termm= '2nd Week';
}
else if($term ==3) {
$termm= '3rd Week';
}
else if($term ==4) {
$termm= '4th Week';
}

?>
                      
                    <option value="<?php echo $term?>"><?php echo $termm ;?></option>
                     <?php }?>  
 
                        
                  </select>

<br/>
<h2> Select Test Month:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="month" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT month FROM `result1` WHERE `t_id`='$tid'";
                        $result11 = mysqli_query($link, $query11);
                        
while($row11 = mysqli_fetch_array($result11))
                        {

$month= $row11['month'];


?>
                      
                    <option value="<?php echo $month;?>"><?php echo $month ;?></option>
                     <?php }?>  
 
                        
                  </select>


<br><br>
                        <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:50%;">Select</button>
                       </form>
                       <div>
<br><br><br><br><br><br>

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
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
