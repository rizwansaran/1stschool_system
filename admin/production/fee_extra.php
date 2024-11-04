<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['add'])){
     $student_id =$_POST['student_id'];
     $monthyear =$_POST['monthyear'];
     $splitValues = explode("-", $monthyear);

    // Extract year and month using array indexes
     $month = $splitValues[0];
    $year = $splitValues[1];
   
   $feetype =$_POST['feetype'];
   //  $date =$_POST['date'];
  
    $amount =  $_POST['amount'];
    $query = "INSERT INTO `fee_extra`  (`student_id`, `feemonth`, `year`, `fee_type`, `amount`) VALUES ('$student_id','$month','$year','$feetype','$amount') ";
    // $result = mysqli_query($link, $query);

    
    //  $query = "SELECT $feetype from `fee_consession`  WHERE `student_id`= '$student_id' AND month='$month' AND year = '$year'";
    // $result = mysqli_query($link, $query);
    //   while($row = mysqli_fetch_array($result)){ 
    //   echo $row[$feetype]; 
          
    //   }
    // echo $amount;
    
    
    // $query = "UPDATE `fee_consession`  SET  $feetype = '$amount' WHERE `student_id`= '$student_id' AND month='$month' AND year = '$year'";
     $result = mysqli_query($link, $query);
    if($result) $error = "Record Added successfully!";
    else $error = mysqli_error($link);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fee Concession!</title>
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
                <h3>Extra Charges- </h3>  <h2 style="color:red"> <?php  if(isset($_GET['error'])){  $error= $_GET['error'];} echo $error; 
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
$student_id=$_GET['student_id'];
$edit_id=$_GET['edit_id'];
$query = "SELECT * FROM `fee_extra` WHERE `id`='$edit_id' ";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
 ?>

               <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
              

               <?php
                     $query3 = "SELECT * FROM `financial_year`";
                     $result3 = mysqli_query($link, $query3);

                     while($row3 = mysqli_fetch_array($result3)){ 
                  $start_date = $row3['year_start_date'];
                   $end_date = $row3['year_end_date'];
                   $installments = $row3['installments'];
                        // $start_date = "2023-03-01";
                        // $end_date = "2024-02-29";
                        // $installments = 12;
                                        }
                        $total_months = floor((strtotime($end_date) - strtotime($start_date)) / (30 * 24 * 60 * 60)) + 1;
                        $interval = $total_months / $installments;
                    ?>
                      
                      <label for="installment">Select Fee Month:</label>
                      <select id="class" class="form-control" name="monthyear" style="width:100%;" >
                    <?php
                        for ($i = 0; $i < $installments; $i++) {
                            $installment_date = date('F Y', strtotime("+$i months", strtotime($start_date)));
                            $installment_date2 = date('n-Y', strtotime("+$i months", strtotime($start_date)));
                            if($installment_date2 ==$row['feemonth'].'-'.$row['year'] ){ $class="selected"; } else {$class= " ";}
                            echo '<option value="'.$installment_date2.'" '.$class.'>' . $installment_date . '</option>';
                        }
                    ?>
                        </select>

                    <label for="city">Fee Type * :</label>
                     <select id="class" class="form-control" name="feetype" style="width:100%;" >
                    
                          <option value="<?php echo $row['fee_type']; ?>" selected><?php echo $row['fee_type']; ?></option>
                          <option value="" disabled>Select Fee Type</option>        
                          <option value="registration_fee">Registration Fee </option>
                          <option value="admission_fee">Admission Fee </option>
                          <option value="Security Fee">Security Fee </option>
                          <option value="teution_fee">Tuition Fee </option>
                          <option value="transport_fee">Transport Fee </option>
                          <option value="sports_fee">Sports Fee </option>
                          <option value="paper_fund">Paper Fund </option>
                          <option value="annual_charges">Annual Charges  </option>
                          <option value="books_charges">Books Charges</option>
                          <option value="uniform_charges">Uniform Charges </option>
                          <option value="others">Others </option>
 
     </select><br/>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="address" class="form-control"  value="<?php echo $row['amount']; ?>" name="amount" data-parsley-trigger="change" required /> <br><br>
                      <br>
                     <br>
 <input type="hidden" id="fullname" class="form-control"  value="<?php echo $row['id']; ?>" name="id" required /> <br> <br>
 
 
                     <input type="hidden" id="fullname" class="form-control"  value="<?php echo $student_id; ?>" name="student_id" required /> 
                      <button type="submit" name="edit" class="btn btn-primary">Update</button>

                    </form>
<?php }} else { ?>

<?php if(!isset($_POST['search']) && !isset($_GET['student_id'])){

                    

 ?>

  <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                    <label for="fullname"> Student Admission # * :</label>
                      <input type="text" id="fullname" class="form-control"  name="student_id" required /> <br> 
                        <br>
                      <button type="submit" name="search" class="btn btn-primary">Search</button>

                    </form>
<?php } if((isset($_POST['search'])) || isset($_GET['student_id'])){

                    

 ?>


 <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
 
 
                      <!--input type="text" id="fullname" class="form-control"  name="feegroup" required /--> <br> 
                  
                  
                  
                  
                      <?php
                     $query = "SELECT * FROM `financial_year`";
                     $result = mysqli_query($link, $query);

                     while($row = mysqli_fetch_array($result)){ 
                  $start_date = $row['year_start_date'];
                   $end_date = $row['year_end_date'];
                   $installments = $row['installments'];
    // $start_date = "2023-03-01";
    // $end_date = "2024-02-29";
    // $installments = 12;
                     }
    $total_months = floor((strtotime($end_date) - strtotime($start_date)) / (30 * 24 * 60 * 60)) + 1;
    $interval = $total_months / $installments;
?>
   
   <label for="installment">Select Fee Month:</label>
   <select id="class" class="form-control" name="monthyear" style="width:100%;" >
<?php
    for ($i = 0; $i < $installments; $i++) {
        $installment_date = date('F Y', strtotime("+$i months", strtotime($start_date)));
        $installment_date2 = date('n-Y', strtotime("+$i months", strtotime($start_date)));
        echo '<option value="'.$installment_date2.'">' . $installment_date . '</option>';
    }
?>
    </select>
                  
                  
                      <label for="city">Fee Type * :</label>
                     <select id="class" class="form-control" name="feetype" style="width:100%;" >

                          <option value="" disabled>Select Fee Type</option>
                          <option value="registration_fee">Registration Fee </option>
                          <option value="admission_fee">Admission Fee </option>
                          <option value="Security Fee">Security Fee </option>
                          <option value="teution_fee">Tuition Fee </option>
                          <option value="transport_fee">Transport Fee </option>
                          <option value="sports_fee">Sports Fee </option>
                          <option value="paper_fund">Paper Fund </option>
                          <option value="annual_charges">Annual Charges  </option>
                          <option value="books_charges">Books Charges</option>
                          <option value="uniform_charges">Uniform Charges </option>
                          <option value="others">Others </option>
 
                      </select><br/>

                      <label for="address">Amount  * :</label>
                      <input type="number" id="amount" class="form-control"   name="amount" data-parsley-trigger="change" required /> <br>
                      
                    <!--label for="address">Due Date  * :</label>
                      <input type="date" id="address" class="form-control"  name="date" data-parsley-trigger="change" required /--> <br>
                      <input type="hidden" value="<?php if(isset($_POST['student_id'])){$student_id = $_POST['student_id'];} else if($_GET['student_id']){$student_id = $_GET['student_id']; } echo $student_id; ?>" id="fullname" class="form-control"  name="student_id" required />
                      <br>
                      <button type="submit" name="add" class="btn btn-primary">Add</button>

                    </form>
<?php } } ?>
                    <!-- end form for validations -->

                  </div>
