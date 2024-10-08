<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['add'])){
    $name =$_POST['name'];
    $date = $_POST['date'];
$day= date('d', strtotime($date));
$month= date('m', strtotime($date));
$year= date('Y', strtotime($date));
    $price =  $_POST['price'];
    $query = "INSERT INTO `expences`(`item_name`, `item_price`, `date`, `day`, `month`, `year`) VALUES ('$name', '$price','$date','$day','$month','$year')";
    $result = mysqli_query($link, $query);
    if($result) $error = "Added successfully!";
    else $error = mysqli_error($link);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new income!</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7081830820192007"
     crossorigin="anonymous"></script>
    <?php include 'php/head.php.inc'; ?>
<style>.btn {
  background-color: DodgerBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
} </style>
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
                <h3>Expences - </h3>  <h2 style="color:red"> <?php echo $error; 
                  ?></h2>
              </div>
            </div>
            <div class="clearfix"></div>
            
              <div class="col-md-12 col-xs-12">
<div class="row">
                <div class="x_panel">
                  <div class="x_title">
 
                   
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<div class="col-xl-4 col-md-4 col-xs-12">
  <h2 style="color:red">Add Expences </h2>
                    <!-- start form for validation -->
<?php if(isset($_GET['edit_id'])){

$edit_id=$_GET['edit_id'];
$query = "SELECT * FROM `expences` WHERE `id`='$edit_id' ";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){



 ?>

                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="fullname"> Name * :</label>
                      <input type="text" id="fullname" class="form-control"  value="<?php echo $row['item_name']; ?>" name="name" required /> <br> <br>
                      <label for="city">Date * :</label>
                      <input type="text" id="cityofbirth" class="form-control"  value="<?php   $date=$row['date']; echo  date('d-m-Y', strtotime($date));  ?>" name="date" data-parsley-trigger="change" required /> <br><br>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control"  value="<?php echo $row['item_price']; ?>" name="price" data-parsley-trigger="change" required /> <br><br>
                      <br>
 <input type="hidden" id="fullname" class="form-control"  value="<?php echo $row['id']; ?>" name="id" required /> <br> <br>
                    
                      <button type="submit" name="edit" class="btn btn-primary">update</button>

                    </form>
<?php }} else { ?>
  <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="fullname"> Name * :</label>
                      <input type="text" id="fullname" class="form-control"   name="name" required /> <br> <br>
                      <label for="city">Date * :</label>
                      <input type="date" id="cityofbirth" class="form-control"   name="date" data-parsley-trigger="change" required /> <br><br>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control"   name="price" data-parsley-trigger="change" required /> <br><br>
                      <br>
                      <button type="submit" name="add" class="btn btn-primary">Add</button>

                    </form>
<?php } ?>
                    <!-- end form for validations -->

                  </div>
<div class="col-xl-8 col-md-8 col-xs-12">
  <h2>All Expences </h2> 
  <?php  if(isset($_GET['id'])){
                      ?>
                      <br>
                   
                        <?php
                        $id = $_GET['id'];

   $query ="DELETE FROM `expences` WHERE `id`='$id'  ";
    $result = mysqli_query($link, $query); 
 if($result==TRUE){

$error = "Record Deleted Successfully!";

}  



 
else {

 $error = "Error While Deleting...!";
}
}
?>

 <?php        
               if(isset($_POST['edit'])){
$staff =$_POST['id'];
    $name =$_POST['name'];
    $date = $_POST['date'];
$day= date('d', strtotime($date));
$month= date('m', strtotime($date));
$year= date('Y', strtotime($date));
    $price =  $_POST['price'];
   

    $query = "UPDATE `expences` SET `item_name`='$name',`item_price`='$price',`day`='$date',`month`='$month',`year`='$year' WHERE `id`='$staff'";
          $result = mysqli_query($link, $query);
 
          $error = "updated Succesfully";
 
  
}
?>   
<br>
  <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
<th class="column-title"> ID </th>
                            <th class="column-title"> Name </th>
                            <th class="column-title">Amount</th>
                            <th class="column-title">Date </th>
<th class="column-title">Action </th>
                         </tr>
                        </thead>

                        <tbody>
                        <?php
$totalincome=0;
                        $query = "SELECT * FROM `expences` ORDER BY id DESC";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
 <td class=" "><?php echo $row['id']; ?></td>
                            <td class=" "><?php echo $row['item_name']; ?></td>
<td class=" "><?php echo $row['item_price']; ?></td>

                            <td class=" "><?php $date=$row['date']; echo  date('d-m-Y', strtotime($date)); ?> </td>

                           
 <td class=" "> 

 <button onclick="location.href='allexpences.php?edit_id=<?php echo $row['id']; ?>'" class="btn"><i class="fa fa-edit"></i> </button>
<button onclick="location.href='allexpences.php?id=<?php echo $row['id']; ?>'" class="btn"><i class="fa fa-trash"></i> </button>




      </td>
 
                          </tr>
                          <?php $totalincome=$totalincome + $row['item_price']; } ?>
 
                        </tbody>
                      </table>
<h2>Total Expences: <?php echo $totalincome;?> </h2>


</div>
              
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
