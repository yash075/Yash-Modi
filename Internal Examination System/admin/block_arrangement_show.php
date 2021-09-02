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
 <!-- JQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">exam schedule practicals</h3>
                       <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/room_arrangement.php">Room Arrangement</a></li>
                            <li class="breadcrumb-item active">Show Blocks</li>
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
									<div class="col-md-3"></div>
									<div class="text-center">
                                        </div>
                                    <?php 
                                        include "../admin/connection.php";
                                        $room_id = $_GET['id'];
                                        
                                        $sql1="select r_name from room_arrangement where r_id='$room_id';";
                                        $result1=mysqli_query($con,$sql1);
                                        $row=mysqli_fetch_assoc($result1);
                                        $r_name=$row['r_name'];
    
                                        $sql11="SELECT block_arrangement.b_arr_no,block_arrangement.f_id,exam_schedule_theory.date,exam_schedule_theory.time,subject.sub_code,subject.sub_name,semester.sem_code,course.course_code,course.course_name FROM block_arrangement INNER JOIN exam_schedule_theory ON exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join subject on subject.sub_id=exam_schedule_theory.sub_id inner join semester on semester.sem_id=subject.sem_id inner join course on course.course_id=semester.course_id WHERE block_arrangement.r_id='$room_id' ;";
                                        $result11=mysqli_query($con,$sql11);
                                    ?>
                                    <div>
                                    <h2 class="text-danger text-center">Blocks Show</h2>
										<form action="block_arrangement.php" method="POST">
                                        <table class="table table-stripped"  style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
                                               
                                                    <th style="text-align:center;">Room No.</th>
                                                    <th style="text-align:center;">Block No.</th>
                                                    <th style="text-align:center;">Course Name & Sem</th>
                                                    <th style="text-align:center;">Subject</th>
                                                    <th></th>
                                                    <th style="text-align:center;">code</th>
                                                    <th style="text-align:center;">&</th>
                                                    <th style="text-align:center;">Name</th>
                                                    <th style="text-align:center;">Date</th>
                                                    <th></th>
                                                     <th></th>
                                                    <th style="text-align:center;">Time</th>
                                                     <th></th>
                                                    <th></th>
                                                    <th style="text-align:center;">Faculty</th>
                                                    <th style="text-align:center;">Name</th>
												</tr>
											</b></thead>
                                            <tbody>

                                            <?php
     $i=0;
                                                 while ($row=mysqli_fetch_assoc($result11)) {
                                                
                                                        ?>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="room_id<?php echo $i;?>" value="<?php echo $r_name;?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="b_name<?php echo $i;?>" value="<?php echo $row['b_arr_no'];?>" readonly>
                                                    </td>
                                                    <td>
                                                        <select name="course_id<?php echo $i;?>" class="form-control" id="course<?php echo $i;?>">
                                                              <option value=""><?php echo $row['course_code']." - ".$row['course_name']." - ".$row['sem_code']; ?> </option>
                                                          </select>
                                                    </td>
                                                    <td colspan="5">
                                                       <select name="exam_sch_th_id<?php echo $i;?>" class="form-control" id="subject<?php echo $i;?>">
                                                             <option value=""><?php echo $row['sub_code']." - ".$row['sub_name']; ?> </option>
                                                        </select>
                                                    </td>
                                                     <td colspan="3">
                                                         <select name="date<?php echo $i;?>" class="form-control" id="date<?php echo $i;?>">
                                                            <option value=""><?php echo date('d-m-Y',strtotime($row['date'])); ?> </option>
                                                        </select>
                                                         
                                                    </td>
                                                     <td colspan="2">
                                                        <select name="time<?php echo $i;?>" class="form-control" id="time<?php echo $i;?>">
                                                            <option value=""><?php echo $row['time'];?> </option>
                                                        </select>
                                                    </td>
                                                    <td colspan="3">
                                                        <select name="exam_sch_th_id<?php echo $i;?>" class="form-control" id="subject<?php echo $i;?>" required>
                                                        <?php
                                                               
                                                                     $f_id = $row['f_id'];
                                                                    if(isset($f_id))
                                                                    {
                                                                       
                                                                    $sql18 = "select f_id,f_code,f_name from faculty where f_id='$f_id'";
                                                                    $result18=mysqli_query($con,$sql18);
                                                                    $row18=mysqli_fetch_assoc($result18);
                                                     ?>
                                                       
                                                             <option value="<?php echo $f_id;?>"><?php echo $row18['f_code']." - ".$row18['f_name']; ?> </option>
                                                            <?php
                                                                    }else
                                                                    {
                                                                        ?>
                                                             <option value="NULL">NULL </option>
                                                            <?php
                                                                    }
                                                                        ?>
                                                        </select>
                                                    </td>
                                               </tr>
                                                
                                               <?php
                                    } ?>
                                    </tbody>
                                           </table>
											<center><input type="submit" name="Back" value="Back" class="btn btn-success"></center>
                                        </form>
                                    </div>
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