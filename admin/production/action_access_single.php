
                    <form action="" method="post">
                  <div class="col-md-8">
                    <div class="row">
  <h2> Select the Teacher:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                        <select id="class" class="form-control" name="teacher" style="width:50%;" >
                          <?php
                        
                          $sql = "SELECT * FROM `staff`";
                          $teachers = mysqli_query($link, $sql);
                          while ($teacher = mysqli_fetch_assoc($teachers)) {

                          ?>
                        <option value="<?php echo $teacher['id'];?>"> <?php echo $teacher['fullname']; ?></option>
                        <?php   
                           } ?>
                        
                      </select>
                      <br/>

                       
                  <h2> Date till Access is grantd:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input placeholder="Select Date" class="form-control" type="date"  name ="date"  style="width:50%;" required />
                  </div>
                  </div>
                  
                </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <div class="row">
                        <button type="submit" name= "submit" class="form-control btn btn-primary">Grant Access</button>
                    </div>
                  </div>
                   </form>
                    <?php if(isset($_POST['submit'])){
                      ?>
                      <br>
                    <div class="table-responsive">
                        <?php
                        


$teacher = $_POST['teacher'];
 $d =date("Y-m-d");
    $date = $_POST['date'];
   $queryy = "SELECT * FROM `staff` WHERE `id`='$teacher' ";
                          $resultt = mysqli_query($link, $queryy);
                         $resuu = mysqli_fetch_array($resultt);

$atd = $resuu['class'];
$section = $resuu['section'];


$query = "SELECT * FROM `access_single` WHERE `t_id`='$teacher' ";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
 $query1 = "UPDATE `access_single` SET `p_date`='$d',`d_date`='$date',`atd`='$atd',`section`='$section' WHERE `t_id`='$teacher'";
  $result1 = mysqli_query($link, $query1); 

    if($result1==TRUE){
echo "Record is updated Successfully!";
}
else{
echo mysqli_error($link);}



   
  }
else
{ 
$query ="INSERT INTO `access_single`(`t_id`,`p_date`,`d_date`,`atd`,`section`) VALUES ('$teacher','$d','$date','$atd','$section')  ";
    $result = mysqli_query($link, $query); 

 if($result==TRUE){
echo "Record is inserted Successfully!";
}
else{
echo mysqli_error($link);
}

} }

?>