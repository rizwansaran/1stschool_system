<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($link, $_POST['name']);

    // Check if name already exists (excluding the current class)
    $checkQuery = "SELECT * FROM `classes` WHERE `name` = '$name' AND `id` != $id";
    $checkResult = mysqli_query($link, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $msg = "Class name already exists.";
    } else {
        // Update class name
        $updateQuery = "UPDATE `classes` SET `name` = '$name' WHERE `id` = $id";
        if (mysqli_query($link, $updateQuery)) {
            $msg = "Class name updated successfully.";
        } else {
            $msg = "Error updating class: " . mysqli_error($link);
        }
    }

    // Redirect after updating with message
    header("Location: viewclasses.php?msg=" . urlencode($msg));
    exit();
}

// Fetch class details only if the page is loaded for editing (not for form submission)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `classes` WHERE `id` = $id";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result)> 0 && $row = mysqli_fetch_assoc($result)) {
        $currentName = $row['name'];
    } else {
        $msg = "Class not found.";
        $currentName = "";
        header("Location: viewclasses.php?msg=" . urlencode($msg));
         exit();
    }
    
} else {
    $msg = "Invalid class ID.";
    $currentName = "";
    header("Location: viewclasses.php?msg=" . urlencode($msg));
    exit();

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Class</title>
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
                        <h3>Edit Class</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Update Class: <?php echo isset($msg) ? "<span style='color: green;'>$msg</span>" : ''; ?></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php if( $currentName != ""){ ?> 
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Class Name * :</label>
                                            <input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($currentName); ?>" required />
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="form-control btn btn-primary" style="margin-top:25px;">Update</button>
                                        </div>
                                    </div>
                                </form> 
                                <?php }
                                else{ ?>
<a href="viewclasses.php"><button type="button" class="form-control btn btn-primary" style="width:250px;">Go Back</button></a>

                               <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        
    </div>
</div>

<?php include 'php/footer.php.inc'; ?>
</body>
</html>
