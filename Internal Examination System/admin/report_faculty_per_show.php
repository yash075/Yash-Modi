<?php 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(!isset($_GET['f_id'])){
            header('location:report_faculty_per.php');
        }
        $f_id = $_GET['f_id'];
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
    <title>Faculty Permission | IES</title>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Report</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/report.php">Report</a></li>
                            <li class="breadcrumb-item active">Faculty Permission Show</li>
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
                                        <button class="btn btn-success"><a href="../admin/report_faculty_per.php" style="color:white;text-decoration:none;"><i class="fa fa-arrow-left m-r-10" style="font-size:18px;text-align:center" aria-hidden="true"></i> Back</a></button>
									</div>
									<div class="col-md-6">
										<button class="btn btn-success"><a href="../admin/faculty_permission_add.php" style="color:white;text-decoration:none;"><i class="fa fa-file m-r-10" style="font-size:18px;text-align:center" aria-hidden="true"></i> Excle</a></button>
                                        </div>
									
									
                                    
                                            </div>
								<div class="row">
									<div class="col-md-12"></div>
                                    
													<?php
														
                                                        include '../admin/connection.php';
     
														$sql1 = "select * from faculty where f_id='$f_id';";
														$result1 = mysqli_query($con,$sql1);
                                                        $row1=mysqli_fetch_assoc($result1);
													?>
								</div>
								<div class="row">
									<div class="col-md-12">
                                            <h2 class="text-danger text-center"><?php echo $row1['f_code']." - ".$row1['f_name'];?></h2><br>
											<h2 class="text-danger text-center">Faculty Permission</h2>
											<table class="table table-bordered" style="text-align:center;">
												<thead>
													<tr style="color:blue;font-size:20px;">
                                                        <th style="text-align:center;">No.</th>
                                                        <th style="text-align:center;">Course & Sem </th>
                                                        <th style="text-align:center;">Batch Name</th>
                                                        <th style="text-align:center;">Sub Code & Name</th>
                                                        <th style="text-align:center;">Type</th>
													</tr>
													</thead>
													
													<?php
														
                                                        include '../admin/connection.php';
     
														$sql = "select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,batch.batch_name,semester.sem_code,course.course_name from faculty_permission inner join faculty on faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join course on course.course_id=semester.course_id where faculty.f_id='$f_id' order by faculty.f_code,subject.sub_code,batch.batch_name;";
														$result = mysqli_query($con,$sql);
                                                        $no = 1;
														while($row=mysqli_fetch_assoc($result))
														{
													?>
                                                     <tbody>   
													<tr>
                                                        <td style="color:blue;"><?php echo $no;?></td>
														<td ><?php echo $row['course_name']." - ".substr($row['sem_code'],2);?></td>
                                                        <td ><?php echo $row['batch_name'];?></td>
                                                        <td><?php echo $row['sub_code']." - ".$row['sub_name'];?></td>
                                                        <td><?php echo $row['sub_type'];?></td>
														
													</tr>
													<?php
                                                            $no++;
														}
													?>	
												</tbody>
											</table>
                                    
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
