<?php
require 'php/config.php';
$error = "";
if(!isLoggedIn()){
  header('location:login.php');
}else{
  if(isset($_POST['name'])){
    $name =$_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['quantity'] * $_POST['price'];
    $query = "INSERT INTO `inventory`(`name`, `quantity`, `price`) VALUES ('$name', '$quantity', '$price')";
    $result = mysqli_query($link, $query);
    if($result) $error = "Added successfully!";
    else $error = mysqli_error($link);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add new item to inventory!</title>
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
                <h3>Inventory</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Item<?php
                  echo '    -    '.$error; 
                  ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="addinventory.php" method="post" enctype="multipart/form-data">
                      <label for="fullname">Item Name * :</label>
                      <input type="text" id="fullname" class="form-control" name="name" required />
                      <label for="city">Item quantity * :</label>
                      <input type="number" id="cityofbirth" class="form-control" name="quantity" data-parsley-trigger="change" required />

                      <label for="address">Price per item * :</label>
                      <input type="number" id="address" class="form-control" name="price" data-parsley-trigger="change" required />
                      <br>
                      <button type="submit" class="btn btn-primary">Add</button>

                    </form>
                    <!-- end form for validations -->

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
