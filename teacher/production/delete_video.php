<?php
require 'php/config.php';

 ?>
<!DOCTYPE html>

<html lang="en">
 
 <head>
    
<title></title>
   
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
 
               <h3>Delete Notices <small>Subject wise!</small></h3>
  
            </div>
            </div>

         
   <div class="clearfix"></div>

          
  <div class="row">
             
 <div class="col-md-12 col-sm-12 col-xs-12">
    
            <div class="x_panel">

               
   <div class="x_content">

                      
      <div class="table-responsive">
                     
   <?php 
if(isset($_GET['id'])) {
$id=$_GET['id'];
 

 $query3 ="DELETE FROM `videos` WHERE `id`='$id' ";
  
  $result3 = mysqli_query($link, $query3); 
 
if($result3==TRUE){






echo "Record Deleted Successfully...";
?> 
<br>
<br>
<br>
<a href="edit_video.php"><button type="button" style="width:20%" class="form-control btn btn-primary">View video Files</button></a>

<?php


}

else{

echo "Error While deleting!";



}
?>




 



                   </div>
                    <?php
                    }?>
                  </div>
            <br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br>      </div>
              </div>
          
  </div>
       
 </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
