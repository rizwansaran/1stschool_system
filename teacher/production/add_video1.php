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
                <h3>Upload Video </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="action_video.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                  <div class="form-group">
                  <input class="form-control" type="hidden"  name ="date" value="<?php echo date('d-m-Y'); ?>"  required/ style="width:50%;">
                  </div><br/>


                 <h2> Select the Subject:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="subject" style="width:50%;" >

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
                      </select><br/><br/>

                 
                                         <h2>Youtube link of Video</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">


                  <textarea class="form-control form-text-light" rows="1" name="text" id="comment" placeholder="Your Message Here"  required/> </textarea>
                        

                        <br/><br/>
<?php $class = $_POST['class'];
                          $_SESSION['class'] = $class; 
$section = $_POST['section'];
 $_SESSION['section'] = $section;
?>
 
                        <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:25%;">Done</button>
                       </form>
  
                       <div>

                  </div>
                  
                </div>
                  
                  
                   
                    
                    
                    </div>
                   
                  </div>
                </div>
              </div>
 <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
      <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br> <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
