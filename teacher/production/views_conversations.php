<?php 
require 'php/config.php';





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Conversations</title>
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
                <h3>All Conversations </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <div class="col-md-12">

                    <div class="row">


                     <div class="table-responsive">

                     	<?php
                     	 
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM `conversation` WHERE `teacherid`='$id'";
                        $result = mysqli_query($link, $query);
                        if($result && mysqli_num_rows($result) > 0){
                          
                         ?>


                        
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Student Name</th>

                          
                            
                            
                          </tr>
                        </thead>
                       	<tbody>
                       	 <?php while($row = mysqli_fetch_array($result))
                        {

                          $stdid = $row['studentid'];
                          $sql = "SELECT * FROM `student` WHERE `id`= '$stdid' AND `status`='Active'";
                          $res = mysqli_query($link, $sql);
                          $student = mysqli_fetch_assoc($res);
                          
                        ?>
                            
                        
                          <tr class="even pointer">
                             <td class=" " style="text-align:center;color:green;"><a href="conversation.php?id=<?php echo $student['id']; ?>"><?php echo $student['fullname']; ?></a></td>
                          </tr>
                        <?php }?>
                         
                        </tbody>
                           <?php
                          
                            
                        }?>
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
