<?php 
	session_start();
	
	$s = $_SESSION["cvmsaid"];
	if($s == TRUE)
	{
?>
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
        
         <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <!--select all-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
                 <?php include "../visitor/navigation.php";?> 
        
                 <!-- Main -->
                <article id="main">
						<section class="wrapper style5">
						<div class="inner">
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>Whom To Meet</u></h2></center>
                                
								<form action="add_visit_val.php" method="post" enctype="multipart/form-data">
                                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="dropdown-input" class=" form-control-label">Department</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="department_id" id="department" class="form-control" required>
                                                <option value="" selected disabled>--Select Department--</option>
                                                 <?php
                                                        $sql = "select * from department order by d_id";
														$result = mysqli_query($con,$sql);
							
														while($row=mysqli_fetch_assoc($result))
														{
													?>
                                                <option value="<?php echo $row['d_id'];?>"><?php echo $row['d_name'];?></option>
                                                <?php
														}
													?>	
                                            </select>                                                </div>
                                            </div>
                                    <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="dropdown-input1" class=" form-control-label">Employee</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="employee_id" id="employee" class="form-control" required>
                                                <option value="" selected disabled>--Select Employee--</option>	
                                            </select>      
                                                </div>
                                            </div>
                                    <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Reason To Meet</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="res" id="res" rows="9" placeholder="Enter Reason To Meet..." class="form-control" required></textarea>
                                                </div>
                                            </div><br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="date-input" class=" form-control-label">Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="date" id="date" class="form-control" style="color:black;" required>
                                                </div>
                                            </div><br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="time-input" class=" form-control-label">Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" name="time" id="time" class="form-control" style="color:black;" required>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $s;?>" name="id">
                                          <div class="card-footer"><br><center>
                                        <input type="submit" name="submit" id="submit" value="Request Visit" class="btn btn-primary btn-sm" >
                                        </center>
                                        
                                    </div>
                                        </form>
                                        <script>
$(document).ready(function(){
	$("#department").on('change',function(){
		var departmentId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/employee_ajax.php",
			data:{department_id:departmentId},
			dataType:"html",
			success:function(data){
				$("#employee").html(data);
			}
		});
	});
});
</script>
                                
                                
                                </div>
						</section>
					</article>
                
                          <!-- Footer -->
						  <?php include "../visitor/footer.php";?>
        </div>
                
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
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
