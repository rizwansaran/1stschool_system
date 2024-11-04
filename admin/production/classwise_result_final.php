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
                    <form action="classwise_result_final.php" method="post">
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
   
                    
                        <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                     <?php }?>  
                      </select>
 </div>
                   <div class="col-md-1"> </div>
                
                        <input id="class" type="hidden" class="form-control" name="year" value="<?php echo $batch; ?>" style="width:100%;" >

 
                       
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
 $year = $_POST['year'];
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
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
 $year = $_POST['year'];
 $query23 = "SELECT DISTINCT TRIM(`subject`) AS `subject`
 FROM `result` 
 WHERE `class` = '$class' AND `year` = '$year' 
 ORDER BY `subject` ASC";
 $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;
            while($sub = mysqli_fetch_array($result23)){ ?>
<tbody>
  <tr class="even pointer"  style="border: 2px solid black;">
    <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $sub['subject']; ?></td>

<?php 
$subject=$sub['subject'];
$id = $row['id'];
$class = $row['class'];
$batch = $_POST['year'];
$query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `year`= '$batch' ";
$result14 = mysqli_query($link, $query9);
            
$totalmarks = 0;  $marks = 0;
                         
if(mysqli_num_rows($result14) > 0){
$res = mysqli_fetch_array($result14)
 ?>
                     
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks_term1=$res['marks'] ; ?></td> 
                             
   <?php
       $totalmarks = $totalmarks + $res['total'];        
   
  $marks = $marks + $res['marks'];        
}
else {
    ?>
    
                                
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks ; ?></td> 
 
 <?php    
}



$id = $row['id'];
$class = $row['class'];
 $batch = $_POST['year'];
$query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `year`= '$batch' ";
$result14 = mysqli_query($link, $query9);
$totalmarks2 = 0;  $marks2 = 0;

if(mysqli_num_rows($result14) > 0){

$res2 = mysqli_fetch_array($result14) ?>

<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks_term2=$res2['marks'] ; ?></td> 
                         
 
<?php
   
  $totalmarks2 = $totalmarks2 + $res2['total'];        
  $marks2 = $marks2 + $res2['marks'];        
 
}
else {
    ?>
                           
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks2 ; ?></td> 
 
 <?php    
}

$id = $row['id'];
$class = $row['class'];
 $batch = $_POST['year'];
 
  $query222= "SELECT * FROM `result` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `year`= '$batch' ";
  $result222 = mysqli_query($link, $query222);
            
  $totalmarks3 = 0;  $marks3 = 0;
      
  if(mysqli_num_rows($result222) > 0){

  $res3 = mysqli_fetch_array($result222) ?>

<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks_term3=$res3['marks'] ; ?></td> 
<?php 
  $totalmarks3 = $totalmarks3 + $res3['total'];                 
  $marks3 = $marks3 + $res3['marks'];

}
else {
    ?>
                                   
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks3 ; ?></td> 
 
 <?php    
}
?>

<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $totalmarks +  $totalmarks2 + $totalmarks3 ; ?></td> 
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks + $marks2 + $marks3 ; ?></td> 
                          
            
<?php
   
if(($totalmarks +  $totalmarks2 + $totalmarks3) > 0){               
            
$result2=(($marks + $marks2 + $marks3)/($totalmarks +  $totalmarks2 + $totalmarks3))*100;
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

  $totalmark = $totalmark + ($totalmarks +  $totalmarks2 + $totalmarks3);                 
  $mark = $mark + ($marks + $marks2 + $marks3);        
   
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
if(mysqli_num_rows($result10) > 0){
  $res10 = mysqli_fetch_array($result10);
  $name=$res10['fullname'];
}
else{
    $name= "";
}
            

?>  

    <table class= "col-md-12"  width='100%'> <tbody>
      <tr class="even pointer">
        <td class=" " style="text-align:center; border: 1px solid black;"><h2>Total Marks: <?php echo $totalmark; ?></h2></td>
        <td class=" " style="text-align:center; border: 1px solid black;"><h2 >Obt. Marks: <?php echo $mark; ?></h2> </td>

                            
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

 <td class=" " style="text-align:center;color:red;border: 1px solid black;"><h2  style="text-align:center; border: 0px solid black;">Result: <?php echo $status ;?></h2>  </td>
                     
<?php 

}
?>
</tr>


<tr class=" " style="text-align:left;color:black;border: 1px solid black;"> 
<td class=" " colspan="4" ><h2 >  Teacher Remarks:</h2> </td>

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



$stdid=$row['id'];
$class=$row['class'];
$status1=$status;

if($class=="Pre-I")
{
$new_class="Pre-II";
}
else if($class=="Pre-II")
{
$new_class="Pre-III";

}

else if($class=="Pre-III")
{
$new_class="Level 1";

}



else if($class=="Level 1")
{
$new_class="Level 2";

}
else if($class=="Level 2")
{
$new_class="Level 3";

}
else if($class=="Level 3")
{
$new_class="Level 4";

}
else if($class=="Level 4")
{
$new_class="Level 5";

}
else if($class=="Level 5")
{
$new_class="Level 6";

}
else if($class=="Level 6")
{
$new_class="Level 7";

}
else if($class=="Level 7")
{
$new_class="Level 8";

}
else if($class=="Level 8")
{
$new_class="Level 9";

}
else if($class=="Level 9")
{
$new_class="Level 10";

}

else if($class=="FSc 1")
{
$new_class="FSc 2";

}
else if($class=="ICS 1")
{
$new_class="ICS 2";

}
else if($class=="ICOM 1")
{
$new_class="ICOM 2";

}
else if($class=="FA IT 1")
{
$new_class="FA IT 2";

}
else if($class=="FA 1")
{
$new_class="FA 2";
}
else{
$new_class=$class;

}
$year= $_POST['year'];
$query66 = "SELECT * FROM `promote` WHERE `studentid`='$stdid'";
                        $result66 = mysqli_query($link, $query66);
if(mysqli_num_rows($result66) < 1){ 
$query67 ="INSERT INTO `promote`(`studentid`, `p_class`, `n_class`, `year`, `status`) 
                    VALUES ('$stdid','$class','$new_class','$year', '$status1')  ";
    $result67 = mysqli_query($link, $query67); 

 if($result67==TRUE) 
{
echo " ";
}
else 
{
echo mysqli_error($link);  }
}

else{

$query3 = "UPDATE `promote` SET `p_class`='$class', `n_class`='$new_class', `year`='$year',`status`='$status1' WHERE `studentid`='$stdid'";
   
                        $result3 = mysqli_query($link, $query3);
 if($result3==TRUE)
{
echo " "; 
}
else
{
echo mysqli_error($link);  }
}









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





