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
         
        <!-- page content -->
        <div class="right_col" role="main">
         
            
            <div class="row">
              <div class="col-md-12 col-xs-12">
                
             

<?php 
 if (!isset($_POST['class'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="">Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
                        
                        <div class="col-md-3" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
<?php }?>
                    <!-- end form for validations -->

                        
                    <?php

                    if (isset($_POST['class'])) {
                        
                        $class = $_POST['class'];
                        $query5 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        $result5 = mysqli_query($link, $query5);

 $challan =1; 
                        while($student = mysqli_fetch_array($result5)){
                          $class= $student['class'];

 $id= $student['id'];
$batch = date("n");
$batch1 = date("n") - 1;
$batch2 = date("n") - 2;

$year = date("Y"); 
$year1 = date("Y") - 1; 

if ($batch1==0)
{
$batch1 = $batch1+12;

}
else {

$batch1 = $batch1;

}


$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 20 ; 

                                                   ?>

                       

                         
 
<div class="col-md-6" >                    
                    
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>

<?php $day1 = date("d");
if($day1<20) {
$day = date("d") + 6; }
else {

$day = date("d");
}

 ?>  
<tr class=" ">  
<td class=" " align="center">  Bank Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/> </td> 
 </tr>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/><br/>     </td> 

 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/> <br/>     </td> 

<td class=" ">          </td>
</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?> <br/>  <br/></td> 

<td class=" ">               </td>
   </tr>
<tr class=" "> 
<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?> <br/>  <br/></td> 
</tr>

<tr class=" ">   

<td class=" "> <b> Roll No.:   </b>  <?php echo $id; ?><br/>  <br/> </td> 
<td class=" ">               </td>
</tr>
<tr class=" ">  

<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/><br/> </td> 
<td class=" ">               </td>
 </tr>
                       
         </tbody>
                      </table>
 
   <table id="" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Date </th>
                           
                         <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Status </th>

                              <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Amount</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
$totalpaid=0;

$total_amount=0;
                        $query = "SELECT * FROM `fee_assigned` WHERE `student_id`='$id' ";
                        $result = mysqli_query($link, $query);

                        while($row = mysqli_fetch_array($result)){


              $fee_group= $row['fee_group'];

 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$fee_group' ";
                        $result1 = mysqli_query($link, $query1);
$amount=0;
        $count=1;                while($row1 = mysqli_fetch_array($result1)){

$amount = $amount + $row1['amount'];

                        ?>


<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                         <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_type']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['date']; ?></td>
<?php    $total_amount=$total_amount + $row1['amount']; ?>
<?php 
$paid=0;
$fee_type = $row1['fee_type'];
 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {


$paid=$paid+ $row2['amount'];
}
 ?>


			    <td class=" "style="text-align:center; border: 1px solid #dddddd;">
<?php $amount=$row1['amount']; $balance=$row1['amount'] - $paid;
 
if($balance==0){ echo "Paid";
} 


else if($balance > 0){ echo "Partial";
} 



 ?> </td>




        <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount'] - $paid; echo $balance; ?></td>
    
    <?php  } else {  ?>

 <td class=" " style="text-align:center; border: 1px solid #dddddd;">Unpaid   </td>
       <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount']; echo $balance; ?></td>
   


          <?php }  ?>
        
                          </tr>
 

                      <?php 

$totalpaid=$totalpaid + $paid;
$count++; }  }?>

<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Due Amount:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php $totalbalance=$total_amount - $totalpaid; echo $totalbalance;  ?></td>
    
     
 </tr>
    
               </tbody>

                   
                      </table>







                        <?php
                       
                        ?>
                        <br><br><br>
                       


 <?php
                       }   ?>
<table class= "" width='100%'>
		        
                            <tbody>
 <br/><br/><br/>
 
<tr class=" ">   
 <td class=" " align="">Cashier Sign:_____________  </td> 
<td class=" " align="right">Date:____________  </td> </tr>

 </tbody>
                      </table>


  </div>
<P style="page-break-after: always">
 <?php
                        }

 
                        ?>


                       
                       </div>
<?php
                      
                     
                    ?>

                 <?php
                      
                     
                    ?>

 <?php
                        

 
                        ?>


                       
                       </div>
<?php
                      
                     
                    ?>

                 <?php
                       
                     
                    ?>



          
        </div> </div> </div> </div>
        <!-- /page content -->

      <?php
 //include 'php/footer.php.inc'; 
?>
  </body>
</html>



