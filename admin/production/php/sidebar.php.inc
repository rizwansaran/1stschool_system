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

<br>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
<h3>Admin</h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-home"></i> Insitution Details <span class="fa fa-chevron-down"></span></a>
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

<li><a><i class="fa fa-book"></i> Student Subjects <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="addsubjects.php">Add Subjects</a></li>
<li><a href="edit_subject.php">Update Subjects</a></li>                                           
<li><a href="deletesubject.php">Delete Subjects</a></li>
<li><a href="t_wise_subject.php">Teacher Subjects</a></li>
<li><a href="c_wise_subject.php">Class Subjects</a></li>

</ul>
</li>      
<li><a><i class="fa fa-user-plus"></i> Student Details <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">


<li><a href="addstudent.php">New Student Admission</a></li>
<li><a href="Registered_students.php"> Registered Students</a></li>
<li><a href="active_students.php">Active Students</a></li>
<li><a href="active_male.php">Active Male Students</a></li>
<li><a href="active_female.php">Active Female Students</a></li>

<li><a href="inactive_students.php">Inactive Students</a></li>

<li><a href="student_action.php">All Students</a></li>
<li><a href="students.php">Student List</a></li>
<li><a href="allclasses.php">All Classes</a></li>
<li><a href="allclasses_list.php">Class wise List</a></li>

<li><a href="age_wise_list.php">Age wise List</a></li>
<li><a href="address_wise_list.php">Address wise List</a></li>
<li><a href="parent_wise_list.php">Siblings wise List</a></li>

<li><a href="deletestudent21.php">Bulk Delete </a></li>

<li><a href="contact_list.php">Overall Contact List</a></li>
<li><a href="contact_class.php">Class Wise Contact List</a></li>

<li><a href="contact_male.php">All Boys Contact List</a></li>
<li><a href="contact_female.php">All Girls Contact List</a></li>
<li><a href="addparent.php">Add Parents Account</a></li>
<li><a href="allparents.php">Parent Logins</a></li>
<li><a href="allstudents.php">Students Logins</a></li>

</ul>    
</li>



<li><a><i class="fa fa-money"></i>Fee Collection <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="fee_collect.php">Collect Fee</a></li>
<li><a href="fee_collect_family.php">Siblings Collect Fee</a></li> 
<li><a href="print_challan_form.php">Print Class Challans </a></li> 
<li><a href="fee_concession.php">Fee Concessions</a></li> 
<li><a href="fee_extra.php">Extra Charges</a></li> 
<li><a href="financial_year.php">Set Financial Year</a></li>  
<li><a href="all_classes_fee_list.php">Yearly Fee List</a></li>   
<li><a href="fee_list_monthly.php">Monthly Fee List</a></li>  
<li><a href="fee_list_pending.php">Pending Fee List</a></li>   

</ul>
</li>
<li><a><i class="fa fa-usd"></i> Income <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="addincome.php">All Income</a></li>

</ul>
</li>
<li><a><i class="fa fa-credit-card"></i> Expences <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">

<li><a href="allexpences.php">All Expences</a></li>

</ul>
</li>
<li><a><i class="fa fa-calendar-check-o"></i>Student/Staff Attendance <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="add_attendance_std.php">Add Student Attendance</a></li>
<li><a href="add_attendance.php">Add Staff Attendance</a></li>
<li><a href="edit_attendance.php">Edit Staff  Attendance</a></li>
<li><a href="views_attendance.php">View Staff  Attendance</a></li>
<li><a href="views_attendance_monthly.php">Monthly Staff  Attendance</a></li>
</ul>
</li>
<li><a><i class="fa fa-columns"></i> Result <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="monthly_test.php"> Monthly test Report</a></li>
<li><a href="studentresult.php">Student Term Result  </a></li>
<li><a href="studentresult_final.php">Student Final Result</a></li>

<li><a href="classwiseresult.php">Class Wise Term Result</a></li>
<li><a href="classwise_result_final.php">Class Wise Final Result</a></li>

<li><a href="previousresult.php">Previous Results</a></li>
</ul>

</li>

<li><a><i class="fa fa-forward"></i>Promote Classes<span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="promote_class.php">Promote Classes</a></li>
<li><a href="delete_promoted_class.php">Delete Promoted Classes</a></li>

</ul>
</li>
<li><a><i class="fa fa-users"></i> Staff Details <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="newstaff.php">New Staff</a></li>
<li><a href="updatestaff.php">Update Staff</a></li>
<li><a href="updateclass.php">Update Class</a></li>
<li><a href="active_staff.php">Active Staff</a></li>
<li><a href="inactive_staff.php">Inactive Staff</a></li>

<li><a href="allstaff.php">All Staff</a></li>


<li><a href="deletestaff.php">Delete Staff</a></li>

</ul>
</li>

<li><a><i class="fa fa-object-group"></i> Inventory <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="addinventory.php">Brought Something</a></li>
<li><a href="allinventory.php">All items</a></li>
<li><a href="delete_inventry.php">Delete items</a></li>
</ul>
</li>       

<li><a><i class="fa fa-sitemap"></i>Staff Salary <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="action_edit_salary.php">Add/Update Staff Salary</a></li>

<li><a href="salary_status.php">Pay Salary</a></li>
<li><a href="views_salary.php">View Monthly Salary</a></li>

</ul>
</li>
<li><a><i class="fas fa-comment-alt"></i> SMS Sending <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="sms_attendance_daily11.php"> Attendance Alert Daily</a></li>
<li><a href="sms_attendance_daily112.php"> Absent Alert Daily </a></li>

<li><a href="sms_attendance_monthly11.php"> Attendance Alert Monthly</a></li>
<li><a href="sms_result_test.php"> Monthly Test Result Alert </a></li>

<li><a href="sms_result_term.php"> Term Result Alert </a></li>
<li><a href="sms_result_final.php"> Final Result Alert </a></li>
<li><a href="sms_emergency.php"> Emergency / Notification Alert </a></li>
</ul>
</li>



<li><a><i class="fa fa-line-chart"></i> Reports <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="dailyreport2.php">Daily Fee Report</a></li>
<li><a href="summery_daily.php">Daily Summery Report</a></li>

<li><a href="monthlyreport.php">Monthly Fee Report</a></li>
<li><a href="summery_monthly.php">Monthly Summery Report</a></li>

<li><a href="feehistory.php">Fee History</a></li>
</ul>
</li>
</ul>
</div>

</div>
<!-- /sidebar menu -->
</div>
</div>