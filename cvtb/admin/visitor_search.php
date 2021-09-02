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
    <link rel="stylesheet" href="../filter/filter1.css" />
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">
    
        <!-- Title Page-->
        <title>CVMS Visitors</title>
    
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
        <!--select all-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
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
                        <form class="form-header" action="visitor_search.php" method="post">
                                <input class="au-input au-input--xl" type="text" name="searchdata" id="searchdata" placeholder="Search by names &amp; mobile number..." />
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
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
                <!-- END HEADER DESKTOP-->
    
                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-30">
                                    <form action="manage-delete.php" method="post">
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                &emsp;&emsp; &emsp; &emsp; &emsp;&emsp; &emsp;
                                    <button type="submit" class="btn btn-danger" name="del"><i class="fa fa-trash m-r-10" style="font-size:18px" aria-hidden="true"></i>Delete</button>
                                    
                                    
								<br><br>	
                                    <table class="table table-borderless table-striped table-earning">
                                         <thead>
                                        <tr>
                                            <tr>
                                            <th> <input type="checkbox" id="checkAl" >Select
                                           </th>
                  <th>S.NO</th>
            
                  <th>Full Name</th>
              
              <th>Contact Number</th>
              <th>Email</th>
              <th>Schedule</th>
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                           <?php
                                           $cnt=1;
                                           if(isset($_REQUEST['searchdata'])) {
                                            $g = $_REQUEST['searchdata'];
                                                    $ret =mysqli_query($con,"select * from visitor_log_detail where name like '%$g%' OR mob like '%$g%' OR email like '%$g%'");
                                                }
                                                else
                                                {
                                                    $ret=mysqli_query($con,"select * from visitor_log_detail");
                                                }
                                        $num = mysqli_num_rows($ret);
                                        if ($num > 0)
                                        {
    while ($row=mysqli_fetch_array($ret)) {
    
    ?>
                  
                  <tr>
                <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["v_id"]; ?>"></td>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['name'];?></td>
                  <td><?php  echo $row['mob'];?></td>
                <td><?php  echo $row['email'];?></td>
                <td><a href="sch-visitor.php?addid=<?php echo $row['v_id'];?>" title="View Full Details"><i class="fa fa-plus m-r-10"></i></a></td>
                  <td><a href="visitor-detail.php?editid=<?php echo $row['v_id'];?>" title="View Full Details"><i class="fa fa-edit fa-1x"></i></a></td>
                </tr>
                    <?php 
    $cnt=$cnt+1;
    }?>
<?php 
}
else
{
    echo "<center><h3>Result Not Found.</h3></center>";
}
?>
                                        </table>
                                        </form>
                                        <script>
        $("#checkAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        });
        </script>
                                    </div>
                                </div>
                              
                            </div>
                            
                            
              
    <?php include_once('includes/footer.php');?>
              </div>
                    </div>
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
    <?php 
  }
?>