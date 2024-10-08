<?php
require 'php/config.php';
if(!isLoggedIn()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All students!</title>
    <?php include 'php/head.php.inc'; ?>
<script>
function myFunction()
{
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    if (!tr[i].classList.contains('headings')) {
      td = tr[i].getElementsByTagName("td"),
      match = false;
      for (j = 0; j < td.length; j++) {
        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          match = true;
          break;
        }
      }
      if (!match) {
        tr[i].style.display = "none";
      } else {
        tr[i].style.display = "";
      }
    }
  }
}



</script>
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
               
<?php
                  if(isset($_GET['msg'])){
                    
                  
                  ?>
                  <h2 style="color:red"> Update Student - <?php error_reporting(0); echo $_GET['msg']; ?></h2>
           

<?php } else { ?>

 <h3>Academic Record for <small> Admission #: <?php  $student_id=$_GET['id']; echo $student_id; ?></small></h3>

<?php }
                  ?>
                 
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

                    <div class="table-responsive">
<?php
                       $student_id=$_GET['id'];
                        $query1 = "SELECT * FROM `academic` WHERE `user_id`='$student_id' ";
                        $result1 = mysqli_query($link, $query1);
                        $row1 = mysqli_fetch_array($result1);
$sscdegree=$row1['ssc_degree_name'];
$sscpyear=$row1['ssc_passing_year'];
$ssctmarks=$row1['ssc_t_marks'];
$sscomarks=$row1['ssc_obt_marks'];
$sscboard=$row1['ssc_board'];
$hsscdegree=$row1['hssc_degree_name'];
$hsscpyear=$row1['hssc_passing_year'];
$hssctmarks=$row1['hssc_t_marks'];
$hsscomarks=$row1['hssc_obt_marks'];
$hsscboard=$row1['hssc_board'];

$badegree=$row1['bachelor_degree_name'];
$bapyear=$row1['bachelor_passing_year'];
$batmarks=$row1['bachelor_t_marks'];
$baomarks=$row1['bachelor_obt_marks'];
$baboard=$row1['bachelar_uni'];


$madegree=$row1['master_degree_name'];
$mapyear=$row1['master_passing_year'];
$matmarks=$row1['master_t_marks'];
$maomarks=$row1['master_obt_marks'];
$maboard=$row1['master_uni'];

                        ?>


                   
 <div style="float:left; width:100%; margin-left:0px; float:left;">
           
			<h1 class="headbg" style=" border-bottom:2;">Previous Academic Record </h1>
            
<div style="float:left; color:#FF0000; font-size:14px;"> 


 </div>           

  <table id="" class="table table-striped jambo_table bulk_action" style="width: 100%; cellspacing: 0;">
                                <tr bgcolor="#CCCCCC" style="font-size:14px;">
                <td style=" border:2px solid #dddddd;" ><div align="center"><strong>Certificate / Degree Level</strong></div></td>
                <td style=" border:2px solid #dddddd;"><div align="center"><strong>Degree Name</strong></div></td>
                
                <td style=" border:2px solid #dddddd;"><div align="center"><strong>Year Passing</strong></div></td>
                <td style=" border:2px solid #dddddd;"><div align="center"><strong>Total Marks/GPA</strong></div></td>
                <td style=" border:2px solid #dddddd;"><div align="center"><strong>Obtained<br />
                  Marks/GPA</strong></div></td>
                <td style=" border:2px solid #dddddd;"><div align="center"><strong>University / Board</strong></div></td>
              </tr>
              
         
         
         <tr>
                <td align="center" style=" border:2px solid #dddddd;"><strong>SSC/O-Level</strong>&nbsp;<br /> 
                  <span class="small">(10 Years)</span>                  </td>
                  <td align="center" style=" border:2px solid #dddddd;">
       
                <?php echo $sscdegree ?>                                </td>
            
                <td align="center" style=" border:2px solid #dddddd;" >
                
                <?php echo $sscpyear ?>                    
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span>  </td>
                <td align="center" style=" border:2px solid #dddddd;"> 
<?php echo $ssctmarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                  </span>
                  
                  
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
           </span></td>
                <td align="center" style=" border:2px solid #dddddd;">
<?php echo $sscomarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center" style=" border:2px solid #dddddd;"> 
             <?php echo $sscboard ?>        </td>
              </tr>
              <tr>
                <td align="center" style=" border:2px solid #dddddd;"><strong>HSSC/A-Level</strong>&nbsp; <br />
                  <span class="small"> (12 or 13 Years)</span>                  </td>
                             <td align="center">
       
                <?php echo $hsscdegree ?>                                </td>
            
                <td align="center" style=" border:2px solid #dddddd;">
                
                <?php echo $hsscpyear ?>                    
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span>  </td>

                <td align="center" style=" border:2px solid #dddddd;"> 
<?php echo $hssctmarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                  </span>
                  
                  
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
           </span></td>
                <td align="center" style=" border:2px solid #dddddd;">
<?php echo $hsscomarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center" style=" border:2px solid #dddddd;"> 
             <?php echo $hsscboard ?>        </td>              </tr>
              
              

              <tr>
                <td align="center" style=" border:2px solid #dddddd;"><strong>Bachelor</strong>&nbsp; <br />
                  <span class="small"> (14 Years)</span>                  </td>
                            <td align="center" style=" border:2px solid #dddddd;">
       
                <?php echo $badegree ?>                                </td>
            
                <td align="center" style=" border:2px solid #dddddd;">
                
                <?php echo $bapyear ?>                    
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span>  </td>
                <td align="center" style=" border:2px solid #dddddd;"> 
<?php echo $batmarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                  </span>
                  
                  
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
           </span></td>
                <td align="center" style=" border:2px solid #dddddd;">
<?php echo $baomarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center" style=" border:2px solid #dddddd;"> 
             <?php echo $baboard ?>        </td>

              </tr>
              <tr>
                <td align="center" style=" border:2px solid #dddddd;"><strong>Bachelor/Master</strong>&nbsp; <br />
                  <span class="small"> (16 Years)</span>                 </td>
                           <td align="center" style=" border:2px solid #dddddd;">
       
                <?php echo $madegree ?>                                </td>
            
                <td align="center" style=" border:2px solid #dddddd;">
                
                <?php echo $mapyear ?>                    
                
                <br />
 <span style="color:#FF0000; font-size:11px;">
                        </span>  </td>
                <td align="center" style=" border:2px solid #dddddd;"> 
<?php echo $matmarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                  </span>
                  
                  
                  <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
           </span></td>
                <td align="center" style=" border:2px solid #dddddd;">
<?php echo $maomarks ?>                       <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                      </span> <span style="font-size:11px; color:#FF0000; margin:0px; float:left;">
                                          </span></td>
                <td align="center" style=" border:2px solid #dddddd;"> 
             <?php echo $maboard ?>        </td>              </tr>
              
              
              
              
              
             
            </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
 </div> </div>
        <!-- /page content -->

     

     <?php include 'php/footer.php.inc'; ?>
 <!-- PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
 	
  </body>
</html>
