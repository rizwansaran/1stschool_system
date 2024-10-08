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
          
            <div class="clearfix"></div>
                 
           
             <div class="row">
             

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

                        
                        <div class="col-md-3" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
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

                       

                         
 <div class="row" > 
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
 <div><button onClick="window.print()">Print Challan
</button></div>
<tr class=" ">  


<td class=" " align="center">  Admin Copy <br/>   </td>


 </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><h2 style="text-transform: uppercase; font-family: "Times New Roman", Times, serif;"> <img src=" <?php echo $image;?>" class="" width='60' height='50'><b> <?php echo $name;?> </h2><br/> </td> 
 </tr>


		        
                            </tbody>  </table>

 <table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/>    </td> 
<td class=" " align="left">    </td>
 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/>     </td> 
<td class=" " align="left">    </td>

</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?>  <br/></td> 

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?>   <br/></td> 
<td class=" " align="left">    </td><td class=" " align="left">    </td> 
   </tr>


<tr class=" ">   

<td class=" "> <b> Admission #:   </b>  <?php echo $id; ?> <br/> </td>
<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/> </td> 
 
<td class=" ">               </td>
</tr>

                       
         </tbody>
                      </table>
  <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Group </th>

 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Date </th>
                           
                         <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Status </th>

                    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Balance </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
$totalpaid=0;

$total_amount=0;
                        $query = "SELECT * FROM `fee_assigned` WHERE `student_id`='$id' ";
                        $result = mysqli_query($link, $query);
$count=1; 
                        while($row = mysqli_fetch_array($result)){


              $fee_group= $row['fee_group'];

 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$fee_group' ";
                        $result1 = mysqli_query($link, $query1);
$amount=0;
                       while($row1 = mysqli_fetch_array($result1)){

$amount = $amount + $row1['amount'];

                        ?>


<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_group']; ?></td>

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_type']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['date']; ?></td>
<?php    ?>
<?php 
$paid=0;
$fee_type = $row1['fee_type'];

$query_concession = "SELECT * FROM `fee_concession` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_concession = mysqli_query($link, $query_concession);
if(mysqli_num_rows($result_concession) > 0){
                         while($row_concession = mysqli_fetch_array($result_concession)) {


$concession=$row_concession['amount'];
}}
else
{
$concession="0";

}

$query_extra = "SELECT * FROM `fee_extra` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_extra = mysqli_query($link, $query_extra);
if(mysqli_num_rows($result_extra) > 0){
                         while($row_extra = mysqli_fetch_array($result_extra)) {


$extra=$row_extra['amount'];
}}
else
{
$extra="0";

}


$total_amount=$total_amount + $row1['amount'] + $extra - $concession;



 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {


$paid=$paid+ $row2['amount'];
}
 ?>


			    <td class=" "style="text-align:center; border: 1px solid #dddddd;">
<?php  $balance=$row1['amount'] + $extra - $concession - $paid;
 
if($balance==0){ echo "Paid";
} 


else if($balance > 0){ echo "Partial";
} 



 ?> </td>




 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount'] + $extra - $concession - $paid; echo $balance; ?></td>
    
    <?php  } else {  ?>

 <td class=" " style="text-align:center; border: 1px solid #dddddd;">Unpaid   </td>
       <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount'] + $extra - $concession; echo $balance; ?></td>
   


          <?php }  ?>
        
                          


                      <?php 

$totalpaid=$totalpaid + $paid;
$count++; }  } ?>
</tr>


               </tbody>

                   
                      </table>





   

<table class= "" width='100%'>
		        
                            <tbody>

 <tr class=""> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Due Amount:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php $totalbalance=$total_amount - $totalpaid; echo $totalbalance;  ?></td>
    
     
 </tr>
    
<tr class=" ">   
 <td class=" " align=""><br><br>Cashier Sign:________________  </td> <td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>

<td class=" " align="right"><br><br>Date:_________________  </td> </tr>

 </tbody>
                      </table>

<br><br><br>
 
</div></div>
                             <?php                          $class= $student['class'];

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
 
 <div><button onClick="window.print()">Print Challan
</button></div>
<tr class=" "style="text-align:center; border: 0px solid #dddddd;">
<td class=" " style="text-align:center; border: 0px solid #dddddd;">  Student Copy <br/>   </td> </tr>

<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><h2 style="text-transform: uppercase; font-family: "Times New Roman", Times, serif;"> <img src=" <?php echo $image;?>" class="" width='60' height='50'><b> <?php echo $name;?> </h2><br/> </td> 
 </tr>


		        
                            </tbody>  </table>

 <table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">
  <td class=" " align="left"><b>Challan No:  </b> <?php echo $batch; ?><?php echo $year;  ?><?php echo $student['id'];  ?>  <br/>    </td> 
