<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All Inventory!</title>
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
                <h2>All Income </h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <div class="table-responsive">
                      
 <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
<th class="column-title"> ID </th>
                            <th class="column-title"> Name </th>
                            <th class="column-title">Amount</th>
                            <th class="column-title">Date </th>
<th class="column-title">Action </th>
                         </tr>
                        </thead>

                        <tbody>
                        <?php
$totalincome=0;
                        $query = "SELECT * FROM `income` ORDER BY id DESC";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
 <td class=" "><?php echo $row['id']; ?></td>
                            <td class=" "><?php echo $row['item_name']; ?></td>
<td class=" "><?php echo $row['item_price']; ?></td>

                            <td class=" "><?php $date=$row['date']; echo  date('d-m-Y', strtotime($date)); ?> </td>

                           
 <td class=" "><?php echo $row['id']; ?></td>
 
                          </tr>
                          <?php $totalincome=$totalincome + $row['item_price']; } ?>
 
                        </tbody>
                      </table>
<h2>Total Income: <?php echo $totalincome;?> </h2>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>

 <?php include 'script.php'; ?>
  </body>
</html>
