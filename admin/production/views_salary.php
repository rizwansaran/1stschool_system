<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>report</title>
    <?php include 'php/head.php.inc'; ?>
<style>
th,td{
text-align:center; border: 1px solid #dddddd;
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
                <h3> Salary Report </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content"> <div class="row">  <div class="col-md-4 col-sm-6 col-xs-12">
<h2> Search By Month and Year:</h2>
<form id="demo-form" data-parsley-validate action="views_salary.php" method="post" enctype="multipart/form-data">
    <h2> Select Month</h2>
                    <select id="batch" class="form-control" name="month" >
      <option value="">Select Month</option>                             
<?php

 $queryss = "SELECT DISTINCT month, year FROM `salary_report` WHERE `paid`='Yes'";
                            $result11 = mysqli_query($link, $queryss);
 while( $r = mysqli_fetch_array($result11))
                        {
                           
                            

$batch=$r['month'];  
if($batch== 1){
$month= "January";
}
elseif($batch== 2)
{
$month= "February";
}
elseif($batch== 3)
{
$month= "March";
}
elseif($batch== 4)
{
$month= "April";
}
elseif($batch== 5)
{
$month= "May";
}
elseif($batch== 6)
{
$month= "June";
}
elseif($batch== 7)
{
$month= "July";
}
elseif($batch== 8)
{
$month= "August";
}
elseif($batch== 9)
{
$month= "September";
}
elseif($batch== 10)
{
$month= "October";
}
elseif($batch== 11)
{
$month= "November";
}
elseif($batch== 12)
{
$month= "December";
}
?>




    <option value="<?php echo $batch; ?>"><?php echo $month; ?>-<?php echo $r['year'];?></option>
    
    
  
    <?php }?>
                                                               </select>

                      <br><br>  
                       <h2> Select Year</h2>   
                    <select id="batch" class="form-control" name="year" >
          
             <option value="">Select Year</option>                      
<?php

 $queryss = "SELECT DISTINCT year FROM `salary_report` WHERE `paid`='Yes'";
                            $result11 = mysqli_query($link, $queryss);
 while( $r = mysqli_fetch_array($result11))
                        {
                           
                            

$year=$r['year'];  

?>




    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>  <?php }?>
                                                               </select>
  <br><br>  
                        <div class="col-md-6" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      
                    </form>   </div>
<div class="col-md-2" ></div>
<div class="col-md-4 col-sm-6 col-xs-12">
<h2> Search By Teacher Name:</h2>
<form id="demo-form" data-parsley-validate action="views_salary.php" method="post" enctype="multipart/form-data">
                    <select id="batch" class="form-control" name="t_id" >
                                
<?php

 $queryss = "SELECT DISTINCT t_id FROM `salary_report` WHERE `paid`='Yes' ";
                            $result11 = mysqli_query($link, $queryss);
 while( $r = mysqli_fetch_array($result11))
                        {
                           
                            

$t_id=$r['t_id']; 
 $querystt = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $resultt = mysqli_query($link, $querystt);
 $r2 = mysqli_fetch_array($resultt);
      $name=$r2['fullname'];
?>                  
    <option value="<?php echo $t_id;  ?>"> <?php echo  $name; ?> </option>  <?php }?>
                                                               </select>
 
                       <br><br>
                        <div class="col-md-6" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                       
                      </div>
                    </form>

</div></div>
<hr>
 <?php  if (isset($_POST['month'])) { ?>
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
            
                       	
                       	 <?php 
 
          		$month1= $_POST['month'];
          		$batch=$month1;
          		
          		
          		
                         $year=$_POST['year'];
  
if($batch== 1){
$month= "January";
}
elseif($batch== 2)
{
$month= "February";
}
elseif($batch== 3)
{
$month= "March";
}
elseif($batch== 4)
{
$month= "April";
}
elseif($batch== 5)
{
$month= "May";
}
elseif($batch== 6)
{
$month= "June";
}
elseif($batch== 7)
{
$month= "July";
}
elseif($batch== 8)
{
$month= "August";
}
elseif($batch== 9)
{
$month= "September";
}
elseif($batch== 10)
{
$month= "October";
}
elseif($batch== 11)
{
$month= "November";
}
elseif($batch== 12)
{
$month= "December";
}
                      
                         
                         
                         
                          $querys = "SELECT * FROM `salary_report` WHERE `month`='$month1' AND `year`='$year' AND `paid`='Yes' ";
                            $result1 = mysqli_query($link, $querys);
if(mysqli_num_rows($result1)>0){
?>
                      <h2 align="center">Salary Report for: <?php echo $month;?>-<?php echo  $year; ?></h2><hr>
                            <thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center;">Staff ID</th>
                           
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Salary</th>
                            <th class="column-title" style="text-align:center;">Time Of Payment</th>
                            
                            
                          </tr>
                        </thead>
<?php 
 while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['t_id'];
$batch=$r['month'];
$salary=$r['salary'];
 $time=$r['date'];
 $batch1=$r['year'];

  						
                        $queryst = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $result = mysqli_query($link, $queryst);
 $r1 = mysqli_fetch_array($result);
                       
                         ?>
                            
                        <tbody>  
                          <tr class="even pointer">
<td class=" " style="text-align:center;"><?php echo $t_id;?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $r1['fullname'];?></td>

                            
                            <td class=" " style="text-align:center;"><?php echo $salary;?>
 <td class=" " style="text-align:center;color:;"><?php echo $time;?></td>
                            </td>

                            

                            
                           
                           



                          </tr>

                         
                        </tbody>
                           <?php
                          
                            }?>
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                     <?php }}
elseif(isset($_POST['t_id']))

