<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the father's CNIC or name from the form
   if(isset($_POST['fcnic']) && isset($_POST['feemonth'])){
    $fcnic = $_POST['fcnic'];
    $feemonth_year = $_POST['feemonth'];
    list($stfname, $stfcnic) = explode('-', $fcnic);
    // Split feemonth-year into separate month and year
    list($feemonth, $feeyear) = explode('-', $feemonth_year);

    // Fetch all students based on father's name or CNIC
    $query_students = "SELECT * FROM `student` WHERE `fname` = '$stfname' AND `fcnic` = '$stfcnic' AND `status`='Active'";
    $result_students = mysqli_query($link, $query_students);

    $students = [];
    while ($row = mysqli_fetch_array($result_students)) {
        $students[] = $row; // Store each student's details
    }

    // Initialize array for fee details and total pending amount
    $fee_details = [];
    $total_pending = 0;

    // Loop through students to get fee details
    foreach ($students as $student) {
        $student_id = $student['id'];

        // Get total fee from chalan table for the specific month and year
        $query_chalan = "SELECT SUM(registration_fee + admission_fee + teution_fee + transport_fee + sports_fee + paper_fund + 
                        annual_charges + books_charges + uniform_charges + others) AS total_fee 
                        FROM `chalan` 
                        WHERE `student_id` = '$student_id' AND `feemonth` = '$feemonth' AND `year` = '$feeyear'";
        $result_chalan = mysqli_query($link, $query_chalan);
        $chalan_data = mysqli_fetch_array($result_chalan);
        $total_fee = $chalan_data['total_fee'];

        // Get paid fee from the fee table for the specific month and year
        $query_fee = "SELECT SUM(amount) as paid_fee, SUM(tamount) as total_fee  FROM `fee` 
                      WHERE `studentid` = '$student_id'";
        $result_fee = mysqli_query($link, $query_fee);
        $fee_data = mysqli_fetch_array($result_fee);
        $paid_fee = $fee_data['paid_fee'] ?? 0;
        $total_amount_fee = $fee_data['total_fee'] ?? 0;
        $pending_fee = $total_amount_fee -  $paid_fee;
        $total_pending = $pending_fee;

        // Store fee details for each student
        $fee_details[] = [
            'student_id' => $student['id'],
            'student_name' => $student['fullname'],
            'class' => $student['class'],
            'father_name' => $student['fname'],
            'total_fee' => $total_fee,
            'paid_fee' => $paid_fee,
            'pending_fee' => $pending_fee
        ];
    }
   }
   
}

