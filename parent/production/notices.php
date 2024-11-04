<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SubjectWise Diary</title>
    <?php include 'php/head.php.inc'; ?>


<style>
blink {
  -webkit-animation: 1s linear infinite condemned_blink_effect; // for Safari 4.0 - 8.0
  animation: 1s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for Safari 4.0 - 8.0
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
}
@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
75% {
    visibility: visible;
  }
  100% {
    visibility: visible;
  }
}

</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'php/sidebar.php.inc'; ?>
        <?php include 'php/topnav.php.inc'; ?>

        
        <!-- page content -->
        <div class="right_col" role="main">
         
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
             
 <?php if(!isset($_POST['submit'])){
                      ?>

<div class="row">

                    <form action="" method="post">
                 
                    
  <div class="col-md-8">
                       
                  <h2> Select a Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
           
              <select id="class" class="form-control" name="date" style="width:30%;" >


<?php
                        
                       $id = $_SESSION['sid'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];
$section = $r['gender'];
                       

          $query = "SELECT DISTINCT subject FROM `files1` WHERE `class` ='$class'AND `section` ='$section' OR `class` ='$class'AND `section` ='M+F'";
                          $result1 = mysqli_query($link, $query);
                        
 while($res = mysqli_fetch_array($result1)){
                          ?>
   

 <option value="<?php echo $res['subject']; ?>"><?php echo $res['subject']; ?> </option>

<?php }
?>

   </select>



                  </div>
               
               
                   
           <br><br><br/>
                
                  <div class="col-md-2">
             
                        <button type="submit" name= "submit" class="form-control btn btn-primary">View</button>
                    
                  </div>   
                   </form>

 </div>
                    <?php } if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        
                       $id = $_SESSION['sid'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];
$section = $r['gender'];
                        $date=$_POST['date'];

          $query = "SELECT * FROM `files1` WHERE `subject`='$date' AND `class` ='$class'AND `section` ='$section' OR `subject`='$date' AND `class` ='$class'AND `section` ='M+F'";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
                          ?>
                        <table class="table table-striped jambo_table bulk_action">
                        
                          
                          <hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title"><h3 style="color:white; text-align:center"> <b>Notice - <?php echo $date; ?></b> </h3> </th>
                            
                          </tr>
                        </thead>
                        <?php

                          while($res = mysqli_fetch_array($result1)){
                            ?>
                            
                        <tbody>

                         
                          <tr class="even pointer">
                            <td class=" "> <h3 style="color:black; text-align:center"> <a href="../../pdf/<?php echo $res['name']; ?>"><?php echo $res['name']; ?> </h3></a> 
                            
                            </td>
                          </tr>
                          

                        <tr class="even pointer">
                           

  <td class=" "><blink><h2 style="color:red; text-align:center"> Posted Date: <?php echo $res['p_date']; ?> </h2></blink>

                            
                            </td>


                          </tr>
                           
    
                          <?php }}?>
                        </tbody>
                      </table>
                    </div>
                    <?php
                    }?>


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
