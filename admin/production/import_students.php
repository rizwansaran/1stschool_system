<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
 if(isset($_GET['error'])){ 

$error=$_GET['error'];

}
}


 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new student!</title>
    <?php include 'php/head.php.inc'; ?>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

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

});

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

<!-- Import Students Button (Triggers Modal) -->

<!-- Bootstrap Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Students From CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="demo-form" data-parsley-validate action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Choose CSV File *</label>
                        <input type="file" class="form-control" name="file" id="file" required />
                    </div>
                    <button type="submit" name="Import" class="btn btn-primary">Upload</button>
                </form>

                <!-- Download Sample Button -->
                <a href="images/students.csv">
                    <button type="button" class="btn btn-primary mt-3">
                        <i class="fa fa-download"></i> Download Sample
                    </button>
                </a>
            </div>
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
                     <?php }?>  
                      </select><br/>
                    
</div>
         <div class="col-md-6 col-xs-6">             
       <label for="fathername">Session * :</label>                  
 <input type="text" id="batch" value="<?php echo date("Y");?>-<?php $y=date("Y")+1; echo $y;?>" class="form-control" name="batch"  required /> <br/>
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
<script>
    function import_modal_show() {
        $('#importModal').modal('show');
    }
</script>

