<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Result</title>
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
                <h3>View Result </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
  

                  <div class="x_content">
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
          						  $class=$_POST['class'];

 $section=$_POST['section'];
  $year=$_POST['year'];
if($section == 'M')
{
$sec= 'Boys';
}
elseif($section == 'F') {
$sec= 'Girls';
}
else{
$sec= 'Boys+Girls';
}

$term=$_POST['term'];
                       ?>


                        
                        <table class="table table-striped jambo_table bulk_action">

                       	
                       	
                        

                           <h2><?php echo $class;?> <?php echo $sec;?></h2><hr>
                            <thead>
                          <tr class="headings"  style="border: 1px solid black;">
                            <th class="column-title" style="text-align:center;">Student Name</th>
<?php
 $teacher= $_SESSION['id'];
 $section=$_POST['section'];
$quer11 = "SELECT DISTINCT subject FROM `result` WHERE `t_id`=' $teacher' AND `class`='$class' AND `section`='$section' AND `term`='$term' AND `year`='$year' ";
                        $resul11 = mysqli_query($link, $quer11);
 while($row11 = mysqli_fetch_array($resul11)) {
                         
                        


                          $subj=$row11['subject'];
 $query4 = "SELECT total FROM `result` WHERE `subject`= '$subj' AND `term`='$term' AND `year`='$year' AND `t_id`=' $teacher'  AND `class`='$class' AND `section`='$section' ";
                          $result4 = mysqli_query($link, $query4);
                          $r3 = mysqli_fetch_array($result4);
                  
                          $r4=$r3['total'];

 ?>
                          
                        
                            <th class="column-title" style="text-align:center;border: 1px solid black;"><?php echo $subj;?>/ <?php echo  $r4;?></th>
                           <?php  }?>
                          </tr>
 
                        </thead>



                                                    
                        <tbody>
                        <?php  

                        $query2 = "SELECT DISTINCT studentid, section FROM `result` WHERE `class`='$class' AND `section`='$section' AND `term`='$term' AND `year`='$year'";
                        $result2 = mysqli_query($link, $query2);
                        
                        
                         while($row2 = mysqli_fetch_array($result2))
                        {
                          $stid=$row2['studentid'];
$section1=$row2['section'];

                         

if( $section1=='M+F'){
                          $query13 = "SELECT * FROM `student` WHERE `id`='$stid' AND `class`='$class' AND `status`='Active'";
                          $result13 = mysqli_query($link, $query13);   
}
else
{
  $query13 = "SELECT * FROM `student` WHERE `id`='$stid' AND `class`='$class'  AND `gender`='$section' AND `status`='Active'";
                          $result13 = mysqli_query($link, $query13);  
                       }
                       $r = mysqli_fetch_array($result13);
                         $teacher= $_SESSION['id'];
 $section=$_POST['section'];
$query23 = "SELECT DISTINCT subject FROM `result` WHERE `t_id`=' $teacher' AND `class`='$class' AND `section`='$section' AND `term`='$term'  AND `year`='$year'";
                        $result12 = mysqli_query($link, $query23);

                         
                         ?>
                          <tr class="" style="border: 2px solid black;">
                            <td class=" "style="text-align:center;border: 1px solid black;"><?php echo $r['fullname'];?></td>
                             <?php 

                         while($row12 = mysqli_fetch_array($result12))
                         {
                        


                          $sub=$row12['subject'];
                          
  
                          $query3 = "SELECT marks FROM `result` WHERE `subject`= '$sub' AND `studentid`='$stid' AND `section`='$section' AND `term`='$term' AND `year`='$year'";
                          $result3 = mysqli_query($link, $query3);
                          while($r1 = mysqli_fetch_array($result3))
                          {
                          $r2=$r1['marks']; ?>
                          
                         <td class=" " style="text-align:center;border: 1px solid black;"><?php echo $r2;?></td>

                     <?php    }}?>
                            
                           
                          </tr>
 
                         
                        </tbody>

                           <?php
                          
                            }?>
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                      
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
