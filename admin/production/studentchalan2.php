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
 if (!isset($_POST['id'])){
$select='0';
}
else {
$select='1';
}
if($select=='0')
{
?>
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="studentchalan.php" method="post" enctype="multipart/form-data">
                      <label for="id">Student id * :</label>
                      <div class="row"?>
                        <div class="col-md-6">
                          <input type="number" id="id" class="form-control" name="id" required value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>"/>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->
<?php }?>
                    <?php
                    if (isset($_POST['id'])) {
                       $id = $_POST['id'];
                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
$class= $student['class'];
$batch = date("n");
$batch1 = date("n") - 1;
$year = date("Y"); 


$queryatd = "SELECT * FROM `atd` WHERE `std_id`='$id' AND `status`='0' AND `month` = ' $batch1 ' AND `year` = ' $year '";
                        $resultatd = mysqli_query($link, $queryatd);
                        $studentatd = mysqli_num_rows($resultatd);
                          
 $fine= $studentatd * 20 ; 
                        ?>
                       
                        <div class="row">
                          </div>
                        <?php
                      
                        $query = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        ?>
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>
<br/><hr><br/>

<?php $day = date("d") + 6; ?>  
<tr class=" ">   
 <td class=" " align="center"><b> Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;  ?>  <br/></td> 
<td class=" ">               </td>
<td class=" " align="center"><b> Due Date: </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year; ?></td> 
<td class=" ">               </td>
 
<td class=" " align="center"> <b>Due Date:  </b> <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year; ?></td> 
<td class=" ">               </td>
<td class=" " align="center"><b> Due Date:</b>   <?php echo $day;  ?>-<?php echo $batch;  ?>-<?php echo $year;?></td> 
<td class=" ">               </td>   </tr>

<tr class=" ">
<td class=" " align="center"> Bank Copy <br/>   </td> 
<td class=" ">        <br/>       </td>
<td class=" " align="center"> Department Copy<br/>  </td>
<td class=" ">               </td>
<td class=" " align="center">Treasure Copy<br/>  </td>
<td class=" ">               </td>
<td class=" " align="center"> Student Copy <br/>  </td>
<td class=" ">               </td>
</tr>
<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/> <br/></td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/><br/> </td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b> <br/><br/><br/></td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/><br/> </td>               
<td class=" ">               </td>  </tr>



<tr class=" ">   
 <td class=" "><b> Name:  </b> <?php echo $student['fullname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>
<td class=" "><b> Name: </b>  <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>
 
<td class=" "> <b>Name:  </b> <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>
<td class=" "><b> Name:</b>   <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>   </tr>

<tr class=" ">  

<td class=" "><b> Father Name:</b>  <?php echo $student['fname']; ?> <br/>  <br/></td> 
<td class=" ">               </td>

<td class=" "><b> Father Name: </b> <?php echo $student['fname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> <b>Father Name: </b> <?php echo $student['fname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> <b>Father Name: </b> <?php echo $student['fname']; ?> </td> <td class=" ">               </td>   </tr>
<tr class=" ">   

<td class=" "> <b> Roll No.:   </b>  <?php echo $id; ?><br/>  <br/> </td> 
<td class=" ">               </td>
<td class=" "><b> Roll No.:  </b>   <?php echo $id; ?> </td> 
<td class=" ">               </td>
<td class=" "><b> Roll No.:  </b>   <?php echo $id; ?> </td> 
<td class=" ">               </td>
<td class=" "> <b> Roll No.: </b>    <?php echo $id; ?> </td>
<td class=" ">               </td>    </tr>
<tr class=" ">  

<td class=" "> <b>Class: </b>   <?php echo $student['class']; ?> <br/><br/> </td> 
<td class=" ">               </td>
<td class=" "> <b> Class:   </b>  <?php echo $student['class']; ?><br/><br/> </td>
<td class=" ">               </td>
<td class=" "> <b> Class:  </b>   <?php echo $student['class']; ?><br/><br/> </td>
<td class=" ">               </td>
<td class=" " ><b>  Class:  </b>   <?php echo $student['class']; ?> <br/><br/></td> 
<td class=" ">               </td>   </tr>
   
<tr class=" ">  
<?php  
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

<td class=" "> <b>Fee Month: </b>   <?php echo $month; ?> <br/><br/> </td> 
<td class=" ">               </td>
<td class=" "> <b>Fee Month: </b>     <?php echo $month; ?><br/><br/> </td>
<td class=" ">               </td>
<td class=" "> <b>Fee Month: </b>   <?php echo $month; ?><br/><br/> </td>
<td class=" ">               </td>
<td class=" " > <b>Fee Month: </b>    <?php echo $month; ?> <br/><br/></td> 
<td class=" ">               </td>   </tr>                        


         </tbody>
                      </table>


 <table class=" table jambo_table ">
		        
                            <tbody>

                                               
<tr class="even pointer">  
<td class="" style="text-align:left;"  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
                         
 </tr>
 <?php
                        while($fee = mysqli_fetch_array($result)){
                          ?>
                          <tr class="even pointer">  
<td class=""  > Registration Fee <br/>  </td> 
                            <td class=" ">   <?php echo $fee['registrationfee']; ?></td>
<td class="" border-left="1px ">Registration Fee  </td> 
  <td class=" ">   <?php echo $fee['registrationfee']; ?></td> 
            <td class=" ">Registration Fee  </td>              
  <td class=" ">  <?php echo $fee['registrationfee']; ?></td> 
                         <td class=" ">Registration Fee  </td> 
  <td class=" ">   <?php echo $fee['registrationfee']; ?></td> 
                         
 </tr>
                         <tr class="even pointer">  
 <td class=" "> Examination Fee </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Examination Fee </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Examination Fee </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Examination Fee </td>
 <td class=" ">    <?php echo $fee['examsfee']; ?> </td>
     
                        <tr class="even pointer"> 
<td class=" "> Tuition Fee </td> 
    <td class=" ">     <?php echo $fee['teutionfee']; ?></td> 
<td class=" "> Tuition Fee </td>	
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 	
<td class=" "> Tuition Fee </td>
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 
<td class=" "> Tuition Fee </td>	
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 	
   
                          <tr class="even pointer">  
<td class=" "> Transport Fee </td>
 <td class=" ">     <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
<td class=" ">      <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
 <td class=" ">     <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
 <td class=" ">    <?php echo $fee['transportfee']; ?></td> 

  
                          <tr class="even pointer"> 
<td class=" "> Absent Fine <br/></td> 
 <td class=" ">      <?php echo $fine; ?></td> 
<td class=" "> Absent Fine <br/></td> 
<td class=" ">      <?php echo $fine; ?></td> 
<td class=" "> Absent Fine <br/></td> 
 <td class=" ">     <?php echo $fine; ?></td> 
<td class=" "> Absent Fine <br/></td> 
 <td class=" ">     <?php echo $fine; ?></td> 
  
  </tr>
<tr class="even pointer">  
<td class=" "> Miscellaneous Fee <br/> </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
                          
                            
                        
<?php     
$total = $fee['registrationfee'] + $fee['examsfee'] + $fee['teutionfee'] + $fee['transportfee'] + $fine + $fee['others'];
     ?>
<tr class="even pointer"> 
<td class=" "> <b>Total <br/>  </td> 
<td class=" "> <b>   <?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
                          
                            </td>
                        </tr>


                          <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                        <?php
                       }else{
                        //no fee history
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No fee history found!</h3></div>                
                        </div>
                        <?php
                       }
                       }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No student found!</h3></div>                
                        </div>
                        <?php
                       }
                     } 
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
