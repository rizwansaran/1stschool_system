<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Promote Classes!</title>
    <?php include 'php/head.php.inc'; ?>
<style>
th,td{
text-align:center; border: 1px solid #dddddd;
}

</style>

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
              <h3>Promote Classes </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
               </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

 <!-- start form for validation -->
   <?php 
 if (!isset($_POST['batch'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     
                      <div class="row"?>
                        <div class="col-md-3">
 <input type="text" name="batch" value="<?php echo date('Y'); ?>-<?php echo date('Y')+1; ?>" required class="form-control"/>
                       
  </div>
                       <br><br><br>
  <div class="col-md-3">  </div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Promote</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->



                    <div class="table-responsive">
                        <?php }
 if (isset($_POST['batch'])) {
                   
                        $query = "SELECT * FROM `promote`";
                        $result = mysqli_query($link, $query);
 $query1 = "SELECT * FROM `student` WHERE `status`='Active'";
                        $result1 = mysqli_query($link, $query1);
if(mysqli_num_rows($result) == mysqli_num_rows($result1)){


$query2 = "SELECT * FROM `promote` WHERE `status`='Pass'";
                        $result2 = mysqli_query($link, $query2);

                        while($row = mysqli_fetch_array($result2)){
                       
                            $std= $row['studentid'];
 $newclass= $row['n_class'];

$batch= $_POST['batch'];
$query3 = "UPDATE `student` SET `class`='$newclass' ,`batch`='$batch' WHERE `id`='$std'";
   
                        $result3 = mysqli_query($link, $query3);
} 
 if($result3==TRUE){
$batch= $_POST['batch'];
$query31 = "UPDATE `student` SET `batch`='$batch' WHERE `status`='Active'";
   
                        $result31 = mysqli_query($link, $query31);
 if($result31==TRUE){

$query12 = "SELECT DISTINCT batch FROM `student` WHERE `status`='Active' ORDER BY batch DESC ";
                        $result12 = mysqli_query($link, $query12);
                        
$row12 = mysqli_fetch_array($result12);
                        

$year= $row12['batch'];

 $query21 ="DELETE FROM `promote` WHERE `year`='$year'  ";
    $result21 = mysqli_query($link, $query21); 
 
  if($result21==TRUE){

?>
  <h2 style="color:red"><?php echo "Classes Promoted Successfully..."; ?></h2>
             
<?php
}}}
else{
?>

 <h2 style="color:red"><?php echo "Error While promoting Classes..."; ?></h2>
 

<?php
}



 }
else {
?>

 <h2 style="color:red"><?php echo "Please Enter Final Result of all Students 1st......"; ?></h2>

<?php

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
