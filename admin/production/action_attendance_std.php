<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
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
                <h3>Add Attendance </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                
                    
                   
                    
                     	<?php
                     	 
          						 $class = $_POST['class'];
 
          						 $date = $_POST['date'];
$section = $_POST['section'];
$count=1;

 $query1 = "SELECT * FROM `atd` WHERE `date`='$date' AND `class`='$class' AND `section`='$section'";
                        $result1 = mysqli_query($link, $query1);
if(mysqli_num_rows($result1)>0){


?>

                         <h2 style="color:red">Record Already Exists!...</h2>


 <div class="row">
<div class="col-md-6 col-sm-12 col-xs-12">

<form action="action_atd1_std.php" method="post">
                  

                      
                         
<?php
                     

      $date = $_POST['date'];
 
                       
                        
                    $class = $_POST['class'];
 
          						 $date = $_POST['date'];
$section = $_POST['section'];
 
                         ?>
                        
                    
                   
<input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">

                   <div class="form-group">  
<button type="submit" name="delete" class="form-control btn btn-primary pull-center" style="width:50%;">Delete</button>    
                   </div>    </form> </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
   <form action="action_edit_attendance_std.php" method="post">
                  

             
                         
                         
<?php
                     

      $date = $_POST['date'];
 
                       
                        
                    $class = $_POST['class'];
 
          						 $date = $_POST['date'];
$section = $_POST['section'];
 
                         ?>
                        
                    
                   
<input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">

                
                          <div class="form-group"> 
<button type="submit"  class="form-control btn btn-primary pull-center" style="width:50%;">Edit</button>    
               </div>       </form> </div>
                      




<?php } else{ 
if($section=='M+F'){
 $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        $result = mysqli_query($link, $query);

}
else{
                         
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND  `gender`='$section' AND `status`='Active'";
                        $result = mysqli_query($link, $query);
}
                       
                         ?>


                            <form action="action_attendance1_std.php" method="post">
 <input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">
                        <table class="table table-striped jambo_table bulk_action">
                        
                       <h2> <?php echo $class;?> - <?php echo $section;?> ( Attendance Date:  <?php echo date('d-m-Y',strtotime($date)) ;?> ) </h2>
                            <thead>
                          <tr class="headings">
                              <th class="column-title" style="text-align:center;">Sr.#</th>
                               <th class="column-title" style="text-align:center;">Student Roll No.</th>
                            <th class="column-title" style="text-align:center;">Student Name</th>
<th class="column-title" style="text-align:center;">Father Name</th>
 
                            <th class="column-title" style="text-align:center;">Mark Attendance</th>
                            
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))
                        {?>
                            
                        <tbody>
                          <tr class="even pointer">
                              <td class=" " style="text-align:center;"><?php echo $count; ?></td>
                               <td class=" " style="text-align:center;"><?php echo $row['id']?></td>
                          
                            <td class=" " style="text-align:center;"><?php echo $row['fullname']?></td>
 <td class=" " style="text-align:center;"><?php echo $row['fname']?></td>
                            <td class=" " style="text-align:center;">

 <p>
                       Present:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderM" value="1" checked required /> 
Absent:
                        <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="0" />
Leave:
 <input type="radio" class="flat" name="atd[]<?php echo $row['id']; ?>" id="genderF" value="2" />
                      </p>


                           
                             </td>
                            
                         
                          </tr>
 

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="sid[]" value="<?php echo $row['id']; ?>" style="width:50%;">
  
                       
                        </tbody>
                           <?php
                          /* 
 $sid[]=$row['id'];
$_SESSION['class']=$class;
$_SESSION['section']=$section;
                           
                           
                           $_SESSION['date']=$date;
                           $_SESSION['sid'] = $sid;
*/
               $count=$count+1;            }  ?>

  <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Save Attendance</button>
                       </form>
                       


                      </table>
<?php } ?>
                    </div>
                      
                      
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
