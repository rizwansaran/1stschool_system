<?php
require 'php/config.php';

if(!isLoggedIn()) {
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <?php include 'php/head.php.inc'; ?>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
         
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
                    <h2> Monthly SUmmary Report</h2>
                  <div class="clearfix"></div>
                  </div>
                     
                  <div class="x_content">
                
            <div class="row">
              <div class="col-md-12 col-xs-12">
                

<?php  if (!isset($_POST['month'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                    
                      <div class="row">
                        <div class="col-md-3">
                       <select id="month" class="form-control" name="month" >

 <option value="" selected disabled >Select Month </option>
 
                                   <?php 
$query2 = "SELECT DISTINCT `feemonth` FROM `fee` ORDER BY feemonth ASC ";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2)>0) {
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
                    
 <option value="<?php echo $batch;?>"> <?php echo $month ; ?>  </option> <?php } }
 else {
     
     
$query21 = "SELECT DISTINCT `month` FROM `income` ORDER BY month ASC ";
                       $result21 = mysqli_query($link, $query21);
                       if(mysqli_num_rows($result21)>0) {
 while($fee12 = mysqli_fetch_array($result21)){

   $batch= $fee12['month']; 
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
                    
 <option value="<?php echo $batch;?>"> <?php echo $month ; ?>  </option> <?php  }}
 
 else {
 
 
$query22 = "SELECT DISTINCT `month` FROM `expences` ORDER BY month ASC ";
                       $result22 = mysqli_query($link, $query22);
                       if(mysqli_num_rows($result22)>0) {
 while($fee12 = mysqli_fetch_array($result22)){

   $batch= $fee12['month']; 
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
                    
 <option value="<?php echo $batch;?>"> <?php echo $month ; ?>  </option> <?php }}
 
 
 else {
 
 
$query221 = "SELECT DISTINCT `month` FROM `salary_report` ORDER BY month ASC ";
                       $result221 = mysqli_query($link, $query221);
                       if(mysqli_num_rows($result221)>0) {
 while($fee121 = mysqli_fetch_array($result221)){

   $batch1= $fee121['month']; 
if($batch1== '1'){
$month= "January";
}
elseif($batch1== '2')
{
$month= "February";
}
elseif($batch1=='3')
{
$month= "March";
}
elseif($batch1== '4')
{
$month= "April";
}
elseif($batch1== '5')
{
$month= "May";
}
elseif($batch1== '6')
{
$month= "June";
}
elseif($batch1== '7')
{
$month= "July";
}
elseif($batch1== '8')
{
$month= "August";
}
elseif($batch1== '9')
{
$month= "September";
}
elseif($batch1== '10')
{
$month= "October";
}
elseif($batch1== '11')
{
$month= "November";
}
elseif($batch1== '12')
{
$month= "December";
}            

 ?>
                    
 <option value="<?php echo $batch1;?>"> <?php echo $month ; ?>  </option> <?php }}
 
 }
 
 }
     
     
 
 }
 
 ?>
                 
                                  </select>  </div>
 <div class="col-md-3">
   <select id="batch" class="form-control" name="year" >
 <option value="" selected disabled >Select Year </option>
<?php 
$query3 = "SELECT DISTINCT `feeyear` FROM `fee` ";
                       $result3 = mysqli_query($link, $query3);
                       if(mysqli_num_rows($result3)>0){
 while($fee1 = mysqli_fetch_array($result3)){

   $year= $fee1['feeyear']; 


 ?>
                    
 <option value="<?php echo $fee1['feeyear'];?>"> <?php echo $fee1['feeyear']; ?>  </option> <?php } } 
 
 else {

$query4 = "SELECT DISTINCT `year` FROM `income` ";
                       $result4 = mysqli_query($link, $query4);
                       if(mysqli_num_rows($result4)>0){
 while($fee1 = mysqli_fetch_array($result4)){

   $year= $fee1['year']; 


 ?>
                    
 <option value="<?php echo $fee1['year'];?>"> <?php echo $fee1['year']; ?>  </option> <?php } } 
 
 else {
 
 $query5 = "SELECT DISTINCT `year` FROM `expences` ";
                       $result5 = mysqli_query($link, $query5);
                       if(mysqli_num_rows($result5)>0){
 while($fee1 = mysqli_fetch_array($result5)){

   $year= $fee1['year']; 


 ?>
                    
 <option value="<?php echo $fee1['year'];?>"> <?php echo $fee1['year']; ?>  </option> <?php } } 
 
  else {

$query41 = "SELECT DISTINCT `year` FROM `salary_report` ";
                       $result41 = mysqli_query($link, $query41);
                       if(mysqli_num_rows($result41)>0){
 while($fee11 = mysqli_fetch_array($result41)){

   $year= $fee11['year']; 


 ?>
                    
 <option value="<?php echo $fee11['year'];?>"> <?php echo $fee11['year']; ?>  </option> <?php } } 
 } }
 
 }
 
 
 ?>
                                    
                                  </select>  </div>

 
                      
                        <div class="col-md-2" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
<?php }?>
                    <!-- end form for validations -->

                        <div class="row">
