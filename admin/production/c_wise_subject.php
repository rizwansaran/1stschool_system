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
                        <div class="col-md-3">
              
                      <label for="class">Class * :</label>
<select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="" selected disabled>Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?>"><?php echo $class?></option>
                     <?php }?>  
                      </select><br/>


                      
  </div>
 <div class="col-md-1">                      
  </div>
                       <br/>
                        <div class="col-md-3">
                          <button type="submit" name="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

 <?php } if(isset($_POST['submit'])){
                      ?>
                   <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     
                      <div class="row"?>
                        <div class="col-md-3">
              
                      <label for="class">Class * :</label>
<select id="class" class="form-control" name="class" style="width:100%;" >

<?php
 $class = $_POST['class'];
?>
   
                    
                        <option value="<?php echo $class?>"><?php echo $class?></option>
                     <?php ?>  
                      </select><br/>


                      
  </div>
 <div class="col-md-1">                      
  </div>
                        <div class="col-md-3">

                      <label for="class">Select Section * :</label>
<select id="class" class="form-control" name="section" style="width:100%;" >

 <option value="" selected disabled>Select Section </option>
<?php
$query1 = "SELECT DISTINCT section FROM `subject` WHERE `class`='$class' ORDER BY section ASC";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$section= $row1['section'];
if($section=='M'){
$section1="Boys";
}
else if($section=='F'){
$section1="Girls";
}
else 
$section1="Both";
?>
   
                    
                        <option value="<?php echo $section?>"><?php echo $section1?></option>
                     <?php }?>  
                      </select>

                      </div>  <br/>
                        <div class="col-md-3">
                          <button type="submit" name="submit1" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->




                    <?php } if(isset($_POST['submit1'])){
                      ?>
                      
                    <div class="table-responsive">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">


                      <table id="myTable" class="table table-striped jambo_table bulk_action">   
<?php
$c=1;
 $class = $_POST['class'];
$section = $_POST['section'];
$query = "SELECT * FROM `subject` WHERE `class`='$class' AND `section`='$section' ";
                        $result = mysqli_query($link, $query);
if(mysqli_num_rows($result)<1){
echo "No Record Found";}
else{

                          ?>
  <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center;" >Sr.# </th>

 <th class="column-title" style="text-align:center;" >Teacher Name: </th>
     
 <th class="column-title" style="text-align:center;" >Classes </th>
     <th class="column-title" style="text-align:center;" >Section </th>
                           
                           
                            <th class="column-title" style="text-align:center;" >Subjects </th>
                            </tr>
                        </thead>
                        <?php


                          while($res = mysqli_fetch_array($result)){
                      
$t_id=$res['t_id'];
                      
   $query = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $result1 = mysqli_query($link, $query);

                       $res1 = mysqli_fetch_array($result1);

                            ?>
                            
                        <tbody>
                          <tr class="even pointer">

                <td class=" " style="text-align:center;" ><?php echo $c; ?></td>
<td class=" " style="text-align:center;" ><?php echo $res1['fullname']; ?></td>

<td class=" " style="text-align:center;" ><?php echo $res['class']; ?></td>
                            
<td class=" " style="text-align:center;" ><?php echo $res['section']; ?></td>
                           
                          
                         
                            <td class=" " style="text-align:center;" ><?php echo $res['subject']; ?></td>
                            </td>
                          </tr>

                            
                          <?php  $c++; }}?>
 
                        </tbody>
  
                      </table>
 
                    </div>
                    <?php
                    ?>

                          <?php } ?>
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
