<?php 
require 'php/config.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>update Salary</title>
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
                <h3> Salary Payment:  <b style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></b> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

        <?php  if (!isset($_POST['month'])) { ?> 
         <div class="col-md-4 col-sm-12 col-xs-12" >
                   <h2> Search By Month and Year:</h2>
<form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
    <h2> Select Month</h2>
                    <select id="batch" class="form-control" name="month" >
      <option value="">Select Month</option>                             
<?php
$count=1;
 
            while( $count < 13 )
 
 
                        {
                           
                            

$batch=$count;  
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




    <option value="<?php echo $batch; ?>"><?php echo $month; ?></option>
    
    
  
    <?php   $count++; }?>
                                                               </select>

                      <br><br>  
                       <h2> Select Year</h2>   
                    <select id="batch" class="form-control" name="year" >
          
             <option value="">Select Year</option>                      
<?php
$count=0;
 $year1= date('Y');
 while( $count < 6 )
                        {
                           
                            

$year=$year1 - $count;  

?>




    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>  <?php   $count++; }?>
                                                               </select>
  <br><br>  
                        <div class="col-md-6 " >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      
                    </form>   </div>

</div></div>
<hr>
 <?php }  if (isset($_POST['month'])) { ?>
                
                   
                   
                   
                   
                   
                   
                   
                   
                       	
 
 <form id="demo-form" data-parsley-validate action="action_salary_report.php" method="post" enctype="multipart/form-data">
                   <div class="col-md-3 col-sm-3 col-xs-6">  </div> <div class="col-md-3 col-sm-3 col-xs-6">  </div> <div class="col-md-4 col-sm-3 col-xs-6">  </div> <div class="col-md-2 col-sm-3 col-xs-6">
                          <button align="right" type="submit" name="submit" class="btn btn-primary form-control">Update</button>  <br><br>
                  </div>
                 
                      <div class="row">
<table class="table table-striped jambo_table bulk_action">
                        
                          
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">  Sr.#</th>
                            <th class="column-title" style="text-align:center;">  Staff Name</th>
                            <th class="column-title" style="text-align:center;">Salary </th>
                            <th class="column-title" style="text-align:center;">Status </th>
                            
                 <input type="hidden" class="flat" name="month" id="genderF" value="<?php echo $_POST['month']; ?>" />         
                     <input type="hidden" class="flat" name="year" id="genderF" value="<?php echo $_POST['year']; ?>" />         
                          </tr>
                        </thead>
 <tbody>  
                         
                    
<?php 
 
 $count=1;         						 
                         
                          $querys ="SELECT * FROM `staff` WHERE `status`='Active'"; 
                            $result1 = mysqli_query($link, $querys);
 while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['id'];


  						
                        $queryst = "SELECT * FROM `salary` WHERE `t_id`='$t_id' ";
                        $result = mysqli_query($link, $queryst);
 $row = mysqli_fetch_array($result);
 
                  $salary=$row['salary'];     
                         ?>
 <tr class="even pointer">
     <td class=" " style="text-align:center;">
         <?php echo $count; ?>
         <input  class="form-control" type="hidden" required="" name ="t_id[]" value="<?php echo $r['id']; ?>" style="width:50%;">
  
                                                 
 
</td> 
<td class=" " style="text-align:center;">
                              <?php echo $r['fullname']; ?>                     
 
</td> 
<td class=" " style="text-align:center;">
                             <input type="text" style="align:center;" class="flat" name="salary[]" id="genderM" value="<?php echo $salary;?>" checked required /> 
                                                  
 
</td> 
<td class=" " style="text-align:center;">
    
    <p>
                       Paid:
                        <input type="radio" class="flat" name="paid[]<?php echo $row['t_id']; ?>" id="genderM" value="Yes" checked required /> 
Not Paid:
                        <input type="radio" class="flat" name="paid[]<?php echo $row['t_id']; ?>" id="genderF" value="No" />
                    </p>
 
    
 
     </td>
                 </tr>     <?php
                 
                 $count++;
                 
                            }?>  </tbody> </table>
                       
                   </form>

    <?php
                 } ?>                            
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
