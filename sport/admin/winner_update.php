<?php
	session_start();
	$con=mysqli_connect('localhost','root','','sport');
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	$q= "SELECT r_id FROM result";
	$result1 = mysqli_query($con,$q);
	$qu = "select game_id,gname from game";
	$game = mysqli_query($con,$qu);
	$que = "select * from team";
	$win = mysqli_query($con,$que);
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../image/dcs1.jpg">
    <title>Winner | SPORT</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                            <img src="/sport/image/dcs1.jpg" height="60px" width="60px" alt="homepage"  />
                            
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
                        <!-- This is  -->
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Winner</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">Winner</li>
                            <li class="breadcrumb-item active">Add Winner</li>
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
					
					$query = "select * from winner where w_id ='$d'; ";
					
					$result=mysqli_query($con,$query);
					
					while($num=mysqli_fetch_assoc($result))
					{
				?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">	
										<form action="winner_update_val.php?id=<?php echo $_GET['id'];?>" method="post">
											<label>Result Id</label>
											<select name="relist" class="form-control">
												<option value="<?php echo $num['r_id'];?>"><?php echo $num['r_id'];?>&nbsp;&nbsp;(SELECTED ID)</option>
											<?php
												while($row1 = mysqli_fetch_array($result1)){
											?>
												<option value="<?php echo $row1['r_id'];?>">
													<?php echo $row1['r_id'];?>
												</option>
												<?php } ?>
											</select>
											<label>Game Id</label>
											<select name="glist" class="form-control">
												<option value="<?php echo $num['game_id'];?>"><?php echo $num['game_id'];?>&nbsp;&nbsp;(SELECTED ID)</option>
											<?php
												while($row2 = mysqli_fetch_array($game)){
											?>
												<option value="<?php echo $row2['game_id'];?>">
													<?php echo $row2['gname'];?>
													
												</option>
												<?php } ?>
											</select>
											<label>Team Id</label>
											<select name="winlist" class="form-control">
												<option value="<?php echo $num['team_id'];?>"><?php echo $num['team_id'];?>&nbsp;&nbsp;(SELECTED ID)</option>
											<?php
												while($row3 = mysqli_fetch_array($win)){
											?>
												<option value="<?php echo $row3['team_id'];?>">
													<?php echo $row3['team_name'];?>
												</option>
												<?php } ?>
											</select>
											<label>Man Of The Series</label>
											<input type="text" name="mans" value="<?php echo $num['man_series'];?>" class="form-control">
											<label>Man Of The Match</label>
											<input type="text" name="manm" value="<?php echo $num['man_match'];?>" class="form-control">
											<label>Best Batsman</label>
											<input type="text" name="bbat" value="<?php echo $num['b_bat'];?>" class="form-control">
											<label>Best Bowler</label>
											<input type="text" name="bbowl" value="<?php echo $num['b_bowl'];?>" class="form-control">
											<label>Best Raider</label>
											<input type="text" name="raid" value="<?php echo $num['b_raid'];?>" class="form-control">
											<input type="submit" name="submit" class="btn btn-success">
										<form>
										<?php
											}
										?>
									</div>
									<div class="col-md-3"></div>
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
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
