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
                <img src="<?php echo $_SESSION['image2']; ?>" alt="<?php echo "Upload Picture"; ?>" class="img-circle profile_img">
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

                   <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                    
                  </li>
 <li><a><i class="fa fa-money"></i> Fee History <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="feehistory2.php">Fee History</a></li>
                      
                    </ul>
                  </li>
                 

                  <li><a><i class="fa fa-calendar"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="atd_all.php">Overall</a></li>
                      <li><a href="atd_single.php">Date/Day Wise</a></li>
<?php 
$id=$_SESSION['std_id']; ?>
   <li><a href="views_attendance_monthly_std.php?id=<?php echo $id;?>">Month Wise</a></li>
                      
                    </ul>
                  </li>


                  
                  <li><a><i class="fa fa-table"></i> Result <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="res_all.php">Exams</a></li>
   <li><a href="res_all_test.php">Weekly Test Result</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar-o"></i>Daily Diary <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                  
                      <li><a href="diary_all.php">Subject Wise</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>