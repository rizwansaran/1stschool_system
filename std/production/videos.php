<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
           
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
 <?php if(!isset($_POST['submit'])){
                      ?>
                   <form action="" method="post">
                 
                    
  <div class="col-md-8">
                       
                  <h2> Select a Subject:</h2><hr style="width:100%;margin-left:-1px;margin-top:-1px;">
           
              <select id="class" class="form-control" name="date" style="width:30%;" >


<?php
                        
                         $id = $_SESSION['id'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];
$section = $r['gender'];
                       

          $query = "SELECT DISTINCT subject FROM `videos` WHERE `class` ='$class'AND `section` ='$section' OR `class` ='$class'AND `section` ='M+F'";
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


                    <?php } if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        
                         $id = $_SESSION['id'];
                        $query = "SELECT * FROM `student` WHERE `id`='$id'";
                        $r = mysqli_fetch_array(mysqli_query($link, $query));
                        $class = $r['class'];
$section = $r['gender'];
                        $date=$_POST['date'];

         
 

  $query = "SELECT * FROM `videos` WHERE `subject`='$date' AND `class` ='$class' AND `section` ='$section' OR `subject`='$date' AND `class` ='$class'AND `section` ='M+F'";
                          $result1 = mysqli_query($link, $query);
                          while($res = mysqli_fetch_array($result1)){ 

$text = $res['name'];



preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $text, $match);
$youtube_id = $match[1];




                          ?>

 <table class="table table-striped jambo_table bulk_action">
                        
                          
                          <hr>
                            <thead>
                          <tr class="headings">
                            <th class="column-title"><h3 style="color:white; text-align:center"> <b>Video Lectures <?php echo  $date; ?></b> </h3> </th>
                            
                          </tr>
                        </thead>

                     
<tbody>
<tr class="even pointer">
                           

  <td class=" "><iframe width="400" height="300" src="//www.youtube.com/embed/<?php echo $youtube_id;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </td>

              
                 

<tr class="even pointer">
                           

  <td class=" "><blink><h2 style="color:red; text-align:left"> Posted Date: <?php echo $res['p_date']; ?> </h2></blink>

                            
                            </td>

</tr>

</table>
                      

 
<?php } }?>       


</div>
                </div>
              </div>
            </div>
          </div>
        </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- /page content -->

     <?php include 'php/footer.php.inc'; ?>
  </body>
</html>
