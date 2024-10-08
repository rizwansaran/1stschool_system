<?php
require 'php/config.php';

if(!isLoggedIn()){
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
         
             <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  
<br><br><br>
                
            <div class="row">
              <div class="col-md-12 col-xs-12">
                

<?php 
 if (!isset($_POST['date'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>
<div class="col-md-3" >
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     <label for="id">Select Date * :</label>
                     
                       <input placeholder="Select Date" class="form-control" type="date" required="" name ="date" value ="<?php echo date("d-m-Y", strtotime("+5 hours"));?>" style="width:50%;">
                 </div>
 <br>
            <div class="col-md-2" > </div>           
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

                    if (isset($_POST['date'])) {
                         $_date = $_POST['date'];
                       
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
<td class=" " align="center"> <h3>Daily Summery Report</h3> <br></td>  </tr>


                            </tbody>
</table>


<table class= "" width='100%'>
		        
                            <tbody>

<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b><?php echo $day;  ?><?php echo $batch;  ?><?php echo $year;  ?>   <br/><br/>    </td> 

 <td class=" " align="right"><b> Date:  </b>      <?php echo date("d-m-Y", strtotime($_date)); ;  ?>  <br/><br/> </td> 


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

                         $query = "SELECT * FROM `fee` WHERE `date` = '$_date' ";
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

                        $query1 = "SELECT * FROM `income` WHERE `date` = '$_date' ";
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
                    

                        $query2 = "SELECT * FROM `expences` WHERE `date` = '$_date' ";
                       $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2)>0){ 




     while($expences = mysqli_fetch_array($result2)){


 

$totalexpences=$totalexpences + $expences['item_price'];

 $count++; }}


    $count=1;
$totalinventory=0;          
                    

                        $query3 = "SELECT * FROM `inventory` WHERE `date` = '$_date' ";
                       $result3 = mysqli_query($link, $query3);
                       if(mysqli_num_rows($result3)>0){ 




     while($inventory = mysqli_fetch_array($result3)){


 

$totalinventory=$totalinventory + $inventory['price'];

 $count++; }}


 $count=1;
$totalsalary=0;          
                    

                        $query3 = "SELECT * FROM `salary_report` WHERE `date` = '$_date' AND `paid`='Yes' ";
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
<td class=" " style="border: 1px solid #dddddd;"> <b>Balance  <br/> </td> 
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
<P style="page-break-after: always">



<?php
                      
                     
                    ?>

                 <?php
                      } 
                     
                    ?>


</div></div></div>
          
        </div>
        <!-- /page content -->

      <?php include 'php/footer.php.inc'; ?>
  </body>
</html>



