<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daily report!</title>
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
                    <h2>Daily report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="feehistory.php" method="post" enctype="multipart/form-data">
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
                          <div class="col-md-4"><h3>Father name: <?php echo $student['fathername'];?></h3></div>
                          <div class="col-md-4"><h3>Class: <?php echo $student['class'];?></h3></div>
                        </div>
                        <?php
                        $query = "SELECT * FROM `fee` WHERE `studentid` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        ?>
                        <br><br><br>
                        <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title">Year </th>
                                <th class="column-title">Month </th>
                                <th class="column-title">Total </th>
                                <th class="column-title">Paid </th>
                                <th class="column-title">Timestamp </th>
                              </tr>
                            </thead>
                            <tbody>
                        <?php
                        while($fee = mysqli_fetch_array($result)){
                          ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $fee['feeyear']; ?></td>
                            <td class=" "><?php echo $fee['feemonth']; ?> </td>
                            <td class=" "><?php echo $fee['totalfee']; ?></td>
                            <td class=" "><?php echo $fee['amount']; ?></td>
                            <td class=" "><?php echo $fee['datetime']; ?></td>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                        <?php
                       }else{
                        //no fee history
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No fee history found!</h3></div>                
                        </div>
                        <?php
                       }
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
