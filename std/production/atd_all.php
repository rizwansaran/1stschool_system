<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Attendance</title>
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
                <h3>Attendance <small>(Over all)</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    
                   
                      <br>
                    <div class="table-responsive">
                        <?php
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                          $student = $row['id'];
                          
                          $query = "SELECT * FROM `atd` WHERE `std_id`= '$student'";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
                          ?>
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2><?php echo $row['fullname']; ?></h2><hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Total Classes</th>
                            <th class="column-title" style="text-align:center;">Present </th>
                            <th class="column-title" style="text-align:center;">Absents </th>
                            <th class="column-title" style="text-align:center;">Percentage </th>
                          </tr>
                        </thead>
                        <?php

                          $res = mysqli_fetch_array($result1);
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <?php 
                            $q="SELECT DISTINCT(date) FROM atd";
                            $r= mysqli_num_rows(mysqli_query($link, $q));

                            $q1 = "SELECT * FROM `atd` WHERE `status`= '1' AND `std_id`= '$student'";
                            $r1= mysqli_num_rows(mysqli_query($link, $q1));

                            $q2 = "SELECT * FROM `atd` WHERE `status`= '0' AND `std_id`= '$student'";
                            $r2= mysqli_num_rows(mysqli_query($link, $q2));
                             $t=($r1+$r2);
                            $p=($r1/$t)*100;
                           
                            ?>


                            <td class=" " style="text-align:center;"><?php echo $t; ?> </td>
                            <td class=" " style="text-align:center;"><?php echo $r1; ?> </td>
                            <td class=" " style="text-align:center;"><?php echo $r2; ?></td>
                            <?php if($p<80){?>
                            <td class=" " style="text-align:center;color:red;"><?php echo $p; ?> %</td>
                            <?php }
                            else{?> 
                            <td class=" " style="text-align:center;color:green;"><?php echo $p; ?> %</td>
                            <?php }?>



                          </tr>
                          <?php }}?>
                        </tbody>
                      </table>
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
