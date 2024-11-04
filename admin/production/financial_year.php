<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['submit'])){
    $year_name = $_POST['year_name'];
    $start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$installments = $_POST['installments'];

     $query1 = "SELECT * FROM `financial_year` WHERE `year_name`='$year_name' ";
                        $result1 = mysqli_query($link, $query1);
 if(mysqli_num_rows($result1) > 0){

$error = "Same Financial Year Record Already Exists.....";


}


else {



    
    $query = "INSERT INTO `financial_year`(`year_name`, `year_start_date`, `year_end_date`, `installments`) VALUES ('$year_name','$start_date', '$end_date', '$installments')";
    $result = mysqli_query($link, $query);
    if($result) $error = "Submitted succesfully!";
else
{
$error = mysqli_error($link);
}
}
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Set Financial Year!</title>
    <?php include 'php/head.php.inc'; ?>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                <h3>Ledger</h3>


              </div>
<button type="button" style="width:200px; float:right;" onclick="document.getElementById('id01').style.display='block'" class="form-control btn btn-primary w3-teal"><i class="fa fa-plus"></i> Add New Financial Year</button>
 
                    <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">


                  <div class="x_title">
                    <h2>Financial Year<?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                 
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>

        <h2>Add New Financial Year</h2>
      </header>
      <div class="w3-container">
  
                          <form action="" method="POST">
                          

                            <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h3>Financial Year</h3>
                                <select id="batch" class="form-control" name="year_name" >
                                     <option value="<?php echo date("Y");?> - <?php echo date("Y")+1;?>"><?php echo date("Y");?> - <?php echo date("Y")+1;?></option>
  <?php 

$query2 = "SELECT DISTINCT year_name FROM `financial_year` ";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                     while(  $fe = mysqli_fetch_array($result2)) {
$year_name= $fe['year_name'];
?>

<option value="<?php echo $year_name;?>"><?php echo $year_name;?></option>
<?php


}
}

/*
else {
$dash=" - ";
$a=date("Y");

$b=date("Y")+1;
$year_name=$a.$dash.$b;

?>

<option value="<?php echo $year_name;?>"><?php echo $year_name;?></option>

<?php

}
*/
?>



<!--option value="<?php echo date("Y")-1;?>"><?php echo date("Y")-1;?></option-->
                                
                                  </select>
                                    
                              </div>
                            
                             <div class="col-md-6 col-sm-6 col-xs-12">
                              
                              
<h3>Installments</h3>
 <select id="batch" class="form-control" name="installments" >
                                     <option value="12"><?php echo "Monthly";?></option>
 <option value="4"><?php echo "Quarterly";?></option>
  
 <option value="2"><?php echo "Half Yearly";?></option>
 <option value="1"><?php echo "Yearly";?></option>

<!--option value="<?php echo date("Y")-1;?>"><?php echo date("Y")-1;?></option-->
                                
                                  </select>
                              
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                               
                                                                          <!--input type="hidden" name="registrationfee" value="0" class="form-control"/>
                                                                           <input type="hidden" name="examsfee" value="0"  class="form-control"/-->


<h3>Year Start Date</h3>



<?php 
/*
$query2 = "SELECT DISTINCT teutionfee FROM `chalan` WHERE studentid = '$id'";
                     $result2 = mysqli_query($link, $query2);
                       if(mysqli_num_rows($result2) > 0){
                       $fe = mysqli_fetch_array($result2);
$tfee= $fe['teutionfee'];
}
else {
$tfee="Fee Not Added Yet...!";

}
*/
?>



<input type="date" name="start_date"   class="form-control"/>
 </div>
<div class="col-md-6 col-sm-6 col-xs-12">

<h3>Year End Date</h3>
<input type="date" name="end_date"  class="form-control"/>

                              
      </div>                         
        </div>
                                                   

                            
                        <br>
                             
                             
                             
                                <button type="submit" style="float:right; width:100px;" name="submit" class="form-control btn btn-primary">Submit</button>
                             
                          </form>
                          
                        
<br><br>
      </div>
      
    </div>
  </div>

<div class="table-responsive">

   <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>
                          <tr class="headings">
           
            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Sr. #</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;"> Year Name </th>
                           <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Start Date </th>
               
 
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">End Date </th>
                            
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Status </th>
  <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Installments</th>
                            <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Updated On</th>
    <th class="column-title" style="text-align:center; border: 1px solid #dddddd;">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                       
                        $query = "SELECT * FROM `financial_year` ORDER BY id DESC";
                        $result = mysqli_query($link, $query);
$c=1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $c; ?> </td>
<td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['year_name']; ?> </td>
                            <td class=" " style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['year_start_date']; ?></td>
                             <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['year_end_date']; ?></td>

                            
 <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['status']; ?></td>
                           
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['installments']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid #dddddd;"><?php echo $row['updated_on']; ?></td>
 <td>      
<?php 
   $status=$row['status']; 
if($status=="active")  { 

$status1="Inactive";
 } else {

$status1="Active";


 }?>
<div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                
        --Select Action-- 
   <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
  <li><a href="financial_year.php?sid=<?php echo $row['id'];?>&status=<?php echo $status;?>"><button type="submit" class="form-control btn btn-primary">Make <?php echo $status1;?></button></a></li>													
                                                  
<li><a href="financial_year.php?edit_id=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Update  </button></a></li>													


<li><a href="financial_year.php?delete_id=<?php echo $row['id'];?>"><button type="button" class="form-control btn btn-primary">Delete </button></a></li>

                                                </ul>
                                            </div>



</form>

</td>


                          </tr>
                          <?php $c++; }?>
                        </tbody>
                      </table>




                  
                      
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
