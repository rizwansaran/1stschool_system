<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{

  if(isset($_POST['submit'])){

 

     $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../../pdf/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
       $error= "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 26000000) { // file shouldn't be larger than 1Megabyte
        $error= "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

$class = $_SESSION['class'];
 $section = $_SESSION['section'];  
   
    $date = $_POST['date'];
    $subject = $_POST['subject'];
  
    $d =date("Y-m-d"); 
    $tid=$_SESSION['id'];


            $sql = "INSERT INTO files1 ( name, t_id, p_date, d_date, class,section, subject) 
                    VALUES ('$filename', '$tid','$d','$date','$class','$section','$subject')"; 

            if (mysqli_query($link, $sql)) {
               $error= "File uploaded successfully";
header("location:add_pdf.php?msg=File uploaded successfully");
exit();


            }
        } else {
            $error= "Failed to upload file.";
header("location:add_diary.php?msg=Failed to upload file.");

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
