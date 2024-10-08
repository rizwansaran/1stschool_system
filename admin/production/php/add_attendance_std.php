<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
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
                <h3>Add Attendance </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
<?php
$d =date("Y-m-d");
$teacher= $_SESSION['id'];
                 
$query1 = "SELECT * FROM `access_single` WHERE `t_id`='$teacher' ";
                          $result2 = mysqli_query($link, $query1);
                         $res1 = mysqli_fetch_array($result2);

$atd = $res1['atd']; 
$sec = $res1['section'];

$class=$_SESSION['class']; 
$section=$_SESSION['section'];
 ?>

                    <form action="action_attendance.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                     

                  <h2> Select a Date:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;"> 
                  <div class="form-group">
<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class;?>" style="width:50%;">
 <input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section;?>" style="width:50%;">
                 
                  <input placeholder="Select Date" class="form-control" type="text" required="" name ="date" value ="<?php echo date("Y-n-d", strtotime("+5 hours"));?>" style="width:50%;">
                  </div><br/><br/><br/>

                                          <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Select</button>
                       </form>

                       <div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
