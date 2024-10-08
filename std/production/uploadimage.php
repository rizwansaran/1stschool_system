<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['submit'])){
    $tid= $_SESSION['id'];
$staff = $_POST['staff'];
    $target_dir = "../../images/";
    $image = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 50000000) {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG" ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $error = "File error";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
          $query = "UPDATE `student` SET `picture`='$image' WHERE `id`= '$staff' ";
          $result = mysqli_query($link, $query);
$query1 = "SELECT * FROM `student`  WHERE `id`= '$tid' ";
          $result1 = mysqli_query($link, $query1);
$row = mysqli_fetch_array($result1);
 $_SESSION['picture']= $row['picture'];
                    
$error = "updated Succesfully";
header("location:profile.php?msg=Picture uploaded");
exit();
}
else{
header("location:profile.php?msg=Record uploading Failed");
}
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
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
                <h3>HR</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                                        <!-- end form for validations -->

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
