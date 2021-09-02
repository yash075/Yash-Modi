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
                            <form class="form-header" name="search" action="search_visit.php" method="post">
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
                                  
                                        <table class="table table-borderless table-striped table-earning">
                                             <thead>
                                            <tr>
                                                <tr>
                                                <th style="color:green;"><b>Accept</b></th>
                                                    <th  style="color:red;"><b>Cancel</b></th>
                                                    
                      <th>S.NO</th>
                
                      <th>Name</th>
                  
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Time</th>
                    </tr>
                                            
                                            </thead>
                                           <?php
    $ret=mysqli_query($con,"select schedule_visitor.*,visitor_log_detail.*,visit_record.* from schedule_visitor inner join visitor_log_detail on
    schedule_visitor.v_id=visitor_log_detail.v_id join visit_record on schedule_visitor.sch_vi_id=visit_record.sch_v_id where visit_record.status = 0 AND schedule_visitor.date>=CURDATE()");
    $cnt=1;
    $no1=mysqli_num_rows($ret);
    if($no<0){?>
        <tr><center><strong style="color:blue;"> NO VISIT PENDEING </strong></center></tr><?php
    }
    while ($row=mysqli_fetch_array($ret)) {
    
    ?>
                  
                    <tr>
                    <td align="center"><a href="p_v_accept.php?id=<?php echo $row['v_rec_id'];?>" style="color:green;"><i class="zmdi zmdi-check zmd-fw"></i></a></td>
                    <td align="center"><a href="p_v_cancel.php?id=<?php echo $row['v_rec_id'];?>"  style="color:red;"><i class="zmdi zmdi-close zmd-fw"></i></a></td>
                      <td><?php echo $cnt;?></td>
                
                      <td>
                        <ul>
                            <li>
                                <?php  echo $row['name'];?>
                                    <ul>
                                        <li><?php  echo $row['email'];?></li>
                                    </ul>
                            </li>
                        </ul>
                       </td>
                      <td><?php  echo $row['reason'];?></td>
                    <td><?php  echo $row['date'];?></td>
                    <td><?php  echo $row['time'];?></td>
                    
                    </tr>
                    <?php 
    $cnt=$cnt+1;
    }?>
                                        </table>
                                       
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