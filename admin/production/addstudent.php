<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_GET['error'])){ 

$error=$_GET['error'];

}


  if(isset($_POST['fullname'])){
//$bformimage = addslashes(file_get_contents($_FILES['bformlogo']['tmp_name']));
//$fcnicimage = addslashes(file_get_contents($_FILES['fcniclogo']['tmp_name']));
//$sscimage = addslashes(file_get_contents($_FILES['ssclogo']['tmp_name']));
 $id =$_POST['id'];

/*
$sql2 = "INSERT INTO `student_doc`(`student_id`, `bform_image`, `fcnic_image`, `ssc_image`, `hssc_image`, `ba_image`, `ma_image`) 
VALUES ('$id', '$bformimage', '$fcnicimage', '$sscimage', '$hsscimage', '$baimage', '$maimage')";
*/
/*
$sql2 = "INSERT INTO `student_doc`(`student_id`, `bform_image`) 
VALUES ('$id', '$bformimage')";

 $result2 = mysqli_query($link, $sql2);

          if($result2==TRUE){

$sql21 = "UPDATE `student_doc` SET  `fcnic_image`='$fcnicimage' WHERE `student_id`='$id'";

 $result21 = mysqli_query($link, $sql21);

  if($result21==TRUE){
  
  
  }
       }

      */
/*
$sql22 = "UPDATE `student_doc` SET  `ssc_image`='$sscimage' WHERE `student_id`='$id'";

 $result22 = mysqli_query($link, $sql22);

*/
       


/*
$SSC_Degree = mysqli_real_escape_string($link, $_POST['SSC_Degree']);


$SSC_PassYear = mysqli_real_escape_string($link, $_POST['SSC_PassYear']);

$SSC_MaxMarks = mysqli_real_escape_string($link, $_POST['SSC_MaxMarks']);

$SSC_ObtMarks = mysqli_real_escape_string($link, $_POST['SSC_ObtMarks']);

$SSC_Inst_Name = mysqli_real_escape_string($link, $_POST['SSC_Inst_Name']);




$HSSC_Degree = mysqli_real_escape_string($link, $_POST['HSSC_Degree']);


$HSSC_PassYear = mysqli_real_escape_string($link, $_POST['HSSC_PassYear']);

$HSSC_MaxMarks = mysqli_real_escape_string($link, $_POST['HSSC_MaxMarks']);

$HSSC_ObtMarks = mysqli_real_escape_string($link, $_POST['HSSC_ObtMarks']);

$HSSC_Inst_Name = mysqli_real_escape_string($link, $_POST['HSSC_Inst_Name']);

$BA_Degree = mysqli_real_escape_string($link, $_POST['BA_Degree']);

if($BA_Degree=='OTHER'){

$BA_Degree = mysqli_real_escape_string($link, $_POST['BA_Degree1']);


}



$BA_PassYear = mysqli_real_escape_string($link, $_POST['BA_PassYear']);

$BA_MaxMarks = mysqli_real_escape_string($link, $_POST['BA_MaxMarks']);

$BA_ObtMarks = mysqli_real_escape_string($link, $_POST['BA_ObtMarks']);

$BA_Inst_Name = mysqli_real_escape_string($link, $_POST['BA_Inst_Name']);

$MA_Degree = mysqli_real_escape_string($link, $_POST['MA_Degree']);


if($MA_Degree=='OTHER'){

$MA_Degree = mysqli_real_escape_string($link, $_POST['MA_Degree1']);


}



$MA_PassYear = mysqli_real_escape_string($link, $_POST['MA_PassYear']);

$MA_MaxMarks = mysqli_real_escape_string($link, $_POST['MA_MaxMarks']);

$MA_ObtMarks = mysqli_real_escape_string($link, $_POST['MA_ObtMarks']);

$MA_Inst_Name = mysqli_real_escape_string($link, $_POST['MA_Inst_Name']);



//if(isset($_POST['HSSC_ObtMarks'])){

if($HSSC_ObtMarks > 0){


$hsscimage = addslashes(file_get_contents($_FILES['hssclogo']['tmp_name']));


$sql21 = "UPDATE `student_doc` SET  `hssc_image`='$hsscimage' WHERE `student_id`='$id'";

 $result2 = mysqli_query($link, $sql21);

}

if($BA_ObtMarks > 0){

$baimage = addslashes(file_get_contents($_FILES['balogo']['tmp_name']));


$sql22 = "UPDATE `student_doc` SET  `ba_image`='$baimage' WHERE `student_id`='$id'";

 $result2 = mysqli_query($link, $sql22);


}


if($MA_ObtMarks > 0){
$maimage = addslashes(file_get_contents($_FILES['malogo']['tmp_name']));


$sql22 = "UPDATE `student_doc` SET  `ma_image`='$maimage' WHERE `student_id`='$id'";

 $result2 = mysqli_query($link, $sql22);

}
*/

    $fullname =$_POST['fullname'];
    $gender = $_POST['gender'];
$dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $batch = $_POST['batch'];
    $fathername = $_POST['fathername'];
 $mothername = $_POST['mothername'];
     $foccupation = $_POST['foccupation']; 
 $bform = $_POST['bform'];
 $fcnic = $_POST['fcnic'];
$admissiondate = $_POST['admissiondate'];


  $login ="student-$id";
   
    $password = $_POST['password'];


    $target_dir = "../../images/";
    $image = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
   
    if ($_FILES["image"]["size"] > 5000000) {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $error = "File error";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
          $query = "INSERT INTO `student`(`id`, `fullname`, `gender`, `picture`, `dob`, `mobile`, `address`, `class`,`batch`, `bform`, `fname`, `mname`, `fcnic`, `admission_date`,`foccupation`, `login`, `password`) 
VALUES ('$id','$fullname', '$gender', '$image', '$dob', '$mobile','$address','$class','$batch','$bform','$fathername','$mothername','$fcnic','$admissiondate','$foccupation','$login','$password')";
          $result = mysqli_query($link, $query);
if($result==TRUE){
    /*
$sql1 = "INSERT INTO `academic`(`user_id`, `ssc_degree_name`, `ssc_passing_year`, `ssc_t_marks`, `ssc_obt_marks`, `ssc_board`, `hssc_degree_name`, `hssc_passing_year`, `hssc_t_marks`, `hssc_obt_marks`, `hssc_board`, `bachelor_degree_name`, `bachelor_t_marks`, `bachelor_obt_marks`, `bachelar_uni`, `master_degree_name`, `master_t_marks`, `master_obt_marks`, `master_uni`, `bachelor_passing_year`, `master_passing_year`) 
VALUES ('$id','$SSC_Degree','$SSC_PassYear','$SSC_MaxMarks','$SSC_ObtMarks','$SSC_Inst_Name','$HSSC_Degree','$HSSC_PassYear','$HSSC_MaxMarks','$HSSC_ObtMarks','$HSSC_Inst_Name','$BA_Degree','$BA_MaxMarks','$BA_ObtMarks','$BA_Inst_Name','$MA_Degree','$MA_MaxMarks','$MA_ObtMarks','$MA_Inst_Name','$BA_PassYear','$MA_PassYear')";

 $result1 = mysqli_query($link, $sql1);

          if($result1==TRUE){







$error= "Added Succesfully..............";


         }

 else {
              $error = "Sorry, there was an error uploading Academic Record.";
              }
              
              */


header("location:fee_structure.php?std_id=$id&std_name=$fullname&class=$class");

              
              $error= "Added Succesfully..............";
         
}
          else {
              $error = "Sorry, there was an error uploading your file.";
              }
        } else {
            $error = "Sorry, Query not executed.";
        }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new student!</title>
    <?php include 'php/head.php.inc'; ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

<script type="text/javascript">
var abc="<option value=''>- Select -</option>";
$(document).ready(function()
{

$("#province").change(function()
{

$("#district").html(abc);
var ids=$(this).val();
var dataStrings = 'ids='+ ids;
$.ajax
({
type: "POST",
url: "js/jquery1.php",
data: dataStrings,
cache: false,
success: function(html)
{

$("#district").html(html);
}
});

var mval = $("#province").val();
$("#district").val(mval);
});
});
</script>

<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img_prev')
.attr('src', e.target.result)
.width(150);
};

