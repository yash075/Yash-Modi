<!-- Header -->
<div id="page-wrapper"></div>
<header id="header" class="alt" style="background-color:#2e3842;height:10%">
						

						<img src="dcs.png" style="height:100%;width:13%;margin-right:5%">
						
					   
						<nav id="nav">		
						
							<ul>
							<input type="lable" style="color:darkseagreen;font-size:20px;font-family:Segoe Print;background-color:#2e3842;border:0;" value="<?php include "../user/logdetail.php";?>" readonly="readonly">
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									
									<div id="menu">
										<ul><li><?php
										//include "../user/logdetail.php";
										if($type=="Admin" || $type=="admin" ){
											echo "<a href=../admin/main.php>Admin</a>";
										}
										?></li>
											<li><a href="index.php">Home</a></li>
                                            <li><a href="user.php">User</a></li>
                                            <li><a href="course.php">Course</a></li>
                                            <li><a href="sem.php">Semester</a></li>
                                            <li><a href="subject.php">Subject</a></li>
                                            <li><a href="faculty-permission.php">Faculty-permission</a></li>
                                            <li><a href="exam_schedule.php">Exam-Schedule</a></li>
                                            <li><a href="attendance.php">Attendance</a></li>
                                            <li><a href="marks.php">Add-marks</a></li>
                                            <li><a href="questionpaper-submition.php">Questionpaper-submition</a></li>
                                            <li><a href="answersheet-receving.php">answersheet-receving</a></li>
											<li><a href="about.php">About Us</a></li>
											<li><a href="logout.php">LogOut</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>
                
                <!-- Scripts -->
		<!--	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>-->

	