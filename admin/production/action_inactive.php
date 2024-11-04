<?php
require 'php/config.php';
$error = "";
$selected = 0;
$fullname ="";
$dob = "";
$cityofbirth = "";
$address = "";
$fathername = "";
$mothername = "";
$login = "";
$password = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 
   if(isset($_POST['student'])){
   
    $status = $_POST['status'];
    $id = $_POST['student'];
    $query = "UPDATE `student` SET `status`='$status' WHERE `id`='$id'";
        
$result = mysqli_query($link, $query);
if($result=="TRUE"){
          $error = "Updated Successfully";
header("location:inactive_students.php?msg=Updated Successfully");
exit();


 }
else {
  $error = "Error While Updating...";
header("location:inactive_students.php?msg=Error While Updating...");
}



}}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update students!</title>
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
                <h3>Academia</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
                  if($selected == 1){
                    $student = $_GET['sid'];
                    $query = "SELECT * FROM `student` WHERE `id`='$student'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                    $fullname =$row['fullname'];
      $id =$row['id'];
$class = $row['class'];
                    $fathername = $row['fname'];
 $status = $row['status'];
                   
                  } 
                  ?>
                    <h2 color="red">Update Student<?php
                  echo '    -    '.$error .'    -    '.$fullname; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                  <?php if($selected == 1){?>



 <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>Name: <?php echo $fullname;?></h3></div>
                          <div class="col-md-4"><h3>Father name: <?php echo $fathername;?></h3></div>
                          <div class="col-md-4"><h3>Class: <?php echo $class;?></h3></div>
                        </div>
                        <br><br><br>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
         <div class="row">
   <input type="hidden" value="<?php echo $id; ?>" name="student"/>
                      
                                <h3>Make Active / Inactive</h3>
                            <div class="col-md-4">
                                  <select id="batch" class="form-control" name="status" >
                                  <?php 
if($status=="Active")  { ?>


 <option value="Inactive"> Make Inactive</option> <?php } else {?>
 <option value="Active"> Make Active</option> <?php }?>
                                   
                                  </select>
                                </div>
                                            
  <div class="col-md-1"> </div> <div class="col-md-3">
              
                      <button type="submit" class="btn btn-primary">Update</button>
  </div>   </div> 
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
