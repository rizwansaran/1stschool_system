<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All classes!</title>
    <?php include 'php/head.php.inc'; ?>
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
                  <div class="x_content">
                       <?php if(!isset($_POST['class'])){
                                          ?>
                        <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                    <select id="class" class="form-control" name="class" style="width:100%;" >
                                            <?php
                                                $query1 = "SELECT DISTINCT class FROM `student`ORDER BY class DESC ";
                                                $result1 = mysqli_query($link, $query1);                      
                                                while($row1 = mysqli_fetch_array($result1)){
                                                $class= $row1['class'];
                                            ?>
                                            <option value="<?php echo $class?>"><?php echo $class?></option>
                                             <?php }?>  
                                    </select><br/><br/>
                                </div>
                            <div class="col-md-3">
                                    <select id="class" class="form-control" name="section" style="width:100%;" >
                                        <option value="M">Boys</option>
                                        <option value="F">Girls</option>
                                        <option value="M+F">Both</option>
                                    </select><br/><br/>
                                </div>
                            <div class="col-md-3">
                                <select id="class" class="form-control" name="monthyear" style="width:100%;" >
                                <?php 
                                    $query2 = "SELECT * FROM `financial_year`WHERE `status`='active' ";
                                        $result2 = mysqli_query($link, $query2);
                                        if(mysqli_num_rows($result2) > 0){
                                            $fe = mysqli_fetch_array($result2);
                                            $start_date= $fe['year_start_date'];
                                            $end_date= $fe['year_end_date'];
                                            $installments= $fe['installments'];
                                    if($installments=='12'){  
                                            $start_month=date('n',strtotime("$start_date"));
                                            $start_year=date('Y',strtotime("$start_date"));
                                            
                                            for($i=1;$i<=$installments;$i++) {
                                            if($i==1){
                                                $month_number1=$start_month;
                                            }
                                            else {
                                                $month_number1=$start_month + $i - 1;
                                            }
                                            if($month_number1<=12){
                                                $month_number=$month_number1;
                                                $year=$start_year;
                                            }
                                            if($month_number1>12){
                                                $month_number=$month_number1-12;
                                                $year=$start_year+1;
                                             }
                                            
                                            if($month_number=='1'){
                                                $month="January";
                                            }
                                            else if($month_number=='2'){
                                                $month="February";
                                            }
                                            else if($month_number=='3'){
                                                $month="March";
                                            }
                                            else if($month_number=='4'){
                                                $month="April";
                                            }
                                            else if($month_number=='5'){
                                                $month="May";
                                            }
                                            else if($month_number=='6'){
                                                $month="June";
                                            }
                                            else if($month_number=='7'){
                                                $month="July";
                                            }
                                            else if($month_number=='8'){
                                                $month="August";
                                            }
                                            else if($month_number=='9'){
                                                $month="September";
                                            }
                                            else if($month_number=='10'){
                                                $month="October";
                                            }
                                            else if($month_number=='11'){
                                                $month="November";
                                            }
                                            else if($month_number=='12'){
                                                $month="December";
                                            }
                                        
                                    ?>
                                        <option value="<?php echo $month_number;?>-<?php echo $year;?>"><?php echo $month;?>-<?php echo $year;?></option>
                                     <?php
                                    }
                                 }  }
                                     ?>
                                </select><br/><br/>
                            </div>
                            <div class="col-md-2">
                                    <button type="submit" class="form-control btn btn-primary">View</button>
                            </div>
                        </div>
                        </form>
                         <?php } ?>
                      <br>
                    <div class="table-responsive">
                        
                    <?php  if(isset($_POST['class'])){
                        $class = $_POST['class'];
                        $section = $_POST['section'];
                        $monthyear = $_POST['monthyear'];
                        $dateParts = explode('-', $monthyear);
                        $_month = $dateParts[0];
                        $_year = $dateParts[1];
                        if($section=='M+F')
                        {
                        $section1="Boy + Girls";
                        }
                        else if($section=='M'){
                        $section1="Boy";
                        }
                        else if($section=='F'){
                        $section1="Girls";
                        }
                        // if($section=='M+F'){
                        //                         $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        // }
                        // else {   $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
                        // }
                        //                         $result1 = mysqli_query($link, $query1);
                        //                         $row1 = mysqli_num_rows($result1);

                        ?>
                       
                    <h2 style="color:Black; text-align:center; border: 1px solid black;"> <?php echo  $class; ?> - <?php echo  $section1; ?></h2>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" > 
                           <button style="float:right;" class="noprint btn btn-primary" onClick="window.print()"><i class="fa fa-print"> </i> Print</button> 
                        </div>
                    <table id="" class="table table-striped jambo_table bulk_action">
                        <thead>
                             <tr class="headings">
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Sr.#</th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">File No.</th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Name </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Father name </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Class </th>
                                 <th class="column-title" style="text-align:center; border: 1px solid black;">Total Fee </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Fee Paid </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Balance</th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
                               
                                <!--<th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>-->
                                <!--<th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>-->
                                   
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $class = $_POST['class'];
                            $section = $_POST['section'];
                            if($section=='M+F'){
                                $query = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                            }
                            else {   
                                $query = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
                            }
                            $result = mysqli_query($link, $query);
                            $c=1;
                            while($row = mysqli_fetch_array($result)){
                                  $studentid = $row['id'];
                        ?>
                          <tr class="even pointer">
                            <td class=" "style="text-align:center; border: 1px solid black;"><?php echo $c; ?> </td>
                            <td class=" "style="text-align:center; border: 1px solid black;"><?php echo $row['id']; ?> </td>
                            <td class=" " style="text-align:center; border: 1px solid black;"><?php echo $row['fullname']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid black;"><?php echo $row['fname']; ?></td>
                            <td class=" "style="text-align:center; border: 1px solid black;"><?php echo  $class; ?> - <?php echo  $section1; ?></td>
                             <td class=" "style="text-align:center; border: 1px solid black;"> <?php
                               // Initialize total fees for all active students
                                    $total_fee = 0;
                                        // Calculate the total fees for the student for the specified month and year
                                        $query3 = "SELECT 
                                                    SUM(teution_fee) AS total_fee, 
                                                    SUM(registration_fee) AS total_reg_fee, 
                                                    SUM(admission_fee) AS total_adm_fee, 
                                                    SUM(transport_fee) AS total_trans_fee, 
                                                    SUM(sports_fee) AS total_sports_fee, 
                                                    SUM(paper_fund) AS total_paper_fund, 
                                                    SUM(books_charges) AS total_books_charges, 
                                                    SUM(uniform_charges) AS total_uniform_charges, 
                                                    SUM(annual_charges) AS total_annual_charges, 
                                                    SUM(others) AS total_others 
                                            FROM chalan 
                                            WHERE class = '$class' AND `student_id` = '$studentid' AND feemonth ='$_month' AND year ='$_year'";
                                        $result3 = mysqli_query($link, $query3);
                                        if ($result3) {
                                            $row3 = mysqli_fetch_assoc($result3);
                                            // Add the student's fees to the total
                                            $total_fee = $row3['total_fee'] + $row3['total_reg_fee'] + $row3['total_adm_fee'] + $row3['total_trans_fee'] + $row3['total_sports_fee'] + $row3['total_paper_fund'] + $row3['total_books_charges'] + $row3['total_uniform_charges'] + $row3['total_annual_charges'] + $row3['total_others'];
                                        } else {
                                            echo "Error executing the query: " . mysqli_error($link);
                                        }
                                    // Now you have the total fees for all active students
                                    echo $total_fee;
                                ?>  
                          
                                </td>
                            <td class=" "style="text-align:center; border: 1px solid black;">
                                   <?php
                                        // $fee = 0;
                                      
                                        // $query2 = "SELECT SUM(amount) AS totalAmount FROM fee WHERE studentid = '$studentid' AND class = '$class' AND feemonth ='$_month' AND feeyear = '$_year'";
                                        // $result2 = mysqli_query($link, $query2); 
                                        // $row2 = mysqli_fetch_assoc($result2);
                                        // $fee = $row2['totalAmount'];
                                        // echo $fee;
                                    ?>
                            </td>
                            <td class=" "style="text-align:center; border: 1px solid black;">
                               <?php
                               
                                    // echo $total_fee - $fee;
                                ?>         
                           </td>
                          
                           <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
                           <td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>
                           <!--<td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>-->
                           <!--<td class=" "style="text-align:center; border: 1px solid black;"><?php echo " "; ?></td>-->
                                                    
                        </tr>
                          <?php $c++; }?>
                        </tbody>
                      </table>
                    <?php
                    }?>
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