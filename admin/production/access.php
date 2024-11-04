<?php
$page = $_SERVER['PHP_SELF'];
$sec = "60";
$sec1 = "0";
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
    <title>School Management System!</title>
    <?php include 'php/head.php.inc'; ?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='index.php'">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script>
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
                <h3>Access <small>(Overall)</small></h3>
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

                       
                  <h2> Date till Access is grantd:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input placeholder="Select Date" class="form-control" required/ type="date"  name ="date" style="width:50%;">
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
                        



    $date = $_POST['date'];
    $d =date("Y-m-d"); 
$query = "SELECT * FROM `access`  ";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
        
$query ="UPDATE `access` SET `p_date`='$d',`d_date`='$date'";
    $result = mysqli_query($link, $query); 

   if($result==TRUE){
echo "Record is updated Successfully!";
}
else{
echo "Error while updating records!";}
 
  }
else
{
$query ="INSERT INTO `access`(`p_date`, `d_date`) 
                    VALUES ('$d','$date') ";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
echo "Record is inserted Successfully!";
}
else{
echo mysqli_error($link);}


}


}

?>


 <?php
                  ?>

<?php 
// include 'action_access.php';
 ?>

<?php
$query = "SELECT * FROM `access` ";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
                          ?>
          
                        <table class="table table-striped jambo_table bulk_action">
                        
                          
                          <hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title">Access Records </th>
                            
                          </tr>
                        </thead>
                        <?php

                          while($res = mysqli_fetch_array($result1)){
                            ?>
                            
                        <tbody>
                         
                          <tr class="even pointer">
                            <td class=" ">Posted Date: <?php  $ddate= $res['p_date']; echo date("d-m-Y", strtotime($ddate)); ?></td>
                            
                            </td>
                          </tr>
                           <tr class="even pointer">
                            <td class=" ">Due Date of Access: <?php $dddate= $res['d_date'];  echo date("d-m-Y", strtotime($dddate)); ?></td>
                            
                           
                          </tr>
                          <?php }}?>
                        </tbody>
                      </table>



              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
