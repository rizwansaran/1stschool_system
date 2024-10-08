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
  if(isset($_POST['student1'])) $selected = 1;
   if(isset($_POST['fullname'])){
       $id =$_POST['student'];
    $fullname =$_POST['fullname'];
$dob = $_POST['dob'];

    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
$class = $_POST['class'];   $fathername = $_POST['fathername'];
    $fcnic = $_POST['fcnic']; $fee = $_POST['fee'];
$login = $_POST['login'];
$password = $_POST['password'];
    $student1= $_POST['student1'];
    $query = "UPDATE `student` SET `id`='$id',`fullname`='$fullname',`dob`='$dob',`mobile`='$mobile',`address`='$address',`class`='$class',`fname`='$fathername',`fcnic`='$fcnic',`fee`='$fee',`login`='$login',`password`='$password' WHERE `id`='$student1'";
        
$result = mysqli_query($link, $query);
          $error = "updated Succesfully";
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
                    $student = $_POST['student1'];
                    $query = "SELECT * FROM `student` WHERE `id`='$student'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                     $id =$row['id'];
                    $fullname =$row['fullname'];
$dob = $row['dob'];

                    $mobile = $row['mobile'];
                    $address = $row['address'];
$class = $row['class'];
$batch = $row['batch'];
                    $fathername = $row['fname'];
                    $fcnic = $row['fcnic']; $fee = $row['fee'];
$login = $row['login'];
$password = $row['password'];
                  } 
                  ?>
                    <h2>Update Student<?php
                  echo '    -    '.$error .'    -    '.$fullname; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="updatestudent.php" method="post">
                  <div class="col-md-8"><div class="row"><?php
                    $query = "SELECT * FROM `student` WHERE `status`='Active'";
                    $result = mysqli_query($link, $query);
                    if($result){
                        ?>
                        <select name="student1" class="form-control">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value='.$row['id'].'>'.$row['fullname'].'  S/D/O  '.$row['fname'].'</option>';
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
                  <?php if($selected == 1){?>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="updatestudent.php" method="post" enctype="multipart/form-data">
 <input type="hidden" name="student1" value="<?php echo $student; ?>">
 <label for="fullname">File No. * :</label>
                    <input type="text" name="student" class="form-control" value="<?php echo $student; ?>">
                      <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required value="<?php echo $fullname; ?>" />

<label for="city">Date of birth * :</label>
                      <input type="text" id="dob" class="form-control" name="dob" data-parsley-trigger="change" required  value="<?php echo $dob; ?>" />

                      <label for="city">Mobile No. * :</label>
                      <input type="text" id="cityofbirth" class="form-control" name="mobile" data-parsley-trigger="change" required  value="<?php echo $mobile; ?>" />


                      <label for="city">Address * :</label>
                      <input type="text" id="address" class="form-control" name="address" data-parsley-trigger="change" required  value="<?php echo $address; ?>" />


 <label for="class">Class * :</label>
<select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="<?php echo $class; ?>"><?php echo $class; ?> </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?>"><?php echo $class?></option>
                     <?php }?>  
                      </select>
 
 <input type="hidden" id="fathername" class="form-control" name="batch" required  value="<?php echo date("Y"); ?>" />

                       
                      </select>

                      <label for="fathername">Father Name * :</label>
                      <input type="text" id="fathername" class="form-control" name="fathername" required  value="<?php echo $fathername; ?>" />

                      <label for="mothername">Father CNIC No.* :</label>
  


                    <input type="text" id="mothername" class="form-control" name="fcnic" data-parsley-trigger="change" required  value="<?php echo $fcnic; ?>"  />
          <label for="mothername">Monthly Fee.* :</label>
                      <input type="text" id="mothername" class="form-control" name="fee" data-parsley-trigger="change" required  value="<?php echo $fee; ?>"  />
                   <label for="login">Login * :</label>
                      <input type="text" id="login" class="form-control" name="login" required  value="<?php echo $login; ?>" />

             
                      <input type="hidden" id="password" class="form-control" name="password" data-parsley-trigger="change" required  value="123"  />
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