reader.readAsDataURL(input.files[0]);
}
}

$(function() {
	$('#from_1').datepick();
	$('#from_2').datepick();
	$('#from_3').datepick();
	$('#from_4').datepick();
	$('#from_5').datepick();
	$('#from_6').datepick();
	$('#from_7').datepick();
	$('#from_8').datepick();
	$('#to_1').datepick();
	$('#to_2').datepick();
	$('#to_3').datepick();
	$('#to_4').datepick();
	$('#to_5').datepick();
	$('#to_6').datepick();
	$('#to_7').datepick();
	$('#to_8').datepick();
	$('#EnrolmentLower').datepick();
	$('#EnrolmentHigh').datepick();
	$('#EnrolmentPleader').datepick();
	$('#BarMemDate').datepick();
	$('#AcquiredBar').datepick();
	$('#RegistrationDate').datepick();
});


function subChange(){
		
		if(document.getElementById('MA_Degree').value=='OTHER')
		{
		document.getElementById('div1').style.display='block';
		document.getElementById('div2').style.display='none';
		} else {
		document.getElementById('div1').style.display='none';
		document.getElementById('div2').style.display='block';
		}
}


function subDis(){
		
		if(document.getElementById('disability').value=='YES')
		{
		document.getElementById('divd').style.display='block';
		} else {
		document.getElementById('divd').style.display='none';
		}
}

