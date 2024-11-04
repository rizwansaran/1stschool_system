
<?php   
require 'php/config.php';

$sid=$_SESSION['sid'];
$term=$_SESSION['term'];
$date=$_SESSION['date'];
$class =$_SESSION['class']; 
$count = count($sid);
$orderdate = explode('-', $date);
$year = $orderdate[0];



if(isset($_POST['submit1'])){

$query1 = "SELECT * FROM `subject` WHERE `class`='$class'";
                        $result1 = mysqli_query($link, $query1);
$a=0;
while($row1 = mysqli_fetch_array($result1))
                     { 
$sub= $row1['subject'];
foreach ($_POST as $key => $value) {
$sid=$_SESSION['sid'];
     //   $_course = mysqli_real_escape_string($link,$value[$a]);

     /* $query ="INSERT INTO `result`(`id`, `subject`, `total`, `marks`, `studentid`, `term`, `year`, `class`) 
    			          VALUES ('','$sub','100','$_course','$sid','$term','$year','$class')";
 $result = mysqli_query($link, $query); 

        */       
 echo "   "; echo "$sub"; echo "$value;<br />";

}
$a++;}

/*
if($result==TRUE){
echo "Record Inserted Successfully!";
}
else{
echo "Error While Inserting...!";  } 
*/
}
     ?>