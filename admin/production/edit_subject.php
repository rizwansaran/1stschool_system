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
                    <form action="update_subject.php" method="post">
<div class="row">
                  <div class="col-md-3">
<h2> Select the Class:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
 
                        <select id="class" class="form-control" name="class" style="width:100%;" >

 <option value="">Select Class </option>
<?php

 $query1 = "SELECT DISTINCT class, class FROM `subject` ORDER BY class ASC ";
                        $result1 = mysqli_query($link, $query1);
                        
while($row1 = mysqli_fetch_array($result1))
                        {

$class= $row1['class'];
?>
   
                    
                        <option value="<?php echo $class?> "><?php echo $class?></option>
                     <?php }?>  
                      </select><br/><br/>

                  </div>
<div class="col-md-3">
<h2> Select Section:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">

                  <select id="term" class="form-control" name="section" style="width:100%;" >

                        <option value="M">Boys</option>
                        <option value="F">Girls</option>
                        <option value="M+F">Both</option> 
                  </select> </div>

       <div class="col-md-3">
 <h2> Select the Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
                         <select id="class" class="form-control" name="subject" style="" >
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


                  <div class="col-md-3">
                    <div class="row">
<h2 style="text-align:center;"> Action:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;"> 
                        <button type="submit" name="update" class="form-control btn btn-primary">Update</button>
                    </div></div>
                  </div>
                   </form>





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
