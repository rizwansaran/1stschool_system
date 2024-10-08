
<?php 
require 'php/config.php';

if (!isset($_GET['id'])) {
  header('location:views_conversations.php');
}

$myid = $_SESSION['id'];
$studentid = $_GET['id'];
$sql = "SELECT * FROM `conversation` WHERE `teacherid` = '$studentid' AND `studentid`='$myid'";
if(mysqli_num_rows(mysqli_query($link, $sql)) < 1){
  header('location:views_conversations.php');
}

$sql = "SELECT * FROM `staff` WHERE `id`='$studentid'";
$student = mysqli_fetch_assoc(mysqli_query($link, $sql));



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Conversations</title>
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
                <h3>Conversation with <?php echo $student['fullname']; ?> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
                     include 'conversation1.php';


                        
/*
$sql = "SELECT * FROM `message` WHERE (`fromid`='$myid' AND `toid`='$studentid') OR (`fromid`='$studentid' AND `toid`='$myid')";
                        $result = mysqli_query($link, $sql);
                        if($result && mysqli_num_rows($result) > 0){
                         ?>
                        <table class="table table-striped jambo_table bulk_action">
<head>
 <tr class="headings" style= 'background-color:#0ff'>
                            
                            <th class="column-title" style= "text-align:center;">Persons </th>
                            <th class="column-title" style= "text-align:center;">Messages </th>
                           </tr>
                        
</head>

                       	<tbody>
                       	 <?php while($row = mysqli_fetch_array($result))
                        {

                          $text = $row['msg'];
                          if($row['fromid'] == $myid){
                            ?>
                            <tr class="odd pointer">
                            <td class=" " style="text-align:center;"><?php echo $_SESSION['name']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $text; ?></td>
                          </tr>
                            <?php
                          }else{
                            ?>
                            <tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $student['fullname']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $text; ?></td>
                          </tr>
                            <?php

                          }
                        ?>
                            
                        
                          
                        <?php }?>
                         
                        </tbody>
                           <?php
                          
                            
                        }   */ ?>
                      </table> 

                   


                    </div>
                     
                      </div>
                  	 </div>
                  
                <form action="" method="post">
                  

                  <div class="form-group">
                  <textarea name="msg" style="width:60%;" rows="4" placeholder='Type here'></textarea></div>

                  </div>
                  
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name="submit"  class="form-control btn btn-primary">Reply</button>
                    
 
   
                             
</div>
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
                   </form>

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
