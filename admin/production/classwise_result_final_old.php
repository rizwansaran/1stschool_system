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

		
         <div class="" align="center"><h1> <img src=" <?php echo $image ;?>" class="" width='50' height='50'>    <?php echo $name;?></h1></div>
  



<tbody>
 <tr class=" ">  <br/><br/>

 <td class="col-md-1"><h3> <small><b>Name:</b> </small></h3></td>  
<td class=" "><h3> <small><?php echo  $row['fullname']; ?> </small></h3></td>  
  <td class="col-md-1"><h3> <small><b></b> </small></h3></td>  
 <td class=""  align="center"> <img src="<?php echo  $row['picture'];?> " class=""  width='70' height='80' style="border: 1px solid #dddddd;"> </td> 


 </tr>

<tr class=" ">   
<td class="col-md-1"><h3> <small><b> Father Name:</b></small></h3></td>
<td class=" "><h3> <small><?php echo  $row['fname']; ?></small></h3></td></tr>
<td class="col-md-2"><h3> <small><b></b> </small></h3></td>
<td class="col-md-2"><h3> <small><b></b> </small></h3></td>
</tr>
<tr class=" ">  
<td class="col-md-1"><h3> <small><b>Gender: </b> </small></h3></td>
 <?php $g=  $row['gender'];
if($g == 'M')
{
$sec= 'Male';
}
elseif($g == 'F') {
$sec= 'Female';
}


?>
<td class=""><h3> <small><?php echo $sec;?> </small></h3></td> 
<td class=" col-md-3"><h3> <small><b> Class:</b></small></h3> </td>   
<td class=" "><h3> <small> <?php echo  $row['class']; ?></small></h3> </td>   
</tr>
    </tr>
<tr class=" ">  
<td class=" col-md-1"><h3> <small><b>Roll No.:</b></small></h3> </td> 
<td class=" "><h3> <small> <?php echo $id; ?></small></h3> </td> 
 <td class=" col-md-3"><h3> <small><b>Batch:</b></small></h3></td>
<td class=" "><h3> <small> <?php echo  $row['batch'];?></small></h3></td>
</tr>





                      
                        </tbody>
                      </table>


                        <table class="table table-striped jambo_table bulk_action">
                      

          
                          
                 <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Course </th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">1st Term </th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">2nd Term </th>
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">3rd Term </th>
                           
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Total marks </th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Obtained marks </th>
                             <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Remarks </th>
                            
                          </tr>
                        </thead>
                            
                        
                          
               

                    
                                         <?php  

$class = $_POST['class'];

$query23 = "SELECT DISTINCT `subject` FROM `result` WHERE `class`= '$class' ";
                          $result23 = mysqli_query($link, $query23);
 $totalmark=0;
 $mark=0;
            while($sub = mysqli_fetch_array($result23)){ ?>
<tbody>
<tr class="even pointer">
 <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $sub['subject']; ?></td>



<?php 
$subject=$sub['subject'];
$id = $row['id'];
$class = $row['class'];

                          $batch = date("Y");
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '1' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            
$totalmarks = 0;  $marks = 0;
                         

$res = mysqli_fetch_array($result14)
 ?>



                           
                       
                            
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['marks'] ; ?></td> 
                             

   <?php
       $totalmarks = $totalmarks + $res['total'];        
   
  $marks = $marks + $res['marks'];        
   



$id = $row['id'];
$class = $row['class'];

                          $batch = date("Y");
				//$batch = $student['batch'];
                          $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `class`= '$class' AND `subject`= '$subject' AND `term`= '2' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            

                          $totalmarks2 = 0;  $marks2 = 0;
                         $res2 = mysqli_fetch_array($result14) ?>


<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res2['marks'] ; ?></td> 
                         
 
<?php
   
       $totalmarks2 = $totalmarks2 + $res2['total'];        
  $marks2 = $marks2 + $res2['marks'];        
   
           

$id = $row['id'];
$class = $row['class'];

                          $batch = date("Y");
				//$batch = $student['batch'];
                          $query222= "SELECT * FROM `result` WHERE `studentid`= '$id'  AND `class`= '$class' AND `subject`= '$subject' AND `term`= '3' AND `year`= '$batch' ";
                          $result222 = mysqli_query($link, $query222);
            
$totalmarks3 = 0;  $marks3 = 0;
                         $res3 = mysqli_fetch_array($result222) ?>
                         
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res3['marks'] ; ?></td> 
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['total'] +  $res2['total'] + $res3['total'] ; ?></td> 


<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['marks'] + $res2['marks'] + $res3['marks'] ; ?></td> 
                          
            
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
                            <td class=" " style="text-align:center;color:red;"><?php echo $status1; ?> </td>
                            <?php }
                            else{?> 
                            <td class=" " style="text-align:center;color:green;"><?php echo $status1; ?> </td>
                            <?php } }
