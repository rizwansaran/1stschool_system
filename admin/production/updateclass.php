<?php
require 'php/config.php';
$error = "";
$selected = 0;
$fullname ="";
$number = "";
$address = "";
$qualification = "";
$class = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['staff'])) $selected = 1;
  if(isset($_POST['class'])){
    $class = $_POST['class'];
 $section = $_POST['section'];
    $staff = $_POST['staff'];
    $query = "UPDATE `staff` SET `class`='$class', `section`='$section'  WHERE `id`='$staff'";
          $result = mysqli_query($link, $query);
$query11 = "UPDATE `access_single` SET `atd`='$class', `section`='$section' WHERE `id`='$staff'";
          $result11 = mysqli_query($link, $query11);
    
          $error = "updated Succesfully";
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
                    $staff = $_POST['staff'];
                    $query = "SELECT * FROM `staff` WHERE `id`='$staff'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                    $class = $row['class'];
                  } 
                  ?>
                    <h2>Update Class<?php
                  echo '    -    '.$error.' '.$fullname; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <?php 

if($selected == 0){?>
                  <form action="updateclass.php" method="post">
                  <div class="col-md-8"><div class="row"><?php
                    $query = "SELECT * FROM `staff`";
                    $result = mysqli_query($link, $query);
                    if($result){
                        ?>
                        <select name="staff" class="form-control">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value='.$row['id'].'>'.$row['fullname'].'</option>';
                            }
                            ?>
                        </select>
                        <?php

                    } 
                  ?></div></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" class="form-control btn btn-primary">Edit</button>
                    </div>
                  </div>
                   </form>

                  <?php 
}
if($selected == 1){?>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="updateclass.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="staff" value="<?php echo $staff; ?>">
                      <label for="mothername">Class * :</label>
                      <select id="class" class="form-control" name="class" style="width:30%;" >

 <option value="<?php echo $class; ?>"><?php echo $class; ?> </option>
<?php

 $query1 = "SELECT DISTINCT class, class FROM `subject` ORDER BY class ASC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/>
<h2> Select Section:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="section" style="width:30%;" >

                        <option value="M ">Boys</option>
                        <option value="F ">Girls</option>
<option value="M+F">Both</option>
                        
                  </select><br/>
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
