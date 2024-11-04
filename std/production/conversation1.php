<?php
$page = $_SERVER['PHP_SELF'];
$sec1 = "1";
?>
<?php 



$myid = $_SESSION['id'];
//session_start();
$_SESSION['gid'] = $student['id'];
$studentid = $_SESSION['gid'];
$sql = "SELECT * FROM `conversation` WHERE `teacherid` = '$studentid' AND `studentid`='$myid'";
if(mysqli_num_rows(mysqli_query($link, $sql)) < 1){
  header('location:views_conversations.php');
}

$sql = "SELECT * FROM `staff` WHERE `id`='$studentid'";
$student = mysqli_fetch_assoc(mysqli_query($link, $sql));



?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>

<body class="nav-md">
                     <div class="table-responsive">

                     	<?php
                     	 
                        $sql = "SELECT * FROM `message` WHERE (`fromid`='$myid' AND `toid`='$studentid') OR (`fromid`='$studentid' AND `toid`='$myid')";
                        $result = mysqli_query($link, $sql);
                        if($result && mysqli_num_rows($result) > 0){
                         ?>
                        <table class="table table-striped jambo_table bulk_action">
<head>
 <tr class="headings" style= 'background-color:#0ff'>
                            
                            <th class="column-title" style= "text-align:center;">Persons </th>
                            <th class="column-title" style= "text-align:center;">Messages </th>
                           </tr>
                        
</head>

                       	<tbody>
                       	 <?php while($row = mysqli_fetch_array($result))
                        {

                          $text = $row['msg'];
                          if($row['fromid'] == $myid){
                            ?>
                            <tr class="odd pointer">
                            <td class=" " style="text-align:center;"><?php echo $_SESSION['name']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $text; ?></td>
                          </tr>
                            <?php
                          }else{
                            ?>
                            <tr class="even pointer">
                            <td class=" " style="text-align:center;"><?php echo $student['fullname']; ?></td>
                            <td class=" " style="text-align:center;"><?php echo $text; ?></td>
                          </tr>
                            <?php

                          }
                        ?>
                         <meta http-equiv="refresh" content="<?php echo $sec1?>">
   
                        
                          
                        <?php }?>
                         
                        </tbody>
                           <?php
                          
                            
                        }?>
                      </table> 

                   


                    </div>
                     
                       </body>
</html>
