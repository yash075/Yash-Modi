<?php

	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	$con=mysqli_connect('localhost','root','','sport');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell tde browser to be responsive to screen widtd -->
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <meta name="description" content="">
    <meta name="autdor" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../image/dcs1.jpg">
    <title>Participant | SPORT</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change tde tdeme colors from here -->
    <link href="css/colors/blue.css" id="tdeme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view tde page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="patd" cx="50" cy="50" r="20" fill="none" stroke-widtd="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="main.php">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/sport/image/dcs1.jpg" height="60px" widtd="60px" alt="homepage"  />
                            
                        </b>
                        <!--End Logo icon -->
                        <hr>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- tdis is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="../assets/images/users/1.jpg" alt="user" class="profile-pic m-r-5" /><?php echo $s;?>
								<a href="../admin/logout.php"><button class="btn btn-danger">Logout</button></a>
							</a>	
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
			<?php include '../include/navigation.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-tdemecolor m-b-0 m-t-0">Participant</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Participant</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<?php
					$con = mysqli_connect('localhost','root','','sport');
					$d = $_GET['id'];
					$query = "select * from participant where e_no='$d'; ";
					$result = mysqli_query($con,$query);
					
					while($num = mysqli_fetch_assoc($result)) 
					{
				?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-4">
										<div class="text-center text-danger">Edit Details Participant<br><br></div>
										<form action="participant_update_val.php?id=<?php echo $num['e_no'];?>" method="post">
											<label>Enrollment No.</label>
											<input type="text" value="<?php echo $num['e_no'];?>"name="eno" maxlength="11" class="form-control">
											<label>Name</label>
											<input type="text" value="<?php echo $num['p_name'];?>" name="pn" class="form-control">
											<label>Birth Date</label>
											<input type="date" value="<?php echo $num['p_birth'];?>" name="bdate" class="form-control">
											<label>Mobile No.</label>
											<input type="text" value="<?php echo $num['p_mobile'];?>" name="mno" maxlength="10" class="form-control">
											<label>Class</label>
											<select name="class" class="form-control">
												<option value="<?php echo $num['p_class'];?>"selected ><?php echo $num['p_class'];?></option>
												<option name="B.SC (CA & IT)">B.SC (CA & IT)</option>
												<option name="M.SC (CA & IT)">M.SC (CA & IT)</option>
											</select>
											<label>Team Id</label>
											<select name="tlist" class="form-control">
												<option value="<?php echo $num['team_id']?>" selected ><?php echo $num['team_id'];?></option>
											<?php
												$q= "SELECT team_id,team_name FROM team";
												$result1 = mysqli_query($con,$q);
												while($row1 = mysqli_fetch_array($result1)){
											?>
												<option value="<?php echo $row1['team_id'];?>">
												
													<?php echo $row1['team_name'];?>
												</option>
												<?php } ?>
											</select>
											<label>Game Id</label>
											<select name="glist" class="form-control">
												<option value="<?php echo $num['game_id'];?>" selected ><?php echo $num['game_id'];?></option>
												<?php
													$qu ="select game_id,gname from game";
													$result2 = mysqli_query($con,$qu);
													while($row2 = mysqli_fetch_array($result2))
													{
												?>
													<option value="<?php echo $row2['game_id'];?>">
													<?php echo $row2['gname'];?>
													</option>
													<?php } ?>
											</select>
											<label>Participant Type</label>
											<select name="pty" class="form-control">
												<option name="<?php echo $num ['p_type'];?>" selected ><?php echo $num['p_type'];?></option>
												<option name="Captain">Captain</option>
												<option name="Co-Captain">Co-Captain</option>
												<option name="Player">Player</option>
											</select>
											<label>Email</label>
											<input type="email" name="email" value="<?php echo $num['p_email'];?>" class="form-control">
											<input type="submit" name="submit" class="btn btn-success">
										</form>
										<?php
											}
										?>
									</div>
									<div class="col-md-4"></div>
								</div>
								
                            </div>
							</div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
				<?php include '../include/footer.php';?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tetder Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tetder.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Winners api -->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../assets/plugins/gmaps/gmaps.min.js"></script>
    <script src="../assets/plugins/gmaps/jquery.gmaps.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
  