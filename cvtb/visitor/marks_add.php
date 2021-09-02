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
							<div class="inner">
							
							<?php 
								  include '../user/connection.php';
										$sub=$_POST['s_id'];
										$st=$_POST['subjecttype'];
										$qu=mysqli_query($con,"select * from faculty where f_code=$s;");
										while($rs=mysqli_fetch_assoc($qu)){
											$sid=$rs['f_id'];
										}
										$qfp=mysqli_query($con,"select * from faculty_permission where f_id=$sid And sub_id='$sub';");
										while($rfs=mysqli_fetch_assoc($qfp)){
											$fid=$rfs['fac_per_id'];
										}
										$query1=mysqli_query($con,"select subject.*,semester.*,course.* from subject  inner join semester on
								semester.sem_id=subject.sem_id join course on course.course_id=semester.course_id where subject.sub_id='$sub' And subject.sub_type='$st';");
				 
					$q=mysqli_query($con,"select * from marks;");
					while($r=mysqli_fetch_assoc($q)){
						if($sub==$r['sub_id']){
							break;
						}else{
					
								while ($row1=mysqli_fetch_assoc($query1)) {
					  if($row1['sub_type']=="theory" || $row1['sub_type']=="Theory" ){
										  $query2=mysqli_query($con,"select * from exam_generation where exam_id='0';");
										  while($row2=mysqli_fetch_assoc($query2)){
											  $query3=mysqli_query($con,"select exam_schedule_theory.*,exam_generation.* from exam_schedule_theory inner 
											  join exam_generation on exam_generation.exam_id=exam_schedule_theory.exam_id where exam_generation.status='0';");
											  while($row3=mysqli_fetch_assoc($query3)){
												  $th_id=$row3['exam_sch_th_id'];
												  while($row5=mysqli_fetch_assoc($con,"select * from marks where sub_id='$sub' AND exam_sch_th_id='$th_id';")){
													$mid=$row5['marks_id'];}
										mysqli_query($con,"insert into marks values ('NULL',$fid,$sub,$th_id,'NULL');");
											  }
										  }
					  }
					}
				
					  if($row1['sub_type']=='practical' || $row1['sub_type']=='Practical' ){$query2=mysqli_query($con,"select * from exam_generation where exam_id='0';");
						while($row2=mysqli_fetch_assoc($query2)){
							$query3=mysqli_query($con,"select exam_schedule_practical.*,exam_generation.* from exam_schedule_practical inner 
							join exam_generation on exam_generation.exam_id=exam_schedule_practical.exam_id where exam_generation.status='0';");
							while($row3=mysqli_fetch_assoc($query3)){
								$pr_id=$row3['exam_sch_pr_id'];
								while($row5=mysqli_fetch_assoc($con,"select * from marks where sub_id='$sub' AND exam_sch_th_id='$pr_id';")){
									$mid=$row5['marks_id'];}
					  mysqli_query($con,"insert into marks values ('NULL',$s,$sub,'NULL',$pr_id);");
							}
						}
					}
				  }	
				}
			
								?>
							    <b><a href="../user/attendance.php">back</a></b>
                <center><h1 style="color:#003366; font-size:32px;"><u>DEPARTMENT OF COMPUTER SCIENCE</u></h1>
								<br>
								<?php
								$query0=mysqli_query($con,"select subject.*,semester.*,course.* from subject  inner join semester on
								semester.sem_id=subject.sem_id join course on course.course_id=semester.course_id where subject.sub_id='$sub';");
                  while ($row0=mysqli_fetch_assoc($query0)) {?>
										<input type="text" style="color:black;text-align:center;" value="<?php echo $row0['course_name']."&nbsp;&nbsp;-&nbsp;&nbsp; ".substr($row0['sem_code'],2);?>"readonly> 
										<input type="text" style="color:black;text-align:center;" value="<?php echo $row0['sub_code']."&nbsp;&nbsp;-&nbsp;&nbsp; ".$row0['sub_name'];?>"readonly> <?php }?>
								<br>
								</center>
								<br><br>
								<br><br>
								<br>
								
								<form action="../user/marks_add_val.php?mid=<?php echo $mid; ?>&type=<?php echo $st;?>" method="post">
                            <table class="table table-stripped">
												<thead>
													<tr style="color:black;font-size:30px;">
                                                        <th>S.No.</th>
														<th>Student E.No</th>
														<th>Marks</th>
														<th>Edit</th>
													</tr>
													</thead>
													<tbody> 
													<?php
														   $sem=$_POST['sem_id'];
														   if($st=='theory' || $st=='Theory'){
                                                            $sql="select assign_block.*,block_arrangement.*,student.*,semester.* from assign_block inner join block_arrangement 
															on block_arrangement.b_arr_id=assign_block.b_arr_id  inner join student 
															on assign_block.stud_id=student.stud_id join semester on semester.sem_id=student.sem_id where semester.sem_id='$sem' ;";
														$result = mysqli_query($con,$sql);
														$num = mysqli_num_rows($result);
														if ($num > 0)
														{$no=1;
														while($row4=mysqli_fetch_assoc($result))
														{
															if($row4['status']=='p'){?>
                                                       
													<tr>
                                                        <td style="color:black;"><?php echo $no;?></td>
														<td><input type="text" value="<?php echo $row4['stud_code'];?>"readonly></td>
														<input type="hidden" value="<?php echo $row4['ass_b_id'];?>" name="aid<?php echo $no;?>">
														<td><input type="text" name="m_idval<?php echo $no;?>"></td>
                                                        <!--<td><button class="btn btn-danger"><a href="course_details_delete.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-trash m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Delete</a></button></td>
													   <td><button class="btn btn-success">--><td><a style="text-align:center;"href="add_mark_update.php?id=<?php echo $row['add_mark_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-edit m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i></a><!--</button></td>-->
													</tr>
													<?php
															}else{?>
																<tr>
                                                        <td style="color:black;"><?php echo $no;?></td>
														<td><input type="text" value="<?php echo $row4['stud_code'];?>"readonly></td>
														<td><input type="text" name="m_idval<?php echo $no;?>" disabled></td>
                                                        <!--<td><button class="btn btn-danger"><a href="course_details_delete.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-trash m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Delete</a></button></td>
													   <td><button class="btn btn-success">--><td><a style="text-align:center;"href="add_mark_update.php?id=<?php echo $row['add_mark_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-edit m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i></a><!--</button></td>-->
													</tr>
															<?php }
                                                            $no++;
														}
													}
												else{
														echo "RESULT NOT FOUND";
													}
												}else{
													$sql="select attendance_pr.*,student.*,semester.* from attendance_pr inner join  student 
															on attendance_pr.stud_id=student.stud_id join semester on semester.sem_id=student.sem_id where semester.sem_id='$sem' ;";
														$result = mysqli_query($con,$sql);
														$num = mysqli_num_rows($result);
														if ($num > 0)
														{$no=1;
														while($row4=mysqli_fetch_assoc($result))
														{
															if($row4['status']=='p'){
																$no=1;
														while($row4=mysqli_fetch_assoc($result))
														{
															if($row4['status']=='p'){?>
                                                       
													<tr>
                                                        <td style="color:black;"><?php echo $no;?></td>
														<td><input type="text" value="<?php echo $row4['stud_code'];?>"readonly></td>
														
														<td><input type="text" name="m_idval<?php echo $no;?>"></td>
                                                        <!--<td><button class="btn btn-danger"><a href="course_details_delete.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-trash m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Delete</a></button></td>
													   <td><button class="btn btn-success">--><td><a style="text-align:center;"href="add_mark_update.php?id=<?php echo $row['add_mark_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-edit m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i></a><!--</button></td>-->
													</tr>
																
															<?php }else{?>
																<tr>
                                                        <td style="color:black;"><?php echo $no;?></td>
														<td><input type="text" value="<?php echo $row4['stud_code'];?>"readonly></td>
														<td><input type="text" name="m_idval<?php echo $no;?>" disabled></td>
                                                        <!--<td><button class="btn btn-danger"><a href="course_details_delete.php?id=<//?php echo $row['course_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-trash m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i>Delete</a></button></td>
													   <td><button class="btn btn-success">--><td><a style="text-align:center;"href="add_mark_update.php?id=<?php echo $row['add_mark_id'];?>" style="color:#006666;text-decoration:none;"><i class="fa fa-edit m-r-10" style="color:#006666;font-size:18px" aria-hidden="true"></i></a><!--</button></td>-->
													</tr>
															<?php }
                                                            $no++;
														}
															}
												
												}
												}else{
													echo "RESULT NOT FOUND";
												}
											}
													?>	
												</tbody>
											</table>
											<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Add" class="btn btn-success">
										</form>
									
                                
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
