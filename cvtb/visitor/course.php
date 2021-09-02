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
                 <?php include "../user/navigation.php";?> 
        
                  <!-- Main -->
					<article id="main">
					
						
				<!--	<header>
					
						</header>-->
						<section class="wrapper style5">
						    <?php include "../user/filter/course_fil.php";?>
							<div class="inner">
							
                                <br><br><center><h1 style="color:#003366; font-size:32px;"><u>Course Details</u></h1></center>
								<br><br>
								<br>
								
                            <table class="table table-stripped">
												<thead>
													<tr style="color:black;font-size:30px;">
                                                        <th>No.</th>
														<th>Code</th>
														<th>Name</th>
														<th>Type</th>
													</tr>
													</thead>
													<?php
													if(isset($_GET['id']))
                                                        {
															$g = $_GET['id'];
												            $sql = "select * from course where course_code like '$g'  OR course_type like '$g' order by course_code;";
                                                        }
                                                        else
                                                        {
                                                            $sql="select * from course order by course_code;";
                                                        }
														$result = mysqli_query($con,$sql);
														$num = mysqli_num_rows($result);
														if ($num > 0)
														{$no=1;
														while($row=mysqli_fetch_assoc($result))
														{?>
                                                     <tbody>   
													<tr>
                                                        <td style="color:black;"><?php echo $no;?></td>
														<td><?php echo strToUpper($row['course_code']);?></td>
														<td><?php echo strToUpper($row['course_name']);?></td>
														<td><?php echo strToUpper($row['course_type']);?></td>
                                                        <!--<td><button class="btn btn-danger"><a href="course_details_delete.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-trash m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Delete</a></button></td>
													   <td><button class="btn btn-success"><a href="course_details_update.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-edit m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Edit</a></button></td>-->
													</tr>
													<?php
                                                            $no++;
														}
													}else{
														echo "RESULT NOT FOUND";
													}
													?>	
												</tbody>
											</table>
									
                                
                             </div>
						</section>
					</article>
                
                          <!-- Footer -->
						  <?php include "../user/footer.php";?>
                
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
