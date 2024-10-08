<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All batches!</title>
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
                <h3>Academia <small>All batches</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content"> 
<?php if(!isset($_POST['batch'])){
                      ?>
                    <form action="allbatches.php" method="post">
                  <div class="col-md-6"><div class="row">
                        <select id="batch" class="form-control" name="batch" style="width:50%" >
                        <option value="">Select Batch </option>
<?php

 $query1 = "SELECT DISTINCT batch FROM `student` ORDER BY batch DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['batch'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
 </select>
                  </div></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php } if(isset($_POST['batch'])){
                      ?>
                      <br>
                    <div class="table-responsive">
<?php
                        $batch = $_POST['batch'];
                        $query1 = "SELECT * FROM `student` WHERE `batch`='$batch' AND `status`='Active'";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>
<h2 style="color:red"> No. of Students Found: <?php echo $row1; ?></h2>
                     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">


                     <table id="myTable" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
            <th class="column-title">Sr.#</th>
          <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">File No.</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Name </th>
                           <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Father name </th>
               
 
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Class </th>
                            
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">________ </th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">________ </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                         $batch = $_POST['batch'];
                        $query = "SELECT * FROM `student` WHERE `batch`='$batch'  AND `status`='Active'";
                        $result = mysqli_query($link, $query);
$c=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?> </td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fullname']; ?></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['batch'] . ' - '.$row['class']; ?></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo " "; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo " "; ?></td>
                          </tr>
                          <?php $c++; }?>
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
