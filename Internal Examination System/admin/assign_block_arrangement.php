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
    <title>Exam | IES</title>
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
<![endif]--><!--select all-->
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
    
    <?php
     if(!isset($_GET['id'])){
         echo '<script>window.location="room_arrangement.php"</script>';
     }
     else{
         $g=$_GET['id'];
     }
     ?>
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
						
                          <!--  <form class="app-search p-l-20" action="manage_user_search.php" method = "post">
                                  <input type="text" class="form-control" placeholder="Search for..." name="find"><a class="srh-btn"><i class="ti-search m-r-10"></i></a> 
								//<input type="submit" class="btn btn-warning" value="Search">
                            </form>-->
							
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Exam schedule</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/assign_block.php">Room Arrangement</a></li>
                            <li class="breadcrumb-item active">Block Arrangement</li>
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
										
                                      </div>
                                      
									<div class="col-md-6">
										
                                        </div>
                                         &emsp;
                                        
                                       
									
									<div class="col-md-2"></div>
                                            </div>
								<div class="row">
									<div class="col-md-12"></div>
								</div><div class="row">
									<div class="col-md-12">
										<h2 class="text-danger text-center">Block Arrangement</h2>
										<table class="table table-bordered" style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
                                                    <th  style="text-align:center;">No.</th>
                                                    <th  style="text-align:center;">Block No</th>
													<th  style="text-align:center;">Date Time</th>
													<th  style="text-align:center;">Course & Sem</th>
                                                    <th  style="text-align:center;">Subject Name</th>
                                                    <th  style="text-align:center;">Total Student</th>
                                                    <th  style="text-align:center;">Show Student</th>
												</tr>
											</b></thead>
											<?php
                                                $no=1;
												
                                                include '../admin/connection.php';
                
												$sql = "SELECT block_arrangement.b_arr_id,block_arrangement.b_arr_no,exam_schedule_theory.date,exam_schedule_theory.time,subject.sub_code,subject.sub_name,semester.sem_code,course.course_name FROM block_arrangement INNER JOIN exam_schedule_theory ON exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id INNER JOIN subject ON subject.sub_id=exam_schedule_theory.sub_id INNER JOIN semester ON semester.sem_id=subject.sem_id INNER JOIN course ON course.course_id=semester.course_id JOIN faculty ON faculty.f_id=block_arrangement.f_id JOIN room_arrangement ON room_arrangement.r_id=block_arrangement.r_id WHERE block_arrangement.r_id='$g' order by exam_schedule_theory.date,exam_schedule_theory.time,course.course_name,semester.sem_code;";
												$result = mysqli_query($con,$sql);
							
												while($row=mysqli_fetch_assoc($result))
												{   
											?>
											
											<tbody>
												<tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row['b_arr_no'];?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row['date']))." ".$row['time'];?></td>
													<td><?php echo $row['course_name']." - ".substr($row['sem_code'],2);?></td>
                                                    <td><?php echo $row['sub_code']." - ".$row['sub_name'];?></td>
                                                    <?php
                                                        $id=$row['b_arr_id'];
                                                        $sql1 = "SELECT * from assign_block where b_arr_id='$id';";
												        $result1 = mysqli_query($con,$sql1);
                                                        $num = mysqli_num_rows($result1);
                                                    ?>
                                                     <td><?php echo $num;?></td>
                                                    <td><a href="assign_block_in_student.php?id=<?php echo $row['b_arr_id'];?>&rid=<?php echo $g;?>" style="color:orange;text-decoration:none;"><i class="fa fa-eye m-r-10" style="font-size:18px;color:orange;" aria-hidden="true"></i></a></td>
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