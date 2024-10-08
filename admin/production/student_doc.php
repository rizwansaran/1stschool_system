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
                       $student_id=$_GET['id'];
                        $query1 = "SELECT * FROM `student_doc` WHERE `student_id`='$student_id' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>


                     <table id="" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                                       
                        <thead>   
<tr class="headings"> 
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.#</th>

                         
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">B Form </th>


 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father CNIC </th>
                           
                            <!--th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Matric Document </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Inter Document  </th>

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">BA Document </th>
                            
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">MA Document </th-->                         </tr>
                        </thead>

                        <tbody>
                        <?php 

                        $query = "SELECT * FROM `student_doc` WHERE `student_id`='$student_id' ";
   
                        $result = mysqli_query($link, $query);
$count=1;
                        while($row = mysqli_fetch_array($result)){

$bfrom=$row['bform_image'];
$fcnic=$row['fcnic_image'];
/* $ssc=$row['ssc_image'];
$hssc=$row['hssc_image'];
$ba=$row['ba_image'];
$ma=$row['ma_image']; */
                        ?>

<tr class="even pointer"> <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $count; ?></td>

                       <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($bfrom).'" class="img-responsive"  alt="No Document Uploaded"/>'; ?>	
						       </td>
                            

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fcnic).'" class="img-responsive"  alt="No Document Uploaded"/>'; ?>	
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
           </div> </div>
        <!-- /page content -->

     

     <?php include 'php/footer.php.inc'; ?>
 <!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 	
  </body>
</html>
