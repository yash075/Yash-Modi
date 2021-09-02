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
				<section class="wrapper style5">
						<?php include "../user/filter/sub_fil.php"?>
							<div class="inner">
							<br><br><center><h1 style="color:#003366; font-size:32px;"><u>Subject Details</u></h1></center>
                			<br><br>
								<br>
										<table class="table table-stripped">
											<thead>
												<tr style="color:blue;font-size:20px;">
													<th>No.</th>
													<th>Code</th>
                                                    <th>Name</th>
													<th>Type</th>
                                                   <!-- <th >Delete</th>
                                                    <th>Edit</th>-->
												</tr>
											</thead>
											<?php
					if(isset($_GET['id']))
                 {
					$g = $_GET['id'];
					$sql = "select subject.*,semester.*,course.* from subject inner join semester on semester.sem_id=subject.sem_id
					 inner join course on course.course_id=semester.course_id  where course.course_code like '$g' OR semester.sem_code 
					 like '$g' OR sub_name like '$g' OR (sub_code like '___$g%' OR sub_code like '$g') OR sub_type like '$g' order by 
					 subject.sub_code;";
                 }
                  else
                 {
                      $sql="select * from subject order by sub_code,sub_type;";
                }
					$result = mysqli_query($con,$sql);
					$num = mysqli_num_rows($result);
					if ($num > 0)
					{
						$no=1;
						while($row=mysqli_fetch_assoc($result))
						{?>
						<tbody>
												<tr>
                                                    <td style="color:black;"><?php echo $no;?></td>
													<td><?php echo strToUpper($row['sub_code']);?></td>
													<td><?php echo $row['sub_name'];?></td>
													<td><?php echo $row['sub_type'];?></td>
                                                    
											  </tr>
											<?php
                                                    $no=$no+1;
												}
											}
											
											else
											{
											echo "<center><h3>Result Not Found.</h3></center>";
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
