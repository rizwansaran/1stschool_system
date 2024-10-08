<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise result!</title>
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
                <h3>Results <small>(Over all)</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    
                   
                      <br>
                    <div class="table-responsive">
<table class="table table-striped jambo_table bulk_action">

                        <?php
                        $id = $_SESSION['sid'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                          $student = $row['id'];
                          $batch = $row['class'];
                          $query = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$batch'";
                          $result1 = mysqli_query($link, $query);
                          if(mysqli_num_rows($result1) < 1){  ?>
 <tr class="even pointer">
                           <td class=" "><h2 style="color:red">Result Not Uploaded Yet!...</h2></td>

                            

<?php } else {?>
                        
                          <h2><?php echo $row['fullname']; ?></h2><hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Course </th>
                            <th class="column-title" style="text-align:center;">Total marks </th>
                            <th class="column-title" style="text-align:center;">Obtained marks </th>
                            <th class="column-title" style="text-align:center;">Term </th>
                            <th class="column-title" style="text-align:center;">Year </th>
                            <th class="column-title" style="text-align:center;">Status </th>
                          </tr>
                        </thead>
                        <?php

                          while($res = mysqli_fetch_array($result1)){
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $res['subject']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $res['total']; ?> </td>
                            <td class=" " style="text-align:center;"><?php echo $res['marks']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $res['term']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $res['year']; ?></td>
                            <?php 
                            if ($res['marks']>33){?>
                            <td class=" " style="text-align:center;color:#008000">Pass</td>
                            <?php }
                            else{?> 
                            <td class=" " style="text-align:center;color:#FF0000">Fail</td>
                            <?php }?>


                            
                            </td>
                          </tr>
                          <?php }}}?>
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
