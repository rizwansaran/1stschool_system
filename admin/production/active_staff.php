<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All staff!</title>
    <?php include 'php/head.php.inc'; ?>
<style>
th,td{
text-align:center; border: 1px solid #dddddd;
}

</style>
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
                <h3>HR <small>All staff</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <div class="table-responsive">

                      <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
 <th class="column-title">Sr.# </th>
 <th class="column-title">ID </th>
 <th class="column-title">Name </th>
                           

                            <th class="column-title">Gender </th>
                            <th class="column-title">Number </th>
                            <th class="column-title">Address </th>
                            <th class="column-title">Class - Section </th>
                            <th class="column-title">Qualification </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Take Action </th>

                           
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        $query = "SELECT * FROM `staff` Where `status`='Active'";
                        $result = mysqli_query($link, $query);
$c=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
<td class=" "><?php echo $c; ?></td>
<td class=" "><?php echo $row['id']; ?></td>
 <td class=" "><?php echo $row['fullname']; ?></td>
                           

                            <td class=" "><?php echo $row['gender']; ?> </td>
                            <td class=" "><?php echo $row['mobile']; ?></td>
                            <td class=" "><?php echo $row['address']; ?></td>
                            <td class=" "><?php echo $row['class']; ?> - <?php echo $row['section']; ?></td>
                            <td class=" "><?php echo $row['qualification']; ?></td>
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
  <li><a href="action_active_staff.php?sid=<?php echo $row['id'];?>&status=<?php echo $status;?>"><button type="submit" class="form-control btn btn-primary">Make <?php echo $status1;?></button></a></li>													
                                                  
<li><a href="updatestaff2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Update </button></a></li>													
<li><a href="views_attendance_monthly2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Monthly Attendance </button></a></li>													

<li><a href="deletestaff2.php?sid=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Delete </button></a></li>

                              </ul>
                                            </div>


                          </tr>
                          <?php $c++; }?>
                        </tbody>
 <thead>
                          <tr class="headings">
<th class="column-title">Sr.# </th>
 <th class="column-title">ID </th>
                            <th class="column-title">Name </th>  
                            <th class="column-title">Gender </th>
                            <th class="column-title">Number </th>
                            <th class="column-title">Address </th>
                            <th class="column-title">Class - Section </th>
                            <th class="column-title">Qualification </th>
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

 <?php include 'script.php'; ?>
  </body>
</html>
