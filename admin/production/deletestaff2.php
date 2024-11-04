<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise result!</title>
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
                <h3>Delete Student <small></small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
 <?php if(!isset($_GET['sid'])){
                      ?>
                    <form action="" method="post">

                  <div class="col-md-3"><div class="row">

<h2> Select the Student:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="class" class="form-control" name="id" >
                       <?php
                        $query = "SELECT * FROM `student`";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?> S/D/O <?php echo $row['fname']; ?></option>
                        <?php } ?>   
                      </select>  
                  </div></div>
                  <div class="col-md-1">
</div>
                  <div class="col-md-2">
                    <div class="row">
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="submit" class="form-control btn btn-primary">Delete</button>
                    </div>
                  </div>
                   </form>
                    <?php } if(isset($_GET['sid'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $id = $_GET['sid'];

   $query ="DELETE FROM `staff` WHERE `id`='$id'  ";
    $result = mysqli_query($link, $query); 
 if($result==TRUE){
 
$id = $_GET['sid'];
$query2 ="DELETE FROM `staff_atd` WHERE `t_id`='$id'  ";
    $result2 = mysqli_query($link, $query2); 


 if($result2==TRUE){
$id = $_GET['sid'];
$query2 ="SELECT * FROM `conversation` WHERE `teacherid`='$id'  ";
    $result2 = mysqli_query($link, $query2); 
$res = mysqli_fetch_array($result2); 
$conid=$res['id'];

$query3 ="DELETE FROM `message` WHERE `conversationid`='$conid'  ";
    $result3 = mysqli_query($link, $query3); 

 if($result3==TRUE){
$id = $_GET['sid'];
$query4 ="DELETE FROM `conversation` WHERE `teacherid`='$id'  ";
    $result4 = mysqli_query($link, $query4); 
 if($result4==TRUE){

echo "Record Deleted Successfully!";

}}}} 



 
else {
 echo "Error While Deleting...!";
}

?>




                    </div>
                    <?php
                    }?>
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
