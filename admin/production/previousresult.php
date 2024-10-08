<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student result!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
 <?php if(!isset($_POST['class'])){
                      
        include 'php/topnav.php.inc';} ?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">

                  <div class="x_content">
        <?php if(!isset($_POST['class'])){
                      ?>
                    <form action=" " method="post">
             <div class="row">     <div class="col-md-3">
                        <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `result` ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>
 </div>
                   <div class="col-md-1"> </div>
                 
                  <div class="col-md-2">
                    <div class="row">
<select id="class" class="form-control" name="batch" style="width:100%;" >

 <option value="" selected disabled >Select Session </option>
<?php

 $query1 = "SELECT DISTINCT year FROM `result` ORDER BY year DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$batch= $row1['year'];
?>
   
                    
                        <option value="<?php echo $batch?> "><?php echo $batch?></option>
                     <?php }?>  
                      </select><br/><br/>

                        </div>
                  </div>
                       
 <div class="col-md-1"> </div>
                  <div class="col-md-3">
                    
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php }

if(isset($_POST['class'])){
                      ?>
                      
                    <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
 $batch =$_POST['batch'];
                        $query12 = "SELECT DISTINCT studentid FROM `result` WHERE `class`='$class' AND `year`='$batch'";
                        $result12 = mysqli_query($link, $query12);
                        while($row12 = mysqli_fetch_array($result12)){
                          $id = $row12['studentid'];
 $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $result1 = mysqli_query($link, $query);
                      $row = mysqli_fetch_array($result1);
                       
                         $batch =$_POST['batch'];
                                                   ?>

<table class= "col-md-12"  width='100%'> 

<?php 

 $query123 = "SELECT * FROM `insti_name` ";
                       $result123 = mysqli_query($link, $query123);
                      
                        $row123 = mysqli_fetch_array($result123);
$name= $row123['full_name'];
$image= $row123['logo'];
?>

		
        



<tbody>

<div class="" align="center"><h1> <img src=" <?php echo $image ;?>" class="" width='50' height='50'>    <?php echo $name;?></h1></div>

 <tr class=" " style=" border: 1px solid black;">  
<td class="col-md-4"><h3 style="text-align:center; color:black;"><b><u>STUDENT REPORT CARD</u></b></h3></td> 
 
<td class="col-md-1"><h3> <small><b></b> </small></h3></td> 
<td class="col-md-1"><h3> <small><b></b> </small></h3></td>
 <td class=""    >  <img src="<?php echo  $row['picture'];?> " class="" align="right" width='90' height='100' style="border: 2px solid black;"> </td> 

 </tr>

 <tr class=" " style=" border: 1px solid black;">  
 <td class="col-md-2" ><h3  style="text-align:left; border: 0px solid black;"> <small><b>Name:</b> <?php echo  $row['fullname']; ?>  </small></h3></td>  
 <td class="col-md-1"><h3> <small><b></b> </small></h3></td>  
<td class="col-md-1"><h3> <small><b></b> </small></h3></td>  
<td class="col-md-1"><h3> <small><b></b> </small></h3></td> 


 </tr>

<tr class=" " style=" border: 1px solid black;"> 
 
  
<td class="col-md-2"><h3  style="text-align:left; border: 0px solid black;"> <small><b> Father Name:</b> <?php echo  $row['fname']; ?></small></h3></td>

<td class="col-md-1"><h3> <small><b></b> </small></h3></td>  
<td class="col-md-2"><h3> <small><b></b> </small></h3></td>
<td class="col-md-2"><h3> <small><b></b> </small></h3></td>
</tr>

 <?php $g=  $row['gender'];
if($g == 'M')
{
$sec= 'Male';
}
elseif($g == 'F') {
$sec= 'Female';
}


?>

<tr class=" " style="text-align:center; border: 1px solid black;" >  
<td class=" col-md-4"><h3  style="text-align:left; border: 0px solid black;"> <small><b>Roll No.:</b> <?php echo $id; ?></small></h3> </td> 
<td class=" "><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3> </td> 
 <td class=" col-md-3"><h3  style="text-align:left; border: 0px solid black;"> <small> </small></h3></td>
<td class=" "><h3  style="text-align:center; border: 0px solid black;"> <small></small></h3></td>
</tr>

<tr class=" " style="text-align:center; border: 1px solid black;" >  
<td class=" col-md-3"><h3  style="text-align:left; border: 0px solid black;"> <small><b> Class:</b> <?php echo  $_POST['class']; ?> -  <?php echo  $batch;?></small></h3> </td>   

   <td class=""><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3></td> 
<td class=""><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3></td> 

<td class=" "><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3> </td>   
</tr>
 





                      
                        </tbody>
                      </table>


                        <table class="table table-striped jambo_table bulk_action">
                      

          
                          
                 <thead>
                          <tr class="headings"  style="border: 1px solid black;">
                            <th class="column-title" style="text-align:center; border: 1px solid black;">Course </th>
 <th class="column-title"  style="text-align:center; border: 1px solid black;">1st Term </th>
 <th class="column-title"  style="text-align:center; border: 1px solid black;">2nd Term </th>
 <th class="column-title"  style="text-align:center; border: 1px solid black;">3rd Term </th>
                           
                            <th class="column-title"  style="text-align:center; border: 1px solid black;">Total marks </th>
                            <th class="column-title"  style="text-align:center; border: 1px solid black;">Obtained marks </th>
                             <th class="column-title"  style="text-align:center; border: 1px solid black;">Remarks </th>
                            
                          </tr>
                        </thead>
                            
                        
                          
               

                    
                                         <?php  

$class = $_POST['class'];
$batch = $_POST['batch'];

$query23 = "SELECT DISTINCT `subject` FROM `result` WHERE `class`= '$class' AND `year`='$batch'";
                          $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;
            while($sub = mysqli_fetch_array($result23)){ ?>
<tbody>
<tr class="even pointer"  style="border: 2px solid black;">
 <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $sub['subject']; ?></td>



<?php 
$subject=$sub['subject'];
   $id = $row12['studentid'];
$class = $_POST['class'];

                       	$batch = $_POST['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            
$totalmarks = 0;  $marks = 0;
                         

$res = mysqli_fetch_array($result14)
 ?>



                           
                       
                            
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['marks'] ; ?></td> 
                             

   <?php
       $totalmarks = $totalmarks + $res['total'];        
   
  $marks = $marks + $res['marks'];        
   



$id = $row12['studentid'];
$class = $_POST['class'];

                       	$batch = $_POST['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            

                          $totalmarks2 = 0;  $marks2 = 0;
                         $res2 = mysqli_fetch_array($result14) ?>


<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res2['marks'] ; ?></td> 
                         
 
<?php
   
       $totalmarks2 = $totalmarks2 + $res2['total'];        
  $marks2 = $marks2 + $res2['marks'];        
   
           
$id = $row12['studentid'];
$class = $_POST['class'];

                      
				$batch = $_POST['batch'];
                          $query222= "SELECT * FROM `result` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `year`= '$batch' ";
                          $result222 = mysqli_query($link, $query222);
            
$totalmarks3 = 0;  $marks3 = 0;
                         $res3 = mysqli_fetch_array($result222) ?>
                         
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res3['marks'] ; ?></td> 
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['total'] +  $res2['total'] + $res3['total'] ; ?></td> 


<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['marks'] + $res2['marks'] + $res3['marks'] ; ?></td> 
                          
            
<?php
   
       $totalmarks3 = $totalmarks3 + $res3['total'];        
   

                             
                     
             
       $marks3 = $marks3 + $res3['marks'];        
   
            if(($res['total'] +  $res2['total'] + $res3['total']) > 0){               
            
$result2=(($res['marks'] + $res2['marks'] + $res3['marks'])/($res['total'] +  $res2['total'] + $res3['total']))*100;
if($result2>=33)
{
$status1= 'Pass';}
else{

$status1= 'Fail';}
?>
<?php if($status1== 'Fail'){?>
                            <td class=" "   style="text-align:center;color:red; border: 1px solid black;"><?php echo $status1; ?> </td>
                            <?php }
                            else{?> 
                            <td class=" " style="text-align:center;color:green; border: 1px solid black;"><?php echo $status1; ?> </td>
                            <?php } }
else {
$status1= 'Fail';
 ?>
  <td class=" " style="text-align:center;color:red; border: 1px solid black;"><?php echo $status1; ?> </td>
                          
<?php 
}
  ?>

 </tr>
                          
                           

                            <?php 

                          
          

       $totalmark = $totalmark + ($res['total'] +  $res2['total'] + $res3['total']);        
   

                             
                   
             
       $mark = $mark + ($res['marks'] + $res2['marks'] + $res3['marks']);        
   
 }
                        
               ?>


                           
                        
 
                        



                       </tbody>
  
                      </table>
<?php 
$class=$_POST['class'];
 $g1='M+F';
 $query10 = "SELECT * FROM `staff` WHERE (class = '$class' AND section ='$g')
OR (class = '$class' AND section ='$g1') ";
                          $result10 = mysqli_query($link, $query10);
$res10 = mysqli_fetch_array($result10);
$name=$res10['fullname'];
            

?>  

    <table class= "col-md-12"  width='100%'> <tbody>




<tr class="even pointer">
                            <td class=" " style="text-align:center; border: 1px solid black;"><h2  >Total Marks: <?php echo $totalmark; ?></h2></td>
                            <td class=" " style="text-align:center; border: 1px solid black;><h2  ">Obt. Marks: <?php echo $mark; ?></h2> </td>

                            
<?php 
   if($totalmark > 0){  
$result=($mark/$totalmark)*100; 
if($result>=33)
{
$status= 'Pass';}
else{

$status= 'Fail';}
?>
 <td class=" " style="text-align:center; border: 1px solid black;"><h2  >Per.(%): <?php echo $result; ?> % </h2></td>
<td class=" "><h2>   </h2> </td>
                           
<?php if($status == 'Fail'){?>
                      <td class=" " style="text-align:center;color:red;border: 1px solid black;"><h2  >Result: <?php echo $status ;?></h2>  </td>
                            <?php }
                            else{?> 
                        <td class=" " style="text-align:center;color:green;border: 1px solid black;"><h2 >Result: <?php echo $status ;?></h2> </td>
                            <?php }
}
else {
$status= 'Fail';
 ?>
<td class=" "><h2>   </h2> </td>
 <td class=" " style="text-align:center;color:red;border: 1px solid black;"><h2  style="text-align:center; border: 0px solid black;">Result: <?php echo $status ;?></h2>  </td>
<td class=" "><h2>   </h2> </td>
                     
<?php 

}


?>
                     
                          </tr>


<tr class=" " style="text-align:left;color:black;border: 1px solid black;"> 
<td class=" "  ><h2 >  Teacher Remarks:</h2> </td>
<td class=" "><h2>  <br><br> </h2> </td>
<td class=" "><h2>  </h2> </td>
<td class=" "><h2>   </h2> </td>
<td class=" "><h2>  </h2> </td>
<td class=" "><h2> </h2> </td>

</tr>

  </tbody></table> 
<table class= "col-md-12"  width='100%'> <tbody>
<tr class=" " > 
<td class=" "><h2>  <br><br><br><br><br><br> </h2> </td>



</tr>
<tr class=" " style=" border: 0px solid black;" >  

  <td class="col-md-2" ><h2>Class Incharge: <?php echo $name; ?></h2></td>
 
   <td class="col-md-2"  "><h2>Principal:</h2></td>   </tr>                  

 </tbody> </table> 


<P style="page-break-before: always">


     <?php








}

 }?>   
        
                        </div>
                       
</div>
                    </div>
                    <?php
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





