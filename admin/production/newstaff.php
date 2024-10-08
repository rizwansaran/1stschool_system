<?php
require 'php/config.php';
require 'php/db.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['fullname'])){
    $fullname =$_POST['fullname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $class = $_POST['class'];
 $section = $_POST['section'];
    $qualification = $_POST['qualification'];
    $mobile = $_POST['mobile'];
    $joining_date = $_POST['jdate'];
    $login = $_POST['login'];
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
    
    if ($_FILES["image"]["size"] > 50000000) {
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $error = "File error";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
          $query1 = "INSERT INTO `staff`(`fullname`, `gender`, `image`, `address`, `class`, `section`,`qualification`, `mobile`, `joining_date`, `login`, `password`) VALUES ('$fullname', '$gender', '$image', '$address','$class','$section','$qualification','$mobile','$joining_date','$login','$password')";
          $result = mysqli_query($link, $query1);
if($result==TRUE){
          $error = "Added Succesfully";}
else{ $error = "Query not executed"; }
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new Staff!</title>
    <?php include 'php/head.php.inc'; ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>HR</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Staff<?php
                  echo '    -    '.$error; 
                  ?></h2>   <button type="button" style="width:250px; float:right;" onclick="document.getElementById('id01').style.display='block'" class="form-control btn btn-primary w3-teal"><i class="fa fa-file-import"></i> Import Staff Data</button>

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
<a href="images/staff.csv"><button type="button" style="width:250px; float:right;" class="form-control btn btn-primary w3-teal"><i class="fa fa-download"></i> Download Sample</button></a>
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
 $query = "INSERT INTO `staff`(`fullname`, `gender`, `address`, `class`, `section`,`qualification`, `mobile`, `joining_date`, `login`, `password`)

VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."')";

          $result = mysqli_query($link, $query);


       if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"newstaff.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"active_staff.php\"
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















 <div class="col-md-12">
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="newstaff.php" method="post" enctype="multipart/form-data">
                      <label for="fullname">Full Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required />

                      <label>Gender *:</label>
                      <p>
                        M:
                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                      </p>

                      <label for="image">Picture * :</label>
                      <input type="file" id="image" class="form-control btn btn-primary" name="image" data-parsley-trigger="change" required />

                      <label for="address">Address * :</label>
                      <input type="text" id="address" class="form-control" name="address" data-parsley-trigger="change" required />

                              <label for="class">Class * :</label>
                     <select id="class" class="form-control" name="class" >
                      <option value="Pre-I">Pre-I</option>
<option value="Pre-II">Pre-II</option>
<option value="Pre-III">Pre-III</option>
<option value="Activity Class">Activity Class</option>
<option value="Level 1">Level 1</option>
<option value="Level 2">Level 2</option>
<option value="Level 3">Level 3</option>
<option value="Level 4">Level 4</option>
<option value="Level 5">Level 5</option>
<option value="Level 6">Level 6</option>
<option value="Level 7">Level 7</option>
<option value="Level 8">Level 8</option>
<option value="Level 9">Level 9</option>
<option value="Level 10">Level 10</option>

                      </select>
                  <br/>

 <label for="class">Select Section * :</label>

                  <select id="term" class="form-control" name="section" style="width:100%;" >

                        <option value="M">Boys</option>
                        <option value="F">Girls</option>
<option value="M+F">Both</option>
                        
                  </select> 
<br/>

                      <label for="fathername">Qualification * :</label>
                      <input type="text" id="fathername" class="form-control" name="qualification" required />
  <label for="fathername">Date Of Joining * :</label>
                      <input type="date" id="fathername" class="form-control" name="jdate" required />

                      <label for="mothername">Mobile * :</label>
                      <input type="text" id="mothername" class="form-control" name="mobile" data-parsley-trigger="change" required />

                      <label for="login">Staff Login * :</label>
                      <input type="text" id="login" class="form-control" name="login" required />

                      
                      <input type="hidden" id="password" class="form-control" name="password" value="123" data-parsley-trigger="change" required />
                      <br>
                      <button type="submit" class="btn btn-primary">Register</button>

                    </form>
                    <!-- end form for validations -->
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
