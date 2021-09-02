<?php if(isset($_POST['submit']))
        { ?><!DOCTYPE HTML>
<html>
	<head>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
                 <?php //include "../user/navigation.php";?> 
        
                  <!-- Main -->
					<article id="main">
					
						
				<!--	<header>
					
						</header>-->
						<section class="wrapper style5">
						    
							<div class="inner">
								<?php 
								  include '../user/connection.php';
										$sub=$_POST['sub_id'];
										$lab=$_POST['lab_id'];
										$sqltitle="select exam_schedule_practical.*,exam_generation.*,batch.*
										from exam_schedule_practical inner join exam_generation on 
										exam_schedule_practical.exam_id=exam_schedule_practical.exam_id
										inner join batch on exam_schedule_practical.batch_id=batch.batch_id where exam_schedule_practical.lab_no='$lab' 
										AND exam_schedule_practical.sub_id='$sub';";
								?>
							    <b><a href="../user/pracattendance.php">back</a></b>
                <center><h1 style="color:#003366; font-size:32px;"><u>DEPARTMENT OF COMPUTER SCIENCE</u></h1>
								<br>
								<?php
								$query0=mysqli_query($con,"select subject.*,semester.*,course.* from subject  inner join semester on
								semester.sem_id=subject.sem_id join course on course.course_id=semester.course_id where subject.sub_id='$sub';");
                  while ($row0=mysqli_fetch_assoc($query0)) {?>
										<input type="text" style="color:black;" value="<?php echo $row0['course_name']."&nbsp;&nbsp;-&nbsp;&nbsp; ".substr($row0['sem_code'],2);?>"readonly> <?php }?>
								<br>
								
<b>
								<?php
								$query1=mysqli_query($con,$sqltitle);
                                    //echo $sqltitle;   
									                       while ($row1=mysqli_fetch_assoc($query1)) {
															$batch=$row1['batch_id'];
														   echo $row1['e_title']."<br>lab No :- ".$row1['lab_no']."&nbsp;Batch  :- ".$row1['batch_name']; }?>
								</b>
								</center>
								<br><br>
								<center>
								<form action="prac_attn_add_val.php" method="post">
                                       <!-- <input type="checkbox" id="checkAl" ><label style="color:blue;"> Select All</label>
                                            
                                             <input type="submit" name="add" value="Add">-->
									
											<table border="2" width="80%">
												<thead>
													<tr style="color:blue;font-size:20px;text-align:center;">
													<th >No.</th>
                             <th ><input type="checkbox" id="checkAl" ><label style="color:blue;"> Select All</label></th>
                              
														<th >Code</th>
                             <th >Edit</th>
													</tr>
													</thead>
													<tbody>
													<?php
														
                                                      
														//$b=$_POST['b_id'];
                                                        
															$sql1="select exam_schedule_practical.*,batch.*,student.stud_id,student.stud_code,assign_student_in_batch.* from 
															exam_schedule_practical inner join batch on exam_schedule_practical.batch_id=batch.batch_id join
															assign_student_in_batch on assign_student_in_batch.batch_id=batch.batch_id join  student on 
															student.stud_id=assign_student_in_batch.stud_id 
                                                            where  exam_schedule_practical.batch_id='$batch' AND assign_student_in_batch.batch_id='$batch' group by student.stud_id; ";
                                                            $result1 = mysqli_query($con,$sql1);
                                                        while($row5=mysqli_fetch_assoc($result1))
														{
															$exam=$row5['exam_sch_pra_id'];
															$s=$row5['stud_id'];
															$e=mysqli_query($con,"select * from attendance_practical where exam_sch_pr_id='$exam';");
														    $n= mysqli_num_rows($e) ;
															while($row6=mysqli_fetch_assoc($e)){
																//echo $e;
																//echo mysqli_num_rows($e) ;
																if($n = 0){
																	//die("hi");
                                                                    mysqli_query($con,"insert into attendance_practical values ('NULL',$exam,$s,'NULL');");
																}else{
																	//die("hello");
																}
															}
														}
														$sql2="select attendance_practical.*,exam_schedule_practical.*,batch.*,student.*,assign_student_in_batch.* from 
														attendance_practical inner join exam_schedule_practical on exam_schedule_practical.exam_sch_pra_id=attendance_practical.exam_sch_pr_id inner join batch on exam_schedule_practical.batch_id=batch.batch_id join
														assign_student_in_batch on assign_student_in_batch.batch_id=batch.batch_id join  student on 
														student.stud_id=assign_student_in_batch.stud_id 
														where  exam_schedule_practical.batch_id='$batch' AND assign_student_in_batch.batch_id='$batch' group by student.stud_id order by student.stud_code";
														$result3 = mysqli_query($con,$sql2);
                                                        
                                                        $no = 1;    
							                
														while($row7=mysqli_fetch_assoc($result3))
														{	
													?>
                                                      
													<tr style="color:blue;font-size:20px;text-align:center;">
													<td style="color:blue;"><?php echo $no;?></td>
                            <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row7["att_pr_id"]; ?>"><!--<label><?php //echo $row["course_id"]; ?></label>--></td>
                            <td><?php echo $row7['stud_code'];?></td>
														<!--<td><?php //echo $row['course_name'];?></td>
														<td><?php //echo $row['course_type'];?></td>-->
													   <td><a href="prac_attn_add_val_1.php?id=<?php echo $row7['att_pr_id'];?>&batch=<?php echo $batch;?>&sid=<?php echo $row7['stud_code'];?>&sub=<?php echo $sub;?>&lid=<?php echo $lab;?>" style="color:green;text-decoration:none;"><i class="fa fa-edit m-r-10" style="font-size:18px" aria-hidden="true"></i>edit</a></td>
													</tr>
													<?php
                            $no++;
                                                        }
                                                    
													?>	
												</tbody>
											</table><br>
											<input type="submit" style="background-color:#2e3842;color:white;width:10%;" name="submit" value="Add" class="btn btn-success">
                                        <script>
    $("#checkAl").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
									
                                    </form>
								  <?php //include "att.php";?>
                                </center>
                             </div>
						</section>
					</article>
                
                          <!-- Footer -->
						  <?php //include "../user/footer.php";?>
                
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
<?php  }
    else
    {
        header('location:../user/attendance.php');
    }
?>