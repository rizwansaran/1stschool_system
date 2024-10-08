<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inactive parents</title>
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
                  <h2 style="color:red"> Update parent - <?php error_reporting(0); echo $_GET['msg']; ?></h2>
           

<?php } else { ?>

 <h3>Academia <small>Inactive staff</small></h3>

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
                       
                        $query1 = "SELECT * FROM `parent` WHERE `status`='Inactive' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>


                      <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">

<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.# </th>

<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>
<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>

<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
                             <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">CNIC </th>
                            
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Status</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        $query = "SELECT * FROM `parent` WHERE `status`='Inactive' ";
                        $result = mysqli_query($link, $query);
$c=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?></td>

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['dad']; ?></td>
                            

<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['mobile']; ?></td>
			 
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fcnic']; ?></td>
                           
                          
                        

<td>      <form action="action_inactive_parent.php" method="POST">
                          <input type="hidden" value="<?php echo $row['id']; ?>" name="student"/>

<?php 
   $status=$row['status']; 
if($status=="Active")  { 

$status1="Inactive";
?>

<input type="hidden" value="Inactive" name="status"/>
<?php } else {

$status1="Active";

?>
 <input type="hidden" value="Active" name="status"/> <?php }?>

<div class="btn-group" role="group" >
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                 Currently <?php echo $row['status']; ?>
   <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    
													
<li>   <button type="submit" class="form-control btn btn-primary">Make <?php echo $status1;?></button>   </li>
													

                                                </ul>
                                            </div>



</form>

</td>
          
          

                          </tr>
                          <?php $c++; }?>
                        </tbody>
<thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.# </th>

<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>

<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>


<th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
                            
                              
                             <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">CNIC </th>
                            
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Status</th>
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
