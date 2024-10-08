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

 <h3>Academia <small>All students</small></h3>

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
<h2 style="color:red"> No. of Students Found: <?php echo $row1; ?></h2>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">


                      <table id="myTable" class="table table-striped jambo_table bulk_action">
             
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
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Login name </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Password </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Picture </th>

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
                           
                           <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['login']; ?></td>
                      
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['password']; ?></td>
<td class=" "style=" border: 1px solid #dddddd;"><img src="<?php echo $row['picture']; ?>" class="" width='80' height='60'></td>
 
                    
 


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
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Login name </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Password </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Picture </th>
 
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

  </body>
</html>
