<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>update Salary</title>
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
                <h3> Salary Report:  <b style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></b> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

           
             
                <div class="x_panel">

                  <div class="x_content">

                     <div class="col-md-12 col-sm-12 col-xs-12">  <div class="row">   	
 <div class="col-md-5 col-sm-5 col-xs-12">
     
     
     
   <?php 
 
     $count=1;     						 
                         
                          $querys ="SELECT * FROM `staff` WHERE  `status`='Active'"; 
                            $result1 = mysqli_query($link, $querys);
                           if(mysqli_num_rows($result1) > 0) {

 
                         ?>  
     
              
 <form id="demo-form" data-parsley-validate action="action_salary1.php" method="post" enctype="multipart/form-data">
                <div class="pull-right">
                          <button align="right" type="submit" name="submit" class="btn btn-primary form-control">Update</button> <br><br> 
                  </div>
           <hr> 
          
            
<table class="table table-striped jambo_table bulk_action">
                        
                          
                            <thead>
                          <tr class="headings">
                           
                            <th class="column-title" style="text-align:center;"> Sr. #</th>
                            <th class="column-title" style="text-align:center;"> Staff Name </th>
                            <th class="column-title" style="text-align:center;"> New Salary </th>
                            
                            
                          </tr>
                        </thead>
 <tbody>  
                          <tr class="even pointer">

                    
 <?php 
            while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['id'];


  						
                        $queryst = "SELECT * FROM `salary` WHERE `t_id`='$t_id' ";
                        $result = mysqli_query($link, $queryst);
 $row = mysqli_fetch_array($result);
                        ?>

                            
                                       
                <td class=" " style="text-align:center;"><?php echo $count;?></td>
                            <td class=" " style="text-align:center;"><?php echo $r['fullname'];?></td>
                            <td class=" " style="text-align:center;">

<input type="text"  name="salary[]"  value="<?php echo $row['salary'];?>" style="width:25%;text-align:center;">             
  <input type="hidden"  name="t_id[]" value="<?php echo $r['id'];?>" >                  	
                             </td>  </tr> 
                            	  <?php
                            	  
                            	  
                            	   $count++;
                           }   ?>                     
 


                </tbody> </table>
                 
                  
                   </form>
                    <?php
                            	  
                             } else {  ?>      
                             
 	<?php
                     	 
          						
          		$count=1;				
                         
                        $query = "SELECT * FROM `staff` WHERE `status`='Active'";
                        $result = mysqli_query($link, $query);

                       
                         ?>


                         <form action="action_salary1.php" method="post">
                        <table class="table table-striped jambo_table bulk_action">
                       
 
                         <hr>
                            <thead>
                          <tr class="headings">
<th class="column-title" style="text-align:center;">Sr.#</th>
                            
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Add Salary</th>
                           
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))


                        {?>
                            
                        <tbody>
                          <tr class="even pointer">
<td class=" " style="text-align:center;"><?php echo $count;?></td>
            <input type="hidden"  name="t_id[]" value="<?php echo $row['id'];?>" maxlength="51"  style="width:25%;text-align:center;">             
                
                            <td class=" " style="text-align:center;"><?php echo $row['fullname'];?></td>
                            <td class=" " style="text-align:center;">
<div class="input-box fullname">
<input type="number"  name="salary[]" value="" maxlength="10"  style="width:25%;text-align:center;">             
          </div>                                       
                         	
                             </td>
                            
                           
                              </tr>

                         
                        </tbody>
                           <?php
                          
                         $count++;   }?>
                      </table>
                    </div>
                       <div class="form-group">
                       <button type="submit" class="form-control btn btn-primary pull-right" style="width:15%;">Add</button>
                  
                       </form>
 
 
                   
                    <?php
                            	  
                             }   ?>      
                             

</div>
  <div class="col-md-1 col-sm-1 col-xs-12">  </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">

                     <div class="table-responsive">

                     	


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
<?php 
 
          						 
    $count=1;         
       $queryst = "SELECT * FROM `staff` WHERE `status`='Active'";
                        $result1 = mysqli_query($link, $queryst);
                         
if(mysqli_num_rows($result1)>0){
?>
 <h2 align="center">Salary Report</h2><hr>
                            <thead>
                          <tr class="headings">
 
 <th class="column-title" style="text-align:center;">Sr.#</th>
                           
                            <th class="column-title" style="text-align:center;">Staff Name</th>
                            <th class="column-title" style="text-align:center;">Salary</th>
                            <th class="column-title" style="text-align:center;">Year</th>
                            
                            
                          </tr>
                        </thead>
                       	
                       	
 
<?php
 while( $r = mysqli_fetch_array($result1))
                        {
                           
                            
 $t_id=$r['id'];


  				 $querys = "SELECT * FROM `salary` WHERE `t_id`='$t_id' ";
                            $result = mysqli_query($link, $querys);		
                     
 $r1 = mysqli_fetch_array($result);
 $salary=$r1['salary'];
 $year=$r1['year'];
                       
                         ?>
                                                    
                        <tbody>  
                          <tr class="even pointer">
<td class=" " style="text-align:center;"><?php echo $count;?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $r['fullname'];?></td>
                            
                            <td class=" " style="text-align:center;"><?php echo $salary;?>
                            </td>

                            

                            
                            <td class=" " style="text-align:center;color:red;"><?php echo $year;?></td>
                           



                          </tr>

                         
                        </tbody>
                           <?php
                          $count++;
                           } }?>
                      </table>
                    </div>
                      
  
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
