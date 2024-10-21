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
                <h3>Upload Diary </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="action_diary.php" method="post">
                  <div class="row">
                   
<div class="col-md-6 col-xs-6">
                  <h2> Select a Due Date:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input class="form-control" type="date"  name ="date"  style="width:100%;" required>
                  </div><br/> </div>
<div class="col-md-6 col-xs-6">

                 <h2> Select the Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="subject" class="form-control" name="subject" style="width:100%;" >

<?php
$tid= $_SESSION['id'];
$class = $_POST['class'];
$section = $_POST['section'];
 $query1 = "SELECT subject FROM `subject` WHERE `t_id`='$tid' AND `class`='$class'AND `section`='$section'";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$subject= $row1['subject'];
?>

                        <option value="<?php echo $subject?> "><?php echo $subject?></option>
                     <?php }?>  
                      </select><br/><br/> </div>

                 <div class="col-md-12 col-xs-12">
              <h2>Details</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">


                  <textarea class="form-control form-text-light" rows="5" name="text" id="comment" placeholder="Your Message Here"  required/> </textarea>
                        
</div>
                       
<?php $class = $_POST['class'];
                          $_SESSION['class'] = $class; 
$section = $_POST['section'];
 $_SESSION['section'] = $section;
?>

 <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:50%; margin-top:50px;">Done</button> </div></div>
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
