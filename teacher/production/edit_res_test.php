<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>results</title>
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
                <h3>Edit Result </h3>
                <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
<br/> <?php
if(!isset($_POST['submit'])){ 

                         

?>
     <form action="edit_res.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                  <div class="form-group">

                  <h2> Select the Term:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="term" style="width:50%;" >
<?php
$tid= $_SESSION['id'];
 $query11 = "SELECT DISTINCT term FROM `result` WHERE `t_id`='$tid'";
                        $result11 = mysqli_query($link, $query11);
                        
while($row11 = mysqli_fetch_array($result11))
                        {

$term= $row11['term'];
if($term == '1')
{
$ter= '1st';
}
elseif($term == '2') {
$ter= '2nd';
}
else{
$ter= 'Final';
}
?>

                        <option value="<?php echo $term;?> "><?php echo $ter;?></option>
                     <?php }?>  

                  </select>
<br/>
                  <h2> Select the class:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="class" style="width:50%;" >
<?php
$tid= $_SESSION['id'];
 $query1 = "SELECT DISTINCT class FROM `result` WHERE `t_id`='$tid'";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>


                        <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary" style="width:25%;">Select</button>
                       </form>

<br><br><br><br><br>


<?php }
if(isset($_POST['submit'])){

                          
                          
                          $term = $_POST['term'];
                          $class = $_POST['class'];
                        
                    
 
                         ?>
<form action="edit_res1.php" method="post">
                  <div class="col-md-8">
                    <div class="row">

                  <div class="form-group">

                
<h2> Select the Subject:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="subject" style="width:23%;" >

<?php
$tid= $_SESSION['id'];
$query1 = "SELECT DISTINCT subject FROM `result` WHERE `t_id`='$tid' AND `class`='$class' AND `term`='$term'";
 $result1 = mysqli_query($link, $query1);
                          
while($row1 = mysqli_fetch_array($result1))
                        {

$subject= $row1['subject'];
?>

                        <option value="<?php echo $subject?> "><?php echo $subject?></option>
                     <?php }


$term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class = $_POST['class'];
                          $_SESSION['class'] = $class;
?>  
                      </select><br/><br/>

                        <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary" style="width:25%;">Select</button>
                       </form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php }?>



                       <div>

                  </div>
                  
                </div>
                  
                  
                   
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
