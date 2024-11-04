<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fee history!</title>
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
                <h3>Ledger</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fee History</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <?php
                    if (isset($_GET['sid'])) { ?>
                   
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="feehistory.php" method="post" enctype="multipart/form-data">
                      <label for="id">Student * :</label>
                      <div class="row"?>
                        <div class="col-md-4">
                     <select id="class" class="form-control" name="id" style="width:100%;" >

 <option value="" selected disabled>Select Student </option>
<?php

 $querya = "SELECT * FROM `fee`  ";
                        $resulta = mysqli_query($link, $querya);
                        
while($rowa = mysqli_fetch_array($resulta))
                        {

$studentid= $rowa['studentid'];
 $query11 = "SELECT * FROM `student` WHERE `id`= '$studentid'  ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];
$stfname= $row11['fname'];

?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname;?> S/D/O <?php echo $stfname;?> </option>
                     <?php }}?>  
                      </select>
<br/>

   </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php

}
                    if (!isset($_GET['sid'])) {
                    $id = $_SESSION['id'];
 $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                        
                         <?php
                        $query = "SELECT * FROM `fee` WHERE `studentid` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        ?>
                        <br><br><br>
                        <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title">Challan No.</th>
                                <th class="column-title">Fee Month </th>
                           <th class="column-title">Total Fee </th>
                                <th class="column-title">Fee Paid </th>
  <th class="column-title">Remainings </th>
                                <th class="column-title">Timestamp </th>
                              </tr>
                            </thead>
                            <tbody>
                        <?php
                        while($fee = mysqli_fetch_array($result)){
                          ?>
                          <tr class="even pointer">
 <td class=" "><?php echo $fee['challan_no']; ?></td>
                           
                           
<?php
$batch=$fee['feemonth'];                
            if($batch== '1'){
$month= "January";
}
elseif($batch== '2')
{
$month= "February";
}
elseif($batch=='3')
{
$month= "March";
}
elseif($batch== '4')
{
$month= "April";
}
elseif($batch== '5')
{
$month= "May";
}
elseif($batch== '6')
{
$month= "June";
}
elseif($batch== '7')
{
$month= "July";
}
elseif($batch== '8')
{
$month= "August";
}
elseif($batch== '9')
{
$month= "September";
}
elseif($batch== '10')
{
$month= "October";
}
elseif($batch== '11')
{
$month= "November";
}
elseif($batch== '12')
{
$month= "December";
}     ?>     
                            <td class=" "><?php echo $month; ?>-<?php echo $fee['feeyear']; ?> </td>
    <td class=" "><?php echo $fee['tamount']; ?></td>
                                              
                            <td class=" "><?php echo $fee['amount']; ?></td>
<?php 
$remainings=$fee['tamount']-$fee['amount'];

 ?>
  <td class=" "><?php echo $remainings; ?></td>
                            <td class=" "><?php echo $fee['datetime']; ?></td>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                        <?php
                       }else{
                        //no fee history
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No fee history found!</h3></div>                
                        </div>
                        <?php
                       }
                       }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No student found!</h3></div>                
                        </div>
                        <?php
                       }
                     } 
                    ?>
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
