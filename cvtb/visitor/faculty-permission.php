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
                
				<!-- Header -->
					
                 <?php include "../user/navigation.php";?> 
        
                 <!-- Main -->
				 <article id="main">
						<section class="wrapper style5">
							<div class="inner">
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>User &nbsp;Permission</u></h2></center>
                                
                                <br><br><?php include "../user/filter/fac_per_fil.php";?>
								<table class="table table-bordered" style="text-align:center;">
												<thead>
													<tr style="color:blue;font-size:20px;">
                                                        <th style="text-align:center;">No.</th>
                                                        <th style="text-align:center;">Sub Code</th>
                                                        <th style="text-align:center;">Sub name & Type</th>
                                                        <th style="text-align:center;">Course & Sem & Batch</th>
                                                       </tr>
													</thead>
													<?php
					if(isset($_GET['id']))
                 {
					$g = $_GET['id'];
					$sql = "select faculty_permission.*,faculty.*,subject.*,batch.*,semester.*,course.* from faculty_permission 
					inner join faculty on faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id 
					inner join semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id 
					inner join course on course.course_id=semester.course_id where  (subject.sub_type like '$g' OR 
					course.course_code like '$g' OR semester.sem_code like '$g' OR batch.batch_name like '%$g%' OR 
					subject.sub_code like '$g%' OR subject.sub_name like '$g%') AND faculty.f_code=$s order by subject.sub_code,
					batch.batch_name;";
                 }
                  else
                 {
					  $sql="select faculty_permission.*,faculty.*,subject.*,batch.*,semester.*,course.* from
					   faculty_permission inner join faculty on faculty.f_id=faculty_permission.f_id join subject on 
					   subject.sub_id=faculty_permission.sub_id inner join semester on semester.sem_id=subject.sem_id
						join batch on batch.batch_id=faculty_permission.batch_id inner join course on 
						course.course_id=semester.course_id where faculty.f_code='$s' order by semester.sem_code,
						subject.sub_code,batch.batch_name;";
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
                                                        <td style="color:blue;"><?php echo $no;?></td>
                                                        <td><?php echo $row['sub_code'];?></td>
                                                        <td><?php echo $row['sub_name']."-".$row['sub_type'];?></td>
														<td ><?php echo $row['course_name']." - ".substr($row['sem_code'],2)." - ".$row['batch_name'];?></td>
														</tr>
													<?php
															$no++;
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
