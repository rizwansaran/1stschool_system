<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['fullname'])){
    $fullname =$_POST['fullname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
 
 $desig = $_POST['desig'];
    $qualification = $_POST['qualification'];
    $mobile = $_POST['mobile'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $target_dir = "images/";
    $image = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $error = "File error";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
          $query = "INSERT INTO `nstaff`(`fullname`, `gender`, `image`, `address`, `designation`,`qualification`, `mobile`, `login`, `password`, `image2`) VALUES ('$fullname', '$gender', '$image', '$address',' $desig','$qualification','$mobile','$login','$password','')";
          $result = mysqli_query($link, $query);
          $error = "Added Succesfully";
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new Staff!</title>
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
                    <h2>New Staff<?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <div class="col-md-6">
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="nonteaching.php" method="post" enctype="multipart/form-data">
                      <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required />

                      <label>Gender *:</label>
                      <p>
                        M:
                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                      </p>

                      <label for="image">Picture * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="image" data-parsley-trigger="change" required />

                      <label for="address">Address * :</label>
                      <input type="text" id="address" class="form-control" name="address" data-parsley-trigger="change" required />

                      <label for="class">Select Section * :</label>

                  <select id="term" class="form-control" name="desig" style="width:100%;" >

                        <option value="M">Boys</option>
                        <option value="F">Girls</option>
<option value="M+F">Both</option>
                        
                  </select> 
<br/>

                      <label for="fathername">Qualification * :</label>
                      <input type="text" id="fathername" class="form-control" name="qualification" required />

                      <label for="mothername">Mobile * :</label>
                      <input type="text" id="mothername" class="form-control" name="mobile" data-parsley-trigger="change" required />

                      <label for="login">Staff Login * :</label>
                      <input type="text" id="login" class="form-control" name="login" required />

                      <label for="password">Password * :</label>
                      <input type="password" id="password" class="form-control" name="password" data-parsley-trigger="change" required />
                      <br>
                      <button type="submit" class="btn btn-primary">Register</button>

                    </form>
                    <!-- end form for validations -->
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
