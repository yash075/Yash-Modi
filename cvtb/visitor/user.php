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
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
                 <?php include "../visitor/navigation.php";?> 
        
                  <!-- Main -->
					<article id="main">
						<section class="wrapper style5">
							<div class="inner">
                                <center><h2 style="color:darkseagreen;background-color:#2e3842;font-family:Sitka Text;font-size:xx-large;font-style:bold;"><u>USER &nbsp;INFO.</u></h2></center>
                                <br><br>
								<?php			
                                  include('includes/dbconnection.php');
                                    $sql = "select * from visitor_log_detail where v_id='$s';";
								$result = mysqli_query($con,$sql);
                               while($row=mysqli_fetch_assoc($result))
								{
							?>
                           <form action="user_update_val.php?id=<?php echo $s;?>" method="post" enctype="multipart/form-data">
						   <center><img src="<?php echo "/cvtb/admin/".$row['img'];?>" style="height:120px;width:120px;" alt="NO Image"></center>
						   <label style="color:blue;font-size:20px;">Change Image</label> <input type="file" accept="image/*" name="img" id="img"><br><br>
						                    <label style="color:blue;font-size:20px;">Name</label>
											<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" readonly><br><br>  
                                           <label style="color:blue;font-size:20px;">User Name</label>
											<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" readonly><br><br>
                                            <label style="color:blue;font-size:20px;">Gender</label>
                                            <?php
                                                    if($row['gender']== "male"){?>
                                                    <input type="radio" name="gender" style="color:black;" value="male" readonly="readonly" checked required>&nbsp;male<br>
                                                    <?php }else if($row['gender']=='female'){?>
											         <input type="radio" name="gender" value="female" style="color:black;" readonly="readonly" checked required>&nbsp;female<br>
                                                    <?php } 
                                                     else if($row['gender']=='trans'){?>
													<input type="radio" name="gender" value="trans" style="color:black;" readonly="readonly" checked required>&nbsp;trans<br>
												   <?php } 
											   ?><br>
											   <label style="color:blue;font-size:20px;">Address</label>
											<input type="text" class="form-control" name="adress" value="<?php echo $row['address']; ?>"  style="color:black;" ><br><br>
											<label style="color:blue;font-size:20px;">Description</label>
											<input type="text" class="form-control" name="desc" value="<?php echo $row['description']; ?>"  style="color:black;" ><br><br>
                                            <label style="color:blue;font-size:20px;">Mobile No.</label>
											<input type="text" class="form-control" name="mobile" value="<?php echo $row['mob']; ?>" required><br><br>
											<label style="color:blue;font-size:20px;">Mail</label>
											<input type="email" class="form-control" name="mail" value="<?php echo $row['email']; ?>" required><br><br>
											<?php //include "file.php";?>
											<label style="color:blue;font-size:20px;">File</label><?php if (isset($row['info'])){echo "<a href='/cvtb/admin/".$row['info']."'>View</a>";} ?> <strong>Change:</strong><input type="file" name="file" id="file"><br><br>
											<center>
											<input type="submit" style="background-color:#2e3842;color:white;" name="submit" value="Update" class="btn btn-success">
											</center>
										</form>
							<?php
                             	}
							?>	
   
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
