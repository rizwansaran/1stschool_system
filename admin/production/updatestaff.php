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
  if(isset($_POST['staff'])) $selected = 1;
  if(isset($_POST['fullname'])){
    $fullname =$_POST['fullname'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $qualification = $_POST['qualification'];
    $class = $_POST['class'];
 $section = $_POST['section'];
$login = $_POST['login'];
$password = $_POST['password'];

    $staff = $_POST['staff'];
    $query = "UPDATE `staff` SET `fullname`='$fullname',`mobile`='$number',`address`='$address',`qualification`='$qualification',`class`='$class',`section`= '$section',`login`='$login',`password`='$password' WHERE `id`='$staff'";
          $result = mysqli_query($link, $query);
  /* $querysec = "SELECT * FROM `section WHERE `t_id`='$staff' ";
          $resultsec = mysqli_query($link, $querysec);
if(mysqli_num_rows($resultsec) > 0){
         
$query2 = ""UPDATE `section` SET `t_id`= '$staff'  `class`='$class' `section`= '$section'";
          $result2 = mysqli_query($link, $query2); }
elseif(mysqli_num_rows($resultsec) < 1 ){
$query2 = ""INSERT INTO `section` (`id`, `t_id`, `class`, `section`) VALUES ('','$staff','$class','$section')";
          $result2 = mysqli_query($link, $query2);

} */
         
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
                    $fullname =$row['fullname'];
                    $qualification = $row['qualification'];
                    $address = $row['address'];
                    $number = $row['mobile'];
                    $class = $row['class'];
 $section = $row['section'];
if($section=='M'){
$section1="Boys";
}
else if($section=='F')
{
$section1="Girls";

}
else 
{
$section1="Boys & Girls";

}

$login = $row['login'];
$password = $row['password'];

                  } 
                  ?>
                    <h2>Update Staff<?php
                  echo '    -    '.$error.' '.$fullname; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="updatestaff.php" method="post">
                  <div class="col-md-8"><div class="row"><?php
                    $query = "SELECT * FROM `staff` WHERE `status`='Active'";
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
                  <?php if($selected == 1){?>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="updatestaff.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="staff" value="<?php echo $staff; ?>">
                      <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required value="<?php echo $fullname; ?>" />

                      <label for="city">Mobile * :</label>
                      <input type="text" id="cityofbirth" class="form-control" name="number" data-parsley-trigger="change" required  value="<?php echo $number; ?>" />

                      <label for="city">Address * :</label>
                      <input type="text" id="address" class="form-control" name="address" data-parsley-trigger="change" required  value="<?php echo $address; ?>" />

                      <label for="fathername">Qualification * :</label>
                      <input type="text" id="fathername" class="form-control" name="qualification" required  value="<?php echo $qualification; ?>" />

                      <label for="mothername">Class * :</label>
<select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="<?php echo $class; ?>"><?php echo $class; ?> </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class;?>"><?php echo $class?></option>
                     <?php }?>  
                      </select><br/>


<label for="mothername">Select Section * :</label>

                  <select id="term" class="form-control" name="section" style="width:100%;" >
$section
<option value="<?php echo $section; ?>"><?php 
  echo $section1; ?> </option>
                        <option value="M">Boys</option>
                        <option value="F">Girls</option>
<option value="M+F">Both</option>
                       
                        
                  </select> 
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