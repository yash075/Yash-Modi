<?php 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
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
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
									<div class="col-md-2">
										<button class="btn btn-danger"><a href="../admin/delete_all_participant.php" style="color:white;text-decoration:none;">Delete All Record</a></button>
									</div>
									<div class="col-md-8"></div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<form action="#" method="post">
										<hr>
										<h2 class="text-danger text-center">Participant Details</h2>
											<table class="table table-bordered">
											
												<thead>
													<tr>
														
														<td>Enrollment No.</td>
														<td>Name</td>
														<td>Birth Date</td>
														<td>Mobile No.</td>
														<td>Class</td>
														<td>Team Name</td>
														<td>Game Name</td>
														<td>Type</td>
														<td>Email</td>
														<td>Reg. Date</td>
														<td>Last Updated</td>
													</tr>
												</thead>
												<tbody>
													<?php
														$con=mysqli_connect("localhost","root","","sport");
														$sql = "select * from participant ";
							
														$result = mysqli_query($con,$sql);
							
														while($row=mysqli_fetch_assoc($result))
														{
													?>
													<tr>
														
														<td><?php echo $row['e_no'];?></td>
														<td><?php echo $row['p_name'];?></td>
														<td><?php echo $row['p_birth'];?></td>
														<td><?php echo $row['p_mobile'];?></td>
														<td><?php echo $row['p_class'];?></td>
														<td>
															<?php
																$sql1 = "select team_name from team where team_id=".$row['team_id'];
																$result1 = mysqli_query($con,$sql1);
																while($row1 = mysqli_fetch_assoc($result1))
																{
															?>
															<?php echo $row1['team_name'];?>
																<?php } ?>
														</td>
														<td>
															<?php
																$sql2 = "select gname from game where game_id=".$row['game_id'];
																$result2 = mysqli_query($con,$sql2);
																while($row2 = mysqli_fetch_assoc($result2))
																{
															?>
															<?php echo $row2['gname'];?>
																<?php } ?>
														</td>
														<td><?php echo $row['p_type'];?></td>
														<td><?php echo $row['p_email'];?></td>
														<td><?php echo $row['r_date'];?></td>
														<td><?php echo $row['u_date'];?></td>
														<td><button class="btn btn-danger"><a href="../admin/participant_delete.php?id=<?php echo $row['e_no'];?>" style="color:white;text-decoration:none;">Delete</a></button></td>
														
														</td>
													</tr>
													<?php
														}
													?>	
												</tbody>
											</table>
										</form>
									</div>
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
  