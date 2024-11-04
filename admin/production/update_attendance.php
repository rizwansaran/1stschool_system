<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
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
                <h3>Update Attendance</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="diary_all.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                      

                  <h2> Select a Date:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input placeholder="Select Date" class="form-control" type="date"  name ="date" style="width:50%;">
                  </div>

                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['sub'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        
                         $id = $_SESSION['sid'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];

                        $subject = $_POST['sub'];
                        $date=$_POST['date'];

                          $query = "SELECT * FROM `diary` WHERE `subject`='$subject' AND `p_date`='$date' And `class` ='$class'";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
                          ?>
                        <table class="table table-striped jambo_table bulk_action">
                        
                          
                          <hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title">Today's Diary </th>
                            
                          </tr>
                        </thead>
                        <?php

                          while($res = mysqli_fetch_array($result1)){
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <td class=" "><?php echo $res['text']; ?></td>
                            
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class=" ">Posted Date: <?php echo $res['p_date']; ?></td>
                            
                            </td>
                          </tr>
                           <tr class="even pointer">
                            <td class=" ">Due Date: <?php echo $res['d_date']; ?></td>
                            
                            </td>
                          </tr>
                          <?php }}?>
                        </tbody>
                      </table>
                    </div>
                    <?php
                    }?>
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