// Handle form submission for fee collection
if (isset($_POST['collect_fee'])) {
  $feemonth = $_POST['feemonth'];
  $feeyear = $_POST['feeyear'];
  $total_fees = $_POST['total_fee'];
  $paid_fees = $_POST['paid_fee'];
  $student_ids = $_POST['student_id'];
  $student_classes = $_POST['class'];
  
  // Update fee collection
  for ($i = 0; $i < count($student_ids); $i++) {
      $student_id = $student_ids[$i];
      $paid_fee = $paid_fees[$i];
      $total_fee = $total_fees[$i];
      $class = $student_classes[$i];
      $challan_no = $feemonth . $feeyear . $student_id;

      // Check if a fee record already exists for the student for the given month and year
      $query_check_fee = "SELECT * FROM `fee` WHERE `studentid` = '$student_id' AND `feemonth` = '$feemonth' AND `feeyear` = '$feeyear'";
      $result_check_fee = mysqli_query($link, $query_check_fee);

      if (mysqli_num_rows($result_check_fee) > 0) {
          // Record exists, so update the existing fee record
          $query_update_fee = "UPDATE `fee` 
                               SET `tamount` = '$total_fee', `amount` = '$paid_fee', `challan_no` = '$challan_no', 
                               `date` = CURDATE(), `datetime` = NOW() 
                               WHERE `studentid` = '$student_id' AND `feemonth` = '$feemonth' AND `feeyear` = '$feeyear'";
          $update_result = mysqli_query($link, $query_update_fee);
      } else {
          // Record does not exist, so insert a new fee record
          $query_insert_fee = "INSERT INTO `fee` (studentid, class, tamount, amount, feemonth, feeyear, challan_no, date, datetime) 
                               VALUES ('$student_id', '$class', '$total_fee', '$paid_fee', '$feemonth', '$feeyear', '$challan_no', CURDATE(), NOW())";
          $insert_result = mysqli_query($link, $query_insert_fee);
      }
  }

  // Check if the last query was successful (for either update or insert)
  if ($update_result || $insert_result) {
      $msg = "Fees collected successfully!";
  } else {
      $msg = "Error While Fee Collection: " . mysqli_error($link);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receive fee!</title>
    <?php include 'php/head.php.inc'; ?>

   <!-- Include Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#fcnic').select2({
                placeholder: "Select Parent",
                width: '100%'
            });
            
            $('#feemonth').select2({
                placeholder: "Select Fee Month",
                width: '100%'
            });
        });
    </script>
    <style>
      .text-center{
        text-align:center;
      }
    </style>
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
                <h3>Fee Collection</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                      <h2> Siblings Fee Collection </h2>
                       <div class="clearfix"></div>
                     
                  </div>
                  
                  <div class="x_content">
               
                      <div class="" style="color: red;">  <?php echo $msg; ?> </div>
                     
                 
           <br>

                    <!-- start form for validation -->
                  <?php
                    if (!isset($_GET['id'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-4">
                            <select class="form-control" name="fcnic" id="fcnic" style="width:100%;">
                                <option value="">Select Parent</option>
                                <?php
                                // Fetch student parents for select options
                                $query11 = "SELECT DISTINCT `fname`, `fcnic` FROM `student` WHERE `status`='Active' ORDER BY fname ASC";
                                $result11 = mysqli_query($link, $query11);                  
                                while ($row11 = mysqli_fetch_array($result11)) {
                                    $stfname = $row11['fname'];
                                    $stfcnic = $row11['fcnic'];
                                ?>
                                    <!-- <option value="<?php echo $stfcnic; ?>"><?php echo $stfname; ?> (<?php echo $stfcnic; ?>)</option> -->
                                    <option value="<?php echo $stfname."-".$stfcnic; ?>"><?php echo $stfname; ?> (<?php echo $stfcnic; ?>)</option>
                           
                                    <?php } ?>
                            </select>
                          </div>

                          <div class="col-md-4">
                              <select class="form-control" id="feemonth" name="feemonth" style="width:100%;">
                                  <option value="">Select Fee Month</option>
                                  <?php
                                  $query1 = "SELECT DISTINCT feemonth, year FROM `chalan` ORDER BY id ASC";
                                  $result1 = mysqli_query($link, $query1);
                                
                                  while($row1 = mysqli_fetch_array($result1)) {
                                      $fee_month = $row1['feemonth'];
                                      $fee_year = $row1['year'];
                                      $current_year = date('Y');
                                      $current_month = date('n');
                                      // Convert numeric month to month name
                                      $monthName = date('F', mktime(0, 0, 0, $fee_month, 10)); 
                                  ?>
                                      <option value="<?php echo $fee_month . '-' . $fee_year; ?>"
                                      <?php if($current_year == $fee_year && $current_month ==$fee_month){?> selected <?php }?> ><?php echo $monthName; ?> - <?php echo $fee_year; ?></option>
                                  <?php 
                                  }
                                  ?>
                              </select>
                          </div>
                          <div class="col-md-3">
                              <button type="submit" class="btn btn-primary form-control">Find</button>
                          </div>
                      </div>
                  </form>
                    <!-- end form for validations -->
              <?php 
              }
              ?>

              <br><br><br><br><br><br>
                    <div class="row">
                        <div class="col-md-12">
                        <!-- Display the Fee Details and Editable Paid Fee -->
                        <?php if (isset($fee_details) && count($fee_details) > 0): ?>
                            <form action="" method="post">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> Sr. #</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Class</th>
                                            <th class="text-center">Father Name</th>
                                            <th class="text-center"> Fee Month </th>
                                            <th class="text-center">Total Fee</th>
                                            <th class="text-center">Paid Fee </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <input type="hidden" name="feemonth" value="<?php echo $feemonth; ?>" />
                                    <input type="hidden" name="feeyear" value="<?php echo $feeyear; ?>" />
                                                   
                                        <?php foreach ($fee_details as $index => $fee): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $index + 1; ?></td>
                                                <td class="text-center"><?php echo $fee['student_name']; ?></td>
                                                <td class="text-center"><?php echo $fee['class']; ?></td>
                                                <td class="text-center"><?php echo $fee['father_name']; ?></td>
                                                <td class="text-center"><?php $month_Name = date('F', mktime(0, 0, 0, $feemonth, 10));
                                                 echo $month_Name. "-". $feeyear ?></td>
                                                 
                                                <td class="text-center"><?php echo $fee['total_fee']; ?></td>
                                                <td class="text-center">
                                                    <input type="number" class="form-control paid_fee" name="paid_fee[]" value="<?php echo $fee['total_fee']; ?>" />
                                                    <input type="hidden" name="student_id[]" value="<?php echo $fee['student_id']; ?>" />
                                                    <input type="hidden" name="total_fee[]" value="<?php echo $fee['total_fee']; ?>" />
                                                    <input type="hidden" name="class[]" value="<?php echo $fee['class']; ?>" />
                                                   
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <tr>
                                        <td class="text-center" colspan="7"> <h3 id="total_amount_fee"></h3> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="collect_fee" class="btn btn-primary">Collect Fee</button>
                            </form>
                        <?php endif; ?>


 

                      </div>
                    </div>
                  </div>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script>
$(document).ready(function() {
    // Function to calculate the sum of all paid fees
    function calculateTotalFee() {
        let totalFee = 0;

        // Iterate over each .paid_fee input field to sum the values
        $('.paid_fee').each(function() {
            let feeValue = parseFloat($(this).val()); // Get the value as a float
            if (!isNaN(feeValue)) {
                totalFee += feeValue; // Add to the total fee
            }
        });

        // Display the total fee in the #total_amount_fee element
        $('#total_amount_fee').text('Total Paid Fee: ' + totalFee.toFixed(2));
    }

    // Attach change event listener to .paid_fee input fields
    $(document).on('input', '.paid_fee', function() {
        calculateTotalFee(); // Recalculate the total when any input changes
    });

    // Calculate total on page load
    calculateTotalFee();
});
</script>

