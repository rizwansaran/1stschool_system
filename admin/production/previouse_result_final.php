

<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Previous result!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Results <small>Previous!</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="previousresult.php" method="post">
                  <div class="col-md-2"><div class="row">
                        <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled >Select Class </option>
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
 </div></div>
                  <div class="col-md-1"></div>
                  <div class="col-md-2">
                    <div class="row">
<select id="class" class="form-control" name="batch" style="width:100%;" >

 <option value="" selected disabled >Select Year </option>
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
                  <div class="col-md-1"></div>
                  <div class="col-md-2"><div class="row">
                        <select id="term" class="form-control" name="term" >
<option value="" selected disabled>Select Term </option>
<?php

 $query1 = "SELECT DISTINCT term FROM `result` ORDER BY year DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$batch1= $row1['term'];
?>
   
                    
                        <option value="<?php echo $batch1?> ">Term <?php echo $batch1?></option>
                     <?php }?> 
 
                      </select>
                  </div></div>
                  <div class="col-md-1"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['class'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
                        $term = $_POST['term'];
                        $batch = $_POST['batch'];
                        $query = "SELECT * FROM `student` WHERE `class`='$class'";
                        $result1 = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result1)){
                          $student = $row['id'];
                          ?>
<table class="table table-striped jambo_table bulk_action">
                        
                          <h2>Name: <?php echo $row['fullname']; ?></h2>
 <h2>Father Name: <?php echo $row['fname']; ?></h2>
<h2> RollNo: <?php echo $row['id']; ?></h2>
 <h2><?php echo $row['class']; ?></h2>
                 <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Course </th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Total marks </th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Obtained marks </th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Term </th>   <th class="column-title">Remarks </th>
                          </tr>
                        </thead>
                        <?php
 $query1 = "SELECT * FROM `result` WHERE `studentid`= '$student' AND `term` = '$term' AND `year`='$batch'";
                                                   $result2 = mysqli_query($link, $query1);
             

                          if(mysqli_num_rows($result2) < 1){  ?>
 <tr class="even pointer">
                            <td class=" "><h2 style="color:red">Result Not Uploaded Yet!...</h2></td>

                            </td>

<?php } else {?>
                          </tr>

<?php

$totalmarks = 0;  $marks = 0;
                          while($res = mysqli_fetch_array($result2)){
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['subject']; ?></td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['total']; ?> </td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['marks']; ?></td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $res['term']; ?></td>
                            <?php 
$result3=($res['marks']/$res['total'])*100;
if($result3>=33)
{
$status1= 'Pass';}
else{

$status1= 'Fail';}
?>
<?php if($status1== 'Fail'){?>
                            <td class=" " style="text-align:center;color:red; border: 1px solid #dddddd;"><?php echo $status1; ?> </td>
                            <?php }
                            else{?> 
                            <td class=" " style="text-align:center;color:green; border: 1px solid #dddddd;"><?php echo $status1; ?> </td>
                            <?php }?>

                          </tr>
<?php


                        
       $totalmarks = $totalmarks + $res['total'];        
   

                             
               ?>
 
 <?php 
                          
             
       $marks = $marks + $res['marks'];        

 }?>

 <tr class="even pointer">
                            <td class=" "><h2>Total Marks: <?php echo $totalmarks; ?></h2></td>
                            <td class=" "><h2>Obtained Marks: <?php echo $marks; ?></h2> </td>
                           <?php 
$result=($marks/$totalmarks)*100;
if($result>=33)
{
$status= 'Pass';}
else{

$status= 'Fail';}
?>
 <td class=" "><h2>Percentage: <?php echo $result; ?> % </h2></td>
                           
<?php if($status == 'Fail'){?>
                      <td class=" "style="text-align:center;color:red;"><h2>Overall Result: <?php echo $status ;?></h2> </td>
                            <?php }
                            else{?> 
                        <td class=" " style="text-align:center;color:green;"><h2>Overall Result: <?php echo $status ;?></h2> </td>
                            <?php }?>
 
                          <td></td>

                           <?php }}?> </tr>
 
                        </tbody>
  
                      </table>
 

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
