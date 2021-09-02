<!DOCTYPE HTML>
<?php
include "../user/connection.php";
    if(isset($_POST['sub'])){
            $status=$_POST['sts'];
            $id=$_POST['id'];
            mysqli_query($con,"UPDATE `attendance_practical` SET `status`='$status' WHERE `attendance_practical`.`att_pr_id` = $id;");
            //die();
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
								  $sub=$_REQUEST['sub'];
								  //echo $sub;
								  $lab=$_REQUEST['lid'];
								  //echo $block;
								  //$room=$_REQUEST['rid'];
								  //echo $room;
								  //$sqlsub=;
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
							<form action="#" method="post">
                            <?php
					include '../user/connection.php';
		
					$batch = $_REQUEST['batch'];
                    $aid=$_REQUEST['id'];
					//echo $aid;?>
                    <input type="hidden" name="id" value="<?php echo $aid;?>"><?php
					
                    $query="select attendance_practical.*,exam_schedule_practical.*,batch.*,student.*,assign_student_in_batch.* from 
                    attendance_practical inner join exam_schedule_practical on exam_schedule_practical.exam_sch_pra_id=attendance_practical.exam_sch_pr_id inner join batch on exam_schedule_practical.batch_id=batch.batch_id join
                    assign_student_in_batch on assign_student_in_batch.batch_id=batch.batch_id join  student on 
                    student.stud_id=assign_student_in_batch.stud_id 
                    where  exam_schedule_practical.batch_id='$batch' AND assign_student_in_batch.batch_id='$batch' AND
                    att_pr_id='$aid' group by student.stud_id; ";
					
					$result=mysqli_query($con,$query);?>
                                            
                                            <label for="student" style="color:blue;font-size:20px;">Student Id</label>
                                             <input type="text" value="<?php echo $_REQUEST['sid'];?>" name="sid" readonly>
                                             <label for="att" style="color:blue;font-size:20px;">Status</label>
		                                    <select name="sts" id="sts">
                                            <option disabled>select</option>
                            <option value="p">present </option>
                            <option value="NULL">absent </option>

				
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