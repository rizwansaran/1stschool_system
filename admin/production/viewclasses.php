<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add classes</title>
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
                        <h3>Academia</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h2>All Classes: <?php echo isset($_GET['msg']) ? "<span style='color: red;'>{$_GET['msg']}</span>" : ''; ?></h2>
                            <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <div class="table-responsive">
                            <table id="example" class="table table-striped jambo_table bulk_action text-center" style="width: 100%; cellspacing: 0;">
                                 <thead>
                                    <tr class="headings">
                                      <th class="column-title text-center">Sr.# </th>
                                      <th class="column-title text-center">ID </th>
                                      <th class="column-title text-center">Class Name </th>
                                      <th class="column-title text-center">Created At </th>
                                      <th class="column-title text-center">Updated At </th>
                                      <th class="column-title text-center">Action </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php 
                                        $query = "SELECT * FROM `classes` ORDER BY `name` ASC";
                                        $result = mysqli_query($link, $query);
                                        $c=1;
                                        if (mysqli_num_rows($result) > 0) {
                                          while($row = mysqli_fetch_array($result)){
                                          ?>
                                            <tr class="even pointer">
                                              <td class=" "><?php echo $c; ?></td>
                                              <td class=" "><?php echo $row['id']; ?></td>
                                              <td class=" "><?php echo $row['name']; ?></td> 
                                              <td class=" "><?php echo $row['created_at']; ?></td> 
                                              <td class=" "><?php echo $row['updated_at']; ?></td> 
                                              <td class=" "><a href="editclasses.php?id=<?php echo $row['id'];?>"><button type="submit" class="form-control btn btn-primary">Update</button></a></td> 
                                            </tr>
                                            <?php 
                                            $c++; 
                                          }  
                                        }else {
                                          echo "<tr><td colspan='5 style='text-align: center;'>No classes available</td></tr>";
                                        }   
                                      ?>
                                  </tbody>
                                </table>
                                </div>
                            </div>
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
