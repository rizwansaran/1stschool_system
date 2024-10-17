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
                <h2>Fee History on Daily basis</h2>
                    <div class="clearfix"></div>
                  </div>
                     
                  <div class="x_content">

                    <!-- start form for validation -->
<?php  if (!isset($_POST['month'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="id">Select Date * :</label>
                      <div class="row">
                        <div class="col-md-3">
                       <select id="batch" class="form-control" name="month" >

 <option value="" selected disabled >Select Date </option>
 
                                   <?php 
$query2 = "SELECT DISTINCT `date` FROM `fee` ORDER BY date DESC ";
                       $result2 = mysqli_query($link, $query2);
 while($fee12 = mysqli_fetch_array($result2)){

   $batch= $fee12['date']; 


 ?>
                    
 <option value="<?php echo $batch;?>"> <?php echo $batch ; ?>  </option> <?php } ?>
                 
                                  </select>  </div>
 
                        <div class="col-md-3">
                          <button type="submit" name="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
<br><br><br><br><br><br>

                    <!-- end form for validations -->

                    <?php }
                    if (isset($_POST['submit'])) { ?>


 <div class="table-responsive">
                          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.................">


                   
                     <table id="myTable" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                  
                 <thead>
                              <tr class="headings">
 <th class="column-title">Sr. #</th>
  <th class="column-title">Roll No. </th>
<th class="column-title">Name </th>
 <th class="column-title">Father Name </th>
 <th class="column-title">Class </th>
   
                               
                                <th class="column-title">Fee Month </th>
                                <th class="column-title">Fee Paid </th>
                               
                                <th class="column-title">Timestamp </th>
                              </tr>
                            </thead>
<?php
 $month = $_POST['month'];
                        $query = "SELECT * FROM `fee` WHERE `date` = '$month'  ORDER BY `studentid` ASC";
                       $result = mysqli_query($link, $query);
                       if(mysqli_num_rows($result)>0){ 

?>

<?php
$count=1;
$totalfee=0;

     while($fee = mysqli_fetch_array($result)){

   $id= $fee['studentid'];
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
}            
                     
                       $queryw = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result2 = mysqli_query($link, $queryw);
                       if($result2 && mysqli_num_rows($result2)){
                        $student = mysqli_fetch_array($result2);
                        ?>
                    
                       
                            <tbody>
                          <tr class="even pointer">
 <td class=" "> <?php  echo  $count; ?>  </td>


 <td class=" "> <?php echo $student['id'];?></td>
 <td class=" "> <?php echo $student['fullname'];?></td>
 <td class=" "> <?php echo $student['fname'];?></td>
 <td class=" "> <?php echo $student['class'];?></td>
                           
                          
                            <td class=" "><?php echo $month; ?>-<?php echo $fee['feeyear']; ?> </td>
                            <td class=" "><?php echo $fee['amount']; ?></td>
                            <td class=" "><?php echo $fee['datetime']; ?></td>
                            </td>
                          </tr>
                          <?php
                        }

$totalfee=$totalfee + $fee['amount'];

 $count++; }
  
                       
                    ?>
 </tbody>
                      </table>

<h3> Total Fee Of This Month: <?php echo $totalfee; ?> </h3>
                         <?php    }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No Record found!</h3></div>                
                        </div>
                        <?php
                       }
                     }
                        ?>
                       

                    </div>
                       
                       
               
                  </div>
                </div>
              </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
<!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 <?php include 'script.php'; ?>
 	
  </body>
</html>
