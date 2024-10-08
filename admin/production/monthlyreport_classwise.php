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
                    <h2>Fee History on month basis</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">




<?php  if (!isset($_POST['submit1']) && !isset($_POST['submit'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="id"> :</label>
                      <div class="row"?>

<div class="col-md-3">
   <select id="batch" class="form-control" name="class" >
 <option value="" selected disabled >Select Class </option>
<?php 
 $query311 = "SELECT DISTINCT `class` FROM `fee` ORDER BY class ASC ";
                       $result311 = mysqli_query($link, $query311);
 while($fee111 = mysqli_fetch_array($result311)){
 $sclass= $fee111['class']; 

 ?>
                    
 <option value="<?php echo $fee111['class'];?>"> <?php echo $fee111['class']; ?>  </option> <?php  }?>
                                    
                                  </select>  </div>

             
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" name="submit1" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php }?>











                    <!-- start form for validation -->
<?php  if (isset($_POST['submit1'])) {

 $class = $_POST['class'];

 ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="id"> :</label>
                      <div class="row"?>

 <input type="hidden" value="<?php echo $class; ?>"  name="class"/>

                        <div class="col-md-3">
                       <select id="batch" class="form-control" name="month" >

 <option value="" selected disabled >Select Month </option>
 
                                   <?php 
$query2 = "SELECT DISTINCT `feemonth` FROM `fee` WHERE `class`='$class' ORDER BY feemonth ASC ";
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
$query3 = "SELECT DISTINCT `feeyear` FROM `fee`  WHERE `class`='$class' ";
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
 $class = $_POST['class'];
 $month = $_POST['month'];
$year = $_POST['year'];
                        $query = "SELECT * FROM `fee` WHERE `class` = '$class' AND `feemonth` = '$month' AND `feeyear`= '$year'";
                       $result = mysqli_query($link, $query);
                       if(mysqli_num_rows($result)>0){ 

?>
 <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
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
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>