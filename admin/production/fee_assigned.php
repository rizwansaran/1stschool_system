<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All students!</title>
    <?php include 'php/head.php.inc'; ?>
<script>
function myFunction()
{
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    if (!tr[i].classList.contains('headings')) {
      td = tr[i].getElementsByTagName("td"),
      match = false;
      for (j = 0; j < td.length; j++) {
        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          match = true;
          break;
        }
      }
      if (!match) {
        tr[i].style.display = "none";
      } else {
        tr[i].style.display = "";
      }
    }
  }
}



</script>
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
               
<?php
                  if(isset($_GET['msg'])){
                    
                  
                  ?>
                  <h2 style="color:red"> Update Student - <?php error_reporting(0); echo $_GET['msg']; ?></h2>
           

<?php } else { ?>

 <h3>Academia <small>Active students</small></h3>

<?php }
                  ?>
                 
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


 <form action="" method="post">
                  <div class="col-md-8"><div class="row">
                        <select id="class" class="form-control" name="class" style="width:50%;" >
<?php
$feegroup=$_GET['feegroup'];
 $query1 = "SELECT DISTINCT class FROM `student`ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>
 <input type="hidden" id="fathername" value="<?php echo $feegroup; ?>" class="form-control" name="feegroup"  required />
 </div></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name="view"  class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php  if(isset($_POST['view'])){
$class=$_POST['class'];
$feegroup=$_POST['feegroup'];
                      ?>
                      <br>



  <form action="" method="post">

                    <div class="table-responsive">


<?php
                       
                        $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>


                     <table id="" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                                       
                        <thead>   
<tr class="headings"> 

<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

                          <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">File No.</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>


                            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>

                            
                              <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Select </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        $result = mysqli_query($link, $query);
$count=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>

<tr class="even pointer"> 



<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fullname']; ?></td>
                            

			    <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['batch'] . ' - '.$row['class']; ?></td>
                           
                         



          
        <td class=" " style="text-align:center; border: 1px solid #dddddd;"><input type="checkbox" name="std_id[]" value="<?php echo $row['id']; ?>" id="color_red" /></td>


                          </tr>
                          <?php   $count++; }?>
                        </tbody>

                      </table>

  <input type="hidden" id="fathername" value="<?php echo $feegroup; ?>" class="form-control" name="feegroup"  required />
  <input type="hidden" id="fathername" value="<?php echo $class; ?>" class="form-control" name="class"  required />
       
                    </div>
<div class="col-md-1 col-sm-1 col-xs-1">
             
<button type="submit" name="submit" class="form-control btn btn-primary">Save</button>   </div>
                     </form>
<?php  }
                      ?>

            <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $id = $_POST['std_id'];
 $class = $_POST['class'];
 $feegroup = $_POST['feegroup'];
 
 $query1 = "SELECT * FROM `fee_assigned` WHERE `class`='$class' AND `fee_group`='$feegroup' ";
                        $result1 = mysqli_query($link, $query1);

                        $row1 = mysqli_num_rows($result1);
if($row1>0){
    $query ="DELETE from `fee_assigned`  WHERE `fee_group`='$feegroup' AND `class`='$class'  ";
    $result = mysqli_query($link, $query); 
    //if($result==TRUE){
 
 for($i=0;$i<count($id);$i++)
 {
  if($id[$i]!="" )
  {


   //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");	 




 $query ="INSERT INTO `fee_assigned`(`student_id`, `class`, `fee_group`) 
VALUES ('$id[$i]', '$class', '$feegroup')  ";
    $result = mysqli_query($link, $query); 
 


 //echo "<script type='text/javascript'>window.location.href = 'deletestudent21.php';</script>";
  
//echo "Record Updated Successfully!";

  } }
  if($result==TRUE){

 //echo "<script type='text/javascript'>window.location.href = 'deletestudent21.php';</script>";
  
echo "Record Updated Successfully!";
}
else{
echo mysqli_error($link);  }


 


}
else {
    for($i=0;$i<count($id);$i++)
 {
  if($id[$i]!="" )
  {


   $query ="INSERT INTO `fee_assigned`(`student_id`, `class`, `fee_group`) 
VALUES ('$id[$i]', '$class', '$feegroup')  ";
    $result = mysqli_query($link, $query); 


      
  } 

                    }
                    
                   if($result==TRUE){

 //echo "<script type='text/javascript'>window.location.href = 'deletestudent21.php';</script>";
  
echo "Record saved Successfully!";
}
else{
echo mysqli_error($link);  }  

  }
 }
?>


                  </div>


                </div>
              </div>
         
        </div>
        <!-- /page content -->

     <br><br><br><br><br><br><br><br>

     <?php include 'php/footer.php.inc'; ?>
 <!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 <?php include 'script.php'; ?>
 	
  </body>
</html>












































