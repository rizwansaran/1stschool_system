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

 <!-- start form for validation -->
 <?php if(!isset($_POST['submit'])){
                      ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     
                      <div class="row"?>
                        <div class="col-md-6">
                      <select id="class" class="form-control" name="t_id" style="width:100%;" >

 <option value="">Select Teacher</option>
<?php

  $query11 = "SELECT * FROM `staff` WHERE `status`='Active' ORDER BY fullname ASC ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];



?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname;?> </option>
                     <?php }?>  
                      </select>
  </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                          <button type="submit" name="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->





                    <?php } if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                    


                        <table class="table table-striped jambo_table bulk_action">
                      <?php
$c=1;
$t_id = $_POST['t_id'];
$query12 = "SELECT * FROM `staff` WHERE `id`='$t_id' ";
                        $result12 = mysqli_query($link, $query12);
                       $res1 = mysqli_fetch_array($result12);
$querya = "SELECT * FROM `subject` WHERE `t_id`='$t_id'";
                        $result = mysqli_query($link, $querya);
                          ?>
  
 <h2 style="color:red;">Teacher Name: <?php echo $res1['fullname']; ?></h2>
                 <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center;" >Sr.# </th>

 <th class="column-title" style="text-align:center;" >Classes </th>
     <th class="column-title" style="text-align:center;" >Section </th>
                           
                           
                            <th class="column-title" style="text-align:center;" >Subjects </th>
                            </tr>
                        </thead>
                        <?php


                          while($res = mysqli_fetch_array($result)){
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
 <td class=" " style="text-align:center;" ><?php echo $c; ?></td>
<td class=" " style="text-align:center;" ><?php echo $res['class']; ?></td>
                            </td>
<td class=" " style="text-align:center;" ><?php echo $res['section']; ?></td>
                            </td>
                          
                         
                            <td class=" " style="text-align:center;" ><?php echo $res['subject']; ?></td>
                            </td>
                          </tr>

                            
                          <?php $c++; }?>
 
                        </tbody>
  
                      </table>
 
                    </div>
                  

                          <?php  }?>
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
  </body>
</html>