<?php

$image = addslashes(file_get_contents($_FILES['logo']['tmp_name']));


date_default_timezone_set('Asia/Karachi');
include '../../database/config.php';
include '../../includes/uniques.php';
$department = mysqli_real_escape_string($conn, $_POST['department']);

 $post = mysqli_real_escape_string($conn, $_POST['post']);
 $testcity = mysqli_real_escape_string($conn, $_POST['testcity']);
 $user_id = mysqli_real_escape_string($conn, $_POST['depositid']);

 $name = mysqli_real_escape_string($conn, $_POST['name']);
$father_name = mysqli_real_escape_string($conn, $_POST['fathername']);
$cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$religion = mysqli_real_escape_string($conn, $_POST['Religion']);
$dob_month = mysqli_real_escape_string($conn, $_POST['month']);
$dob_day = mysqli_real_escape_string($conn, $_POST['day']);
$dob_year = mysqli_real_escape_string($conn, $_POST['year']);

 $dob =''.$dob_day.'/'.$dob_month.'/'.$dob_year.'';
$MaritalStatus = mysqli_real_escape_string($conn, $_POST['MaritalStatus']);

$email = mysqli_real_escape_string($conn, $_POST['email']);

$province = mysqli_real_escape_string($conn, $_POST['province']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$m_code = mysqli_real_escape_string($conn, $_POST['code']);
$m_phone = mysqli_real_escape_string($conn, $_POST['mobilephone']);
 $mobile =''.$m_code.'-'.$m_phone.'' ;
$res_phone = mysqli_real_escape_string($conn, $_POST['resphone']);
$disability = mysqli_real_escape_string($conn, $_POST['disability']);

if($disability=='YES'){

 $disability_nature = mysqli_real_escape_string($conn, $_POST['disability_nature']);

}
else {
$disability_nature='-';

}

$SSC_Degree = mysqli_real_escape_string($conn, $_POST['SSC_Degree']);

$SSC_Subject = mysqli_real_escape_string($conn, $_POST['SSC_Subject']);

$SSC_PassYear = mysqli_real_escape_string($conn, $_POST['SSC_PassYear']);

$SSC_MaxMarks = mysqli_real_escape_string($conn, $_POST['SSC_MaxMarks']);

$SSC_ObtMarks = mysqli_real_escape_string($conn, $_POST['SSC_ObtMarks']);

$SSC_Inst_Name = mysqli_real_escape_string($conn, $_POST['SSC_Inst_Name']);

$HSSC_Degree = mysqli_real_escape_string($conn, $_POST['HSSC_Degree']);

$HSSC_Subject = mysqli_real_escape_string($conn, $_POST['HSSC_Subject']);

$HSSC_PassYear = mysqli_real_escape_string($conn, $_POST['HSSC_PassYear']);

$HSSC_MaxMarks = mysqli_real_escape_string($conn, $_POST['HSSC_MaxMarks']);

$HSSC_ObtMarks = mysqli_real_escape_string($conn, $_POST['HSSC_ObtMarks']);

$HSSC_Inst_Name = mysqli_real_escape_string($conn, $_POST['HSSC_Inst_Name']);


$BA_Degree = mysqli_real_escape_string($conn, $_POST['BA_Degree']);

if($BA_Degree=='OTHER'){

$BA_Degree = mysqli_real_escape_string($conn, $_POST['BA_Degree1']);


}


$BA_Subject = mysqli_real_escape_string($conn, $_POST['BA_Subject']);

$BA_PassYear = mysqli_real_escape_string($conn, $_POST['BA_PassYear']);

$BA_MaxMarks = mysqli_real_escape_string($conn, $_POST['BA_MaxMarks']);

$BA_ObtMarks = mysqli_real_escape_string($conn, $_POST['BA_ObtMarks']);

$BA_Inst_Name = mysqli_real_escape_string($conn, $_POST['BA_Inst_Name']);


$MA_Degree = mysqli_real_escape_string($conn, $_POST['MA_Degree']);


if($MA_Degree=='OTHER'){

$MA_Degree = mysqli_real_escape_string($conn, $_POST['MA_Degree1']);


}


$MA_Subject = mysqli_real_escape_string($conn, $_POST['MA_Subject']);

$MA_PassYear = mysqli_real_escape_string($conn, $_POST['MA_PassYear']);

$MA_MaxMarks = mysqli_real_escape_string($conn, $_POST['MA_MaxMarks']);

$MA_ObtMarks = mysqli_real_escape_string($conn, $_POST['MA_ObtMarks']);

$MA_Inst_Name = mysqli_real_escape_string($conn, $_POST['MA_Inst_Name']);

$MP_Degree = mysqli_real_escape_string($conn, $_POST['MP_Degree']);

$MP_Subject = mysqli_real_escape_string($conn, $_POST['MP_Subject']);

$MP_PassYear = mysqli_real_escape_string($conn, $_POST['MP_PassYear']);

$MP_MaxMarks = mysqli_real_escape_string($conn, $_POST['MP_MaxMarks']);

$MP_ObtMarks = mysqli_real_escape_string($conn, $_POST['MP_ObtMarks']);

$MP_Inst_Name = mysqli_real_escape_string($conn, $_POST['MP_Inst_Name']);

 $MED_Degree = mysqli_real_escape_string($conn, $_POST['MED_Degree']);


if($MED_Degree=='OTHER'){

 $MED_Degree = mysqli_real_escape_string($conn, $_POST['MED_Degree1']);

}

$MED_Subject = mysqli_real_escape_string($conn, $_POST['MED_Subject']);

$MED_PassYear = mysqli_real_escape_string($conn, $_POST['MED_PassYear']);

$MED_MaxMarks = mysqli_real_escape_string($conn, $_POST['MED_MaxMarks']);

$MED_ObtMarks = mysqli_real_escape_string($conn, $_POST['MED_ObtMarks']);

$MED_Inst_Name = mysqli_real_escape_string($conn, $_POST['MED_Inst_Name']);

$experience = mysqli_real_escape_string($conn, $_POST['experience']);

if($experience > 0){

$SchoolName_1 = mysqli_real_escape_string($conn, $_POST['SchoolName_1']);
$SchoolName_2 = mysqli_real_escape_string($conn, $_POST['SchoolName_2']);
$SchoolName_3 = mysqli_real_escape_string($conn, $_POST['SchoolName_3']);
$SchoolName_4 = mysqli_real_escape_string($conn, $_POST['SchoolName_4']);
$SchoolName_5 = mysqli_real_escape_string($conn, $_POST['SchoolName_5']);

$Designation_1 = mysqli_real_escape_string($conn, $_POST['Designation_1']);
$Designation_2 = mysqli_real_escape_string($conn, $_POST['Designation_2']);
$Designation_3 = mysqli_real_escape_string($conn, $_POST['Designation_3']);
$Designation_4 = mysqli_real_escape_string($conn, $_POST['Designation_4']);
$Designation_5 = mysqli_real_escape_string($conn, $_POST['Designation_5']);

 

$from_1 = mysqli_real_escape_string($conn, $_POST['from_1']);
$from_2 = mysqli_real_escape_string($conn, $_POST['from_2']);
$from_3 = mysqli_real_escape_string($conn, $_POST['from_3']);
$from_4 = mysqli_real_escape_string($conn, $_POST['from_4']);
$from_5 = mysqli_real_escape_string($conn, $_POST['from_5']);


$to_1 = mysqli_real_escape_string($conn, $_POST['to_1']);
$to_2 = mysqli_real_escape_string($conn, $_POST['to_2']);
$to_3 = mysqli_real_escape_string($conn, $_POST['to_3']);
$to_4 = mysqli_real_escape_string($conn, $_POST['to_4']);
$to_5 = mysqli_real_escape_string($conn, $_POST['to_5']);

}

//$department = mysqli_real_escape_string($conn, $_POST['department']);
//$category = mysqli_real_escape_string($conn, $_POST['category']);
//$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$sql = "INSERT INTO `tbl_users`(`user_id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `email`, `phone`, `testcity`, `domicile_province`, `domicile_district`, `cnic`, `phone_res`, `disable`, `disability_nature`, `religion`, `department`, `category`,`marital_status`, `avatar`) 
VALUES ('$user_id',' $name','$father_name','$gender','$dob','$address','$email','$mobile','$testcity','$province','$district','$cnic','$res_phone','$disability','$disability_nature','$religion','$department','$post','$MaritalStatus','$image')";

if ($conn->query($sql) == TRUE) {

$sql1 = "INSERT INTO `academic`(`user_id`, `ssc_degree_name`, `ssc_major_subject`, `ssc_passing_year`, `ssc_t_marks`, `ssc_obt_marks`, `ssc_board`, `hssc_degree_name`, `hssc_major_subject`, `hssc_passing_year`, `hssc_t_marks`, `hssc_obt_marks`, `hssc_board`, `bachelor_degree_name`, `bachelor_major_subject`, `bachelor_t_marks`, `bachelor_obt_marks`, `bachelar_uni`, `master_degree_name`, `master_major_subject`, `master_t_marks`, `master_obt_marks`, `master_uni`, `bachelor_passing_year`, `master_passing_year`, `mphil_degree_name`, `mphil_major_subject`, `mphil_passing_year`, `mphil_t_marks`, `mphil_obt_marks`, `mphil_uni`, `med_degree_name`, `med_subject`, `med_pass_year`, `med_t_marks`, `med_obt_marks`, `med_uni`) 
VALUES ('$user_id','$SSC_Degree','$SSC_Subject','$SSC_PassYear','$SSC_MaxMarks','$SSC_ObtMarks','$SSC_Inst_Name','$HSSC_Degree','$HSSC_Subject','$HSSC_PassYear','$HSSC_MaxMarks','$HSSC_ObtMarks','$HSSC_Inst_Name','$BA_Degree','$BA_Subject','$BA_MaxMarks','$BA_ObtMarks','$BA_Inst_Name','$MA_Degree','$MA_Subject','$MA_MaxMarks','$MA_ObtMarks','$MA_Inst_Name','$BA_PassYear','$MA_PassYear','$MP_Degree','$MP_Subject','$MP_PassYear','$MP_MaxMarks','$MP_ObtMarks','$MP_Inst_Name','$MED_Degree','$MED_Subject','$MED_PassYear','$MED_MaxMarks','$MED_ObtMarks','$MED_Inst_Name')";




if ($conn->query($sql1) == TRUE) {
if($experience > 0){
$sql2 = "INSERT INTO `experience`(`user_id`, `institute1`, `designation1`, `from_date1`, `to_date1`, `institute2`, `designation2`, `from_date2`, `to_date2`, `institute3`, `designation3`, `from-date3`, `to_date3`, `institute4`, `designation4`, `from_date4`, `to_date4`, `institute5`, `designation5`, `from_date5`, `to_date5`) 
VALUES ('$user_id','$SchoolName_1','$Designation_1','$from_1','$to_1','$SchoolName_2','$Designation_2','$from_2','$to_2','$SchoolName_3','$Designation_3','$from_3','$to_3','$SchoolName_4','$Designation_4','$from_4','$to_4','$SchoolName_5','$Designation_5','$from_5','$to_5')";

 

if ($conn->query($sql2) == TRUE) {
echo "Successssssssssssssssssssssssssssssssssssssssssssssssssssss";
  echo "<script type='text/javascript'>window.location.href = '../../../form.php?user_id=$user_id';</script>";
 // header("location:../../../form.php?user_id= $user_id"); 
} 
else {

echo mysqli_error($conn);
}
} 
else {
echo "Successssssssssssssssssssssssssssssssssssssssssssssssssssss";
  echo "<script type='text/javascript'>window.location.href = '../../../form.php?user_id=$user_id';</script>";
//header("location:../../../form.php?user_id=$user_id"); 
}


} else {

echo mysqli_error($conn);
}}



 else {
echo mysqli_error($conn);

  //header("location:../../../index.php?rp=9157");
}



$conn->close();
?>