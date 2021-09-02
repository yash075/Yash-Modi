<?php 
	session_start();
	
	$s = $_SESSION["cvmsaid"];
	if($s == TRUE)
	{
?>
<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
                 <?php include "navigation.php";?> 
        
                 <!-- Main -->
                <article id="main">
						<section class="wrapper style5">
						<div class="inner">
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>Visit &nbsp;details</u></h2></center>
                                
								<table class="table table-bordered" >
											<thead><b>
												<tr style="color:blue;font-size:20px;">
													<th  style="text-align:center;">No.</th>
													<th  style="text-align:center;">Reason</th>
                                                    <th  style="text-align:center;">Date</th>
                                                    <th  style="text-align:center;">Time</th>
                                                    <th  style="text-align:center;">I-Card</th>
												</tr>
											</b></thead>
											<?php
                                                $no=1;
												
												include('includes/dbconnection.php');
											
															$s = $_SESSION["cvmsaid"];
															$sql = "select visit_record.*,schedule_visitor.*,visitor_log_detail.* 
															from visit_record inner join schedule_visitor on 
															schedule_visitor.sch_vi_id=visit_record.sch_v_id inner join 
															visitor_log_detail on schedule_visitor.v_id=visitor_log_detail.v_id 
															where schedule_visitor.v_id='$s' and visit_record.status=1;";
                                                       
														$result = mysqli_query($con,$sql);
														$num = mysqli_num_rows($result);
														if ($num > 0)
														{$no=1;
														while($row=mysqli_fetch_assoc($result))
														{?>
											<tbody>
												<tr>
                      <td style="text-align:center;"><?php echo $no;?></td>
                
                      
                      <td style="text-align:center;"><?php  echo $row['reason'];?></td>
                    <td style="text-align:center;"><?php  echo $row['date'];?></td>
                    <td style="text-align:center;"><?php  echo $row['time'];?></td>
                     <td style="text-align:center;"><a href="visitor-detail.php?editid=<?php echo $row['sch_vi_id'];?>" title="View Full Details"><i class="fa fa-id-card" style="color:red;"></i></a></td>
                    </tr>
											<?php
                                                    $no++;
												}
											}else{
												echo "NO RESULT FOUND";
											}
											?>
											</tbody>
                                           </table>
                                
                                
                                </div>
						</section>
					</article>
                
                          <!-- Footer -->
						  <?php include "../visitor/footer.php";?>
        </div>
                
                <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

    </body>
</html>
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
