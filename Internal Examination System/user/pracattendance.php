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
							<form action="attendance_add.php" method="post">
                                            
                                            <label for="room" style="color:blue;font-size:20px;">Lab No</label>
		                                    <select name="lab_id" class="form-control" id="lab" >
		                                   <option value="" selected disabled>Select Lab</option>
			                               <?php
     
	                                           include '../user/connection.php';
                                            $query=mysqli_query($con,"select distinct lab_no from exam_schedule_practical;");
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['lab_no'];?>"><?php echo $row['lab_no']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			 
		                                      </select><br><br>
																						<label for="block" style="color:blue;font-size:20px;">Subject</label>
                                              <select name="sub_id" class="form-control" id="sub" required>
                                                 <option value="" selected disabled>Select Subject</option>
                                            
		                                      </select><br><br>
											<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Add" class="btn btn-success"/>
											<a href="attendance.php" ><b style="color:blue;float:right;"><u>Theory</u></b></a>
											
										</form>
                                        <script>
$(document).ready(function(){
	$("#lab").on('change',function(){
		var labId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/lab.php",
			data:{lab_id:labId},
			dataType:"html",
			success:function(data){
				$("#sub").html(data);
			}
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
