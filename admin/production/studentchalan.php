<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
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
               
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate action="studentchalan3.php" method="post" enctype="multipart/form-data">
                 <div class="row" >
                        <div class="col-md-4">
                           
<select id="class" class="form-control" name="id" style="width:100%;" >

 <option value="">Select Student </option>
<?php
$batch1 = date("n", strtotime("+4 hours"));
 $querya = "SELECT * FROM `chalan`  WHERE  `feemonth`= '$batch1' ";
                        $resulta = mysqli_query($link, $querya);
                        
while($rowa = mysqli_fetch_array($resulta))
                        {

$studentid= $rowa['studentid'];
 $query11 = "SELECT * FROM `student` WHERE `id`= '$studentid'  ";
                        $result11 = mysqli_query($link, $query11);

                        
while($row11 = mysqli_fetch_array($result11))
                        {
$stid= $row11['id'];
$stname= $row11['fullname'];


?>
   
                    
                        <option value="<?php echo $stid?> "><?php echo $stname?></option>
                     <?php }}?>  
                      </select>
</div>
<div class="col-md-3 "> </div>

  <div class="col-md-3 ">
                        
                          <button type="submit" class="btn btn-primary form-control">Find</button>
                        </div> 
                      </div>
                    </form>
                    <!-- end form for validations -->

                    <?php
                    if (isset($_POST['id'])) {
                       $id = $_POST['id'];
                       $query = "SELECT * FROM `student` WHERE `id` = '$id'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        $student = mysqli_fetch_array($result);
$class= $student['class'];
$batch = date("n");
                        ?>
                        <br><br><br>
                        <div class="row">
                          </div>
                        <?php
                      
                        $query = "SELECT * FROM `chalan` WHERE studentid = '$id' AND feemonth= '$batch'";
                       $result = mysqli_query($link, $query);
                       if($result && mysqli_num_rows($result)){
                        ?>
                        <br>
                        <div class="table-responsive">
 <table class= "" width='100%'>
		        
                            <tbody>
<tr class=" ">
<td class=" " align="center"> Bank Copy</td> 
<td class=" ">               </td>
<td class=" " align="center"> Department Copy</td>
<td class=" ">               </td>
<td class=" " align="center">Treasure Copy</td>
<td class=" ">               </td>
<td class=" " align="center"> Student Copy</td>
<td class=" ">               </td>
</tr>
<?php 

 $query1 = "SELECT * FROM `insti_name` ";
                       $result1 = mysqli_query($link, $query1);
                      
                        $row = mysqli_fetch_array($result1);
$name= $row['full_name'];
$image= $row['logo'];
?>

<tr class=" "> 
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/> </td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/> </td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b> <br/><br/></td> 
<td class=" ">               </td>
<td class=" "> <img src=" <?php echo $image;?>" class="" width='30' height='30'><b> <?php echo $name;?></b><br/><br/> </td> 
 
               
<td class=" ">               </td>  </tr>

<tr class=" ">   
 <td class=" "> Name:   <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> Name:   <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>
 
<td class=" "> Name:   <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> Name:   <?php echo $student['fullname']; ?> </td> 
<td class=" ">               </td>   </tr>

<tr class=" ">  

<td class=" "> Father Name:  <?php echo $student['fname']; ?> </td> 
<td class=" ">               </td>

<td class=" "> Father Name:  <?php echo $student['fname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> Father Name:  <?php echo $student['fname']; ?> </td> 
<td class=" ">               </td>
<td class=" "> Father Name:  <?php echo $student['fname']; ?> </td> <td class=" ">               </td>   </tr>
<tr class=" ">   

<td class=" "> Roll No.:    <?php echo $id; ?> </td> 
<td class=" ">               </td>
<td class=" "> Roll No.:    <?php echo $id; ?> </td> 
<td class=" ">               </td>
<td class=" "> Roll No.:    <?php echo $id; ?> </td> 
<td class=" ">               </td>
<td class=" "> Roll No.:    <?php echo $id; ?> </td>
<td class=" ">               </td>    </tr>
<tr class=" ">  

<td class=" "> Class:    <?php echo $student['class']; ?> <br/><br/></td> 
<td class=" ">               </td>
<td class=" "> Class:    <?php echo $student['class']; ?><br/><br/> </td>
<td class=" ">               </td>
<td class=" "> Class:    <?php echo $student['class']; ?> <br/><br/></td>
<td class=" ">               </td>
<td class=" " > Class:    <?php echo $student['class']; ?> <br/><br/></td> 
<td class=" ">               </td>   </tr>

                            </td>
                        </tr>


                      
                        </tbody>
                      </table>

 <table class=" table jambo_table ">
		        
                            <tbody>

                                                 <?php
                        while($fee = mysqli_fetch_array($result)){
                          ?>
<tr class="even pointer">  
<td class="" style="text-align:left;"  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
<td class=""  > <b> Details </b> </td> 
                            <td class=" "> <b>  Amount  </b></td>
                         
 </tr>

                          <tr class="even pointer">  
<td class=""  > Registration Fee  </td> 
                            <td class=" ">   <?php echo $fee['registrationfee']; ?></td>
<td class="" border-left="1px ">Registration Fee  </td> 
  <td class=" ">   <?php echo $fee['registrationfee']; ?></td> 
            <td class=" ">Registration Fee  </td>              
  <td class=" ">  <?php echo $fee['registrationfee']; ?></td> 
                         <td class=" ">Registration Fee  </td> 
  <td class=" ">   <?php echo $fee['registrationfee']; ?></td> 
                         
 </tr>
                         <tr class="even pointer">  
 <td class=" "> Pending Dues </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Pending Dues </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Pending Dues </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
<td class=" "> Pending Dues </td>
 <td class=" ">   <?php echo $fee['examsfee']; ?> </td>
     
                        <tr class="even pointer"> 
<td class=" "> Tuition Fee </td> 
    <td class=" ">     <?php echo $fee['teutionfee']; ?></td> 
<td class=" "> Tuition Fee </td>	
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 	
<td class=" "> Tuition Fee </td>
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 
<td class=" "> Tuition Fee </td>	
    <td class=" ">    <?php echo $fee['teutionfee']; ?></td> 	
   
                          <tr class="even pointer">  
<td class=" "> Transport Fee </td>
 <td class=" ">     <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
<td class=" ">      <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
 <td class=" ">     <?php echo $fee['transportfee']; ?></td> 
<td class=" "> Transport Fee </td>
 <td class=" ">    <?php echo $fee['transportfee']; ?></td> 
  
                          <tr class="even pointer"> 
<td class=" "> Fine </td> 
 <td class=" ">      <?php echo $fee['fine']; ?></td> 
<td class=" "> Fine </td> 
<td class=" ">      <?php echo $fee['fine']; ?></td> 
<td class=" "> Fine </td> 
 <td class=" ">     <?php echo $fee['fine']; ?></td> 
<td class=" "> Fine </td> 
 <td class=" ">     <?php echo $fee['fine']; ?></td> 
  
<tr class="even pointer">  
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
<td class=" "> Miscellaneous Fee </td> 
<td class=" ">      <?php echo $fee['others']; ?></td>
                          
                            
                        
<?php     
$total = $fee['registrationfee'] + $fee['examsfee'] + $fee['teutionfee'] + $fee['transportfee'] + $fee['fine'] + $fee['others'];
     ?>
<tr class="even pointer"> 
<td class=" "> <b>Total  </td> 
<td class=" "> <b>   <?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
<td class=" "> <b>Total  </td> 
<td class=" ">    <b><?php echo $total; ?></td>
                          
                            </td>
                        </tr>


                          <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                        <?php
                       }else{
                        //no fee history
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No fee history found!</h3></div>                
                        </div>
                        <?php
                       }
                       }else{
                        ?>
                        <br><br><br>
                        <div class="row">
                          <div class="col-md-4"><h3>No student found!</h3></div>                
                        </div>
                        <?php
                       }
                     } 
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
