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
						<section class="wrapper style5">
							<div class="inner">
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>USER &nbsp;INFO.</u></h2></center>
                                <br><br>
								<?php			
                                     include_once "connection.php";
                                    $sql = "select * from faculty where f_code='$s';";
								$result = mysqli_query($con,$sql);
                               while($row=mysqli_fetch_assoc($result))
								{
							?>
                           <form action="user_update_val.php?id=<?php echo $s;?>" method="post">
                                            <label style="color:blue;font-size:20px;">User Code</label>
											<input type="text" class="form-control" name="f_code" value="<?php echo $row['f_code']; ?>" readonly="readonly" style="color:black;" ><br><br>
											<label style="color:blue;font-size:20px;">User Name</label>
											<input type="text" class="form-control" name="f_name" value="<?php echo $row['f_name']; ?>" required><br><br>
                                            <label style="color:blue;font-size:20px;">User Password</label>
											<input type="text" class="form-control" name="f_password" value="<?php echo $row['f_password']; ?>" required><br><br>
                                            <label style="color:blue;font-size:20px;">User Type</label>
                                            
                                            <?php
                                                    if($row['f_type']== "Admin"){?>
                                                    <input type="radio" name="f_type" style="color:black;" value="Admin" readonly="readonly" checked required>&nbsp;Admin<br>
                                                    <?php }else if($row['f_type']=='Faculty'){?>
											         <input type="radio" name="f_type" value="Faculty" style="color:black;" readonly="readonly" checked required>&nbsp;Faculty<br>
                                                    <?php } 
                                                ?><br>
											<label style="color:blue;font-size:20px;">Joining Date</label>
											<input type="date" class="form-control" style="color:black;" name="f_jod" readonly="readonly" value="<?php echo $row['f_jod'];?>" ><br><br>
											<label style="color:blue;font-size:20px;">Post</label>
											<input type="text" class="form-control" name="f_post" value="<?php echo $row['f_post']; ?>" readonly="readonly" style="color:black;" ><br><br>
                                            <label style="color:blue;font-size:20px;">Mobile No.</label>
											<input type="text" class="form-control" name="f_mobile" value="<?php echo $row['f_mobile']; ?>" required><br><br>
											<label style="color:blue;font-size:20px;">Mail</label>
											<input type="email" class="form-control" name="f_mail" value="<?php echo $row['f_mail']; ?>" required><br><br>
											<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Update" class="btn btn-success">
										</form>
							<?php
                             	}
							?>	
   
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
