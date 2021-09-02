<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cvmsaid=$_SESSION['cvmsaid'];
$vid=$_POST['id'];
$department=$_POST['department_id'];
$employee=$_POST['employee_id'];
$res=$_POST['res'];
$date=$_POST['date'];
$time=$_POST['time'];
 $query=mysqli_query($con,"insert into schedule_visitor(v_id,d_id,e_id,reason,date,time) values('$vid','$department','$employee','$res','$date','$time')");

    if ($query) {
    //$msg="Visitor Scheduled.";
   $q1="SELECT * FROM `schedule_visitor` WHERE  `v_id` LIKE '$vid'";
    $res=mysqli_query($con,$q1);
    while($row=mysqli_fetch_assoc($res)){
        $id=$row["sch_v_id"];
    }
    header("location:add_id.php?id=$id");
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>CVSM Visitors Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <!-- <link href="visitors-form.css" rel="stylesheet">-->

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
<!-- JQuery library drop down -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS drop down -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once('includes/sidebar.php');?>
   
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> Visitor Schedule
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <p style="font-size:16px; color:red" align="center"> <?php if(isset($msg)){
                                                  echo $msg;
                                              }  ?> </p>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="input" class=" form-control-label">Whom To Meet</label>
                                                </div>
                                                </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="dropdown-input" class=" form-control-label">Department</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="department_id" id="department" class="form-control" required>
                                                <option value="" selected disabled>--Select Department--</option>
                                                 <?php
                                                        $sql = "select * from department order by d_id";
														$result = mysqli_query($con,$sql);
							
														while($row=mysqli_fetch_assoc($result))
														{
													?>
                                                <option value="<?php echo $row['d_id'];?>"><?php echo $row['d_name'];?></option>
                                                <?php
														}
													?>	
                                            </select>                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="dropdown-input1" class=" form-control-label">Employee</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="employee_id" id="employee" class="form-control" required>
                                                <option value="" selected disabled>--Select Employee--</option>	
                                            </select>      
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Reason To Meet</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="res" id="res" rows="9" placeholder="Enter Reason To Meet..." class="form-control" required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="date-input" class=" form-control-label">Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="date" id="date" class="form-control" required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="time-input" class=" form-control-label">Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" name="time" id="time" class="form-control" required=""></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $_GET['addid'];?>" name="id">
                                          <div class="card-footer">
                                        <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Generate ID
                                        </button></p>
                                        
                                    </div>
                                        </form>
                                        <script>
$(document).ready(function(){
	$("#department").on('change',function(){
		var departmentId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/employee_ajax.php",
			data:{department_id:departmentId},
			dataType:"html",
			success:function(data){
				$("#employee").html(data);
			}
		});
	});
});
</script>
                                    </div>
                                   
                                </div>
                       
                        </div>
                        
                    </div>
               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
            </div>
        </div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php }  ?>