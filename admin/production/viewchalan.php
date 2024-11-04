<?php
require 'php/config.php';

if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
               
              </div>
            </div>
            <div class="clearfix"></div>
        
            <div class="row">
              <div class="col-md-12 col-xs-12">
                


<div class="col-md-6" >
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="viewchalan4.php" method="post" enctype="multipart/form-data">
                     <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="">Select Class </option>
<?php
$batch1 = date("n", strtotime("+4 hours"));
$year = date("Y", strtotime("+4 hours"));
 $query1 = "SELECT DISTINCT class FROM `classchalan` WHERE  `feemonth`= '$batch1' AND `year`='$year' ORDER BY class DESC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select>
 </div>
                        
                        <div class="col-md-3" >
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>

                    <!-- end form for validations -->

                    
                       
                        <div class="row">
                          </div>
                       
                    
                        <div class="table-responsive">

                    </div>
                       
                      
                       
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



