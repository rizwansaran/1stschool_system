

<?php
require 'php/db.php';

 $error = "";
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receive fee!</title>
    <?php include 'php/head.php.inc'; ?>




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
                <h3>Fee Collection</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <!-- start form for validation -->
  <?php
 if (!isset($_GET['id'])) { ?>
                    <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                     
                      <div class="row"?>
                        <div class="col-md-6">
                      <select id="class" class="form-control" name="id" style="width:100%;" >

 <option value="">Select Student </option>
<?php

  $query11 = "SELECT * FROM `student` WHERE `status`='Active' ORDER BY fullname ASC ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];
$stfname= $row11['fname'];


?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname;?> S/D/O <?php echo $stfname;?></option>
                     <?php }?>  
                      </select>
  </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->
 <?php 
}


 if (isset($_POST['id']) ) {
 $sid = $_POST['id']; 
}
else if (isset($_GET['id']) ) {
 $sid = $_GET['id']; 
}
if (!empty($sid)) {
 $id=$sid;

$_SESSION["std_id"]=$id;

 //$period = $_GET['feemonth']; 

 $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                       
                        <div class="row">
 <div class="col-md-3"><h4><b>Admission #:</b> <?php echo $student['id'];?></h4></div>
                          <div class="col-md-3"><h4><b>Name:</b> <?php echo $student['fullname'];?></h4></div>
                          <div class="col-md-3"><h4><b>Father name:</b> <?php echo $student['fname'];?></h4></div>
                          <div class="col-md-3"><h4><b>Class:</b> <?php echo $student['class'];?></h4></div>
                        </div>
                       <br>
<?php } ?>
                         


<div class="row">
<div class="col-md-3 col-lg-3 col-sm-4 col-sm-4 col-xs-4">

  <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 
<th class="column-title col-md-3 col-lg-3 col-sm-4 col-sm-4 col-xs-4"style="text-align:center; border: 1px solid #dddddd;">Fee Periods </th>

                                                                     
                         </tr>
                        </thead> </table>

</div>

<div class="col-md-9 col-lg-9 col-sm-8 col-sm-8 col-xs-8">

  <table id="example" class="table table-striped jambo_table bulk_action">
             
                        <thead>   
<tr class="headings"> 

 <th class="column-title col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4"style="text-align:center; border: 1px solid #dddddd;">Fee Type </th>


                           
    <th class="column-title col-md-5 col-lg-5 col-sm-4 col-sm-4 col-xs-4"style="text-align:center; border: 1px solid #dddddd;">Amount </th>
                                                                        
                         </tr>
                        </thead> </table>

</div>
</div>

<div class="row">
<div class="col-md-3 col-lg-3 col-sm-4 col-sm-4 col-xs-4">

 <table class="table table-striped jambo_table bulk_action" >

<form method="post" name="form1">


  <?php
//$id="S0024-23";
    $query1 = "SELECT DISTINCT feemonth,year FROM `chalan` WHERE `student_id`='$id' AND  NOT EXISTS (SELECT * FROM fee  WHERE chalan.feemonth = fee.feemonth AND chalan.year = fee.feeyear AND fee.tamount-fee.amount='0') ORDER BY id ASC";
    $result1 = mysqli_query($link, $query1);
   
    while($row1 = mysqli_fetch_array($result1)) {
      $feemonth = $row1['feemonth'];
      $year = $row1['year'];



$month_number=$feemonth;


if($month_number=='1'){

$month="January";


}
else if($month_number=='2'){

$month="February";


}
else if($month_number=='3'){

$month="March";


}
else if($month_number=='4'){

$month="April";


}
else if($month_number=='5'){

$month="May";


}
else if($month_number=='6'){

$month="June";


}
else if($month_number=='7'){

$month="July";


}
else if($month_number=='8'){

$month="August";


}
else if($month_number=='9'){

$month="September";


}
else if($month_number=='10'){

$month="October";


}
else if($month_number=='11'){

$month="November";


}
else if($month_number=='12'){

$month="December";


}






  ?>



  <tr>
    <td>
      <input type="checkbox" id="showData" name="checkboxList[]"  value="<?php echo $month_number; ?>-<?php echo $year; ?>"> 
      <?php echo $month; ?> - <?php echo $year; ?>
    </td>
 </tr>
  <?php } ?>

</form>
</table>
</div>

<div class="col-md-9 col-lg-9 col-sm-8 col-sm-8 col-xs-8">

 <table id="fee_table" class="table table-striped jambo_table bulk_action">
 
</table>  
 </div>
</div>
 


 <form method="post" action="fee_collect_action.php">
<input type="hidden"  name="student"  value="<?php echo $id; ?>"> 

<input type="hidden"  name="class"  value="<?php echo $student['class'];?>"> 



<div class="table-responsive">
 <table id="total_fee" class="table table-striped jambo_table">
 
         
</table>  
    </div>
                        
      </form>                
  



<script>
    $("input[type=checkbox]").on("change", function () {
        var ids = [];
        $('input[type=checkbox]:checked').each(function () {
            ids.push($(this).val());
        });
        $.ajax({
            url: "test.php",
            type: "POST",
            async: true,
            cache: false,
            data: ({value: ids}),
            dataType: "text",
            success: function (data) {
              $("#fee_table").html(data);


            }
        });


 $.ajax({
            url: "test_total.php",
            type: "POST",
            async: true,
            cache: false,
            data: ({value: ids}),
            dataType: "text",
            success: function (data) {
              $("#total_fee").html(data);


            }
        });




    });

   
</script>




 
<?php } ?>





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

  

                       




