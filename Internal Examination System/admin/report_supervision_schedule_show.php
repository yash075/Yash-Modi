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
                        <h3 class="text-themecolor m-b-0 m-t-0">Report</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/report.php">Report</a></li>
                            <li class="breadcrumb-item active">Supervision Schedule</li>
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
                                        <button class="btn btn-success"><a href="../admin/report_supervision_schedule.php" style="color:white;text-decoration:none;"><i class="fa fa-arrow-left m-r-10" style="font-size:18px;text-align:center" aria-hidden="true"></i> Back</a></button>
									</div>
									<div class="col-md-6">
										<button class="btn btn-success"><a href="../admin/faculty_permission_add.php" style="color:white;text-decoration:none;"><i class="fa fa-file m-r-10" style="font-size:18px;text-align:center" aria-hidden="true"></i> Excle</a></button>
                                        </div>
									<div class="text-center">
                                        </div>
                                    <?php 
                                        include "../admin/connection.php";
                                        $f_id = $_GET['f_id'];
                                        
                                        $sql11="select block_arrangement.b_arr_no,room_arrangement.r_name from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id join room_arrangement on room_arrangement.r_id=block_arrangement.r_id join faculty on faculty.f_id=block_arrangement.f_id where block_arrangement.f_id='$f_id' group by room_arrangement.r_name,block_arrangement.b_arr_no order by room_arrangement.r_name,block_arrangement.b_arr_no;";
     
     
                                        $sql12="select block_arrangement.b_arr_id,exam_schedule_theory.date,exam_schedule_theory.time from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id  join faculty on faculty.f_id=block_arrangement.f_id where block_arrangement.f_id='$f_id' group by exam_schedule_theory.date order by exam_schedule_theory.date,exam_schedule_theory.time;";
                                        $result12=mysqli_query($con,$sql12);
                                        $sql15 = "select f_id,f_code,f_name from faculty order by f_code";
                                    ?>
                                    <div>
                                        <br>
                                    <h2 class="text-danger text-center">Theory Date & Time Supervision</h2>
                                        <table class="table table-bordered"  style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
                                                    <th rowspan="2">Date</th>
                                                    <th rowspan="2">Time</th>
                                                     <?php
                                                        $result11=mysqli_query($con,$sql11);
                                                        while($row11=mysqli_fetch_assoc($result11)){?>
                                                            <th>Room <?php echo $row11['r_name'];?></th>
                                                        <?php } ?>
                                                     
												</tr>
                                                <tr style="color:blue;font-size:20px;">
                                                    <?php
                                                        $result11=mysqli_query($con,$sql11);
                                                        while($row11=mysqli_fetch_assoc($result11))
                                                        {
                                                    ?>
                                                            <th>Block <?php echo $row11['b_arr_no'];?></th>
                                                        <?php } ?>
                                                     
												</tr>
											</b></thead>
                                            
                                            <tbody>
                                                

                                            <?php
     $i=1;
     $j=1;
                                                 while ($row=mysqli_fetch_assoc($result12)) {
                                                     $date = $row['date'];
                                                     $time = $row['time'];
                                                        ?>
                                            <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="date<?php echo $i;?>" value="<?php echo date('d-m-Y',strtotime($date));?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="time<?php echo $i;?>" value="<?php echo $row['time'];?>" readonly>
                                                    </td>
                                                <?php
                                                     
                                                     $sql13="select block_arrangement.b_arr_id,block_arrangement.b_arr_no,block_arrangement.f_id,room_arrangement.r_name from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id join room_arrangement on room_arrangement.r_id=block_arrangement.r_id join faculty on faculty.f_id=block_arrangement.f_id where exam_schedule_theory.time='$time' AND exam_schedule_theory.date='$date' AND block_arrangement.f_id='$f_id' group by room_arrangement.r_name,block_arrangement.b_arr_no order by room_arrangement.r_name,block_arrangement.b_arr_no;";
                                                    $result11=mysqli_query($con,$sql11);
                                                     $no = mysqli_num_rows($result11);
                                                     while ($row11=mysqli_fetch_assoc($result11))
                                                     {
                                                        $result13=mysqli_query($con,$sql13);
                                                        while($row13=mysqli_fetch_assoc($result13))
                                                        {
                                                            
                                                            if($row13['r_name']==$row11['r_name'] and $row13['b_arr_no']==$row11['b_arr_no'])
                                                            {
                                                                ?>
                                                 <td>
                                                        <select name="f_id<?php echo $i;echo $j;?>" class="form-control" required>
                                                <?php
                                                                $result15=mysqli_query($con,$sql15);
                                                                
                                                                    $f_id = $row13['f_id'];
                                                                    $sql18 = "select f_id,f_code,f_name from faculty where f_id='$f_id'";
                                                                    $result18=mysqli_query($con,$sql18);
                                                                    $row18=mysqli_fetch_assoc($result18);
                                                     ?>
                                                  
                                                            <option value="<?php echo $row18['f_id']."-".$row13['b_arr_id'];?>"><?php echo $row18['f_code']."-".$row18['f_name']; ?> </option>
                                                            <?php   
                                                                
                                                              
                                                                $j++;
                                                                break;
                                                     }
                                                    else if($row13['b_arr_no'] > $row11['b_arr_no']){
                                                        ?>
                                                <td></td>
                                                <?php
                                                    } 
                                                        }
                                                     }  
                                                     ?>
                                                            </select>
                                                    </td>
                                               </tr>
                                                
                                               <?php
                                                     $i++;
                                    } ?>
                                    </tbody>
                                           </table>
                                        <?php
                                            $sql11="select exam_schedule_practical.exam_sch_pra_id,exam_schedule_practical.lab_no from exam_schedule_practical inner join faculty on faculty.f_id=exam_schedule_practical.f_id where exam_schedule_practical.f_id='$f_id' group by exam_schedule_practical.lab_no order by exam_schedule_practical.lab_no;";
     
     
                                        $sql12="select exam_schedule_practical.exam_sch_pra_id,exam_schedule_practical.date,exam_schedule_practical.time from exam_schedule_practical inner join faculty on faculty.f_id=exam_schedule_practical.f_id where exam_schedule_practical.f_id='$f_id' group by exam_schedule_practical.date order by exam_schedule_practical.date,exam_schedule_practical.time;";
                                        $result12=mysqli_query($con,$sql12);
                                        $sql15 = "select f_id,f_code,f_name from faculty order by f_code";
                                    ?>
                                    <div>
                                        <br>
                                    <h2 class="text-danger text-center">Practical Date & Time Supervision</h2>
                                        <table class="table table-bordered"  style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
                                                    <th rowspan="2">Date</th>
                                                    <th rowspan="2">Time</th>
                                                     <?php
                                                        $result11=mysqli_query($con,$sql11);
                                                        while($row11=mysqli_fetch_assoc($result11)){?>
                                                            <th>Lab No <?php echo $row11['lab_no'];?></th>
                                                        <?php } ?>
                                                     
												</tr>
											</b></thead>
                                            
                                            <tbody>
                                                

                                            <?php
     $i=1;
     $j=1;
                                                 while ($row=mysqli_fetch_assoc($result12)) 
                                                 {
                                                     $date = $row['date'];
                                                     $time = $row['time'];
                                                        ?>
                                            <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="date<?php echo $i;?>" value="<?php echo date('d-m-Y',strtotime($date));?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="time<?php echo $i;?>" value="<?php echo $row['time'];?>" readonly>
                                                    </td>
                                                <?php
                                                     
                                                     $sql13="select exam_schedule_practical.exam_sch_pra_id,exam_schedule_practical.lab_no,exam_schedule_practical.f_id,faculty.f_code,faculty.f_name from exam_schedule_practical inner join faculty on faculty.f_id=exam_schedule_practical.f_id where exam_schedule_practical.time='$time' AND exam_schedule_practical.date='$date' AND exam_schedule_practical.f_id='$f_id' order by exam_schedule_practical.date,exam_schedule_practical.time,exam_schedule_practical.lab_no;";
                                                    $result11=mysqli_query($con,$sql11);
                                                     $no = mysqli_num_rows($result11);
                                                     while ($row11=mysqli_fetch_assoc($result11))
                                                     {
                                                        $result13=mysqli_query($con,$sql13);
                                                        while($row13=mysqli_fetch_assoc($result13))
                                                        {
                                                            
                                                            if($row13['lab_no']==$row11['lab_no'])
                                                            {
                                                                ?>
                                                 <td>
                                                        <select name="f_id<?php echo $i;echo $j;?>" class="form-control" required>
                                                <?php
                                                                $result15=mysqli_query($con,$sql15);
                                                                
                                                                    $f_id = $row13['f_id'];
                                                                    $sql18 = "select f_id,f_code,f_name from faculty where f_id='$f_id'";
                                                                    $result18=mysqli_query($con,$sql18);
                                                                    $row18=mysqli_fetch_assoc($result18);
                                                     ?>
                                                  
                                                            <option value="<?php echo $row18['f_id']."-".$row13['b_arr_id'];?>"><?php echo $row18['f_code']."-".$row18['f_name']; ?> </option>
                                                            <?php   
                                                                
                                                              
                                                                $j++;
                                                                break;
                                                     }
                                                    else if($row13['exam_sch_pra_id'] > $row11['exam_sch_pra_id']){
                                                        ?>
                                                <td></td>
                                                <?php
                                                    } 
                                                        }
                                                     }  
                                                     ?>
                                                            </select>
                                                    </td>
                                               </tr>
                                                
                                               <?php
                                                     $i++;
                                    } ?>
                                    </tbody>
                                           </table>
											
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