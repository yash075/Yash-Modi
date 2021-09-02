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
                        <h3 class="text-themecolor m-b-0 m-t-0">Room Arrangement</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/assign_block.php">Assign Block</a></li>
                            <li class="breadcrumb-item active">Assign Block in Student</li>
                        </ol>
                    </div>  
                    <a href="assign_block_add_single.php"><button class="btn btn-success"><i class="fa fa-plus m-r-10" style="font-size:18px;text-align:center" aria-hidden="true"></i>Single Student Assign in Block</button></a>
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
									<div class="col-md-6  text-center">
										<form action="assign_block_add_range_val.php" method="POST">
                                            
                                            <label for="time" style="color:blue;font-size:20px;">Room Name</label>
                                            <select name="room_id" class="form-control" id="room_id" required>
		                                   <option value="" selected disabled>Select Room</option>
			                               <?php
     
                                            $query=mysqli_query($con,"select * from room_arrangement order by r_name;");
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['r_id'];?>"><?php echo $row['r_name']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			 
		                                      </select><br><br>
                                            
                                             <label for="sub" style="color:blue;font-size:20px;">select Block & Subject</label>
                                              <select name="b_arr_id" class="form-control" id="b_sub" required>
                                                 <option value="" selected disabled>select Block & Subject</option>
                                            </select><br><br> 
                                               <script>
$(document).ready(function(){
    
	$("#room_id").on('change',function(){
		var Id=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/block_sub_ajax.php",
			data:{room_id:Id},
			dataType:"html",
			success:function(data){
				$("#b_sub").html(data);
			}
		});
	});
    
    $("#b_sub").on('change',function(){
		var subId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/student_s_ajax.php",
			data:{exam_id:subId},
			dataType:"html",
			success:function(data){
				$("#studs").html(data);
			}
		});
	});
    
    $("#studs").on('change',function(){
		var studsId=$(this).val();
        var b_arr=$("#b_sub").val();
		$.ajax({
			method:"POST",
			url:"ajax/student_e_ajax.php",
			data:{stud_s_id:studsId , exam_id:b_arr},
			dataType:"html",
			success:function(data){
				$("#stude").html(data);
			}
		});
	});
});
                                        </script>
                                            
                                             <label for="studs" style="color:blue;font-size:20px;">Start Student Id</label>
                                              <select name="stud_s_id" class="form-control" id="studs" required>
                                                 <option value="" selected disabled>select stating Student</option>
                                            </select><br><br>
                                            
                                            <label for="studentend" style="color:blue;font-size:20px;">End Student Id</label>
                                              <select name="stud_e_id" class="form-control" id="stude" required>
                                                 <option value="" selected disabled>select End Student Id</option>
                                            </select><br><br>
                                            
											<input type="submit" name="submit" class="btn btn-success">
										</form>
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