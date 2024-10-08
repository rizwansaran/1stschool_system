<?php
require 'php/config.php';


if(!isLoggedIn()){
  header('location:login.php');
}
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise subjects!</title>
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
                <h3>Subjects <small>Class wise!</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


<?php

 if(isset($_POST['update'])){

$_SESSION['class']= $_POST['class'] ;

$_SESSION['section']= $_POST['section'] ;
$_SESSION['sub']= $_POST['subject'] ; 
}
  $class = $_SESSION['class'];
$section = $_SESSION['section'];
$sub = $_SESSION['sub'];


$query = "SELECT * FROM `subject` WHERE `class`='$class' AND `section`='$section' AND `subject`='$sub' ";
                        $result = mysqli_query($link, $query);
if(mysqli_num_rows($result) < 1)
{
?>

<h2 style="color:red;"><b>Record Not Exist....</b></h2>
<?php
}
else{

                      ?>

                    <form action="" method="post">
<div class="row">
                                  <div class="col-md-3">
 <h2> Select the Teacher:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="t_id" style="" >
                          <?php
                        
                          $sql = "SELECT * FROM `staff` WHERE `status`='Active'";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                        <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['fullname']; ?></option>
                        <?php   
                           } ?>
                        
                      </select>
                     
 
            </div>        

                  <div class="col-md-3">
                    <div class="row">
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="submit" class="form-control btn btn-primary">Update</button>
                    </div></div>
                  </div>
                   </form>
                    <?php

 if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $class = $_SESSION['class'];
$section = $_SESSION['section'];
$sub = $_SESSION['sub'];
                         
$t_id = $_POST['t_id'];
   
  $query ="UPDATE `subject` SET `t_id`= '$t_id' WHERE `class`= '$class' AND `section`= '$section' AND `subject`= '$sub' "; 
                    
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
 echo " Record Updated Successfully!";
}
else{
echo "Error While Updating...!";  } 
}
}
?>




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
