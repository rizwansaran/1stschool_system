<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $checkQuery = "SELECT * FROM `classes` WHERE `name` = '$name'";
    $checkResult = mysqli_query($link, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        header("Location: addclasses.php?msg=Class name already exists.");
    } else {
        // Insert into table if the name does not exist
        $insertQuery = "INSERT INTO `classes` (`name`) VALUES ('$name')";
        if (mysqli_query($link, $insertQuery)) {
            // Redirect with success message if insertion succeeds
            header("Location: addclasses.php?msg=Class name added successfully.");
        } else {
            // Redirect with error message if insertion fails
            header("Location: addclasses.php?msg=Error: " . mysqli_error($link));
        }
    }

    // Close connection
    mysqli_close($link);
    exit(); // Ensure no further code executes after redirect
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add classes</title>
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
                <h3>Academia</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Add Classes: 
                    <?php error_reporting(0); echo $_GET['msg']; ?> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <form action="" method="post">
                      <div class="row">  
                        <div class="col-md-6">
                          <label for="fathername">Class Name * :</label>
                          <input type="text" id="name" class="form-control"  name="name"  required /> 
                          </div>
                          <div class="col-md-2">
                                <button type="submit" class="form-control btn btn-primary" style="margin-top:25px;">add</button>
                          </div>
                        </div>
                    </form>  
                  </div>
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
