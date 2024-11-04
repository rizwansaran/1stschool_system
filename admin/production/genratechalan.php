<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['student'])){
    $id = $_POST['student'];
$month = $_POST['month'];    
$year = $_POST['batch'];
    $registrationfee = $_POST['registrationfee']; 
$examsfee = $_POST['examsfee']; 
$teutionfee = $_POST['teutionfee'];
    $transportfee = $_POST['transportfee'];
 $fine = $_POST['fine'];
 $others = $_POST['others'];
   $query = "INSERT INTO `genratechalan`(`studentid`, `feemonth`, `year`, `registrationfee`, `examsfee`, `teutionfee`, `transportfee`, `fine', `others`) VALUES('$id', '$month', '$year','$registrationfee', '$examsfee', '$teutionfee', '$transportfee', '$fine', '$others')";
    $result = mysqli_query($link, $query);
    if($result) $error = "Submitted succesfully!";
else
{
$error = mysqli_error($link);
}
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Genrate Chalan!</title>
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
                <h3>Ledger</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Genrate Chalan <?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="genratechalan.php" method="post" enctype="multipart/form-data">
                      <label for="id">Student id * :</label>
                      <div class="row"?>
                        <div class="col-md-6">
                          <input type="number" id="id" class="form-control" name="id" required value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>"/>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php
                    if (isset($_POST['id'])) {
                       $id = $_POST['id'];
                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>Name: <?php echo $student['fullname'];?></h3></div>
                          <div class="col-md-4"><h3>Father name: <?php echo $student['fname'];?></h3></div>
                          <div class="col-md-4"><h3>Class: <?php echo $student['class'];?></h3></div>
                        </div>
                        <br><br><br>
                          <form action="genratechalan.php" method="POST">
                          <input type="hidden" value="<?php echo $id; ?>" name="student"/>
                            <div class="row">
                              <div class="col-md-4">
                                <h3>Year</h3>
                                <div class="row">
                                   <select id="batch" class="form-control" name="batch" >
                                    <option value="<?php echo $student['batch'];?>"><?php echo $student['batch'];?></option>
                                    
                                  </select>
                                                               </div>
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                                <h3>Month</h3>
                                <div class="row">
                                  <select id="batch" class="form-control" name="month" >
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">October</option>
                                    <option value="10">September</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>\
                                  </select>
                                </div>
                              </div>
                              
                            </div>
                            <br><br>
                            <div class="row">
                              <div class="col-md-4">
<h3>Registration Fee</h3>
                                <input type="number" name="registrationfee" required class="form-control"/>
                              
<h3>Exams Fee</h3>
                                <input type="number" name="examsfee" required class="form-control"/>
 <h3>Teution Fee</h3>
                                <input type="number" name="teutionfee" required class="form-control"/>
                                                                                           
<h3>Transport Fee</h3>
                                <input type="number" name="transportfee" required class="form-control"/>
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                              
                                <input type="hidden" name="fine" value="0" class="form-control"/>
 <h3>Others</h3>
                                <input type="number" name="others" required class="form-control"/>
                                                          
 </div>
                            </div>
                            <br><br>
                            <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-2"></div>
                              <div class="col-md-4">
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                              </div>
                              
                            </div>
                          </form>
                          
                        
                        <?php
                       }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No student found!</h3></div>                
                        </div>
                        <?php
                       }
                     } 
                    ?>
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
