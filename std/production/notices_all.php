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


<style>
blink {
  -webkit-animation: 1s linear infinite condemned_blink_effect; // for Safari 4.0 - 8.0
  animation: 1s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for Safari 4.0 - 8.0
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
}
@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
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
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];
$section = $r['gender'];
                     

          $query = "SELECT * FROM `files1` WHERE `class` ='$class'AND `section` ='$section' OR `class` ='$class'AND `section` ='M+F' ORDER BY subject ASC";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
                          ?>
                        <table class="table table-striped jambo_table bulk_action">
                        
                          
                          <hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title" ><h3 style="color:white; text-align:center"> <b> Notice - Over All </b></h3> </th>
                            
                          </tr>
                        </thead>
                        <?php

                          while($res = mysqli_fetch_array($result1)){
                            ?>
                            
                        <tbody>

                         
                          <tr class="even pointer">
                            <td class=" "><h1 style="color:green; text-align:center"> <?php echo $res['subject']; ?> </h1></td>
                          </tr>
 
                          <tr class="even pointer">
                            <td class=" "> <h3 style="color:black; text-align:center"> <a href="../../pdf/<?php echo $res['name']; ?>"><?php echo $res['name']; ?> </h3></a> 
                            
                            </td>
                          </tr>
                          <tr class="even pointer">
                           

  <td class=" "><blink><h2 style="color:red; text-align:center"> Posted Date: <?php echo $res['p_date']; ?> </h2></blink>

                            
                            </td>


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
