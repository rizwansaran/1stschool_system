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

            
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                 
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
          						 $class = $_POST['class'];
 
          						 $date = $_POST['date'];
$section = $_POST['section'];


 $query1 = "SELECT * FROM `atd` WHERE `date`='$date' AND `class`='$class' AND `section`='$section'";
                        $result1 = mysqli_query($link, $query1);
if(mysqli_num_rows($result1)>0)

{


?>

                         <h2 style="color:red">Record Already Exists!...</h2>

<form action="action_atd1.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">



                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                         
                         
<?php
                     

    $class = $_POST['class'];
 
          						 $date = $_POST['date'];
$section = $_POST['section'];
 
                         ?>
                        
                    
                    </div>
<input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">

                      <div class="form-group">
<button type="submit" name="delete" class="form-control btn btn-primary pull-right" style="width:15%;">Delete</button>    
                       </form>
       <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>      
                      <br> <br/> <br/> <br/> <br/> <br/>          



<?php
 } else { 
if($section=='M+F') {
 $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        $result = mysqli_query($link, $query);

}
else {
                         
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND  `gender`='$section' AND `status`='Active'";
                        $result = mysqli_query($link, $query);
}
                       
                         ?>


                 <form action="action_attendance1.php" method="post">  
  <div class="table-responsive">        
                        <table class="table table-striped jambo_table bulk_action">
                         <h2>Class: <?php echo $class;?> - <?php 
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
 echo  $sec;?></h2><hr>
                            <thead>
                       
                          <tr class="headings">
  <th class="column-title" style="text-align:center;">Admission #</th>
                          
                            <th class="column-title" style="text-align:center;">Student Name</th>
<th class="column-title" style="text-align:center;">Father Name</th>
                            <th class="column-title" style="text-align:center;">Mark Attendance</th>
                            
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))
                        { ?>
                            
                        <tbody>
                          <tr class="even pointer">
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

                         
                        </tbody>
                           <?php
                          // $sid[]=$row['id'];

/*
$_SESSION['class']=$class;
$_SESSION['section']=$section;
                           
                           
                           $_SESSION['date']=$date;
                           $_SESSION['sid'] = $sid;

*/
                             } ?>
<input  class="form-control" type="hidden" required="" name ="date" value="<?php echo $date; ?>" style="width:50%;">

<input  class="form-control" type="hidden" required="" name ="class" value="<?php echo $class; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="section" value="<?php echo $section; ?>" style="width:50%;">
<input  class="form-control" type="hidden" required="" name ="sid[]" value="<?php echo $row['id']; ?>" style="width:50%;">
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" name="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                      
                     </div>
                  	
                  
                   
                      <br> <br> <br/> <br/> <br/> <br/> <br/>

                    
                    </div>
                   
                  </div>
                </div>
   
                   </div>
          
<?php } ?>
    
                </div>
 <?php include 'php/footer.php.inc'; ?>
        </div>

        <!-- /page content -->

   
  </body>
</html>
