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
                <h3>Update Video </h3>
                <h2 style="color:red">
                  <?php error_reporting(0); echo $_GET['msg']; ?>
                </h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="action_update_video.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                    <?php 
                    $d_id=$_GET['id'];
                    $query = "SELECT * FROM `videos` WHERE `id`='$d_id'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                    $_SESSION['did']=$row['id'];
                    
                     ?>

                  <div class="form-group">
                  <input class="form-control" type="hidden"  name ="date" value="<?php echo date('d-m-Y'); ?>" required/  style="width:50%;">
                  </div><br/>

  <h2 style="color:red">
                 <?php echo $row['class']?> - <?php echo $row['subject']?>
                </h2>
                  
                  
<input type="hidden" class="form-control" value="<?php echo $row['class']?>"   name ="class"  style="width:50%;">


                                       <br/>
<input type="hidden" class="form-control" value="<?php echo $row['subject']?>"   name ="sub"  style="width:50%;">
<br/>

                                          <h2>Youtube Link of Video</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">


                 <input type="text" class="form-control"   name ="text" value="<?php echo $row['name']?>" style="width:80%;">

       

                        <br/><br/>
                        <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Update</button>
                       </form>
                       <div>

                  </div>
                  
                </div>
                  
                  
                   
                      <br>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  
<br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
