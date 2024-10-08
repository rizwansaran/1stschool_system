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
                       
                        $query1 = "SELECT * FROM `student`";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>

                      <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

                         <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">File No.</th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
                           
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father CNIC No. </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
                            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Gender </th>
<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date of Birth </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Address </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Take Action </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php 

                        $query = "SELECT * FROM `student`";
                        $result = mysqli_query($link, $query);
$count=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>

<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                          <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fullname']; ?></td>
                            

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['mobile']; ?></td>

			    <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fcnic']; ?></td>

           <?php $f= $row['fname'];
 $m= $row['fcnic'];
                        $query2 = "SELECT * FROM `parent` WHERE `dad`='$f' AND `fcnic`= '$m' ";
                        $result2 = mysqli_query($link, $query2);
                       $row2 = mysqli_fetch_array($result2);
                        ?>                 
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row2['mobile']; ?></td>
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['gender']; ?> </td>
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php  $dddate= $row['dob'];  echo date("d-m-Y", strtotime($dddate)); ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $dat2= $row['admission_date']; /* echo date("d-m-Y", strtotime($dat2)); */?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['address']; ?></td>
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
                                                
        Select Proper Action
   <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
  <li><a href="action_active.php?sid=<?php echo $row['id'];?>&status=<?php echo $status;?>"><button type="submit" class="form-control btn btn-primary">Make <?php echo $status1;?></button></a></li>													
                                                  
<li><a href="updatestudent2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Update </button></a></li>													

<li><a href="addfee2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Receive Fee</button></a></li>													
<li><a href="feehistory2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Fee History</button></a></li>


<?php
$id=$row['id'];
$batch= date("n");
                         $query11 = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch'";
                       $result11 = mysqli_query($link, $query11);
                       if(mysqli_num_rows($result11) <1){
 
       $row2 = mysqli_fetch_array($result2);
echo  $row2['studentid'];

                        ?>
<li><a href="abc2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Genrate Chalan</button></a></li>													

<?php 
} 
else if(mysqli_num_rows($result11) >0)
 { ?>

<li><a href="studentchalan32.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Print Chalan</button></a></li>

<?php 
}
$id=$row['id'];
$batch=$row['batch'];
 $query9 = "SELECT * FROM `result` WHERE `studentid`= '$id' AND `year`= '$batch' ";
                          $result14 = mysqli_query($link, $query9);
            

                          if($result14 && mysqli_num_rows($result14) > 0){




?>
<li><a href="studentresult2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Term Result </button></a></li>													
<li><a href="studentresult_final2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Final Result </button></a></li>													
<?php } ?>																										
<li><a href="deletestudent2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Delete </button></a></li>

                                                </ul>
                                            </div>



</form>

</td>

                          </tr>
                          <?php   $count++; }?>
                        </tbody>
<thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
                           
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father CNIC No. </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
                            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Gender </th>
<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date of Birth </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Address </th>
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Take Action </th>
 
                          </tr>
                        </thead>

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