function PleaderDis(){
		
		if(document.getElementById('TenYearPractice').value=='YES')
		{
		document.getElementById('divP').style.display='block';
		} else {
		document.getElementById('divP').style.display='none';
		}
}

function subChannel(){
		
		if(document.getElementById('ProperChannel').value=='YES')
		{
		document.getElementById('channel').style.display='block';
		} else {
		document.getElementById('channel').style.display='none';
		}
}


function subChangeo(){
		
		document.getElementById('div1').style.display='none';
		document.getElementById('div2').style.display='block';

}







function subChange1(){
		
		if(document.getElementById('MED_Degree').value=='OTHER')
		{
		document.getElementById('div3').style.display='block';
		document.getElementById('div4').style.display='none';
		} else {
		document.getElementById('div3').style.display='none';
		document.getElementById('div4').style.display='block';
		}
}

function subChangeo1(){
		
		document.getElementById('div3').style.display='none';
		document.getElementById('div4').style.display='block';

}



	function cal_sscPercentage(){
		
		var ssc = "ssc";
		var SSC_ObtMarks = Number($('#SSC_ObtMarks').val());
		var t_marks = Number($('#SSC_MaxMarks').val());
		if(t_marks !=""){
			if(t_marks < SSC_ObtMarks)
			{
				alert('Obtiained marks must be less than total marks');
				$('#SSC_ObtMarks').val('');
				$('#SSC_MaxMarks').val('');
				$('#SSC_MaxMarks').focus();
				return false;
			}
		}
	
	} 
	
	function cal_hsscPercentage(){
	
		var hssc = "hssc";
		var HSSC_ObtMarks = Number($("#HSSC_ObtMarks").val());
		var t_marks = Number($("#HSSC_MaxMarks").val());	
		if(t_marks !=""){
			if(HSSC_ObtMarks > t_marks)
			{
				alert("Obtiained marks must be less than total marks");
				$("#HSSC_ObtMarks").val('');
				$("#HSSC_MaxMarks").val('');
				$("#HSSC_MaxMarks").focus();
				return false;
			}
		}

	}
	
	function cal_baPercentage(){
	
		var ba = "ba";
		var BA_ObtMarks = Number($("#BA_ObtMarks").val());
		var t_marks = Number($("#BA_MaxMarks").val());	
		if(t_marks !=""){
			if(BA_ObtMarks > t_marks)
			{
				alert("Obtiained marks must be less than total marks");
				$("#BA_ObtMarks").val('');
				$("#BA_MaxMarks").val('');
				$("#BA_MaxMarks").focus();
				return false;
			}
		}

	}
	
	function cal_maPercentage(){
	
		var ma = "ma";
		var MA_ObtMarks = Number($("#MA_ObtMarks").val());
		var t_marks = Number($("#MA_MaxMarks").val());	
		if(t_marks !=""){
			if(MA_ObtMarks > t_marks)
			{
				alert("Obtiained marks must be less than total marks");
				$("#MA_ObtMarks").val('');
				$("#MA_MaxMarks").val('');
				$("#MA_MaxMarks").focus();
				return false;
			}
		}

	}
	
	function cal_mpPercentage(){
	
		var mp = "mp";
		var MP_ObtMarks = Number($("#MP_ObtMarks").val());
		var t_marks = Number($("#MP_MaxMarks").val());	
		if(t_marks !=""){
			if(MP_ObtMarks > t_marks)
			{
				alert("Obtiained marks must be less than total marks");
				$("#MP_ObtMarks").val('');
				$("#MP_MaxMarks").val('');
				$("#MP_MaxMarks").focus();
				return false;
			}
		}

	}


