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
                <h2><?php echo $_SESSION['adminname']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin</h3>
                <ul class="nav side-menu">
 <li><a><i class="fa fa-edit"></i> Insitution Details <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

             <li><a href="institution.php">Add Details</a></li>
          
                          </ul>
                    
                  </li>
                    </li>
 <li><a><i class="fa fa-desktop"></i> Access Control <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="access.php">Result Adding Access</a></li>
                                            
<li><a href="access_single.php">Attendance Adding Access</a></li>
                    </ul>
                  </li>
                 
 <li><a><i class="fa fa-edit"></i> Student Subjects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="addsubjects.php">Add Subjects</a></li>
 <li><a href="edit_subject.php">Update Subjects</a></li>                                           
<li><a href="deletesubject.php">Delete Subjects</a></li>
                    </ul>
                  </li>      
                  <li><a><i class="fa fa-edit"></i> Academics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      
                      <li><a href="addstudent.php">New Student</a></li>
                      <li><a href="updatestudent.php">Update Student</a></li>
                      <li><a href="allstudents.php">All Students</a></li>
                      <li><a href="allbatches.php">All Batches</a></li>
                      <li><a href="allclasses.php">All Classes</a></li>
                      <li><a href="addparent.php">Add Parents Account</a></li>
                 <li><a href="deletestudent.php">Delete Student</a></li>
                
   </ul>
                    
                  </li>
                  <li><a><i class="fa fa-desktop"></i> HR <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="newstaff.php">New Staff</a></li>
                      <li><a href="updatestaff.php">Update Staff</a></li>
                      <li><a href="updateclass.php">Update Class</a></li>
                      <li><a href="allstaff.php">All Staff</a></li>
 <li><a href="deletestaff.php">Delete Staff</a></li>
                   
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Result <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="studentresult.php">Student Result</a></li>
                                            
<li><a href="classwiseresult.php">Class Wise</a></li>
                      <li><a href="previousresult.php">Previous Results</a></li>
                    </ul>
                 
                 
                  <li><a><i class="fa fa-bar-chart-o"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addinventory.php">Brought Something</a></li>
                      <li><a href="allinventory.php">All items</a></li>
                    </ul>
                  </li>
<li><a><i class="fa fa-desktop"></i>Staff Attendance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="add_attendance.php">Add Staff Attendance</a></li>
 <li><a href="edit_attendance.php">Edit Staff Attendance</a></li>
 <li><a href="views_attendance.php">View Staff Attendance</a></li>

    </ul>
                  </li>
<li><a><i class="fa fa-desktop"></i>Staff Salary <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li><a href="action_salary.php">Add Staff Salary</a></li>
 <li><a href="action_edit_salary.php">Edit Staff Salary</a></li>
 <li><a href="view_salary.php">View Staff Salary</a></li>
<li><a href="salary_status.php">Pay Salary</a></li>
<li><a href="views_salary.php">View Monthly Salary</a></li>
 
    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Ledger <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addfee.php">Receive Fee</a></li>
<li><a href="monthlyreport.php">Monthly Fee Report</a></li>
<li><a href="studentchalan.php">View Student Chalan</a></li>
<li><a href="classchalan.php">Genrate Class Chalan</a></li>
 <li><a href="abc.php">Genrate std Chalan</a></li>
 <li><a href="viewchalan.php">View Class Chalan</a></li>
                                          
 <li><a href="feehistory.php">Fee History</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>