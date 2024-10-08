<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
    <?php include 'php/head.php.inc'; ?>
<style>
th,td{
text-align:center; border: 1px solid #dddddd;
}

</style>
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
                <h3>View Salary </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="index.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                    
                       	 <?php 
 
          						 
                         
                          $querys = "SELECT * FROM `salary` ";
                            $result1 = mysqli_query($link, $querys);
if(mysqli_num_rows($result1)>0){
?>
      <h2>Salary</h2><hr>
                            <thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center;">Staff ID</th>
                           
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Salary</th>
                            <th class="column-title" style="text-align:center;">Year</th>
                            
                            
                          </tr>
                        </thead>
                       	
<?php 
 while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['t_id'];
$salary=$r['salary'];
 $year=$r['year'];

  						
                        $queryst = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $result = mysqli_query($link, $queryst);
 $r1 = mysqli_fetch_array($result);
                       
                         ?>
                            
                        <tbody>  
                          <tr class="even pointer">
<td class=" " style="text-align:center;"><?php echo $t_id;?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $r1['fullname'];?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $salary;?>
                            </td>

                            

                            
                            <td class=" " style="text-align:center;color:red;"><?php echo $year;?></td>
                           



                          </tr>

                         
                        </tbody>
                           <?php
                          
                            }}
else{

echo "Nothing was found in database";
}
?>
                      </table>
                    </div>
                      
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Done</button>
                       </form>
                      
                     </div>
                  	 </div>
                  
                   
                      <br>
                    
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
