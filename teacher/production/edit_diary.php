<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SubjectWise Diary</title>
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
                <h3>Edit Diary</h3>
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

                     	<?php
          						 $tid=$_SESSION['id'];
                      
                        $query = "SELECT * FROM `diary` WHERE `t_id`='$tid'";
                        $result = mysqli_query($link, $query);
                        

                       
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                         <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2> <hr>
                            <thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center;">Class</th>
   <th class="column-title" style="text-align:center;">Section</th>
                          
                            <th class="column-title" style="text-align:center;">Subject Name</th>
                            <th class="column-title" style="text-align:center;">Posted Date</th>
                            <th class="column-title" style="text-align:center;">Due Date</th>
                            <th class="column-title" style="text-align:center;">Details</th>
                            <th class="column-title" style="text-align:center;" >Action</th>
                            
                            
                            
                          </tr>
                        </thead>
                       	
                       	 <?php while($row = mysqli_fetch_array($result))
                        {

$d_id= $row['id'];
                          $section=$row['section'];
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
                          ?>
                         <tbody>
                          <tr class="even pointer">
<td class=" " style="text-align:center;"><?php echo $row['class']?></td>

 <td class=" " style="text-align:center;"><?php echo $section1?></td>
                                                       
                            <td class=" " style="text-align:center;"><?php echo $row['subject']?></td>
                            <td class=" " style="text-align:center;"><?php echo $row['p_date']?></td>
<td class=" " style="text-align:center;"><?php echo $row['d_date']?></td>
<td class=" " style="text-align:center;"><?php echo $row['text']?></td>
                            <td class=" " style="text-align:center;"><a href="update_diary.php?id=<?php echo $d_id;?>"><button type="button" class="form-control btn btn-primary">Update</button></a></td>
                          
                            
                         
                          </tr>

                         
                        </tbody>
                           <?php
                          
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
