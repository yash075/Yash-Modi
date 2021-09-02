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
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>Exam &nbsp;details</u></h2></center>
                                
                                <br><br><?php include "../user/filter/exam_main_fil.php";?>
								<table class="table table-bordered" style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
													<th  style="text-align:center;">No.</th>
                                                    <th  style="text-align:center;">Course</th>
													<th  style="text-align:center;">Semester</th>
                                                    <th  style="text-align:center;">show theory</th>
                                                    <th  style="text-align:center;">Show practical</th>
                                                    
												</tr>
											</b></thead>
											<?php
                                                $no=1;
												
												include '../user/connection.php';
											
											if(isset($_GET['id']))
                                                        {
															$g = $_GET['id'];
												            $sql = "select subject.sem_id,semester.sem_code,course.course_name,course.course_code from subject inner join
															semester on semester.sem_id=subject.sem_id inner join course on course.course_id=semester.course_id  where 
															course.course_code='$g' OR semester.sem_code='$g'And semester.sem_id IN (select subject.sem_id from exam_schedule_theory inner join subject on subject.sub_id=
															exam_schedule_theory.sub_id join exam_generation on exam_generation.exam_id=exam_schedule_theory.exam_id where 
															exam_generation.status=0 AND exam_schedule_theory.exam_id=exam_generation.exam_id AND subject.sub_type='Theory') group by subject.sem_id order by course.course_name
															,semester.sem_code;";
                                                        }
                                                        else
                                                        {
                                                            $sql="select subject.sem_id,semester.sem_code,course.course_name,course.course_code from subject inner join
															semester on semester.sem_id=subject.sem_id inner join course on course.course_id=semester.course_id  where 
															semester.sem_id IN (select subject.sem_id from exam_schedule_theory inner join subject on subject.sub_id=
															exam_schedule_theory.sub_id join exam_generation on exam_generation.exam_id=exam_schedule_theory.exam_id where 
															exam_generation.status=0 AND exam_schedule_theory.exam_id=exam_generation.exam_id AND subject.sub_type='Theory') group by subject.sem_id order by course.course_name
															,semester.sem_code;";
                                                        }
														$result = mysqli_query($con,$sql);
														$num = mysqli_num_rows($result);
														if ($num > 0)
														{$no=1;
														while($row=mysqli_fetch_assoc($result))
														{?>
											<tbody>
												<tr>
                                               <td><?php echo $no;?></td>
													<td><?php echo $row['course_name'];?></td>
													<td><?php echo substr($row['sem_code'],2);?></td>
                                                    <td><a href="schedule_theory_show.php?sem=<?php echo $row['sem_id'];?>" style="color:orange;text-decoration:none;"><i class="fa fa-eye m-r-10" style="font-size:18px;color:orange;" aria-hidden="true"></i></a></td>
                                                    <td><a href="schedule_practical_show.php?sem=<?php echo ($row['sem_id']);?>" style="color:orange;text-decoration:none;"><i class="fa fa-eye m-r-10" style="font-size:18px;color:orange;" aria-hidden="true"></i></a></td>
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
