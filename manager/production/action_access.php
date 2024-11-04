                    <form action="" method="post">
                  <div class="col-md-8">
                    <div class="row">

                       
                  <h2> Date till Access is granted:</h2><hr style="width:20%;margin-left:-1px;margin-top:-1px;">
                  <div class="form-group">
                  <input placeholder="Select Date" class="form-control" type="date" required/  name ="date" style="width:50%;">
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
                        



    $date = $_POST['date'];
    $d =date("Y-m-d"); 
$query = "SELECT * FROM `sys`  ";
                          $result1 = mysqli_query($link, $query);
                          if($result1 && mysqli_num_rows($result1) > 0){
        
$query ="UPDATE `sys` SET `p_date`='$d',`d_date`='$date'";
    $result = mysqli_query($link, $query); 

   if($result==TRUE){
echo "Record is updated Successfully!";
}
else{
echo "Error while updating records!";}
 
  }
else
{
$query ="INSERT INTO `sys`(`id`, `p_date`, `d_date`) 
                    VALUES ('','$d','$date') ";
    $result = mysqli_query($link, $query); 



 if($result==TRUE){
echo "Record is inserted Successfully!";
}
else{
echo "Error while inserting records!";}


}


}

?>


 <?php
                  ?>