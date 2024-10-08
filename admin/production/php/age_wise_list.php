<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All classes!</title>
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
                <h3>Academia <small>All classes</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
   <?php if(!isset($_POST['age_from'])){
                      ?>
                    <form action="" method="post">
                 <div class="row"> <div class="col-md-3">
                     <label> Age From : <label>
                        <select id="class" class="form-control" name="age_from" style="width:100%;" >
<?php
for($i=1;$i<16;$i++){


?>

 <option value="<?php echo date('Y')-$i; ?>-<?php echo date('m');?>-<?php echo date('d');?>"><?php echo "$i Years";?></option>

                    <?php } ?>
                      </select>
 </div>

<div class="col-md-3">
     <label> Age To : <label>
                        <select id="class" class="form-control" name="age_to" style="width:100%;" >
<?php
for($i=1;$i<31;$i++){


?>

 <option value="<?php echo date('Y')-$i ?>-<?php echo date('m')?>-<?php echo date('d')?>"><?php echo "$i Years"?></option>

                    <?php }?>
                      </select>
 </div>


                  <div class="col-md-1"></div>
                  <div class="col-md-2">
       
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php } if(isset($_POST['age_from'])){
                      ?>
                      <br>
                    <div class="table-responsive">
<?php
                      $age_from = $_POST['age_from'];
  $age_to = $_POST['age_to'];
                        $query1 = "SELECT * FROM `student` WHERE   `dob` BETWEEN '$age_to' AND '$age_from'  ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>

                      <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
            <th class="column-title">Sr.#</th>
            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Admission No.</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Name </th>
                           <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Father name </th>
               
 
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Class </th>
                            
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Date of Birth </th>
                              <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Mobile #</th>
                      
   <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Address</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        //$class = $_POST['class'];
                        $query = "SELECT * FROM `student` WHERE  `status`='Active' AND `dob` BETWEEN '$age_to' AND '$age_from' ";
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
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['dob']; ?></td>
                           <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['mobile']; ?></td>
                           
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['address']; ?></td>
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

 <?php include 'script.php'; ?>
  </body>
</html>
