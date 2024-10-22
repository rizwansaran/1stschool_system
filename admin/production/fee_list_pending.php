<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pending Fee List!</title>
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
                                         <option value="all"><?php echo "All Classes";?></option>
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
                                    <select id="section" class="form-control" name="section" style="width:100%;" >
                                        <option value="all">All Sections</option>
                                        <option value="M">Boys</option>
                                        <option value="F">Girls</option>
                                        <option value="M+F">Both</option>
                                    </select><br/><br/>
                                </div>
                            <div class="col-md-3">
                                <select id="monthyear2" class="form-control" name="monthyear" style="width:100%;" >
                                <?php
                                  $query1 = "SELECT DISTINCT feemonth, year FROM `chalan` ORDER BY id ASC";
                                  $result1 = mysqli_query($link, $query1);
                                
                                  while($row1 = mysqli_fetch_array($result1)) {
                                      $fee_month = $row1['feemonth'];
                                      $fee_year = $row1['year'];
                                      $current_year = date('Y');
                                      $current_month = date('n');
                                      // Convert numeric month to month name
                                      $monthName = date('F', mktime(0, 0, 0, $fee_month, 10)); 
                                  ?>
                                      <option value="<?php echo $fee_month . '-' . $fee_year; ?>"
                                      <?php if($current_year == $fee_year && $current_month ==$fee_month){?> selected <?php }?> ><?php echo $monthName; ?> - <?php echo $fee_year; ?></option>
                                  <?php 
                                  }
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
                        $get_class = $_POST['class'];
                         if($get_class == "all"){
                            $class1 = "All Classes"; 
                         }
                         else{
                             $class1 = $get_class;
                         }
                        
                        $section = $_POST['section'];
                        $monthyear = $_POST['monthyear'];
                        $dateParts = explode('-', $monthyear);
                        $_month = $dateParts[0];
                        $_year = $dateParts[1];
                        $month_name = date('F', mktime(0, 0, 0, $_month, 10)); 
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
                        else{
                              $section1="All Sections ";
                        }
                        // if($section=='M+F'){
                        //                         $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `status`='Active'";
                        // }
                        // else {   $query1 = "SELECT * FROM `student` WHERE `class`='$class' AND `gender`='$section' AND `status`='Active'";
                        // }
                        //                         $result1 = mysqli_query($link, $query1);
                        //                         $row1 = mysqli_num_rows($result1);

                        ?>

                        <?php 

                        $query1 = "SELECT * FROM `insti_name` ";
                                            $result1 = mysqli_query($link, $query1);
                                            
                                            $row = mysqli_fetch_array($result1);
                        $name= $row['full_name'];
                        $image= $row['logo'];
                        ?>

                        
                  <h2 style="text-align:center; text-transform: uppercase; font-family: "Times New Roman", Times, serif;"> <img src=" <?php echo $image;?>" class="" width='60' height='50'><b> <?php echo $name;?> </h2><br/> 
                        
                       
                    <h3 style="color:Black; text-align:center; border: 0px solid black;"> <?php echo  $class1; ?> - <?php echo  $section1; ?></h3>
                    <h2 style="color:Black; text-align:center; border: 0px solid black;" >Pending Fee List for <?php echo $month_name."-".$_year ?> </h2>
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
                                <th class="column-title" style="text-align:center; border: 1px solid black;">Balance</th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
                                <th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>
                               
                                <!--<th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>-->
                                <!--<th class="column-title" style="text-align:center; border: 1px solid black;">_____ </th>-->
                                   
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $get_class = $_POST['class'];
                            if($get_class == "all"){
                                  $query = "SELECT * FROM `student` WHERE `status`='Active' AND NOT EXISTS (
                                                                                                                SELECT 1
                                                                                                                FROM fee
                                                                                                                WHERE fee.studentid = student.id AND feemonth ='$_month' AND feeyear = '$_year'
                                                                                                            ) ORDER BY `class` ASC";
                            }
                            else{
                            $section = $_POST['section'];
                            if($section=='M+F' || $section==''){
                                $query = "SELECT * FROM `student` WHERE `class`='$get_class' AND `status`='Active' AND NOT EXISTS (
                                                                                                                SELECT 1
                                                                                                                FROM fee
                                                                                                                WHERE fee.studentid = student.id AND feemonth ='$_month' AND feeyear = '$_year'
                                                                                                            )";
                            }
                            else {   
                                $query = "SELECT * FROM `student` WHERE `class`='$get_class' AND `gender`='$section' AND `status`='Active'AND NOT EXISTS (
                                                                                                                SELECT 1
                                                                                                                FROM fee
                                                                                                                WHERE fee.studentid = student.id AND feemonth ='$_month' AND feeyear = '$_year'
                                                                                                            )";
                            }
                            }
                            $result = mysqli_query($link, $query);
                            $c=1;
                            while($row = mysqli_fetch_array($result)){
                                  $studentid = $row['id'];
                                  $class = $row['class'];
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
                            
                                   <?php
                                        $fee = 0;
                                      
                                        $query2 = "SELECT SUM(amount) AS totalAmount FROM fee WHERE studentid = '$studentid' AND class = '$class' AND feemonth ='$_month' AND feeyear = '$_year'";
                                        $result2 = mysqli_query($link, $query2); 
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $fee = $row2['totalAmount'];
                                        // echo $fee;
                                    ?>
                          
                            <td class=" "style="text-align:center; border: 1px solid black;">
                               <?php
                               
                                    echo $total_fee - $fee;
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