<td class=" " align="left">    </td>
 <td class=" " align="left"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/>     </td> 


</tr>
<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?>  <br/></td> 

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?>   <br/></td> 
<td class=" " align="left">    </td> 
   </tr>


<tr class=" ">   

<td class=" "> <b> Admission #:   </b>  <?php echo $id; ?> <br/> </td>
<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/> </td> 
 
<td class=" ">               </td>
</tr>

                       
         </tbody>
                      </table>
  <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Group </th>

 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Due Date </th>
                           
                         <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Status </th>

                    <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Balance </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
$totalpaid=0;

$total_amount=0;
                        $query = "SELECT * FROM `fee_assigned` WHERE `student_id`='$id' ";
                        $result = mysqli_query($link, $query);
 $count=1;
                        while($row = mysqli_fetch_array($result)){


              $fee_group= $row['fee_group'];

 $query1 = "SELECT * FROM `fee_group` WHERE `fee_group`='$fee_group' ";
                        $result1 = mysqli_query($link, $query1);
$amount=0;
                       while($row1 = mysqli_fetch_array($result1)){

$amount = $amount + $row1['amount'];

                        ?>


<tr class="even pointer"> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_group']; ?></td>

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['fee_type']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row1['date']; ?></td>
<?php    ?>
<?php 
$paid=0;
$fee_type = $row1['fee_type'];
$query_concession = "SELECT * FROM `fee_concession` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_concession = mysqli_query($link, $query_concession);
if(mysqli_num_rows($result_concession) > 0){
                         while($row_concession = mysqli_fetch_array($result_concession)) {


$concession=$row_concession['amount'];
}}
else
{
$concession="0";

}

$query_extra = "SELECT * FROM `fee_extra` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result_extra = mysqli_query($link, $query_extra);
if(mysqli_num_rows($result_extra) > 0){
                         while($row_extra = mysqli_fetch_array($result_extra)) {


$extra=$row_extra['amount'];
}}
else
{
$extra="0";

}


$total_amount=$total_amount + $row1['amount'] + $extra - $concession;



 $query2 = "SELECT * FROM `fee_paid` WHERE `student_id`='$id' AND `fee_group`='$fee_group' AND `fee_type`='$fee_type' ";
                        $result2 = mysqli_query($link, $query2);
if(mysqli_num_rows($result2) > 0){
                         while($row2 = mysqli_fetch_array($result2)) {


$paid=$paid+ $row2['amount'];
}
 ?>


			    <td class=" "style="text-align:center; border: 1px solid #dddddd;">
<?php  $balance=$row1['amount'] + $extra - $concession - $paid;
 
if($balance==0){ echo "Paid";
} 


else if($balance > 0){ echo "Partial";
} 



 ?> </td>




 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount'] + $extra - $concession - $paid; echo $balance; ?></td>
    
    <?php  } else {  ?>

 <td class=" " style="text-align:center; border: 1px solid #dddddd;">Unpaid   </td>
       <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php $balance=$row1['amount'] + $extra - $concession; echo $balance; ?></td>
   


          <?php }  ?>
        
                          


                      <?php 

$totalpaid=$totalpaid + $paid;
$count++; }  } ?>
</tr>


               </tbody>

                   
                      </table>





   

<table class= "" width='100%'>
		        
                            <tbody>

 <tr class=""> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>
<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><b><?php echo "Total Due Amount:";   ?></b></td>

<td class=" " style="text-align:center; color:red; border: 3px solid #dddddd;"><?php $totalbalance=$total_amount - $totalpaid; echo $totalbalance;  ?></td>
    
     
 </tr>
    
<tr class=" ">   
 <td class=" " align=""><br><br>Cashier Sign:________________  </td> 
<td class=" " style="text-align:center; border: 0px solid #dddddd;"><?php  ?></td>

<td class=" " align="right"><br><br>Date:_________________  </td> </tr>

 </tbody>
                      </table>


 

</div> </div>
 </div> 
<p style="page-break-after: always">
 <?php
                        }

 
                        ?>

              <?php
                       }   ?>
                   
<?php
                      
                     
                    ?>

                 <?php
                      
                     
                    ?>

 <?php
                        

 
                        ?>






                       
                    
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



          </div></div></div></div>  
       
        <!-- /page content -->

      <?php
 include 'php/footer.php.inc'; 
?>
  </body>
</html>



