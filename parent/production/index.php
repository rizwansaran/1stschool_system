<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>School Management System!</title>
    <?php include 'php/head.php.inc'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebara.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <h1 style="margin-left:20px;"><a href ="index.php">Dashboard</h1></a><hr>
            </div>
          
          <!-- /top tiles -->

         


            
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Welcome to the Parent Dashboard</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="text-align:center;">

                      

                        
                        <table class="table table-striped jambo_table bulk_action">
                        
                         
                            <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align:center;">Student Name</th>
                            <th class="column-title" style="text-align:center;">Class </th>
                            <th class="column-title" style="text-align:center;">Detials </th>
                            
                          </tr>
                        </thead>
                        <?php
                       $f_name=$_SESSION['dad'];
                       $m_name=$_SESSION['fcnic'];
                      $query = "SELECT * FROM `student` WHERE `fname`='$f_name' AND `fcnic`='$m_name' AND `status`='Active'";
                      $result = mysqli_query($link, $query);
                      while($res = mysqli_fetch_array($result)){
 $_SESSION['std_id']=$res['id'];



                      ?>

                        <tbody>
                          <tr class="even pointer">
                            <td class=" " style="text-align:center;"> <?php echo $res['fullname'];?></td>
                            <td class=" " style="text-align:center;"> <?php echo $res['class'];?></td>
                            <td class=" " style="text-align:center;"> <a href="dashboard.php?id=<?php echo $res['id'];?>"> <button type="button" class="form-control btn btn-primary">View</button></a></td>
                            
                           </tr>
                          
                        </tbody>
                        <?php }?>
                      </table>
                      

                        

                        

                    </div>
                  </div>
                </div>
                <!-- End to do list -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
