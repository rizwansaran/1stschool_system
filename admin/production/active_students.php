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

                    <div class="table-responsive">
<?php
                       
                        $query1 = "SELECT * FROM `student` WHERE `status`='Active' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>


                     <table id="example" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                                       
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

                          <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">File No.</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
                           
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>


                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
                            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Gender </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Take Action </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

                        $query = "SELECT * FROM `student` WHERE `status`='Active'";
                        $result = mysqli_query($link, $query);
$count=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>

<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><a href="profile_std.php?id=<?php echo $row['id'];?>"><?php echo $row['fullname']; ?></a></td>
                            

                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['mobile']; ?></td>

			    <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>


           <?php $f= $row['fname'];
 $m= $row['fcnic'];
                       
?>

                                         
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php  $query2 = "SELECT * FROM `parent` WHERE `dad`='$f' AND `fcnic`= '$m' ";
                        $result2 = mysqli_query($link, $query2); 
 if(mysqli_num_rows($result2)>0) {
                       $row2 = mysqli_fetch_array($result2);
 echo $row2['mobile'];
 } 
else
 { echo " "; } ?></td>
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['gender']; ?> </td>

                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['batch'] . ' - '.$row['class']; ?></td>
                           
                          
 

<?php 
   $status=$row['status']; 
if($status=="Active")  { 

$status1="Inactive";
 } else {

$status1="Active";


 }?>




          
          <td>      

<div class="btn-group" role="group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
   Select Action to be Performed
  <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  
<li><a href="fee_collect.php?id=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Receive Fee</button></a></li>

 <li><a href="action_active.php?sid=<?php echo $row['id'];?>&status=<?php echo $status;?>"><button type="submit" class="form-control btn btn-primary">Make <?php echo $status1;?></button></a></li>													
 
  <li><a href="fee_structure2.php?std_id=<?php echo $row['id'];?>&std_name=<?php echo $row['fullname'];?>&class=<?php echo $row['class'];?>"><button type="button" class="form-control btn btn-primary">Update Fee Structure  </button></a></li>													
                                                 
<li><a href="updatestudent2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Update Student  </button></a></li>													
<!--li><a href="student_academics.php?id=<?php /* echo $row['id']; */?>"><button type="button" class="form-control btn btn-primary">View Pre. Academic Record</button></a></li-->

<li><a href="student_doc.php?id=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">View Documents</button></a></li>


<?php
$id=$row['id'];
$batch= date("n");
                         $query11 = "SELECT * FROM `atd` WHERE std_id = '$id'";
                       $result11 = mysqli_query($link, $query11);
                       if(mysqli_num_rows($result11) > 0){
 
      
                        ?>
<li><a href="views_attendance_monthly_std.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Monthly Attendence</button></a></li>													

<?php 
} ?>


<?php 

$id=$row['id'];
$batch=$row['batch'];
 $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            

                          if($result14 && mysqli_num_rows($result14) > 0){




?>
<li><a href="studentresult2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Term Result </button></a></li>													
<li><a href="studentresult_final2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Final Result </button></a></li>													
<?php } ?>


<?php 

$dad=$row['fname'];
$fcnic=$row['fcnic'];
 $query9 = "SELECT * FROM `parent` WHERE `dad`= '$dad' AND `fcnic`= '$fcnic' ";
                          $result14 = mysqli_query($link, $query9);
            

                          if($result14 && mysqli_num_rows($result14) < 1){

?>

<li><a href="addparent.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Add Parent Account</button></a></li>  <?php } ?>


<?php 

$id=$row['id'];
$batch=$row['batch'];
 $query9 = "SELECT * FROM `fee` WHERE `studentid`= '$id'  ";
                          $result14 = mysqli_query($link, $query9);
            

                          if($result14 && mysqli_num_rows($result14) > 0){




?>
<li><a href="feehistory2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Fee History </button></a></li>													
												
<?php } ?>




<li><a href="deletestudent2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Delete </button></a></li>

                                                </ul>
                                            </div>



</form>

</td>

                          </tr>
                          <?php   $count++; }?>
                        </tbody>

                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     

     <?php include 'php/footer.php.inc'; ?>
 <!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 <?php include 'script.php'; ?>
 	
  </body>
</html>
