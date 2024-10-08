<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
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
                <h3>Add Salary: </h3>
              
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="action_salary1.php" method="post">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
          						
          						
                         
                        $query = "SELECT * FROM `staff` WHERE `status`='Active'";
                        $result = mysqli_query($link, $query);
  $count=1;  
                       
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                        <h2 >Salary: <b style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></b></h2>
 
                         <hr>
                            <thead>
                          <tr class="headings">
                              <th class="column-title" style="text-align:center;">Sr.#</th>
<th class="column-title" style="text-align:center;">Staff ID</th>
                            
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Add Salary</th>
                           
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))


                        {?>
                            
                        <tbody>
                          <tr class="even pointer">
                              <td class=" " style="text-align:center;"><?php echo  $count;?></td>
<td class=" " style="text-align:center;"><?php echo $row['id'];?></td>
                    
                
                            <td class=" " style="text-align:center;"><?php echo $row['fullname'];?></td>
                            <td class=" " style="text-align:center;">
<div class="input-box fullname">
<input type="number"  name="salary[]" value="" maxlength="5"  style="width:25%;text-align:center;">             
      <input type="hidden"  name="t_id[]" value="<?php echo $row['id'];?>" >     
          </div>                                       
                         	
                             </td>
                            
                           
                              </tr>

                         
                        </tbody>
                           <?php
                             $count++;  
                           $sid[]=$row['id'];
                         
                           $_SESSION['sid'] = $sid;
                            }?>
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
