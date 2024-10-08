<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise result!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
<?php if(!isset($_POST['class'])){
                    include 'php/topnav.php.inc';

} ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
           

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">

                  <div class="x_content">
 <?php if(!isset($_POST['class'])){
                      ?>
                    <form action="classwiseresult.php" method="post">
             <div class="row">     <div class="col-md-3">
                       <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php
$query12 = "SELECT DISTINCT batch FROM `student` ORDER BY batch DESC ";
                        $result12 = mysqli_query($link, $query12);
                        
$row12 = mysqli_fetch_array($result12);
                        

$batch= $row12['batch'];


 $query1 = "SELECT DISTINCT class FROM `result` WHERE `year`='$batch' ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
                   <div class="col-md-1"> </div>
                
                        <input id="class" type="hidden" class="form-control" name="year" value="<?php echo $batch ?>" style="width:100%;" >

 
           
                 
                        <div class="col-md-3">  <select id="term" class="form-control" name="term" >
 <option value="" selected disabled>Select Term</option>   
<?php
$query123 = "SELECT DISTINCT batch FROM `student` ORDER BY batch DESC ";
                        $result123 = mysqli_query($link, $query123);
                        
$row123 = mysqli_fetch_array($result123);
                        

$batch= $row123['batch'];


 $query13 = "SELECT DISTINCT term FROM `result` WHERE `year`='$batch' ORDER BY term ASC ";
                        $result13 = mysqli_query($link, $query13);
                        
while($row13 = mysqli_fetch_array($result13))
                        {

$term= $row13['term'];
if($term==1){

$term1="1st Term";
}
else if($term==2){

$term1="2nd Term";
}
else{
$term1="3rd Term";
}
?>
                        
<option value="<?php echo $term; ?>"><?php echo $term1; ?></option>
<?php }?> 
                         </select> </div>
 <div class="col-md-1"> </div>
                  <div class="col-md-3">
                    
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php }

if(isset($_POST['class'])){
                      ?>
                      <br>
                   <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
     $year = $_POST['year'];
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND `batch`='$year' AND `status`='Active'";
                        $result1 = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result1)){
                          $id = $row['id'];
                         $batch = date("Y");
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
<td class=" col-md-3"><h3  style="text-align:left; border: 0px solid black;"> <small><b> Class:</b> <?php echo  $row['class']; ?> -  <?php echo  $row['batch'];?></small></h3> </td>   

   <td class=""><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3></td> 
<td class=""><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3></td> 

<td class=" "><h3  style="text-align:center; border: 0px solid black;"> <small> </small></h3> </td>   
</tr>
 





                      
                        </tbody>
                      </table>


                        <table class="table table-striped jambo_table bulk_action">
                                                               <thead>
                          <tr class="headings" style="border: 1px solid black;"> 

                            <th class="column-title"  style="text-align:center; border: 1px solid black;">Course </th>
                            <th class="column-title"  style="text-align:center; border: 1px solid black;">Total marks </th>
                            <th class="column-title"  style="text-align:center; border: 1px solid black;">Obtained marks </th>
                            <th class="column-title" style="text-align:center; border: 1px solid black;">Term </th>
 <th class="column-title"  style="text-align:center; border: 1px solid black;">Status </th>
                          </tr>
                        </thead>
                        <?php

$student= $row['id'];
$class = $row['class'];
$term = $_POST['term'];
$batch = date("Y");

 $query1 = "SELECT * FROM `result` WHERE `studentid`= '$student' AND `class`= '$class' AND `term`= '$term' AND `year`= '$year' ";
                                        $result2 = mysqli_query($link, $query1);
             

                          if(mysqli_num_rows($result2) < 1){  ?>
<tr class=" " style="border: 1px solid black;"> 

                           <td class=" "><h2 style="color:red">Result Not Uploaded Yet!...</h2></td>

                            <td class=" "> </td>
 <td class=" "> </td>
 <td class=" "> </td>
 <td class=" "> </td>

<?php } else {?>
                          </tr>

<?php

$totalmarks = 0;  $marks = 0;
                          while($res = mysqli_fetch_array($result2)){
                            ?>
                            
                        <tbody>
                        <tr class="even pointer"  style="border: 2px solid black;">

                            <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $res['subject']; ?></td>
                            <td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['total']; ?> </td>
                            <td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['marks']; ?></td>
                            <td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $res['term']; ?></td>
<?php 
$result3=($res['marks']/$res['total'])*100;
if($result3>=33)
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
       <?php }?>

                            </td>
                          </tr>
<?php


                        
       $totalmarks = $totalmarks + $res['total'];        
   

                             
               ?>
 
 <?php 
                          
             
       $marks = $marks + $res['marks'];        

 }?>
                          
 
                        </tbody>
  
                      </table>
   <table class= "col-md-12"  width='100%'> <tbody>


 <tr class="even pointer">
                           <td class=" " style="text-align:center; border: 1px solid black;"><h2  >Total Marks: <?php echo $totalmarks; ?></h2></td>
                            <td class=" " style="text-align:center; border: 1px solid black;><h2  ">Obt. Marks: <?php echo $marks; ?></h2> </td>


<?php 
$result=($marks/$totalmarks)*100;
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
                              <?php }?>

                         <?php }?>

 </tr>
<tr class=" " style="border: 1px solid black;"> 
<td class=" "  ><h2 >  Teacher Remarks:</h2> </td>
<td class=" "><h2>  <br><br> </h2> </td>
<td class=" "><h2>  </h2> </td>
<td class=" "><h2>   </h2> </td>
<td class=" "><h2>  </h2> </td>


</tr>
                            
                          </tbody></table>

 <table class= "col-md-12"  width='100%'> <tbody>
<?php 
$class=$_POST['class'];
 $g1='M+F';
 $query10 = "SELECT * FROM `staff` WHERE (class = '$class' AND section ='$g')
OR (class = '$class' AND section ='$g1') ";
                          $result10 = mysqli_query($link, $query10);
$res10 = mysqli_fetch_array($result10);
$name=$res10['fullname'];
            

?> 
<tr class=" " > 
<td class=" "><h2>  <br><br><br><br><br><br> </h2> </td>

</tr>
<tr class=" " style=" border: 0px solid black;" >  

  <td class="col-md-2" ><h2>Class Incharge: <?php echo $name; ?></h2></td>
 
   <td class="col-md-2"  "><h2>Principal:</h2></td>   </tr>                  

 </tbody> </table>
 
<P style="page-break-before: always">


<?php }?>

                    </div>
                    <?php
                    }?>
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
