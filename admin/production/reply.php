             
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
                <h3>Conversation</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                                                                   
                  <?php
                        
                          $sql = "SELECT * FROM `student`";
                          $teachers = mysqli_query($link, $sql);
                          while ($student = mysqli_fetch_assoc($teachers)) {

                           
                            ?>

                      <br>
<form action="conversation.php?id=<?php echo $student['id']; ?>" method="post">
                  <div class="col-md-8">
                    <div class="row">


                  <h2> Message</h2><hr style="width:50%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <textarea name="msg" style="width:80%;" rows="8"></textarea></div>

                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="" name="submit"  class="form-control btn btn-primary">Reply</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                         
                        $fromid = $_SESSION['id'];
 $toid = $student['id']; 
    $msg = $_POST['msg'];
 $query1 = "SELECT * FROM `conversation` WHERE studentid= '$toid' AND teacherid= '$fromid' ";
$result1 = mysqli_query($link, $query1);

                       if($result1 && mysqli_num_rows($result1)){
                        $row = mysqli_fetch_array($result1);
                       
                       
$conid= $row['id']; }

                     $query2 = "INSERT INTO `message`(`fromid`, `toid`, `msg`, `conversationid`) VALUES ('$fromid', '$toid', '$msg', '$conid')";
$result2 = mysqli_query($link, $query2);
     
  if($result2) echo "Sent succesfully!";

}
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
