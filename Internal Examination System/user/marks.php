<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
                 <?php include "../user/navigation.php";?> 
        
                  <!-- Main -->
					<article id="main">
						<section class="wrapper style5">
							<div class="inner">
							<form action="marks_add.php" method="get">
                            <input type="hidden" value="<?php echo $s;?>" name="s" id="s"> 
                            <label for="course" style="color:blue;font-size:20px;">Select Course</label>
		                                    <select name="course_id" class="form-control" id="course" required>
		                                   <option value="" selected disabled>Select Course</option>
			                               <?php
                                              include '../admin/connection.php';
     $sql="select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,
    batch.batch_name,semester.sem_code,course.* from faculty_permission inner join faculty on 
    faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
    semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
    course on course.course_id=semester.course_id where faculty.f_code='$s' group by course.course_name
     order by faculty.f_code,subject.sub_code,batch.batch_name ;";
     $sql1="select * from course order by course_code;";
                                            $query=mysqli_query($con,$sql);
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_code']." - ".$row['course_name']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			 
		                                      </select><br><br>
                                            
                                            <label for="semester" style="color:blue;font-size:20px;">Select Semester</label>
                                              <select name="sem_id" class="form-control" id="semester" required>
                                                 <option value="" selected disabled>Select Semester</option>
                                            </select><br><br> 
                                            <label for="subjecttype" style="color:blue;font-size:20px;">Select Subject Type</label>
                                              <select name="subjecttype" class="form-control" id="subjecttype" required>
                                             <?php $query=mysqli_query($con,"select distinct(sub_type) from subject;");?>
                                              <option value="" selected disabled>Select Subject Type</option><?php
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['sub_type'];?>"><?php echo $row['sub_type']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			
                                            </select>
                                            	<br><br>
                                             <label for="subject" style="color:blue;font-size:20px;">Select Subject</label>
                                              <select name="s_id" class="form-control" id="subject" required>
                                                 <option value="" selected disabled>Select Subject</option>
                                            </select><br><br>
											
																						<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Add" class="btn btn-success">
										</form>
                                        
                                        <script>
$(document).ready(function(){
	$("#course").on('change',function(){
		var courseId=$(this).val();
        var sId=$("#s").val();
		$.ajax({
			method:"POST",
			url:"ajax/semester_marks.php",
			data:{course_id:courseId , sid:sId},
			dataType:"html",
			success:function(data){
				$("#semester").html(data);
			}
		});
	});
    
    $("#semester").on('change',function(){
		var semesterId=$(this).val();
		$("#subjecttype").on('change',function(){
		var sId=$("#s").val();
		var st=$("#subjecttype").val();
		$.ajax({
			method:"POST",
			url:"ajax/subject_marks.php",
			data:{semester_id:semesterId , sub_type:st , sid:sId},
			dataType:"html",
			success:function(data){
				$("#subject").html(data);
			}
		});
	});
	});
    
});
</script>
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
