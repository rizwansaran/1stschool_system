<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>add result</title>
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
                <h3>Add Result </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


                          <?php
if(isset($_POST['submit'])){


                     $date = date("Y-m-d");
                          
                        
                      $teacher= $_SESSION['id'];  
                         
                          $class = $_POST['class'] ;
                      $subject = $_POST['subject'];
   $section = $_POST['section'];

                         $year = $_POST['year'];

$term = $_POST['term'];

                                          
?>
   <form action="action_edit_res.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">



                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                          <h2><?php echo $class?>  <?php echo $subject?> </h2><hr>
 <h2> Total Marks:</h2><hr style="width:50%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="total" style="width:50%;" >
                          <?php
                          
                          $query_total = "SELECT DISTINCT `total` FROM `result` WHERE `class`='$class' AND `subject`='$subject' AND `term`='$term' AND `t_id`='$teacher' AND `section`='$section' AND `year`='$year' ORDER BY id ASC ";
                          $result_total = mysqli_query($link, $query_total);
                          $row_total = mysqli_fetch_array($result_total);
                          
                          for($i=10; $i<=100; $i+=5 ){ ?>
                            <option <?php if($row_total['total']== $i) {?> selected <?php } ?> value="<?php echo $i;?>"><?php echo $i;?></option> 
                         <?php } ?>
 
                      </select><br/>
 <br/>
 
                            <thead>
                          <tr class="headings">

                            <th class="column-title" style="text-align:center;">Admission #</th>

                            <th class="column-title" style="text-align:center;">Student Name</th>

                             <th class="column-title" style="text-align:center;">Obtained Marks</th>

             
                                       </tr>
                        </thead>
                      
                      <?php


?>
                        <tbody>
<?php
$query1 = "SELECT * FROM `result` WHERE `class`='$class' AND `subject`='$subject' AND `term`='$term' AND `t_id`='$teacher' AND `section`='$section' AND `year`='$year' ORDER BY id ASC ";
                                           $result2 = mysqli_query($link, $query1);
             

                          if(mysqli_num_rows($result2) > 0){  
              
while($row12 = mysqli_fetch_array($result2))
                        {

$std_id= $row12['studentid'];
$total= $row12['total'];                         
$marks= $row12['marks'];                         
 
 
 $sql = "SELECT * FROM `student` WHERE `id`='$std_id'  ";
                          $teachers = mysqli_query($link, $sql);

$a=1;
                          $row = mysqli_fetch_assoc($teachers);
$stdid=$row['id'];

                          ?>

                          <tr class="even pointer">
  <td class=" " style="text-align:center;"><?php echo $row['id']?>

</td>
 
                          <td class=" " style="text-align:center;"><?php echo $row['fullname']?>

</td>


                         
  <td class=" " style="text-align:center;">

   <div class="input-box fullname">


<input type="text"  name="marks[]" value="<?php echo $marks; ?>"  style="width:50%;text-align:center;">             
          </div>                         
                            </td>

                  
                       
                          </tr>

                         
                        </tbody>

                         <?php
                          $sid[]=$row['id'];
                          $_SESSION['sid'] = $sid;
$date = date("Y-m-d");
                          $_SESSION['date'] = $date;
                          $_SESSION['year'] = $year;
                           $term = $_POST['term'];
                          $_SESSION['term'] = $term;
                          $class =  $_SESSION['class'];
$subject = $_POST['subject'];
$_SESSION['subject']= $subject;
$section= $row12['section'];
$_SESSION['section']= $section;

 
 

      $a++;                 } } 
 
                         ?>
                        
                      </table>
                    </div>
<input  class="form-control" type="hidden" required="" name ="tid" value="<?php echo $_SESSION['id']; ?>" style="width:50%;">


                       <div class="form-group">
<button type="submit" name="submit1" class="form-control btn btn-primary pull-right" style="width:40%;">Done</button>    
                       </form>
                      

<?php
                         }
                         ?>
                    
                                         </div>

                  	 </div>
     

                      
                      <br>
                    
                    </div>
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
