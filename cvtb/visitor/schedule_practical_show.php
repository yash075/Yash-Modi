<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php 
     include "../admin/connection.php";
     $sem=$_GET['sem'];
	$sqlhead="select semester.*,course.* from semester inner join course on course.course_id=semester.course_id where semester.sem_id='$sem'";
    $resulthead=mysqli_query($con,$sqlhead);                                  
?>
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
					<header id="header" class="alt">
                       <!-- <h1><a href="index.php">DCS</a></h1> 
                        <!--<img src="dcs.png" width="250px">-->
						<!--<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><a href="faculty.php">Faculty</a></li>
											<li><a href="about.php">About Us</a></li>
											<li><a href="registration%20design.php">Log In</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>-->
					</header> 
                 <?php include "../user/navigation.php";?> 
        
                 <!-- Main -->
                <article id="main">

						<section class="wrapper style5">
							<div class="inner">
							<?php
                                     while($row1=mysqli_fetch_assoc($resulthead))
                                    {?>
                                		<center><h2  style="color:#003366">Practical Schedule <br><?php echo $row1['course_name']." - ".substr($row1['sem_code'],2);?> </h2></center>
									<?php }?>
                                <br><br>
										<!--<form action="exam_schedule_theory_add_val.php?id=<?php //echo $exam_id;?>" method="POST">-->
                                        <table class="table table-stripped"  style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;text-align:center;">
                                               
                                                    <th style="text-align:center;">Date</th>
                                                    <th style="text-align:center;">Time</th>
                                                    <th></th>
                                                    <th>Batch</th>
													<th>Lab No</th>
                                                    <th style="text-align:center;">code</th>
                                                    <th style="text-align:center;"></th>
                                                    <th>Name</th>
                                                    <th></th>
												</tr>
											</b></thead>
                                            <tbody>

                                            <?php
											 $sql = "select exam_schedule_practical.*,subject.*,batch.* from  exam_schedule_practical
											  inner join subject on subject.sub_id= exam_schedule_practical.sub_id inner join batch on batch.batch_id=exam_schedule_practical.batch_id where subject.sem_id='$sem' ;";
											 $result=mysqli_query($con,$sql);
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                       ?>
                                                       <tr>
                                                       <td style="text-align:left;"><?php echo $row['date'];?></td>
                                                       <td style="text-align:left;"><?php echo $row['time'];?></td>
                                                       <td></td>
                                                       <td style="text-align:left;"><?php echo $row['batch_name'];?></td>
													   <td  style="text-align:left;"><?php echo $row['lab_no'];?></td>
                                                       <td style="text-align:left;"><?php echo strToUpper($row['sub_code']);?></td>
													   <td></td>
													   <td style="text-align:left;"><?php echo $row['sub_name'];?></td>
                                                       </tr>
                                                        <?php
                                    } ?>
                                    </tbody>
                                           </table>
											<center><a style="color:#003366" href="../user/exam_schedule.php">Back </a></center>              
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
