<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Monthly report!</title>
    <?php include 'php/head.php.inc'; ?>

<script>
function myFunction()
{
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    if (!tr[i].classList.contains('headings')) {
      td = tr[i].getElementsByTagName("td"),
      match = false;
      for (j = 0; j < td.length; j++) {
        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          match = true;
          break;
        }
      }
      if (!match) {
        tr[i].style.display = "none";
      } else {
        tr[i].style.display = "";
      }
    }
  }
}



</script>
<style>
th,td{
text-align:center; border: 2px solid #dddddd;
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
                <h3>Ledger</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
<?php  if (!isset($_POST['month'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                       <div class="row"?>
                        <div class="col-md-3">
                       <select id="batch" class="form-control" name="month" >

 <option value="" selected disabled >Select Month </option>
 
                                   <?php 
$query2 = "SELECT DISTINCT `feemonth` FROM `fee` ORDER BY feemonth ASC ";
                       $result2 = mysqli_query($link, $query2);
 while($fee12 = mysqli_fetch_array($result2)){

   $batch= $fee12['feemonth']; 
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
}            

 ?>
                    
 <option value="<?php echo $batch;?>"> <?php echo $month ; ?>  </option> <?php } ?>
                 
                                  </select>  </div>
 <div class="col-md-3">
   <select id="batch" class="form-control" name="year" >
 <option value="" selected disabled >Select Year </option>
<?php 
$query3 = "SELECT DISTINCT `feeyear` FROM `fee` ";
                       $result3 = mysqli_query($link, $query3);
 while($fee1 = mysqli_fetch_array($result3)){

   $year= $fee1['feeyear']; 


 ?>
                    
 <option value="<?php echo $fee1['feeyear'];?>"> <?php echo $fee1['feeyear']; ?>  </option> <?php } ?>
                                    
                                  </select>  </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" name="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php }
                    if (isset($_POST['submit'])) {
 $month = $_POST['month'];
 $batch = $_POST['month'];
$year = $_POST['year'];

 if($batch== '1'){
$month1= "January";
}
elseif($batch== '2')
{
$month1= "February";
}
elseif($batch=='3')
{
$month1= "March";
}
elseif($batch== '4')
{
$month1= "April";
}
elseif($batch== '5')
{
$month1= "May";
}
elseif($batch== '6')
{
$month1= "June";
}
elseif($batch== '7')
{
$month1= "July";
}
elseif($batch== '8')
{
$month1= "August";
}
elseif($batch== '9')
{
$month1= "September";
}
elseif($batch== '10')
{
$month1= "October";
}
elseif($batch== '11')
{
$month1= "November";
}
elseif($batch== '12')
{
$month1= "December";
}  
$batch1= $batch-1;
$year1=   $year-1;       
 ?>

  <h2>List Of Students who Not Paid Fee for <?php echo $month1; ?> - <?php echo $year; ?> </h2>
 <div class="table-responsive">
                          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.................">


                   
                     <table id="myTable" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                  
                 <thead>
                              
                            </thead>
<tr class="headings">
 <td class=""><b>Sr. #</td>
  <td class=""><b>Admission No. </td>
<td class=""><b>Name </th>
 <td class=""><b>Father Name </td>
 <td class=""><b>Class </th>
    <td class=""><b>Mobile No. </td>
 <td class="column-title"><b>Address </td>
   <td class=""><b>Pending Dues </td>
                           
                              </tr>
<?php


 $query = "SELECT 
    id, fullname, fname, class, mobile, address
FROM
    student
WHERE
    NOT EXISTS( SELECT 
            *
        FROM
            fee
        WHERE
            fee.studentid = student.id AND fee.feemonth=$month AND fee.feeyear=$year) AND status='Active'";




 $result = mysqli_query($link, $query);
                      

?>

<?php
$count=1;
$totalfee=0;

     while( $student = mysqli_fetch_array($result)){
$id=$student['id'];

      $query = "SELECT * FROM `chalan` WHERE `student_id`='$id' AND `feemonth` = '$month' AND `year`='$year' ";
   
                     $result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
$registration_fee= $row['registration_fee']; 

$admission_fee= $row['admission_fee']; 
$tuition_fee= $row['teution_fee'];

$transport_fee=   $row['transport_fee']; 
  $sports_fee=   $row['sports_fee']; 
$paper_fund=   $row['paper_fund']; 
$annual_fee=   $row['annual_charges']; 
$books_fee=   $row['books_charges']; 
$uniform_fee=   $row['uniform_charges']; 
$others=   $row['others']; 





$batch = $month_to;
$batch1 = $batch - 1;

//$year1 = $value12 - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;
$year = $year_to - 1; 

}
else {

$batch1 = $batch1;

$year = $year_to; 


}



$month= $batch1-1;



 

$queryatd21 = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = '$batch1' AND `year` = '$year'";
                        $resultatd21 = mysqli_query($link, $queryatd21);
if(mysqli_num_rows($resultatd21) > 0) {
                        $studentatd21 = mysqli_num_rows($resultatd21);
                          
 $fine= $studentatd21 * 50 ;


 
 }
else
{

$fine=0;

}












$remainings=$fine+$registration_fee+$admission_fee+$tuition_fee+$transport_fee+$sports_fee+$paper_fund+$annual_fee+$books_fee+$uniform_fee+$others;


  
                        ?>
                    
                       
                            <tbody>
                          <tr class="even pointer">
 <td class=" "> <?php  echo  $count; ?>  </td>


 <td class=" "> <?php echo $student['id'];?></td>
 <td class=" "> <?php echo $student['fullname'];?></td>
 <td class=" "> <?php echo $student['fname'];?></td>
 <td class=" "> <?php echo $student['class'];?></td>
 <td class=" "> <?php echo $student['mobile'];?></td>
 <td class=" "> <?php echo $student['address'];?></td>
 <td class=" "> <?php echo $remainings;?></td>
                           
                          
                           
                            </td>
                          </tr>
                          <?php

                        


$totalfee=$totalfee + $remainings;
 $count++; }
  
                       
                    ?>
<tr class="headings">
 <td class=""><b>Sr. #</td>
  <td class=""><b>Roll No. </td>
<td class=""><b>Name </th>
 <td class=""><b>Father Name </td>
 <td class=""><b>Class </th>
    <td class=""><b>Mobile No. </td>
 <td class="column-title"><b>Address </td>
   <td class=""><b>Pending Dues </td>
                           
                              </tr>
 </tbody>
                      </table>
<h3> Total Amount Pending: <?php echo $totalfee; ?> </h3>

                     <?php } ?>  
                       

                    </div>
                       
                 
               
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
<!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 <?php include 'script.php'; ?>
 	
  </body>
</html>
