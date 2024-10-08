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
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Profile</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
 <?php
   $id= $_SESSION['adminname'];
                        $query = "SELECT * FROM `admin` WHERE `name`= '$id'";
                        $result = mysqli_query($link, $query);
                       $row = mysqli_fetch_array($result);
                        ?>
                                		         <img src="<?php echo $row['picture'];?>" class="img-responsive" width="60" height="60"  alt="<?php echo $row['name']; ?>"/>	
						       
					
						        </div>
								
								
                                    </div>

<table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Registration Number</td>
                                                <td><b><?php echo $row['id']; ?></b></td>
                                             
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Name</td>
                                                <td><b><?php echo $row['name']; ?></b></td>
                                                
                                            </tr>
                                          </tbody>
                                    </table>
                  </div>
                </div>
            


            

                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">
                        <h2 style="color:red"><?php error_reporting(0); echo $_GET['msg']; ?></h2>
 
                           <h3>Update display picture</h3>
                               <li>
			                    <form id="demo-form" data-parsley-validate action="uploadimage.php" method="post" enctype="multipart/form-data">
 <input type="hidden" name="staff" value="<?php echo $_SESSION['id']; ?>">
                   
                      <label for="image">Picture * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="image" data-parsley-trigger="change" required />
 <br>
                      <button type="submit" name="submit" class="btn btn-primary">Upload</button>

                    </form>
				
                             </li>
<h3>Update login password</h3>
<li>

			                    <form action="new_pw.php" method="POST">
								<div class="form-group">
                                <label for="exampleInputEmail1">Enter new password</label>
                                <input type="password" id="password" class="form-control" name="pass1" required placeholder="Enter new password">
                                </div>
								
								<div class="form-group">
                                <label for="exampleInputEmail1">Confirm new password</label>
                                <input type="password" id="confirm_password" class="form-control" name="pass2" required placeholder="Confirm new password">
                                </div>
								<button type="submit" class="btn btn-primary">Change Password</button>
								<script>
	                                        var password = document.getElementById("password")
                                           , confirm_password = document.getElementById("confirm_password");

                                           function validatePassword(){
                                            if(password.value != confirm_password.value) {
                                           confirm_password.setCustomValidity("Passwords Don't Match");
                                           } else {
                                           confirm_password.setCustomValidity('');
                                            }
                                               }

                                            password.onchange = validatePassword;
                                            confirm_password.onkeyup = validatePassword;
                                 </script>
								</form>
				 </li>					

                          </li>
                           </ul>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End to do list -->
             
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
