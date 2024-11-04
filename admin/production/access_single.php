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
                <h3>Access <small>(Single)</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
<?php include 'action_access_single.php'; ?>
<?php
$query = "SELECT * FROM `access_single` ";
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
$tid = $res['t_id'];
$sql = "SELECT * FROM `staff` WHERE `id`='$tid'";
$student = mysqli_fetch_assoc(mysqli_query($link, $sql));

                            ?>
                            
                        <tbody>
<tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $student['fullname']; ?></td>
                         </tr>
                          <tr class="even pointer">
                            <td class=" ">Posted Date: <?php  $ddate= $res['p_date']; echo date("d-m-Y", strtotime($ddate)); ?></td>
                            
                            </td>
                          </tr>
                           <tr class="even pointer">
                            <td class=" ">Due Date of Access: <?php $dddate= $res['d_date'];  echo date("d-m-Y", strtotime($dddate)); ?></td>
                            
                            
                          </tr>
<tr class="even pointer">

                            <td class=" ">Atendance Access : <?php echo $res['atd']; ?></td>
                            
                            
                          </tr>
<tr class="even pointer">

                            <td class=" ">Section : <?php echo $res['section']; ?></td>
                            
                            
                          </tr>
                          
                          <?php }}?>
                        </tbody>
                      </table>


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
