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
										//echo $sub;
										$block=$_POST['b_id'];
										//echo $block;
										$room=$_POST['Room_id'];
										//echo $room;
										//$sqlsub=;
										$sqltitle="select block_arrangement.*,room_arrangement.*,exam_schedule_theory.*,exam_generation.*
										from block_arrangement inner join room_arrangement on room_arrangement.r_id=block_arrangement.r_id
										inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join
										exam_generation on exam_generation.exam_id=exam_schedule_theory.exam_id where block_arrangement.b_arr_no='$block' 
										AND room_arrangement.r_id='$room';";
								?>
							    <b><a href="../user/attendance.php">back</a></b>
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
																						 echo $row1['e_title']."<br>Room No :- ".$row1['r_name']."&nbsp;Block No :- ".$row1['b_arr_no']; }?>
								</b>
								</center>
								<br><br>
								<center>
								<form action="attendance_add_val.php" method="post">
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
														
                                                      
														$b=$_POST['b_id'];
														$sql = "select assign_block.*,block_arrangement.*,student.* from assign_block inner join block_arrangement 
														on block_arrangement.b_arr_id=assign_block.b_arr_id  inner join student 
														on assign_block.stud_id=student.stud_id where block_arrangement.b_arr_no='$b';";
														$result = mysqli_query($con,$sql);
                                                        
                                                        $no = 1;    
							                
														while($row=mysqli_fetch_assoc($result))
														{
													?>
                                                      
													<tr style="color:blue;font-size:20px;text-align:center;">
													<td style="color:blue;"><?php echo $no;?></td>
                            <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["ass_b_id"]; ?>"><!--<label><?php //echo $row["course_id"]; ?></label>--></td>
                            <td><?php echo $row['stud_code'];?></td>
														<!--<td><?php //echo $row['course_name'];?></td>
														<td><?php //echo $row['course_type'];?></td>-->
													   <td><a href="attendance_add_val_1.php?id=<?php echo $row['ass_b_id'];?>&sid=<?php echo $row['stud_code'];?>&bid=<?php echo $b;?>&rid=<?php echo $room;?>&subid=<?php echo $sub;?>" style="color:green;text-decoration:none;"><i class="fa fa-edit m-r-10" style="font-size:18px" aria-hidden="true"></i>edit</a></td>
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