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
                       <div class="col-md-12 col-xs-12">
  <form id="demo-form" data-parsley-validate action="action_diary1.php" method="post" enctype="multipart/form-data">
                 
                 
                   
<div class="col-md-6 col-xs-12">

                  <h2> Select the Class</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                              <select id="class" class="form-control" name="class" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query1 = "SELECT DISTINCT class FROM `subject` WHERE `t_id`='$tid' ORDER BY class ASC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/> </div>
<div class="col-md-6 col-xs-12">
<h2> Select the Section:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="section" style="width:100%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT section FROM `subject` WHERE `t_id`='$tid' ORDER BY section DESC";
                        $result11 = mysqli_query($link, $query11);
                        
while($row11 = mysqli_fetch_array($result11))
                        {

$section= $row11['section'];
if($section == 'M')
{
$sec= 'Boys';
}
elseif($section == 'F') {
$sec= 'Girls';
}
else{
$sec= 'Boys+Girls';
}

?>
                      
                    <option value="<?php echo $section?>"><?php echo $sec ;?></option>
                     <?php }?>  
 
 
                      </select><br/><br/>
                      </div>
                      <div class="col-md-6 col-xs-12">
 <h2> Select a Due Date:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input class="form-control" type="date"  name ="date"  required/ style="width:100%;">
                 </div> </div><br/> <br/>
<div class="col-md-6 col-xs-12">
 <h2> Upload Diary Picture * :</h2><hr style="width:50%;margin-left:-1px;margin-top:-1px;">
          <div class="form-group">            
                      <input type="file" id="image" class="form-control btn btn-primary" name="image"   style="width:100%;" required /> <br/>
</div> </div><br/><br/>
<div class="col-md-6 col-xs-12">
                        <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary" style="width:50%;">Upload</button>  </div> </div>
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
