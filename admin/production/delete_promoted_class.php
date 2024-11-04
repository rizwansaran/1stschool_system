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
                <h3>Delete Yearly Record of Promotion of Classes <small></small></h3>
  <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
           
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
  <?php if(!isset($_POST['submit'])){
                      ?>
                    <form action="" method="post">

                  <div class="col-md-3"><div class="row">

<h2> Select the Year:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="class" class="form-control" name="year" >
 <?php
                        $query = "SELECT DISTINCT `year` FROM `promote`";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?> </option>
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
                    <?php }


 if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $year = $_POST['year'];
   $query ="DELETE FROM `promote` WHERE `year`='$year'  ";
    $result = mysqli_query($link, $query); 
 
if($result==TRUE){  ?>

 <h2 style="color:red"><?php echo "Record Deleted Successfully."; ?></h2>



<?php
}
else{ ?>


<h2 style="color:red"><?php echo "Error While Deleting...!"; ?></h2>

<?php 
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
