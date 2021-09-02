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
    <title>Semester | IES</title>
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
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Faculty Permission Details</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../admin/main.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../admin/faculty_permission.php">Faculty Permission</a></li>
                            <li class="breadcrumb-item active">Faculty Permission Update</li>
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
					include '../admin/connection.php';
		
					$d = $_GET['id'];
     
                    $query = "select faculty_permission.fac_per_id,faculty.f_id,faculty.f_code,faculty.f_name,subject.sub_id,subject.sub_code,subject.sub_name,subject.sub_type,batch.batch_name,semester.sem_id,semester.sem_code,course.course_id,course.course_code,course.course_name from faculty_permission inner join faculty on faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join course on course.course_id=semester.course_id where faculty_permission.fac_per_id ='$d'; ";
				
					$result=mysqli_query($con,$query);
					$num=mysqli_fetch_assoc($result);
				?>
				<div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6  text-center">
										<form action="faculty_permission_update_val.php?id=<?php echo $d;?>" method="post">
                                            
                                            <label for="course" style="color:blue;font-size:20px;">Select Course</label>
                                            <select name="course_id" class="form-control" id="course" required>
                                                <option value="<?php echo $num['course_id'];?>"><?php echo $num['course_code']." - ".$num['course_name']; ?></option>
			                               <?php
                                            $query=mysqli_query($con,"select * from course;");
                                            while ($row=mysqli_fetch_assoc($query)) {
                                                if($num['course_id']!=$row['course_id'])
                                                            {
                                            ?>
		                                          <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_code']." - ".$row['course_name']; ?> </option>
                                            <?php		
                                                }
                                                    }
                                            ?>			 
		                                      </select><br><br>
                                            
                                            <label for="semester" style="color:blue;font-size:20px;">select Semester</label>
                                              <select name="sem_id" class="form-control" id="semester" required>
                                                 <option value="<?php echo $num['sem_id'];?>"><?php echo substr($num['sem_code'],2); ?></option>
                                            </select><br><br>
                                            
                                             <label for="subject" style="color:blue;font-size:20px;">select Subject</label>
                                              <select name="s_id" class="form-control" id="subject" required>
                                                 <option value="<?php echo $num['sub_id'];?>"><?php echo $num['sub_code']." - ".$num['sub_name'];?></option>
                                            </select><br><br>
                                            
                                            <label for="subjecttype" style="color:blue;font-size:20px;">select Subject Type</label>
                                              <select name="sub_id" class="form-control" id="subjecttype" required>
                                                 <option value="<?php echo $num['sub_id'];?>"><?php echo $num['sub_type'];?></option>
                                            </select><br><br>
                                                
                                            
                                            <label style="color:blue;font-size:20px;">Faculty Name</label><br>
                                            <select name="f_id" class="form-control" required>
                                                 <option value=<?php echo $num['f_id'];?>><?php echo $num['f_code']." - ".$num['f_name'];?></option>
                                                 <?php
     
														$sql = "select f_id,f_code,f_name from faculty order by f_code";
														$result = mysqli_query($con,$sql);
							
														while($row=mysqli_fetch_assoc($result))
														{
                                                            if($num['f_id']!=$row['f_id'])
                                                            {
													?>
                                                <option value=<?php echo $row['f_id'];?>><?php echo $row['f_code']." - ".$row['f_name'];?></option>
                                                <?php
                                                            }
														}
													?>	
                                            </select><br><br>
                                            
                                             <label style="color:blue;font-size:20px;">Batch Name</label><br>
                                            <?php
														$sql = "select * from batch order by batch_name";
														$result = mysqli_query($con,$sql);
							
														while($row=mysqli_fetch_assoc($result))
														{
                                                            if($num['batch_name']!=$row['batch_name']){
													?>
                                                            <input type="radio" name="batch_id" value="<?php echo $row['batch_id']; ?>" required>&nbsp;<?php echo $row['batch_name']; ?>&emsp;
                                                    <?php
                                                        
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <input type="radio" name="batch_id" value="<?php echo $row['batch_id'];?>" checked required><?php echo $row['batch_name']; ?> &emsp;
                                                            <?php
                                                            }
                                                        }
                                                    ?>
				        							<br><br>
                                            
                                            <input type="submit" name="submit" value="Update" class="btn btn-success">
                                            
										</form>
                                        
                                          <script>
$(document).ready(function(){
    
	$("#course").on('change',function(){
		var courseId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/semester_ajax.php",
			data:{course_id:courseId},
			dataType:"html",
			success:function(data){
				$("#semester").html(data);
			}
		});
	});
    
    $("#semester").on('change',function(){
		var semesterId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/subject_ajax.php",
			data:{semester_id:semesterId},
			dataType:"html",
			success:function(data){
				$("#subject").html(data);
			}
		});
	});
    
    $("#subject").on('change',function(){
		var subjectId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/subject_type_ajax.php",
			data:{subject_id:subjectId},
			dataType:"html",
			success:function(data){
				$("#subjecttype").html(data);
			}
		});
	});
    
});
</script>
                                        
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
    <script src="../admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/js/custom.min.js"></script>
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
		header('location:../admin/index.php');
	}
?>