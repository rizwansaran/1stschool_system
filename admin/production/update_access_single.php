
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "30";
$sec1 = "0";
?>
<?php

?>

<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Access</title>
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
                <h3>Access <small>(Single)</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

                    <form action="" method="post">
                  <div class="col-md-8">
                    <div class="row">
  <h2> Select the Teacher:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="teacher" style="width:50%;" >
                          <?php
                        
                          $sql = "SELECT * FROM `staff`";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                        <option value="<?php echo $teacher['id'];?>"> <?php echo $teacher['fullname']; ?></option>
                        <?php   
                           } ?>
                        
                      </select>
                      <br/>

                       
                 <h2> Date till Access is grantd:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input placeholder="Select Date" class="form-control" type="date"  name ="udate" style="width:50%;">
                  </div>


                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name= "submit" class="form-control btn btn-primary">Grant Access</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        


$teacher = $_POST['teacher'];
 $d = date("Y-m-d");
  $udate = $_POST['udate'];
  
 $query1 = "UPDATE `access_single` SET `p_date`='$d',`d_date`='$udate' WHERE `t_id`='$teacher'";
  $result1 = mysqli_query($link, $query1); 

    if($result1==TRUE){
echo "Record is updated Successfully!";
}
else{
echo "Error updating records!";}



}

?>
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
