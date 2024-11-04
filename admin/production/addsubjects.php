<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Class wise subjects!</title>
    <?php include 'php/head.php.inc'; ?>
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
                <h3>Subjects <small>Class wise!</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="" method="post">
<div class="row">
                  <div class="col-md-2">
<h2> Select the Class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select  class="form-control" name="class" >
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
                  </div>
                  <div class="col-md-3">
 <h2> Select the Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select  class="form-control" name="subject" style="" >
  <option value="English">English </option>
                       
                         <option value="English B">English B</option>
                          <option value="Urdu">Urdu </option>
                      
                     
                         <option value="Urdu B">Urdu B</option>
                        <option value="Maths">Maths</option>
                         <option value="Science">Science</option>
                          <option value="G.K">G.K</option>
                        <option value="Waqfiat-e-Ama">Waqfiat-e-Ama</option>
                       <option value="Pak Study">Pak Study</option>
                        <option value="Islamiat">Islamiat</option>
 <option value="Islamiat Elective">Islamiat Elective</option>
                       
 <option value="Activity">Activity</option>
 <option value="Nazra Quran">Nazra Quran</option>
 <option value="History">History</option>

 <option value="Drawing">Drawing</option>
                         <option value="Physics">Physics</option>
 <option value="Chemistry">Chemistry</option>
 <option value="Biology">Biology</option>
 <option value="Computer Science">Computer Science</option>
 <option value="Education">Education</option>
 <option value="Economics">Economics</option>
 <option value="Statistics">Statistics</option>

<option value="Phy. Education">Phy. Education</option>
                       
                       
                       
                      </select>  </div>
<div class="col-md-2">
<h2> Select Section:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select  class="form-control" name="section" style="width:100%;" >

                         <option value="M">Boys</option>
                        <option value="F">Girls</option>
                          <option value="M+F">Boys + Girls</option>
                       
                  </select> </div>
<div class="col-md-3">
 <h2> Select the Teacher:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                        <select  class="form-control" name="t_id" style="" >
                          <?php
                        
                          $sql = "SELECT * FROM `staff`WHERE `status`='Active'";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                        <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['fullname']; ?></option>
                        <?php   
                           } ?>
                        
                      </select>
                     
 
            </div>        

                  <div class="col-md-2">
                    <div class="row">
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="submit" class="form-control btn btn-primary">ADD</button>
                    </div></div>
                  </div>
                   </form>
                    <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        $class = $_POST['class'];
                         $sub = $_POST['subject'];
$section = $_POST['section'];
$t_id = $_POST['t_id'];
   
  $query ="INSERT INTO `subject`(`t_id`, `class`, `subject`, `section`) 
                    VALUES ('$t_id','$class','$sub', '$section')  ";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
echo "Record Inserted Successfully!";

$query = "SELECT * FROM `subject` WHERE `t_id`='$t_id'";
                        $result = mysqli_query($link, $query);
                       
                          ?>



                        <table class="table table-striped jambo_table bulk_action">
                      <?php
$query = "SELECT * FROM `staff` WHERE `id`='$t_id'";
                        $result1 = mysqli_query($link, $query);
                       $res1 = mysqli_fetch_array($result1);
                          ?>
  
 <h2 style="color:red;">Teacher Name: <?php echo $res1['fullname']; ?></h2>
                 <thead>
                          <tr class="headings">
 <th class="column-title" style="text-align:center;" >Classes </th>
     <th class="column-title" style="text-align:center;" >Section </th>
                           
                           
                            <th class="column-title" style="text-align:center;" >Subjects </th>
                            </tr>
                        </thead>
                        <?php


                          while($res = mysqli_fetch_array($result)){
                            ?>
                            
                        <tbody>
                          <tr class="even pointer">
<td class=" " style="text-align:center;" ><?php echo $res['class']; ?></td>
                            </td>
<td class=" " style="text-align:center;" ><?php echo $res['section']; ?></td>
                            </td>
                          
                         
                            <td class=" " style="text-align:center;" ><?php echo $res['subject']; ?></td>
                            </td>
                          </tr>

                            
                          <?php }?>




 
                        </tbody>
  
                      </table>
 
                    </div>
                    <?php


}
else{
echo "Error While Inserting...!";  }
?>




<?php
                    }?>

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
