<?php
require 'php/config.php';
$error = "";
$selected = 0;
$fullname ="";
$number = "";
$address = "";
$qualification = "";
$login = "";
$password = "";

$class = "";
$section = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_GET['sid'])) $selected = 1;
  if(isset($_POST['fullname'])){
    $fullname =$_POST['fullname'];
    $number = $_POST['number'];
   $fcnic = $_POST['section'];
$login = $_POST['login'];
$password = $_POST['password'];

    $staff = $_POST['staff'];
    $query = "UPDATE `parent` SET `dad`='$fullname',`mobile`='$number',`fcnic`= '$fcnic',`username`='$login',`password`='$password' WHERE `id`='$staff'";
          $result = mysqli_query($link, $query);
  
        
if($result=="TRUE"){
          $error = "Updated Successfully";
header("location:active_parent.php?msg=Updated Successfully");
exit();


 }
else {
  $error = "Error While Updating...";
header("location:active_parent.php?msg=Error While Updating...");
}
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update staff!</title>
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
                <h3>HR</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
                  if($selected == 1){
                    $staff = $_GET['sid'];
                    $query = "SELECT * FROM `parent` WHERE `id`='$staff'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                    $fullname =$row['dad'];
                    $number = $row['mobile'];
                    $fcnic = $row['fcnic'];
$login = $row['username'];
$password = $row['password'];

                  } 
                  ?>
                    <h2>Update parent<?php
                  echo '    -    '.$error.' '.$fullname; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                  <?php if($selected == 1){?>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="updateparent2.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="staff" value="<?php echo $staff; ?>">
                      <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required value="<?php echo $fullname; ?>" />

                      <label for="city">Mobile * :</label>
                      <input type="text" id="cityofbirth" class="form-control" name="number" data-parsley-trigger="change" required  value="<?php echo $number; ?>" />

                     
                      <label for="mothername">CNIC * :</label>
 <input type="text" id="fullname" class="form-control" name="section" required value="<?php echo $fcnic; ?>" />
<br/>
                      <label for="login">Login * :</label>
                      <input type="text" id="fathername" class="form-control" name="login" required  value="<?php echo $login; ?>" />

                      <label for="password">Password * :</label>
                      <input type="text" id="mothername" class="form-control" name="password" data-parsley-trigger="change" required  value="<?php echo $password; ?>"  />
                      
<br>
                      <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    <!-- end form for validations -->
                    <?php }?>
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
