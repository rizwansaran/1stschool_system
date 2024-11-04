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
          
          
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_content">
   <?php if(!isset($_POST['class'])){
                      ?>
                    <form action="allclasses_list.php" method="post">
                  <div class="col-md-4"><div class="row">
                        <select id="class" class="form-control" name="class" style="width:100%;" >
<?php

 $query1 = "SELECT DISTINCT class FROM `student`ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>

                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>
 </div></div>

                  <div class="col-md-1"></div>
<div class="col-md-4"><div class="row">
                        <select id="class" class="form-control" name="section" style="width:100%;" >

                        <option value="M">Boys</option>
                      <option value="F">Girls</option>
  <option value="M+F">Both</option>
                      </select><br/><br/>
 </div></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" class="form-control btn btn-primary">View</button>
                    </div>
                  </div>
                   </form>
                    <?php } if(isset($_POST['class'])){
                      ?>
                      <br>
                    <div class="table-responsive">
<?php
                        $class = $_POST['class'];
$section = $_POST['section'];
if($section=='M+F')
{
$section1="Boy + Girls";
}
else if($section=='M'){
$section1="Boy";
}
else if($section=='F'){
$section1="Girls";
}
if($section=='M+F'){
                        $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
}
else {   $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
}
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_num_rows($result1);

                        ?>
<h2 style="color:Black; text-align:center; border: 1px solid black;"> <?php echo  $class; ?> - <?php echo  $section1; ?></h2>
 
 
                      <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
            <th class="column-title" style="text-align:center; border: 1px solid black;">Sr.#</th>
            <th class="column-title" style="text-align:center; border: 1px solid black;">File No.</th>
                            <th class="column-title" style="text-align:center; border: 1px solid black;">Name </th>
                           <th class="column-title" style="text-align:center; border: 1px solid black;">Father name </th>
               
 
                            
                            <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
                         <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
 <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
   
      </tr>
                        </thead>

                        <tbody>
                        <?php 
$class = $_POST['class'];
$section = $_POST['section'];
if($section=='M+F'){
                        $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
}
else {   $query = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
}
$result = mysqli_query($link, $query);
$c=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid black;"><?php echo $c; ?> </td>
<td class=" "style="text-align:center; border: 1px solid black;"><?php echo $row['id']; ?> </td>
                            <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $row['fullname']; ?></td>
                             <td class=" "style="text-align:center; border: 1px solid black;"><?php echo $row['fname']; ?></td>

                            
                           
                            <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
                               <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
   <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
                            
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
