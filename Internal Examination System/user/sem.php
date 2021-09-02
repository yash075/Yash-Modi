<!DOCTYPE HTML>
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
				 <?php include "../user/navigation.php";
				   include '../user/connection.php';?> 
                 <!-- Main -->
				 <article id="main">
						<section class="wrapper style5">
						<?php include "../user/filter/sem_fil1.php"?>
							<div class="inner">
							<br><br><center><h1 style="color:#003366; font-size:32px;"><u>Semester Details</u></h1></center>
                			<br><br>
								<br>
                                	<!---<center><h2  style="color:#003366">Semester Details</h2></center>-->
                      
											<table class="table table-stripped">
												<thead>
													<tr style="color:blue;font-size:30px;">
                                                        <th>No.</th>
														<th>Sem Code</th>
                                                        <th>Course Name</th>
                                                        <th>Sem Type</th>
													</tr>
													</thead>

		<?php
					if(isset($_GET['id']))
                 {
					$g = $_GET['id'];
					$sql = "select semester.sem_id,semester.sem_code,semester.sem_type,course.course_name from semester 
					inner join course on semester.course_id=course.course_id where semester.sem_type!='comp' AND course.course_code 
					like '$g' OR semester.sem_type like '$g' OR semester.sem_code like '$g' order by course.course_name,semester.sem_code;";
                 }
                  else
                 {
					  $sql="select semester.sem_id,semester.sem_code,semester.sem_type,course.course_name 
					  from semester inner join course on semester.course_id=course.course_id where semester.sem_type!='comp'
					   order by course.course_name,semester.sem_code;";
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
          <td><?php echo $no;?></td>
			<td><?php echo $row['sem_code'];?></td>
			<td><?php echo $row['course_name'];?></td> 
            <td><?php echo $row['sem_type'];?></td>
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