</script>


        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Academia</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Student<?php
                  echo '    -    '.$error; 
                  ?></h2>  <!--a href="importstudent.php"><button type="button" style="width:150px; float:right;" class="form-control btn btn-primary"><i class="fa fa-file-import"></i> Import Students</button></a-->

<button type="button" style="width:150px; float:right;" onclick="document.getElementById('id01').style.display='block'" class="form-control btn btn-primary w3-teal"><i class="fa fa-file-import"></i> Import Students</button>
 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>

        <h2>Import Students From CSV File</h2>
      </header>
      <div class="w3-container">
       
  <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
 
               <br>    
                      <label for="image">Choose CSV File * :</label>
 <div class="row">                         
 <div class="col-md-5">
                      <input type="file"  class="form-control btn btn-primary input-large" name="file" id="file"  data-parsley-trigger="change" required />
          </div> 
 <div class="col-md-1">   </div>           
 <div class="col-md-3">
                      <button type="submit" name="Import" class="btn btn-primary">Upload</button>
 </div>
         </div>            </form>
<a href="images/students.csv"><button type="button" style="width:250px; float:right;" class="form-control btn btn-primary w3-teal"><i class="fa fa-download"></i> Download Sample</button></a>


<br><br>
      </div>
      
    </div>
  </div>




<?php
 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
fgetcsv($file);//Adding this line will skip the reading of th first line from the csv file and the reading process will begin from the second line onwards.
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            require 'php/db.php';  
 $query = "INSERT INTO `student`(`id`, `fullname`, `gender`, `dob`, `mobile`, `address`, `class`,`batch`, `bform`, `fname`, `mname`, `fcnic`, `admission_date`,`foccupation`, `login`, `password`) 

VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."')";

          $result = mysqli_query($link, $query);


       if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"addstudent.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"Registered_students.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  } 



