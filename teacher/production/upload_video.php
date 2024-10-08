<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{

  if(isset($_POST['submit'])){

 
       $maxsize = 52428800; // 5MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
             $class = $_SESSION['class'];
 $section = $_SESSION['section'];  
   
    $date = date("Y-m-d"); 
    $subject = $_POST['subject'];
  
    $d =date("Y-m-d"); 
    $tid=$_SESSION['id'];


            $sql = "INSERT INTO videos ( name, t_id, p_date, d_date, class,section, subject) 
                    VALUES ('$name', '$tid','$d','$date','$class','$section','$subject')"; 

            if (mysqli_query($link, $sql)) {
               $error= "File uploaded successfully";
header("location:add_video.php?msg=File uploaded successfully");
exit();


            }
        } else {
            $error= "Failed to upload file.";
header("location:add_video.php?msg=Failed to upload file.");

        }
            }
          }

       }else{
          echo "Invalid file extension.";
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
