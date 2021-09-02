<!DOCTYPE HTML>
<?php
include "../user/connection.php";
    if(isset($_POST['sub'])){
            $status=$_POST['sts'];
            $id=$_POST['abid'];
            mysqli_query($con,"update assign_block set status='$status' where assign_block.ass_b_id= '$id';");
            echo "<script>alert('Updated Attendance.')</script>";
            echo "<script>window.location='../user/index.php'</script>";
    }
?>
<html>
	<head>
	 <!-- JQuery library -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
                 <?php //include "../user/navigation.php";?> 
        
                  <!-- Main -->	
					<!--<article id="main">-->
						<section class="wrapper style5">
							<div class="inner">
							<?php 
								  include '../user/connection.php';
								  $sub=$_REQUEST['subid'];
								  //echo $sub;
								  $block=$_REQUEST['bid'];
								  //echo $block;
								  $room=$_REQUEST['rid'];
								  //echo $room;
								  //$sqlsub=;
								  $sqltitle="select block_arrangement.*,room_arrangement.*,exam_schedule_theory.*,exam_generation.*
								  from block_arrangement inner join room_arrangement on room_arrangement.r_id=block_arrangement.r_id
								  inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join
								  exam_generation on exam_generation.exam_id=exam_schedule_theory.exam_id where block_arrangement.b_arr_no='$block' 
								  AND room_arrangement.r_id='$room';";
						  ?>
						  <b><a href="../user/attendance.php">back</a></b><br>
		  <center><h1 style="color:#003366; font-size:32px;"><u>DEPARTMENT OF COMPUTER SCIENCE</u></h1>
						  <br>
						  <?php
						  $query0=mysqli_query($con,"select subject.*,semester.*,course.* from subject  inner join semester on
						  semester.sem_id=subject.sem_id join course on course.course_id=semester.course_id where subject.sub_id='$sub';");
			while ($row0=mysqli_fetch_assoc($query0)) {?>
								  <input type="text" style="color:black;text-align:center;" value="<?php echo $row0['course_name']."&nbsp;&nbsp;-&nbsp;&nbsp; ".substr($row0['sem_code'],2);?>"readonly> <?php }?>
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
							<form action="#" method="post">
                            <?php
					include '../user/connection.php';
		
					$b = $_REQUEST['bid'];
                    $abid=$_REQUEST['id'];
					//echo $abid;?>
                    <input type="hidden" name="abid" value="<?php echo $abid;?>"><?php
					$query = "select assign_block.*,block_arrangement.*,student.* from assign_block inner join block_arrangement 
                    on block_arrangement.b_arr_id=assign_block.b_arr_id  inner join student 
                    on assign_block.stud_id=student.stud_id where block_arrangement.b_arr_no='$b' And assign_block.ass_b_id='$abid'; ";
					
					$result=mysqli_query($con,$query);?>
                                            
                                            <label for="student" style="color:blue;font-size:20px;">Student Id</label>
                                             <input type="text" value="<?php echo $_REQUEST['sid'];?>" name="sid" readonly>
                                             <label for="att" style="color:blue;font-size:20px;">Status</label>
		                                    <select name="sts" id="sts">
                                            <?php
					
					while($num=mysqli_fetch_assoc($result))
					{
                        
                        if($num['status']=='p'){?>
                            <option value="p" selected>present </option>
                            <option value="NULL">absent </option>
                        <?php }else if($num['status']=='NULL'){?>
                            <option value="NULL" selected>absent </option>
                            <option value="p">present </option>
                        <?php } 
                    }
				?>
            </select><br>
				<input type="submit" style="background-color:#2e3842;color:white;" name="sub" value="Add" class="btn btn-success">
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