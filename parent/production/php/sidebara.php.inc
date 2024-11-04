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
            <?php $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$abri= $row['abri'];
$image= $row['logo'];
?>
 <a href="index.php" class="site_title"><img src="<?php echo $image;?>"  width="60" height="50"> <span><?php echo $abri;?>IS.</span></a>   
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['image2']; ?>" alt="<?php echo "Upload Picture"; ?>" class="img-circle profile_img" >
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['dad']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Parent</h3>
                <ul class="nav side-menu">


                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>