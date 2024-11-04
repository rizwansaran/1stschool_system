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
                <img src="<?php echo $_SESSION['picture']; ?>" alt="<?php echo "Upload Picture"; ?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['teachername']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Teacher</h3>
                <ul class="nav side-menu">

                   <li><a href="index.php"><i class="fa fa-edit"></i> Home </a>
                    
                  </li>


                  <li><a><i class="fa fa-calendar"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_attendance.php">Add Attendance</a></li>
                      <li><a href="edit_attendance.php">Edit Attendance</a></li>
                      <li><a href="views_attendance.php">View Attendance</a></li>
                      
                    </ul>
                  </li>
 <li><a><i class="fa fa-table"></i>weekly Test Result <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_res_test.php">Add/Update Result</a></li>
                    
                      <li><a href="views_result_test.php">View Result</a></li>
                    <li><a href="deleteresult_test.php">Delete Result</a></li>
                    </ul>

  
                  </li>
                  
                  <li><a><i class="fa fa-table"></i>Exams Result <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_res.php">Add/Update Result</a></li>
                    
                      <li><a href="views_result.php">View Result</a></li>
                    <li><a href="deleteresult.php">Delete Result</a></li>
                    </ul>

  
                  </li>
                  <li><a><i class="fa fa-calendar"></i>Daily Diary <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                  
                      <li><a href="add_diary.php">Add Diary</a></li>
                      <li><a href="edit_diary.php">Edit Diary</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fas fa-sms"></i> Conversations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="views_conversations.php">View Conversations</a></li>
   <li><a href="new_conversation.php">New Conversation</a></li>
                    </ul>
                  </li>

                   
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>