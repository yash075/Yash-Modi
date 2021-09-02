<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
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
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" name="search" action="search-visitor.php" method="post">

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                 <?php
$adminid=$_SESSION['cvmsaid'];
$ret=mysqli_query($con,"select a_name from admin where a_id='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['a_name'];

?>   
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $name; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $name; ?></a>
                                                    </h5>
                                                   
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="admin-profile.php">
                                                        <i class="zmdi zmdi-account"></i>Admin Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="change-password.php">
                                                        <i class="zmdi zmdi-settings"></i>Change Password</a>
                                                </div>
                                               
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Visitor</strong>  Details
                                    </div>
                                    <div class="card-body card-block">
                                        
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $eid=$_GET['editid'];

$ret=mysqli_query($con,"select schedule_visitor.*,visitor_log_detail.*,department.*,employee.* from schedule_visitor inner join 
visitor_log_detail on schedule_visitor.v_id=visitor_log_detail.v_id join employee on schedule_visitor.e_id=employee.e_id join
department on employee.d_id=department.d_id where schedule_visitor.sch_vi_id='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
    
    <table border="1" class="table table-bordered mg-b-0">
       <form action="visitor-update_val.php?id=<?php echo $eid;?>" method="post">          
                                            <tr>
    <th>Full Name</th>
    <td><input type="text"  name="name" value="<?php  echo $row['name'];?>" readonly></td>
  </tr>
   <tr>
    <th>Email</th>
    <td><input type="text"  name="email" value="<?php  echo $row['email'];?>" readonly></td>
  </tr>

  <tr>
    <th>Mobile Number</th>
    <td><input type="text"  name="mob" value="<?php  echo $row['mob'];?>" readonly></td>
  </tr>
                                     
  <tr>
    <th>Deptartment</th>
      <td><select name="d_name" class="form-control" id="department" required>
                                                <option value="<?php echo $row['d_id'];?>"><?php echo $row['d_name']; ?></option>
			                               <?php
                                            $query=mysqli_query($con,"select * from department;");
                                            while ($num=mysqli_fetch_assoc($query)) {
                                                if($num['d_id']!=$row['d_id'])
                                                            {
                                            ?>
		                                          <option value="<?php echo $num['d_id'];?>"><?php echo $num['d_name']; ?></option>
                                            <?php		
                                                }
                                                    } 
                                            ?>			 
		                                      </select></td>
  </tr>
  <tr>
    <th>Whom to Meet</th>
      <td><select name="e_name" class="form-control" id="employee" required>
                                                <option value="<?php echo $row['e_id'];?>"><?php echo $row['e_name']." - ".$row['post']; ?></option>
                                            </select></td>
    
  </tr>
             
  <tr>
    <th>Reason to Meet</th>
    <td><input type="text" class="form-control" name="reason" value="<?php  echo $row['reason'];?>" required></td>
  </tr>
  <tr>
    <th>Schedule Date</th>
    <td><input type="date" class="form-control" name="date" value="<?php  echo $row['date'];?>" required></td>
  </tr>
  <tr>
    <th>Schedule Time</th>
    <td><input type="time" class="form-control" name="time" value="<?php  echo $row['time'];?>" required></td>
  </tr>
  <tr>
    <th>Photo</th>
    <td><img src="<?php  echo $row['img'];?>" width="100px" height="100px"></td>
  </tr>
  <tr>
    <th>Resume / File</th>
     <!-- <td><input type="file" name="filerem" value="<?php echo $row['info']; ?>" id="filerem"></td>-->
  <td><a href="<?php echo $row['info']; ?>" target="_blank"><?php echo $row['info']; ?></a></td>
  </tr>
           <tr>
        <td colspan="2"><center><input type="submit" name="sub" value="Update" class="btn btn-primary btn-sm"></center></td>
      </tr> 
          </form>
</table>                        
                                    </div>
                                   
                                </div>
                       
                        </div>
                            </div>
    

<?php }


?>

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