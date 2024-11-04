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
                <h3>Inventory <small>All items</small></h3>
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
                            <th class="column-title">Item </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Unit Price </th>
 <th class="column-title">Total Price </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        $query = "SELECT * FROM `inventory`";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $row['name']; ?></td>
                            <td class=" "><?php echo $row['quantity']; ?> </td>

                           
<?php 
$q= $row['quantity'];
$p= $row['price'];
$r=$p/$q;
?>
<td class=" "><?php echo $r; ?></td>
 <td class=" "><?php echo $row['price']; ?></td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
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
