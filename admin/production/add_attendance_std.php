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

                    <form action="action_attendance_std.php" method="post">
                  <div class="col-md-12">
                    <div class="row">

                   
                  <div class="col-md-2 col-xs-12">
                         <h2>Class:</h2>
                        <select id="class" class="form-control" name="class" style="width:100%;" >
<?php

 $query1 = "SELECT DISTINCT class FROM `student` WHERE `status`='Active'ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/>
 </div>

                  
 <div class="col-md-2 col-xs-12">
     <h2> Section:</h2>
                        <select id="class" class="form-control" name="section" style="width:100%;" >

                        <option value="M">Boys</option>
                      <option value="F">Girls</option>
  <option value="M+F">Both</option>
                      </select><br/>
 </div>
                   
 <div class="col-md-4 col-xs-12">
                  <h2> Select a Date:</h2>
                  <input placeholder="Select Date" class="form-control" type="text" required="" name ="date" value ="<?php echo date("d-m-Y", strtotime("+5 hours"));?>" style="width:50%;">
                  </div><br/><br/>
 
                               <div class="col-md-4 col-xs-12">           <div class="form-group">  
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Select</button> <div><div>
                       </form>

                       
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
