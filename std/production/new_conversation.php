<?php
$page = $_SERVER['PHP_SELF'];
$sec = "60";
$sec1 = "0";
?>
<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>School Management System!</title>
    <?php include 'php/head.php.inc'; ?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='index.php'">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script>
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
                    <form action="new_conversation.php" method="post">
                  <div class="col-md-8">
                    <div class="row">
 
                       <h2> Select the Teacher:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="toid" style="width:50%;" >
<?php
$class= $_SESSION['class'];
 $query1 = "SELECT DISTINCT t_id FROM `subject` WHERE `class`='$class' ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$t_id= $row1['t_id'];
?>                         
 <?php
                        
                          $sql = "SELECT * FROM `staff` WHERE `id`='$t_id' ";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                        <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['fullname']; ?></option>
                        <?php   
                          } } ?>
                        
                      </select>
                      <br/>

                  <h2> Message</h2><hr style="width:50%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <textarea name="msg" style="width:80%;" rows="8"></textarea></div>

                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name="submit" class="form-control btn btn-primary">Send</button>
                    </div>
                  </div>
                   </form>
<?php  if(isset($_POST['submit'])){ ?>
                   
                      <br>
                    <div class="table-responsive">
                        <?php
                        
                        
                        $fromid = $_SESSION['id'];
 $toid = $_POST['toid'];
    $msg = $_POST['msg'];

                        $quer = "SELECT * FROM `conversation` WHERE `teacherid`='$toid' AND `studentid`='$fromid'";
                        $resul = mysqli_query($link, $quer);
                        if($resul && mysqli_num_rows($resul) < 1){
                        
    $query = "INSERT INTO `conversation`(`studentid`, `teacherid`) VALUES ('$fromid','$toid' ) ";
$result = mysqli_query($link, $query);

$quer1 = " SELECT * FROM `conversation` WHERE `teacherid`='$toid' AND `studentid`='$fromid'";
                        $resul1 = mysqli_query($link, $quer1);
 
$row = mysqli_fetch_array($resul1);
                       
                       
                   $conid = $row['id'];


}
else 
{
    $quer2 = " SELECT * FROM `conversation` WHERE `teacherid`='$toid' AND `studentid`='$fromid'";
                        $resul2 = mysqli_query($link, $quer2);
 
   
                                           $row2 = mysqli_fetch_array($resul2);
                       
                       
                   $conid = $row2['id'];
}
 
                     $query2 = "INSERT INTO `message`(`fromid`, `toid`, `msg`, `conversationid`) VALUES ('$fromid', '$toid', '$msg', '$conid')";
$result2 = mysqli_query($link, $query2);
     
  if($result2) echo "Sent succesfully!";
  

                          ?>
                       
                            
                         
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                    <?php
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
