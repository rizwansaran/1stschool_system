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
                <h3>Update Diary </h3>
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
                    <form action="action_update_diary.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                    <?php 
                    $d_id=$_GET['id'];
                    $query = "SELECT * FROM `diary` WHERE `id`='$d_id'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);
                    $_SESSION['did']=$row['id'];
                    
                     ?>
 <h2 style="color:red">
                 <?php echo $row['class']?> - <?php echo $row['subject']?>
                </h2>
<br><br>
                  <h2> Select a Due Date:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input class="form-control" type="date"  name ="date" required/  style="width:50%;">
                  </div><br/>


                  
<input type="hidden" class="form-control" value="<?php echo $row['subject']?>"   name ="sub"  style="width:50%;">
                  
<input type="hidden" class="form-control" value="<?php echo $row['class']?>"   name ="class"  style="width:50%;">


                                       <br/><br/>

                                          <h2>Details</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">


                  <textarea class="form-control form-text-light" rows="5" name="text" id="comment"  required/> <?php echo $row['text']?></textarea>
                        

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
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