{  ?> 
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
     
                       	
                       	 <?php 
 
          		$t_id= $_POST['t_id'];	
          		
                         $year=date("Y");
                          $querys = "SELECT * FROM `salary_report` WHERE `t_id`='$t_id'  ";
                            $result1 = mysqli_query($link, $querys);
if(mysqli_num_rows($result1)>0){
     $queryst = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $result = mysqli_query($link, $queryst);
 $r1 = mysqli_fetch_array($result);
?>
                  <h2 align="center">Salary Report of: <?php echo $t_id;?>-<?php echo $r1['fullname']; ?></h2><hr>
                            <thead>
                          <tr class="headings">
 
 <th class="column-title" style="text-align:center;">Month</th>
                            <th class="column-title" style="text-align:center;">Salary</th>
                            <th class="column-title" style="text-align:center;">Time Of Payment</th>
                            
                            
                          </tr>
                        </thead>
<?php 
 while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['t_id'];
$batch=$r['month'];
$batch1=$r['year'];
$salary=$r['salary'];
 $time=$r['date'];

  						
                       
                       
                         ?>
                            
                        <tbody>  
                          <tr class="even pointer">

<?php  
if($batch== 1){
$month= "January";
}
elseif($batch== 2)
{
$month= "February";
}
elseif($batch== 3)
{
$month= "March";
}
elseif($batch== 4)
{
$month= "April";
}
elseif($batch== 5)
{
$month= "May";
}
elseif($batch== 6)
{
$month= "June";
}
elseif($batch== 7)
{
$month= "July";
}
elseif($batch== 8)
{
$month= "August";
}
elseif($batch== 9)
{
$month= "September";
}
elseif($batch== 10)
{
$month= "October";
}
elseif($batch== 11)
{
$month= "November";
}
elseif($batch== 12)
{
$month= "December";
}
?>


 <td class=" " style="text-align:center;color:;"><?php echo $month;?>-<?php echo $batch1;?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $salary;?>
 <td class=" " style="text-align:center;color:;"><?php echo $time;?></td>
                            </td>

                            

                            
                           
                           



                          </tr>

                         
                        </tbody>
                           <?php
                          
                            }


?>
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>

                     <?php 
}}

else{

echo "";
}
?> 

                     </div>
                  	 </div>
                  
                   
                      <br>
                    
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