<div class="col-md-12" >
                    <?php

                    if (isset($_POST['month'])) {
                         $_date = $_POST['month'];
 $year = $_POST['year'];
                       
                      ?>
                       
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>



<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
$batch = date("m");
$day = date("d");
$year = date("Y");
?>

<tr class=" "> 
<td class=" " align="center"><h1> <img src=" <?php echo $image;?>" class="" width='50' height='50'> <b> <?php echo $name;?></b> </h1><br/> </td> 
 </tr>
<tr class=" "> 
<td class=" " align="center"> <h3>Monthly Summery Report</h3> <br></td>  </tr>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b><?php echo $day;  ?><?php echo $batch;  ?><?php echo $year;  ?>   <br/><br/>    </td> 

 <td class=" " align="left"><b> Month:  </b>      <?php echo $_date;   ?> - <?php echo $year;   ?> <br/><br/> </td> 


</tr>

         </tbody>
                      </table>
 <table class=" table jambo_table " >  
		        
                            <tbody>

 
<tr class="even pointer">  
<td class="" style="text-align:left; border: 1px solid #dddddd;"   > <b> Sr.# </b>  </td>
<td class="" style="text-align:left; border: 1px solid #dddddd;"  > <b> Details </b>  </td> 
                            <td class=" " style="border: 1px solid #dddddd;" > <b>  Amount  </b>  <br/></td>

                           
 </tr>
             <?php
                      
                       
           $count=1;
$totalfee=0;         

                        $query = "SELECT * FROM `fee` WHERE `feemonth` = '$_date' AND `feeyear` = '$year'  ";
                       $result = mysqli_query($link, $query);
                       if(mysqli_num_rows($result)>0){ 




     while($fee = mysqli_fetch_array($result)){


 

$totalfee=$totalfee + $fee['amount'];

 $count++; }

   






                          ?>            
                        <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 1 <br/> </td> 
 <td class=" " style="border: 1px solid #dddddd;" > Fee Collection </td>



<td class=" " style="border: 1px solid #dddddd;">     <?php echo $totalfee; ?></td></tr> <?php } else { ?>
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 1 <br/> </td> 
 <td class=" " style="border: 1px solid #dddddd;" > Fee Collection </td>



<td class=" " style="border: 1px solid #dddddd;">     <?php echo $totalfee; ?></td></tr> <?php } ?>
                     
<?php
                      
                       
       $count=1;
$totalincome=0;             

                        $query1 = "SELECT * FROM `income` WHERE `month` = '$_date' AND `year` = '$year'  ";
                       $result1 = mysqli_query($link, $query1);
                       if(mysqli_num_rows($result1)>0){ 




     while($income = mysqli_fetch_array($result1)){


 

$totalincome=$totalincome + $income['item_price'];

 $count++; }

   






                          ?>

   <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 2  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Income <br/> </td> 


    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $totalincome; ?></td> </tr><?php }  else { ?>
 <tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 2  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> Income <br/> </td> 


    <td class=" " style="border: 1px solid #dddddd;">     <?php echo $totalincome; ?></td> </tr><?php }   ?>
                        
<?php
                      
             $count=1;
$totalexpences=0;          
                    

                        $query2 = "SELECT * FROM `expences` WHERE `month` = '$_date' AND `year` = '$year' ";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2)>0){ 




     while($expences = mysqli_fetch_array($result2)){


 

$totalexpences=$totalexpences + $expences['item_price'];

 $count++; }}


    $count=1;
$totalinventory=0;          
                    

                        $query3 = "SELECT * FROM `inventory` WHERE `month` = '$_date' AND `year` = '$year' ";
                       $result3 = mysqli_query($link, $query3);
                       if(mysqli_num_rows($result3)>0){ 




     while($inventory = mysqli_fetch_array($result3)){


 

$totalinventory=$totalinventory + $inventory['price'];

 $count++; }}


 $count=1;
$totalsalary=0;          
                    

                        $query3 = "SELECT * FROM `salary_report` WHERE `month` = '$_date' AND `year` = '$year' AND `paid`='Yes' ";
                       $result3 = mysqli_query($link, $query3);
                       if(mysqli_num_rows($result3)>0){ 




     while($salary = mysqli_fetch_array($result3)){


 

$totalsalary=$totalsalary + $salary['salary'];

 $count++; }}


$totalexpences1=$totalsalary + $totalinventory + $totalexpences;


                          ?>

  <tr class="even pointer"> 
<td class=""  style="border: 1px solid #dddddd;"> 3  <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> Expences<br/> </td>
 <td class=" " style="border: 1px solid #dddddd;">     <?php echo $totalexpences1; ?></td> </tr>
 <tr class="even pointer"> 

                            
                        
<?php     
$total = $totalfee + $totalincome - $totalexpences1 ;
     ?>



<tr class="even pointer"> 
<td class="" style="border: 1px solid #dddddd;" > 4  <br/> </td>
<td class=" " style="border: 1px solid #dddddd;"> <b>Balance <br/> </td> 
<td class=" " style="border: 1px solid #dddddd;"> <b>   <?php echo $total; ?></td>
                        </tr>


                         
                        </tbody>
                      </table>
<table class= "" width='100%'>
		        
                            <tbody>
  


<tr class=" ">   
 <td class=" " align=""> <br><br> <br> Cashier Sign:_____________  </td> 
<td class=" " align="right"> <br><br> <br>Date:____________  </td> </tr>

 </tbody>
                      </table>

  </div>
       <?php
                      } 
                     
                    ?>
                    
<!--P style="page-break-after: always"-->



            


</div></div></div>
           
        </div>
        <!-- /page content -->

      <?php include 'php/footer.php.inc'; ?>
  </body>
</html>



