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
               

                 
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
 <?php if(!isset($_POST['class'])){
                      ?>
                    <form action="" method="post">
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

<h1 style="color:Black; text-align:center; border: 1px solid black;"> Contact List - <?php echo  $class; ?> - <?php echo  $section1; ?> </h1>

                      <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr.# </th>
<th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Id </th>
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Name </th>

                          
                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Father name </th>

                           
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>
                        
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
 

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
                            
                             </tr>
                        </thead>

                        <tbody>
                        <?php $num=1;

                         while($row = mysqli_fetch_array($result1)){



                        ?>
                          <tr class="even pointer">
<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $num; ?></td>

<td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['id']; ?></td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fullname']; ?></td>

			    <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['fname']; ?></td>
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

                          
     <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Date Of Admission </th>                    
 <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Mobile No. </th>
 

                            <th class="column-title"style="text-align:center; border: 1px solid #dddddd;">Parent Mobile No. </th>
      
                          </tr>
                        </thead>

                      </table>
 <?php   } 


?>
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
