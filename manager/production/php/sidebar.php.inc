<?php

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired!";
 header('location:login.php');
        }
?>

<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
<?php $query11 = "SELECT * FROM `insti_name` ";
                       $result11 = mysqli_query($link, $query11);
                      
                        $row1 = mysqli_fetch_array($result11);
$name= $row1['full_name'];
$abri= $row1['abri'];
$image= $row1['logo'];
?>
              <a href="index.php" class="site_title"><img src="<?php echo $image;?>"  width="30" height="30"> <span><?php echo $abri;?>IS.</span></a>   
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['picture']; ?>" alt="<?php echo "Upload Picture"; ?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Manager and Controller</h3>
                <ul class="nav side-menu">
 
 <li><a><i class="fa fa-desktop"></i> Access Control <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="access.php">Grant Access</a></li>
     <li><a href="add_kay.php">Add Serial Key</a></li>                                        

                    </ul>
<li><a><i class="fa fa-desktop"></i> Login Details <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="addadmin.php">Add Admin</a></li>
     <li><a href="alladmin.php">Admin logins</a></li>                                        
 <li><a href="allstaff.php">Staff logins</a></li>                                        
 <li><a href="allstudents.php">Students logins</a></li>                                        

                    </ul>
                  </li>
                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>