else {
$status1= 'Fail';
 ?>
  <td class=" " style="text-align:center;color:red;"><?php echo $status1; ?> </td>
                          
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
 $query10 = "SELECT * FROM `staff` WHERE `class`= '$class'";
                          $result10 = mysqli_query($link, $query10);
$res10 = mysqli_fetch_array($result10);
$name=$res10['fullname'];
            

?>  

    <table class= "col-md-12"  width='100%'> <tbody>




<tr class="even pointer">
                            <td class=" "><h2>Total Marks: <?php echo $totalmark; ?></h2></td>
                            <td class=" "><h2>Obt. Marks: <?php echo $mark; ?></h2> </td>
<td class=" "><h2>   </h2> </td>
                            
<?php 
   if($totalmark > 0){  
$result=($mark/$totalmark)*100; 
if($result>=33)
{
$status= 'Pass';}
else{

$status= 'Fail';}
?>
 <td class=" "><h2>Per.(%): <?php echo $result; ?> % </h2></td>
<td class=" "><h2>   </h2> </td>
                           
<?php if($status == 'Fail'){?>
                      <td class=" " style="text-align:center;color:red;"><h2>Result: <?php echo $status ;?></h2>  </td>
                            <?php }
                            else{?> 
                        <td class=" " style="text-align:center;color:green;"><h2>Result: <?php echo $status ;?></h2> </td>
                            <?php }
}
else {
$status= 'Fail';
 ?>
<td class=" "><h2>   </h2> </td>
 <td class=" " style="text-align:center;color:red;"><h2>Result: <?php echo $status ;?></h2>  </td>
<td class=" "><h2>   </h2> </td>
                     
<?php 

}


?>

                        
                            
                          </tr>  </tbody></table> 
<table class= "col-md-12"  width='100%'> <tbody>
<tr class=" " > 
<td class=" "><h2>  <br><br><br><br><br><br> </h2> </td>

</tr>
<tr class=" " >  

  <td class=""><h2>Class Incharge: <?php echo $name; ?></h2></td>
<td class=""></td> <td class=""></td>
   <td class="col-md-4"><h2>Principal:</h2></td>   </tr>                  

 </tbody> </table> 


<P style="page-break-before: always">

     <?php



$stdid=$row['id'];
$class=$row['class'];
$status1=$status;

if($class=="Play")
{
$new_class="Nursary";
}
else if($class=="Nursary")
{
$new_class="Prep";

}
else if($class=="Prep")
{
$new_class="Class 1";

}
else if($class=="Class 1")
{
$new_class="Class 2";

}
else if($class=="Class 2")
{
$new_class="Class 3";

}
else if($class=="Class 3")
{
$new_class="Class 4";

}
else if($class=="Class 4")
{
$new_class="Class 5";

}
else if($class=="Class 5")
{
$new_class="Class 6";

}
else if($class=="Class 6")
{
$new_class="Class 7";

}
else if($class=="Class 7")
{
$new_class="Class 8";

}
else if($class=="Class 8")
{
$new_class="Class 9";

}
else if($class=="Class 9")
{
$new_class="Class 10";

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
$year=date('Y');
$query66 = "SELECT * FROM `promote` WHERE `studentid`='$stdid'";
                        $result66 = mysqli_query($link, $query66);
if(mysqli_num_rows($result66) < 1){ 
$query67 ="INSERT INTO `promote`(`id`,`studentid`, `p_class`, `n_class`, `year`, `status`) 
                    VALUES ('','$stdid','$class','$new_class','$year', '$status1')  ";
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





