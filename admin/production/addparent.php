<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<?php
$error = "";
$selected = 0;
$fathername = "";
$mothername = "";
  if(isset($_POST['student'])) 
$selected = 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new account!</title>
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
                      <h2>Setup Parent Account: 
                    <?php error_reporting(0); echo $_GET['msg']; ?> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                      
     <?php
                   if(isset($_GET['sid'])){
                      
          $selected = 1;

                    $student = $_GET['sid'];
                    $query11 = "SELECT * FROM `student` WHERE `id`='$student'  ";
                    $result11 = mysqli_query($link, $query11);
                    $row11 = mysqli_fetch_array($result11);
                     $fathername = $row11['fname'];
                    $mothername = $row11['fcnic'];
                  } 
                  
           else if(isset($_POST['student'])){
                      
        $selected = 1;

                    $student = $_POST['student'];
                    $query11 = "SELECT * FROM `student` WHERE `id`='$student'  ";
                    $result11 = mysqli_query($link, $query11);
                    $row11 = mysqli_fetch_array($result11);
                     $fathername = $row11['fname'];
                    $mothername = $row11['fcnic'];
                  } 
                  else {
                  ?>
                    
                      <form action="addparent.php" method="post">
                  <div class="col-md-8"><div class="row"><?php
                    $query = "SELECT * FROM `student`  ORDER BY fullname ASC ";
                    $result = mysqli_query($link, $query);
                    if($result){
                        ?>
                        <select name="student" class="form-control">
<option value=''> Select The Student</option>
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
                        <button type="submit" class="form-control btn btn-primary">Search</button>
                    </div>
                  </div>
                   </form> 
                   
                   <?php } ?>
                      

                  <?php if($selected == 1){?>
                    <!-- start form for validation -->

                    <form id="demo-form" data-parsley-validate action="parent_action.php" method="post" enctype="multipart/form-data">
                      
                     
                      <label for="fathername">Father Name * :</label>
                      <input type="text" id="fathername" class="form-control"  name="fathername" value="<?php echo $fathername; ?>" required />
                      <br>
                      <label for="mothername">Father CNIC No. * :</label>
                      <input type="text" id="mothername" class="form-control"  name="fcnic" data-parsley-trigger="change" value="<?php echo $mothername; ?>" required />
                        <br> 
                      <label for="mobile">Mobile No. * :</label>
                      <input type="number" id="mobile" class="form-control"  name="mobile" data-parsley-trigger="change" required />  <br>

                       <input type="hidden" id="login" value="parent-<?php echo $student; ?>" class="form-control" name="login"  required />   <br>

                          <input type="hidden" id="password" value="123" class="form-control" name="password"   required /> <br/>
                    <br>
                      <button type="submit" name="submit" class="btn btn-primary">Register</button>

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