function get_all_records(){
  require 'php/db.php';
    $Sql = "SELECT * FROM student";
    $result = mysqli_query($link, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['fullname']."</td>
                   <td>" . $row['fname']."</td>
                   <td>" . $row['mobile']."</td>
                   <td>" . $row['admission_date']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}  
 ?>



</div>









                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="addstudent.php" method="post" enctype="multipart/form-data">
 <br>
	<h1 class="headbg" style=" border-bottom:2;">Student Details :</h1>
            
  <div class="clearfix"></div>
   <div class="col-md-6 col-xs-6">
<?php 

                        $query = "SELECT * FROM `student` ORDER BY `id` DESC";
                        $result = mysqli_query($link, $query);
$count=1;
                        $row = mysqli_fetch_array($result);
$student_id1= $row['id'];
$student_id= $student_id1;
                        ?>


                       <label for="fullname">Admission # * :</label>

   <input type="text" id="fullname" value="<?php echo $student_id; ?>" class="form-control" name="id"  required /> <br/>
</div>
 <div class="col-md-6 col-xs-6">
             
                       <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname"  required /> <br/>
</div>

<div class="col-md-6 col-xs-6">
                      <label>Gender *:</label>
                      <p>
                        M:
                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> 
F:
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                      </p>

</div>
<div class="col-md-6 col-xs-6">
<label for="mobile">B-Form No. * :</label>
                      <input type="number" id="mobile" class="form-control"  name="bform" data-parsley-trigger="change" > <br/>
</div>
<div class="col-md-6 col-xs-6">
 <label for="city">Date of birth * :</label>
                      <input type="date" id="dob" class="form-control" name="dob"   required  /> <br/>

</div>
<div class="col-md-6 col-xs-6">
<label for="mobile">Mobile No. * :</label>
                      <input type="number" id="mobile" class="form-control"  name="mobile" data-parsley-trigger="change" > <br/>
</div>

                <div class="col-md-6 col-xs-6">     
                      <label for="address">Address * :</label>
                      <input type="text" id="address" class="form-control" name="address"  required /> <br/>
</div>

         
<div class="col-md-6 col-xs-6">             
       <label for="fathername">Session * :</label>                  
 <input type="text" id="batch" value="<?php echo date("Y");?>-<?php $y=date("Y")+1; echo $y;?>" class="form-control" name="batch"  required /> <br/>
</div>
<div class="col-md-6 col-xs-6">
  <label for="class">Class * :</label>
<select id="class" class="form-control" name="class" style="width:100%;" >
  <option value="">Select Class </option>
  <?php
  $query1 = "SELECT DISTINCT class FROM `subject` ORDER BY class ASC";
  $result1 = mysqli_query($link, $query1);
                          
  while($row1 = mysqli_fetch_array($result1))
  {
  $class= $row1['class'];
  ?>
  <option value="<?php echo $class?>"><?php echo $class?></option>
<?php } ?>  
</select>                   
</div>
<div class="col-md-6 col-xs-6">
                      <label for="fathername">Father Name * :</label>
                      <input type="text" id="fathername" class="form-control" name="fathername"  required /> <br/>
</div>
<div class="col-md-6 col-xs-6">
                      <label for="fathername">Mother/Guardian Name * :</label>
                      <input type="text" id="fathername" class="form-control" name="mothername"  required /> <br/>
</div>
<div class="col-md-6 col-xs-6">
                      <label for="mothername">Father/Guardian CNIC No. * :</label>
                      <input type="number" id="mothername" class="form-control" name="fcnic"   required /> <br/>
</div>
 <div class="col-md-6 col-xs-6">

<label for="city">Date of Admission * :</label>
                      <input type="date" id="cityofbirth" class="form-control" name="admissiondate"   required  /> <br/>
</div>

<div class="col-md-6 col-xs-6">
  <label for="mothername">Father/Guardian Occupation.* :</label>
                      <input type="text" id="mothername" class="form-control" name="foccupation" data-parsley-trigger="change" required /> <br/>
   </div>

	<h1 class="headbg" style="font-size:24; border-bottom:2;">Upload Documents </h1>
            
<div class="col-md-6 col-xs-6">
                      <label for="image">Upload Your Picture * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="image"  required /> <br/>
</div>
<!--div class="col-md-6 col-xs-6">
                      <label for="image">Upload B Form * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="bformlogo"  required /> <br/>
</div>
<div class="col-md-6 col-xs-6">
                      <label for="image">Upload Father CNIC front side * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="fcniclogo"  required /> <br/>
</div>
    </div-->                 
                      <input type="hidden" id="password" value="123" class="form-control" name="password"   required /> <br/>
                      



 
           
			<!--h1 class="headbg" style=" border-bottom:2;">Previous Academic Record </h1>
            
         
<div class="table-responsive">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
              <tr bgcolor="#CCCCCC" style="font-size:12px;">
                <td width=""><div align="center"><strong>Certificate / Degree Level</strong></div></td>
                <td width=""><div align="center"><strong>Degree Name</strong></div></td>
                
                <td width=""><div align="center"><strong>Year Passing</strong></div></td>
                <td width=""><div align="center"><strong>Total Marks/GPA</strong></div></td>
                <td width=""><div align="center"><strong>Obtained<br />
                  Marks/GPA</strong></div></td>
                <td width=""><div align="center"><strong>University / Board</strong></div></td>
<td width=""><div align="center"><strong>Upload Document Picture</strong></div></td>
              </tr>
              
         
         
         <tr>
                <td align="center"><strong>SSC/O-Level</strong>&nbsp;<br /> 
                  <span class="small">(10 Years)</span>                  </td>
                  <td align="center">
       
                <select name="SSC_Degree" id="SSC_Degree" style="width:150px;">
                   <option value="">--- Please Select ---</option>
                
                     <option value="MATRIC(SCIENCE)" >MATRIC(SCIENCE)</option>
                     <option value="MATRIC(ARTS)" >MATRIC(ARTS)</option>
                     <option value="O-LEVEL" >O-LEVEL</option>
                    </select>                                  </td>
            
                <td align="center">
                
                 <select name="SSC_PassYear" type="text" id="SSC_PassYear">
                          <option value="">-Select-</option>
 <?php 
 
 /*
 $y=date('Y');
$count='0';
while($count < 50){
$year=$y - $count; ?>
 <option value="<?php echo $year; ?>"  ><?php echo $year; ?></option>
<?php  $count++;
}
*/ ?>            
      													
                                                   </select>
                
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span>  </td>
                <td align="center"> <input name="SSC_MaxMarks" type="text" id="SSC_MaxMarks" onChange="cal_sscPercentage();" size="2" maxlength="5" value="">
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                  </span>
                  
                  
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
           </span></td>
                <td align="center"><input name="SSC_ObtMarks" type="text" id="SSC_ObtMarks" onChange="cal_sscPercentage();" size="2" maxlength="5"  value="">
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center"> 
                <input name="SSC_Inst_Name" type="text" id="SSC_Inst_Name" style="width:120px;" value="" maxlength="100"/>              </td>
    <td align="center">
                
                <input type="file"  style="width:220px;" id="image" class="form-control btn btn-primary" name="ssclogo"  required />               </td>
              </tr>
              <tr>
                <td align="center"><strong>HSSC/A-Level</strong>&nbsp; <br />
                  <span class="small"> (12 or 13 Years)</span>                  </td>
                  <td align="center">
                
              
                
                  <select name="HSSC_Degree" id="HSSC_Degree" style="width:150px;">
                   <option value="">--- Please Select ---</option>
                
                      <option value="F.SC(PRE-MEDICAL)" >F.SC(PRE-MEDICAL)</option>
                      
                      <option value="F.SC(PRE-ENGINEERING)" >F.SC(PRE-ENGINEERING)</option>
                      
                       <option value="ICS" >ICS</option>
                        <option value="F.A" >F.A</option>
                        <option value="I.COM" >I.COM</option>
                         <option value="D.COM" >D.COM</option>
             
                      <option value="A-LEVEL" >A-LEVEL</option>
                       <option value="DAE" >DAE</option
                       
                       
                      
                    ></select>              </td>
              
                <td align="center">
                
                 <select name="HSSC_PassYear" type="text" id="HSSC_PassYear">
                          <option value="">-Select-</option>
                           								
                  <?php
                  /*
                  $y=date('Y');
$count='0';
while($count < 50){
$year=$y - $count; ?>
 <option value="<?php echo $year; ?>"  ><?php echo $year; ?></option>
<?php  $count++;
}
 */ ?>                                </select>
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span> </td>
                <td align="center"><input name="HSSC_MaxMarks" type="text" id="HSSC_MaxMarks" onChange="cal_hsscPercentage();" size="2" maxlength="5" value="">
                    <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center"><input name="HSSC_ObtMarks" type="text" id="HSSC_ObtMarks" onChange="cal_hsscPercentage();" size="2" maxlength="5"  value="">
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center">
                  
                 <input name="HSSC_Inst_Name" type="text" id="HSSC_Inst_Name" style="width:120px;" value="" maxlength="100"/>                </td>
  <td align="center">
                
               <input type="file" style="width:220px;" id="image" class="form-control btn btn-primary" name="hssclogo"   />           </td>
              </tr>
              
              

              <tr>
                <td align="center"><strong>Bachelor</strong>&nbsp; <br />
                  <span class="small"> (14 Years)</span>                  </td>
                  <td align="center">
                
    
                  
                  
                   <select name="BA_Degree" id="BA_Degree" style="width:150px;">
                   <option value="">--- Please Select ---</option>
                
                     <option value="BA" >BA</option>
                     <option value="B.COM" >B.COM</option>
                     <option value="B.SC" >B.SC</option>
                      <option value="BCS" >BCS</option>
                    </select>                </td>
              
                <td align="center"> <select name="BA_PassYear" type="text" id="BA_PassYear">
                          <option value="">-Select-</option>
                   <?php
                   
                   /*
                   
                   $y=date('Y');
$count='0';
while($count < 50){
$year=$y - $count; ?>
 <option value="<?php echo $year; ?>"  ><?php echo $year; ?></option>
<?php  $count++;
}
*/  ?>                                 
                        </select><br />
 <span style="color:#FF0000; font-size:11px;">
                        </span> </td>
                <td align="center"><input name="BA_MaxMarks" type="text" id="BA_MaxMarks" onChange="cal_baPercentage();" size="2" maxlength="5" value="">
                    <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center"><input name="BA_ObtMarks" type="text" id="BA_ObtMarks" onChange="cal_baPercentage();" size="2" maxlength="5"  value="">
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center">
                
                  <input name="BA_Inst_Name" type="text" id="BA_Inst_Name" style="width:120px;" value="" maxlength="100"/>               </td>
  <td align="center">
                
                 <input type="file" style="width:220px;" id="image" class="form-control btn btn-primary" name="balogo"   />             </td>
              </tr>
              <tr>
                <td align="center"><strong>Bachelor/Master</strong>&nbsp; <br />
                  <span class="small"> (16 Years)</span>                 </td>
                 <td align="center">
                
               <div id="div2" style="display:block;">
                   
                 <select name="MA_Degree"  id="MA_Degree" style="width:150px;" onChange="subChange();">
                   
                    <option value="">--- Please Select ---</option>
                           
                       
                    
                     <option value="BS(ENGLISH)" >BS(ENGLISH)</option>
                          
                          <option value="MA(ENGLISH)" >MA(ENGLISH)</option>
                          
                          <option value="BS(URDU)" >BS(URDU)</option>
                          
                          <option value="MA(URDU)" >MA(URDU)</option>
                          
                          <option value="BS(ARABIC)" >BS(ARABIC)</option>
                          
                          <option value="MA(ARABIC)" >MA(ARABIC)</option>
                          
                           
                           
                            <option value="BS(MATHEMATICS)" >BS(MATHEMATICS)</option>
                          
                          <option value="MSC(MATHEMATICS)" >MSC(MATHEMATICS)</option>
                          
                           <option value="BS(BIOLOGY)" >BS(BIOLOGY)</option>
                          
                          <option value="MSC(BIOLOGY)" >MSC(BIOLOGY)</option>
                          
                          
                         
                         <option value="BS(SOCIAL STUDIES)" >BS(SOCIAL STUDIES)</option>
                          
                          <option value="MSC(SOCIAL STUDIES)" >MSC(SOCIAL STUDIES)</option>
                          
                       
                          
                           <option value="BS(CHEMISTRY)" >BS(CHEMISTRY)</option>
                          
                          <option value="MSC(CHEMISTRY)" >MSC(CHEMISTRY)</option>
                          
                    
                          
                           <option value="BS(BOTANY)" >BS(BOTANY)</option>
                          
                          <option value="MSC(BOTANY)" >MSC(BOTANY)</option>
                          
                          <option value="BS(ZOOLOGY)" >BS(ZOOLOGY)</option>
                          
                          <option value="MSC(ZOOLOGY)" >MSC(ZOOLOGY)</option>
                          
                        
                          
                          
                            <option value="BS(CS)" >BS(CS)</option>
                        <option value="BS(IT)" >BS(IT)</option>
                        <option value="BS(SE)" >BS(SE)</option>
                        <option value="BS(CE)" >BS(CE)</option>
                        <option value="MCS" >MCS</option>
                        <option value="MIT" >MIT</option>
                        <option value="MSC(IT)" >MSC(IT)</option>
                          
                       
                    
					<option value="OTHER" >OTHER</option>
                  </select>
                </div>
                
                
                 
                <div id="div1" style="display:none;">
                      
                        <input name="MA_Degree1" type="text" id="MA_Degree1" style="width:150px;" value=""/><br />
<a href="javascript:void();" onClick="subChangeo();">Other</a>                    </div>                </td>
              
                <td align="center">
                
                 <select name="MA_PassYear" type="text" id="MA_PassYear">
                          <option value="">-Select-</option>
                           								

                       <?php
                       /* $y=date('Y');
$count='0';
while($count < 50){
$year=$y - $count; ?>
 <option value="<?php echo $year; ?>"  ><?php echo $year; ?></option>
<?php  $count++;
}
*/ ?>                                               </select>
                
               <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span> </td> 
                <td align="center"><input name="MA_MaxMarks" type="text" id="MA_MaxMarks" onChange="cal_maPercentage();" size="2" maxlength="5" value="">
                    <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center"><input name="MA_ObtMarks" type="text" id="MA_ObtMarks" onChange="cal_maPercentage();" size="2" maxlength="5"  value="">
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center">
                  <input name="MA_Inst_Name" type="text" id="MA_Inst_Name" style="width:120px;" value="" maxlength="100"/>                </td>
  <td align="center">
                
               <input type="file" style="width:220px;" id="image" class="form-control btn btn-primary" name="malogo"  />            </td>
              </tr>
              
              
              
              
              
             
            </table>
 </div -->  

         <div class="col-md-2 col-xs-6">           
<br> <br> <br> <br>
                      <button type="submit" class="btn btn-primary">Register</button>
</div>
                    </form>
                    <!-- end form for validations -->

                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>