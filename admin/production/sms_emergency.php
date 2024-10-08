
<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>chat</title>
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
                <h3>Conversation</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <form action="" method="post">
                  <div class="col-md-8">
                    <div class="row">
 
                       
 
 
                        
                      </select> 
                      <br/>

                  <h2> Message</h2><hr style="width:50%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <textarea name="msg" style="width:80%;" rows="8"></textarea></div>

                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name="submit" class="form-control btn btn-primary">Send</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php

$query121 = "SELECT * FROM `insti_name` ";
                          $result121 = mysqli_query($link, $query121);
 $res121 = mysqli_fetch_array($result121);
                       
                       
$name = $res121['abri'];

                       
    $massege = $_POST['msg'];

                       
                          $sql = "SELECT * FROM `student` WHERE `status`='Active'";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                      
 <?php  $id=$teacher['id']; 
$name= $teacher['fullname']; 


$mobileno = $teacher['mobile'];

 $querysms= "SELECT * FROM `sms_confg` ";
                          $resultsms = mysqli_query($link, $querysms);
            

if (mysqli_num_rows($resultsms) > 0) {

                         $ressms = mysqli_fetch_array($resultsms);
                           $api_token = $ressms['api_token']; 
                         
                           $api_secret = $ressms['api_secret']; 
                         
}
else {
    
     $api_token = "000000000000000";
     
                         
                           $api_secret = "00000000"; 
    
}

$url = "https://lifetimesms.com/plain";

    $parameters = [
        "api_token" => "$api_token",
        "api_secret" => "$api_secret",
          "to" => "$mobileno",
        "from" => "$name",
        "message" => "$massege",
    ];

    $ch = curl_init();
    $timeout  =  30;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response ;






}
$msg=$response;

 echo "<script type='text/javascript'>window.location.href ='sms_emergency.php?msg=$msg';</script>";
  


                  } ?>
                       
                            
                          
                        </tbody>
                      </table>
                    </div>
                    <?php
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
