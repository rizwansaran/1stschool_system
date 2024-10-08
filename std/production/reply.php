             
<?php
require 'php/config.php';

if(!isLoggedIn()){
  header('location:login.php');
}
?>
<?php 
if (isset($_GET['id'])) {
  header('location:conversation.php');
}

$myid = $_SESSION['id'];
$studentid = $_GET['id'];
$sql = "SELECT * FROM `conversation` WHERE `teacherid` = '$studentid'  AND `studentid`= '$myid'";
if(mysqli_num_rows(mysqli_query($link, $sql)) < 1){
   header('location:views_conversations.php');
}

$sql = "SELECT * FROM `staff` WHERE `id`='$studentid'";
$student = mysqli_fetch_assoc(mysqli_query($link, $sql));



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
                <h3>Conversation</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                                                                   

                                               
                   <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                         
                        $fromid = $_SESSION['id'];
 $toid = $student['id']; 
    $msg = $_POST['msg'];
 $query1 = "SELECT * FROM `conversation` WHERE studentid= '$fromid'  AND teacherid= '$toid' ";
$result1 = mysqli_query($link, $query1);

                       if($result1 && mysqli_num_rows($result1)){
                        $row = mysqli_fetch_array($result1);
                       
                       
$conid= $row['id']; }

                     $query2 = "INSERT INTO `message`(`fromid`, `toid`, `msg`, `conversationid`) VALUES ('$fromid', '$toid', '$msg', '$conid')";
$result2 = mysqli_query($link, $query2);
     
  if($result2) echo "Sent succesfully!";
}
  
                          ?>

 


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
