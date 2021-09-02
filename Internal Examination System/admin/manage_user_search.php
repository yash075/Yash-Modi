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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../image/dcs1.jpg">
    <title>Users | IES</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
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
                            <img src="../image/dcs1.jpg" height="60px" width="60px" alt="homepage"  />
                            
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
						
                            <form class="app-search p-l-20" action="#" method="post">
                                  <input type="text" class="form-control" placeholder="Search for..." name="find"><a class="srh-btn"><i class="ti-search m-r-10"></i></a> 
								<!--<input type="submit" class="btn btn-warning" value="Search">-->
                            </form>
							
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                     <?php include_once '../admin/logdetail.php';?>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
			<?php include '../admin/navigation.php';?>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage Users</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
							<li class="breadcrumb-item"><a href="../admin/manage_user.php">Manage Users</a></li>
                            <li class="breadcrumb-item active">Search Users</li>
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
										<button class="btn btn-success"><a href="../admin/manage_user.php" style="color:white;text-decoration:none;"><i class="fa fa-arrow-left m-r-10" style="font-size:18px" aria-hidden="true"></i> Back</a></button>
									</div>
									<div class="col-md-6">
										<form action="excel/all_game_excel.php" method="post">
											<input type="submit" name="export_excel" class="btn btn-success" value="Excel">
										</form>
                                        </div>
                                         &emsp;
                                        
                                        <form action="manage_user_delete_checkbox.php" method="post">
                                        <input type="checkbox" id="checkAl" ><b><b style="color:blue;"> Select All</b></b>
                                            &emsp;
                                             <button type="submit" class="btn btn-danger" name="del" ><i class="fa fa-trash m-r-10" style="font-size:18px" aria-hidden="true"></i>Delete</button>
									
									<div class="col-md-2"></div>
                                            </div>
								<div class="row">
									<div class="col-md-12"></div>
								</div>
								<div class="row">
									<div class="col-md-12">
                                        <h2 class="text-danger text-center">Search Users</h2>
										<table class="table table-bordered" style="text-align:center;">
											<thead>
												<tr style="color:blue;font-size:20px;">
                                                    <th></th>
													<th style="text-align:center;">No.</th>
													<th style="text-align:center;">Code</th>
                                                    <th style="text-align:center;">Name</th>
													<th style="text-align:center;">Password</th>
													<th style="text-align:center;">Type</th>
													<th style="text-align:center;">JOD</th>
                                                    <th style="text-align:center;">Post</th>
                                                    <th style="text-align:center;">Mobile No.</th>
                                                    <th style="text-align:center;">Email</th>
                                                    <th style="text-align:center;">Edit</th>
												</tr>
											</thead>
											<?php
                                                $no=1;
     
												include '../admin/connection.php';
                                                
                                                if(isset($_POST['find']))
                                                        {
												            $g = $_POST['find'];
												            $sql = "select * from faculty where f_code like '%$g%' OR f_name like '%$g%' OR f_type like '%$g%' order by f_code;";
                                                        }
                                                        else
                                                        {
                                                            $sql="select * from faculty order by f_code;";
                                                        }
                                                    
												$result = mysqli_query($con,$sql);
												$num = mysqli_num_rows($result);
												if ($num > 0)
												{
												while($row=mysqli_fetch_assoc($result))
												{
													
											?>
											
											<tbody>
												<tr>
                                                    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["f_id"]; ?>"></td>
                                                    <td style="color:blue;"><?php echo $no;?></td>
													<td><?php echo $row['f_code'];?></td>
													<td><?php echo $row['f_name'];?></td>
													<td><?php echo $row['f_password'];?></td>
													<td><?php echo $row['f_type'];?></td>
													<td><?php echo date("d-m-Y",strtotime($row['f_jod']));?></td>
													<td><?php echo $row['f_post'];?></td>
													<td><?php echo $row['f_mobile'];?></td>
                                                    <td><?php echo $row['f_mail'];?></td>
													<td><a href="manage_user_update.php?id=<?php echo $row['f_id'];?>" style="color:green;text-decoration:none;"><i class="fa fa-edit m-r-10" style="font-size:18px" aria-hidden="true"></i></a></td>
												</tr>
											<?php
                                                    $no++;
												}
											?>
											<?php 
												}
												else
												{
													echo "<center><h3>Result Not Found.</h3></center>";
												}
											?>
											</tbody>
										</table>
                                        <script>
    $("#checkAl").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
                                        
									</div>
                                   
								</div>
                                     </form>
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot-data.js"></script>
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