<div class="col-xl-8 col-md-8 col-xs-12">
  <h2>Student Details </h2> 
  <?php  if(isset($_GET['id'])){
                      ?>
                      <br>
                   
                        <?php
                        $id = $_GET['id'];

   $query ="DELETE FROM `fee_extra` WHERE `id`='$id'  ";
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
                      $student_id =$_POST['student_id'];
                      $feetype =$_POST['feetype'];
                      $monthyear =$_POST['monthyear'];
                      $splitValues = explode("-", $monthyear);
                 
                     // Extract year and month using array indexes
                      $month = $splitValues[0];
                     $year = $splitValues[1];
                      $amount =  $_POST['amount'];
                      $query4 = "UPDATE `fee_extra` SET `feemonth`='$month', `year`='$year', `fee_type`='$feetype',`amount`='$amount' WHERE `id`='$staff'";
                      $result4 = mysqli_query($link, $query4);
                      
                      if ($result4 == TRUE) {
                          $error = "Updated Successfully";
                          $url = 'fee_extra.php?error=' . urlencode($error) . '&student_id=' . urlencode($student_id);

                     ?>
                              <script>
                                  // Replace 2000 with the number of milliseconds you want to wait before refreshing
                                  window.location.href = '<?php echo $url; ?>';
                              </script>
                      <?php
                        $result4 = FALSE;
                      
                      }
  //  header('location:fee_concession.php?error=Updated Succesfully&student_id=' .$student_id);
  //  exit();
}
?>   
<br>
  <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title"> Admission # </th>
                            <th class="column-title"> Student Name </th>
                            <th class="column-title">Father Name</th>
                            <th class="column-title">Class</th>
                            <th class="column-title">Mobile # </th>
                            <th class="column-title" text-align="center">Address </th>
                         </tr>
                        </thead>

                        <tbody>
  
  <?php
      
      if(isset($_GET['student_id'])){                        
                $student_id= $_GET['student_id'];    }
        else  if(isset($_POST['student_id'])) {
                $student_id= $_POST['student_id'];  
              
              }
              else {
                $student_id=0;    

              }
                        $query = "SELECT * FROM `student`  WHERE `id`='$student_id'";
                        $result = mysqli_query($link, $query);

                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
                                <td class=" "><?php echo $row['id']; ?></td>
                                <td class=" "><?php echo $row['fullname']; ?></td>
                                <td class=" "><?php echo $row['fname']; ?></td>
                                <td class=" "><?php echo $row['class']; ?></td>
                                <td class=" "><?php echo $row['mobile']; ?></td>
                                <td class=" "><?php echo $row['address']; ?></td>
                          </tr> 
                          <?php }  ?>
 
                        </tbody>
                      </table>
                      
                        <h2>Extra Fee </h2> 
                      
                    <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title"> ID </th> 
                            <th class="column-title">Fee Month</th>                           
                            <th class="column-title">Fee Type</th>
                            <th class="column-title">Amount</th>
                            <th class="column-title">Updated Date </th>
                            <th class="column-title" text-align="center">Action </th>
                         </tr>
                        </thead>

                        <tbody>
                        <?php

                        $query2 = "SELECT * FROM `fee_extra` WHERE `student_id`='$student_id' ORDER BY id ASC";
                        $result2 = mysqli_query($link, $query2);
$count=1;
                        while($row2 = mysqli_fetch_array($result2)){
                        ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $count; ?></td>
                            <td class=" "><?php  $month=$row2['feemonth']; echo date('F', mktime(0, 0, 0, $month, 1));   ?> - <?php echo $row2['year']; ?></td>
                            <td class=" "><?php echo $row2['fee_type']; ?></td>
                            <td class=" "><?php echo $row2['amount']; ?></td>
                            <td class=" "><?php $date=$row2['updated_at']; echo  date('d-m-Y', strtotime($date)); ?></td>
                            <td class=" "><button onclick="location.href='fee_extra.php?edit_id=<?php echo $row2['id']; ?>&student_id=<?php echo $student_id; ?>'" class="btn"><i class="fa fa-edit"></i> </button>
                            <button onclick="location.href='fee_extra.php?id=<?php echo $row2['id']; ?>'" class="btn"><i class="fa fa-trash"></i> </button>
                            </td> 
                          </tr> 

                          <?php  $count++; } ?>
 
                        </tbody>
                      </table>

</div>
<br>
  


</div>
              
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
