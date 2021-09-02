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
                           <li class="breadcrumb-item"><a href="../admin/examination_schedule.php">Exam Generation</a></li>
                            <li class="breadcrumb-item active">Show Practical Schedule</li>
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
                                        $exam_id = $_GET['id'];
                                        $sem=$_POST['sem_id'];
                                        $date=$_POST['sdate'];
                                        $sql="select subject.sub_id,subject.sub_code,subject.sub_name from
                                        subject where sem_id='$sem' and sub_type='practical' ;";
                                        $result=mysqli_query($con,$sql);
                                        
                                        $sql1="select batch.batch_name from assign_student_in_batch inner join batch on batch.batch_id=assign_student_in_batch.batch_id inner join student on student.stud_id=assign_student_in_batch.stud_id where student.stud_status='1' AND student.sem_id='$sem' AND batch.batch_name!='Theory' group by batch.batch_name order by batch.batch_name;";
                                        $result1=mysqli_query($con,$sql1);
                                        $num1 = mysqli_num_rows($result1);
                                        for($batcharr = array();$l = mysqli_fetch_assoc($result1);)
                                        {
                                           $batcharr[] = $l['batch_name'];
                                        }
                                        
                                        
                                        $sql3 = "select f_id,f_code,f_name from faculty order by f_code";
										
                                    ?>
                                    <div>
                                    <h2 class="text-danger text-center">Practical Schedule</h2>
										<form action="exam_schedule_practical_add_val.php?id=<?php echo $exam_id;?>" method="POST">
                                        <table class="table table-stripped"  style="text-align:center;">
											<thead><b>
												<tr style="color:blue;font-size:20px;">
                                               
                                                    <th style="text-align:center;">Date</th>
                                                    <th style="text-align:center;">Time</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th style="text-align:center;">Subject</th>
                                                    <th></th>
                                                    <th style="text-align:center;">code</th>
                                                    <th style="text-align:center;">&</th>
                                                    <th style="text-align:center;">Name</th>
                                                    <th></th>
                                                    <th style="text-align:center;">Batch</th>
                                                    <th style="text-align:center;">Lab No.</th>
                                                    <th style="text-align:center;">Faculty</th>
                                                    <th style="text-align:center;">Name</th>
												</tr>
											</b></thead>
                                            <tbody>

                                            <?php
                                                    $i=0;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                        
                                                    if($date == "sunday")
                                                    {
                                                            $date = strtotime("+1 day", strtotime($date));
                                                           $date =  date("Y-m-d",$date);
                                                    }
                                                    else if($date==$_POST['sdate'])
                                                    {
                                                            $date = $date;
                                                    }
                                                    else
                                                    {
                                                        $date = date("Y-m-d",$date);
                                                    }
                                                        
                                                    for($j=0;$j<$num1;$j++,$i++)
                                                    {
                                                        ?>
                                                <tr>
                                                         
                                                    <td>
                                                        <input type="date" class="form-control" name="dateval<?php echo $i;?>" value="<?php echo $date;?>">
                                                    </td>
                                                    <td>
                                                        <input type="time" class="form-control" name="timeval<?php echo $i;?>" value="<?php echo $_POST['time']?>">
                                                    </td>
                                                    <td colspan="8">
                                                        <input type="text" class="form-control" name="sub_idval<?php echo $i;?>" value="<?php echo $row['sub_code']."  - ".$row['sub_name'];?>" readonly>
                                                    </td>
                                                   
                                                     <td>
                                                         <input type="text" class="form-control" name="batchval<?php echo $i;?>" value="<?php echo $batcharr[$j];?>">
                                                         
                                                    </td>
                                                     <td>
                                                        <input type="text" class="form-control" name="labnoval<?php echo $i;?>" >
                                                    </td>
                                                     <td colspan="2">
                                                         <select name="f_idval<?php echo $i;?>" class="form-control" required>
                                                        <option value="" selected disabled>Select Faculty</option>
                                                 <?php
                                                        $result3 = mysqli_query($con,$sql3);
														while($rowss=mysqli_fetch_assoc($result3))
														{
													?>
                                                    <option value=<?php echo $rowss['f_id'];?>><?php echo $rowss['f_code']." - ".$rowss['f_name'];?></option>
                                                <?php
														}
													?>	
                                                </select>
                                                    </td>
                                               </tr>
                                                
                                               <?php
                                                    }
                                       // echo $date;
                                         $date = strtotime("+1 day", strtotime($date));
                                    } ?>
                                    </tbody>
                                           </table>
											<center><input type="submit" name="submit" class="btn btn-success"></center>
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