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
                                            
                                            <label for="room" style="color:blue;font-size:20px;">Room No</label>
		                                    <select name="Room_id" class="form-control" id="room" >
		                                   <option value="" selected disabled>Select Room</option>
			                               <?php
     
	                                           include '../user/connection.php';
                                            $query=mysqli_query($con,"select * from room_arrangement;");
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['r_id'];?>"><?php echo $row['r_name']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			 
		                                      </select><br><br>
                                            
                                            <label for="block" style="color:blue;font-size:20px;">Block No</label>
                                              <select name="b_id" class="form-control" id="block" >
                                                 <option value="" selected disabled>select Block</option>
                                            </select><br><br>
																						<!--<label style="color:blue;font-size:20px;">Time</label>-->
																						<label for="block" style="color:blue;font-size:20px;">Subject</label>
                                              <select name="sub_id" class="form-control" id="sub" required>
                                                 <option value="" selected disabled>Select Subject</option>
                                            
		                                      </select><br><br>
											<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Add" class="btn btn-success"/>
											<a href="pracattendance.php" ><b style="color:blue;float:right;"><u>practical</u></b></a>
											
										</form>
                                        <script>
$(document).ready(function(){
	$("#room").on('change',function(){
		var roomId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/block_ajax.php",
			data:{room_id:roomId},
			dataType:"html",
			success:function(data){
				$("#block").html(data);
			}
		});
	});
	$("#block").on('change',function(){
		var bId=$(this).val();
		var lId=$("#lab").val();
		var rId=$("#room").val();
  		$.ajax({
			method:"POST",
			url:"ajax/sub_att.php",
			data:{block_id:bId , room_id:rId , lab:lId},
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
