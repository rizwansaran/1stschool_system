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
        <?php if(!isset($_POST['id'])){
                      
        include 'php/topnav.php.inc';} ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">

                  <div class="x_content">
         <?php 
 if (!isset($_POST['id'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>
                  <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                      <label for="id">Student Name * :</label>
                      <div class="row"?>
                        <div class="col-md-3">
                     <select id="student_id" class="form-control" name="id" style="width:100%;" >

 <option value="" selected disabled>Select Student </option>
<?php

 $querya = "SELECT DISTINCT studentid FROM `result`  ";
                        $resulta = mysqli_query($link, $querya);
                        
while($rowa = mysqli_fetch_array($resulta))
                        {

$studentid= $rowa['studentid'];
 $query11 = "SELECT * FROM `student` WHERE `id`= '$studentid' AND `status`='Active' ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];
$fname= $row11['fname'];


?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname?> S/D/O <?php echo $fname?></option>
                     <?php }}?>  
                      </select>
 
    </div>
 <div class="col-md-1"> </div>
                 
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary form-control">View</button>
                      </div>
                  </div>
                   </form>
<?php }?>
                    <?php
                    if (isset($_POST['id'])) {

                       $id = $_POST['id'];
                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                     
                        $row = mysqli_fetch_array($result);
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

$id = $_POST['id'];
$class = $row['class'];


$query23 = "SELECT DISTINCT `subject` FROM `result` WHERE `class`= '$class'  ORDER BY `subject` ASC ";
                          $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;
            while($sub = mysqli_fetch_array($result23)){ ?>
<tbody>
<tr class="even pointer"  style="border: 2px solid black;">
 <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $sub['subject']; ?></td>



<?php 
$subject=$sub['subject'];
$id = $_POST['id'];
$class = $row['class'];


                          $batch = $row['batch'];
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            
                          $totalmarks = 0;  $marks = 0;
                          $rows1 = mysqli_num_rows($result14);
                          if($rows1 >0){
                            $res = mysqli_fetch_array($result14);
                          $totalmarks += $res['total'];        
                          $marks += $res['marks'];  

                          $totalmarks21 = $res['total'];        
                          $marks21 = $res['marks'];  
                          }else{
                            $marks21 = 0;
                            $totalmarks21 = 0;
                          }   
                          

                         

 ?>



                           
                       
                            
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo  $marks21 ; ?></td> 
                             

   <?php
          
   



$id = $_POST['id'];
$class = $row['class'];


                    $batch = $row['batch'];
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
                          $totalmarks2 = 0;  $marks2 = 0;
                          $rows2 = mysqli_num_rows($result14);
                          if($rows2 >0){
                            $res2 = mysqli_fetch_array($result14);

                            $totalmarks2 += $res2['total'];        
                            $marks2 += $res2['marks']; 
                            $marks22 =  $res2['marks'];
                            $totalmarks22 = $res2['total'];  
                          }else{
                            $marks22 = 0;
                            $totalmarks22 = 0;
                          }
                         
                         ?>


<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks22; ?></td> 
                         
 
<?php        

$id = $_POST['id'];
$class = $row['class'];

                   $batch = $row['batch'];
				//$batch = $student['batch'];
                          $query222= "SELECT * FROM `result` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `year`= '$batch' ";
                          $result222 = mysqli_query($link, $query222);
            
                          $totalmarks3 = 0;  $marks3 = 0;
                          $rows3 = mysqli_num_rows($result222);
                          if($rows3 >0){
                            $res3 = mysqli_fetch_array($result222);

                            $totalmarks3 += $res3['total'];        
                            $marks3 += $res3['marks']; 
                            $marks23 =  $res3['marks'];
                            $totalmarks23 =  $res3['total'];
                          }else{
                            $marks23 = 0;
                            $totalmarks23 = 0;
                          }
                        
                          ?>
                         
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks23 ; ?></td> 
<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $totalmarks21 +  $totalmarks22 + $totalmarks23 ; ?></td> 


<td class=" "  style="text-align:center; border: 1px solid black;"><?php echo $marks21 + $marks22 + $marks23 ; ?></td> 
                          
            
<?php
         
   
            if(($totalmarks21 +  $totalmarks22 + $totalmarks23) > 0){               
            
$result2=(($marks21 + $marks22 + $marks23)/($totalmarks21 +  $totalmarks22 + $totalmarks23))*100;
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

                          
          

       $totalmark = $totalmark + ($totalmarks21 +  $totalmarks22 + $totalmarks23);        
   

                             
                   
             
       $mark = $mark + ($marks21 + $marks22 + $marks23);        
   
 }
                        
               ?>


                           
                        
 
                        



                       </tbody>
  
                      </table>
<?php 
$class=$row['class'];
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


 $id = $_POST['id'];
                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                     
                        $student = mysqli_fetch_array($result);
                      

$stdid=$row['id'];
$class=$row['class'];
$status1=$status;

if($class=="Play Group")
{
$new_class="Nursary E";
}
else if($class=="Nursary E")
{
$new_class="Pre Prep E";

}

else if($class=="Pre Prep E")
{
$new_class="Prep E";

}
else if($class=="Nursary U")
{
$new_class="Prep U";

}
else if($class=="Prep E")
{
$new_class="Class ONE E";

}
else if($class=="Prep U")
{
$new_class="Class ONE U";

}
else if($class=="Class ONE E")
{
$new_class="Class TWO E";

}
else if($class=="Class ONE U")
{
$new_class="Class TWO U";

}
else if($class=="Class TWO E")
{
$new_class="Class THREE E";

}
else if($class=="Class TWO U")
{
$new_class="Class THREE U";

}
else if($class=="Class THREE E")
{
$new_class="Class 4th E";

}
else if($class=="Class THREE U")
{
$new_class="Class 4th U";

}
else if($class=="Class 4th E")
{
$new_class="Class 5th E";

}
else if($class=="Class 4th U")
{
$new_class="Class 5th U";

}
else if($class=="Class 5th E")
{
$new_class="Class 6th E";

}
else if($class=="Class 5th U")
{
$new_class="Class 6th U";

}
else if($class=="Class 6th E")
{
$new_class="Class 7th E";

}
else if($class=="Class 6th U")
{
$new_class="Class 7th U";

}
else if($class=="Class 7th E")
{
$new_class="Class 8th E";

}
else if($class=="Class 7th U")
{
$new_class="Class 8th U";

}
else if($class=="Class 8th E")
{
$new_class="Class 9th E";

}
else if($class=="Class 8th U")
{
$new_class="Class 9th U";

}
else if($class=="Class 9th E")
{
$new_class="Class 10th E";

}
else if($class=="Class 9th U")
{
$new_class="Class 10th U";

}else if($class=="FSc 1")
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
$year=date('Y');
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
echo "Error While Inserting...!";  }
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
echo "Error While Updating...!";  }
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
