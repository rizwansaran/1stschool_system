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
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
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

 <h3>Academia <small>Contact list Female Students</small></h3>

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

                       
                        $query1 = "SELECT * FROM `student` WHERE `status`='Active' AND `gender`='F' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>


                      <table id="myTable" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.# </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>

                          
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>
                        
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
 

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
                            
                             </tr>
                        </thead>

                        <tbody>
                        <?php $num=1;

                        $query = "SELECT * FROM `student` WHERE `status`='Active' AND `gender`='F'";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){



                        ?>
                          <tr class="even pointer">
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $num; ?></td>

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fullname']; ?></td>

			    <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['class'] . ' - '.$row['batch']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $dat2= $row['admission_date']; /* echo date("d-m-Y", strtotime($dat2)); */?></td>
 
                            
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['mobile']; ?></td>


           <?php $f= $row['fname'];
 $m= $row['fcnic'];
                        $query2 = "SELECT * FROM `parent` WHERE `dad`='$f' AND `fcnic`= '$m' ";
                        $result2 = mysqli_query($link, $query2);
                       $row2 = mysqli_fetch_array($result2);
                        ?>                 
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row2['mobile']; ?></td>
                          
 






          
       
                          </tr>
                          <?php   $num++;  } 


?>
                        </tbody>
<thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.# </th>

 <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>

                          
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Class </th>
     <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>                    
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
 

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
      
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
