<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['add'])){
    $feegroup =$_POST['feegroup'];
   $feetype =$_POST['feetype'];
     $date =$_POST['date'];
  
    $amount =  $_POST['amount'];
    $query = "INSERT INTO `fee_group`(`fee_group`, `fee_type`, `amount`,`date`) VALUES ('$feegroup', '$feetype','$amount','$date')";
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
                <h3>Fee Groups - </h3>  <h2 style="color:red"> <?php echo $error; 
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
  <h2 style="color:red">Add Data </h2>
                    <!-- start form for validation -->
<?php if(isset($_GET['edit_id'])){

$edit_id=$_GET['edit_id'];
$query = "SELECT * FROM `fee_group` WHERE `id`='$edit_id' ";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){



 ?>

                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="fullname"> Fee Group * :</label>
                      <input type="text" id="fullname" class="form-control"  value="<?php echo $row['fee_group']; ?>" name="feegroup" required /> <br> 
                      <label for="city">Fee Type * :</label>
                     <select id="class" class="form-control" name="feetype" style="width:100%;" >

 <option value="<?php echo $row['fee_type']; ?>"><?php echo $row['fee_type']; ?></option>

  <option value="Registration Fee">Registration Fee </option>
 <option value="Admission Fee">Admission Fee </option>
 <option value="Security Fee">Security Fee </option>

 <option value="Tuition Fee">Tuition Fee </option>
<option value="Transport Fee">Transport Fee </option>
 <option value="Sports Fee">Sports Fee </option>
 <option value="Exams Fee">Exams Fee </option>
 <option value="Library Fee">Library Fee </option>
 <option value="Computer Fee">Computer Fee </option>

 <option value="Extra Charges">Extra Charges </option>
 
     </select><br/>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control"  value="<?php echo $row['amount']; ?>" name="amount" data-parsley-trigger="change" required /> <br><br>
                      <br>
 <label for="address">Due Date  * :</label>
                      <input type="text" id="address" class="form-control"  value="<?php echo $row['date']; ?>" name="date" data-parsley-trigger="change" required /> <br><br>
                      <br>
 <input type="hidden" id="fullname" class="form-control"  value="<?php echo $row['id']; ?>" name="id" required /> <br> <br>
                    
                      <button type="submit" name="edit" class="btn btn-primary">update</button>

                    </form>
<?php }} else { ?>
  <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                       <label for="fullname"> Fee Group * :</label>
                      <input type="text" id="fullname" class="form-control"  name="feegroup" required /> <br> 
                      <label for="city">Fee Type * :</label>
                     <select id="class" class="form-control" name="feetype" style="width:100%;" >

 <option value="" disabled>Select Fee Type</option>

  <option value="Registration Fee">Registration Fee </option>
 <option value="Admission Fee">Admission Fee </option>
 <option value="Security Fee">Security Fee </option>

 <option value="Tuition Fee">Tuition Fee </option>
<option value="Transport Fee">Transport Fee </option>
 <option value="Sports Fee">Sports Fee </option>
 <option value="Exams Fee">Exams Fee </option>
 <option value="Library Fee">Library Fee </option>
 <option value="Computer Fee">Computer Fee </option>

 <option value="Extra Charges">Extra Charges </option>
 
     </select><br/>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control"   name="amount" data-parsley-trigger="change" required /> <br>
                      
                    <label for="address">Due Date  * :</label>
                      <input type="date" id="address" class="form-control"  name="date" data-parsley-trigger="change" required /> <br>
                  
                      <br>
                      <button type="submit" name="add" class="btn btn-primary">Add</button>

                    </form>
<?php } ?>
                    <!-- end form for validations -->

                  </div>
<div class="col-xl-8 col-md-8 col-xs-12">
  <h2>All Data </h2> 
  <?php  if(isset($_GET['id'])){
                      ?>
                      <br>
                   
                        <?php
                        $id = $_GET['id'];

   $query ="DELETE FROM `fee_group` WHERE `id`='$id'  ";
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
    $feegroup =$_POST['feegroup'];
   $feetype =$_POST['feetype'];
    $date =  $_POST['date'];
    $amount =  $_POST['amount'];
 
    $query = "UPDATE `fee_group` SET `fee_group`='$feegroup',`fee_type`='$feetype',`amount`='$amount',`date`='$date' WHERE `id`='$staff'";
          $result = mysqli_query($link, $query);
 
          $error = "updated Succesfully";
  // header('location:fee_group.php');
}
?>   
<br>
  <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
<th class="column-title"> ID </th>
                            <th class="column-title"> Fee Group </th>
 <th class="column-title">Fee Type</th>
                            <th class="column-title">Amount</th>
                            <th class="column-title">Due Date </th>
<th class="column-title" text-align="center">Action </th>
                         </tr>
                        </thead>

                        <tbody>
                        <?php

                        $query = "SELECT DISTINCT `fee_group` FROM `fee_group` ORDER BY id ASC";
                        $result = mysqli_query($link, $query);
$count=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
 <td class=" "><?php echo $count; ?></td>
                            <td class=" "><?php echo $row['fee_group']; ?></td>
<td class=" "></td>
<td class=" "></td>

                            <td class=" "></td>

                           
 <td class=" ">   <button onclick="location.href='fee_assigned.php?feegroup=<?php echo $row['fee_group']; ?>'" class="btn"><i class="fa fa-book"></i> </button>
 


     </td> 
 
                          </tr> <?php
$feegroup=$row['fee_group'];
 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$feegroup'";
                        $result1 = mysqli_query($link, $query1);
                        while($row1 = mysqli_fetch_array($result1)){ ?>
 <tr class="even pointer">
 <td class=" "></td>
                            <td class=" "></td>
<td class=" "><?php echo $row1['fee_type']; ?></td>
<td class=" "><?php echo $row1['amount']; ?></td>
 <td class=" "><?php $date=$row1['date']; echo  date('d-m-Y', strtotime($date)); ?></td>
                            <td class=" "><button onclick="location.href='fee_group.php?edit_id=<?php echo $row1['id']; ?>'" class="btn"><i class="fa fa-edit"></i> </button>
<button onclick="location.href='fee_group.php?id=<?php echo $row1['id']; ?>'" class="btn"><i class="fa fa-trash"></i> </button>
 </td>

                           
 
 
                          </tr>

                          <?php } $count++; } ?>
 
                        </tbody>
                      </table>


</div>
              
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
