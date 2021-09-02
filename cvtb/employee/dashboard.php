<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>
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
    <title>Dashboard</title>

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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        

        <!-- MENU SIDEBAR-->
         <?php include_once('includes/sidebar.php');?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
 <?php
//todays visitors
$eid=$_SESSION['cvmsaid'];
//echo $eid;
 $query=mysqli_query($con,"select sch_vi_id from schedule_visitor where date=CURDATE() AND e_id='$eid';");
$count_today_visitors=mysqli_num_rows($query);
//echo($count_today_visitors);
 ?>                       
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_today_visitors;?></h2>
                                                <span>Today's  Visitors</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
 <?php
//Yesterdays visitors
 $query1=mysqli_query($con,"select schedule_visitor.*,visit_record.* from visit_record inner join schedule_visitor on 
 schedule_visitor.sch_vi_id=visit_record.sch_v_id where visit_record.status='1' AND schedule_visitor.date=CURDATE()-1 && schedule_visitor.e_id='$eid';");
$count_yesterday_visitors=mysqli_num_rows($query1);
 ?>                       


                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                     <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_yesterday_visitors?></h2>
                                                <span>Yesterday   Visitors</span>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
    <?php
//Total Visitors
 $query3=mysqli_query($con,"select schedule_visitor.*,visit_record.* from visit_record inner join schedule_visitor on 
 schedule_visitor.sch_vi_id=visit_record.sch_v_id where visit_record.status='1' AND visit_record.e_in>0 AND schedule_visitor.e_id='$eid';");
$count_total_visitors=mysqli_num_rows($query3);
 ?>                       




<div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_total_visitors?></h2>
                                                <span>Total Visitors  Till Date</span>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                             <?php
//pending visitors
 $query2=mysqli_query($con,"select schedule_visitor.*,visit_record.* from visit_record inner join schedule_visitor on 
 schedule_visitor.sch_vi_id=visit_record.sch_v_id where visit_record.status = '1' AND schedule_visitor.e_id='$eid';");
$count_lastsevendays_visitors=mysqli_num_rows($query2);
while($row=mysqli_fetch_assoc($query2)){
    $no1=0;
    $date=$row['e_in'];
    if(isset($date)){
       $no1++;
    }
}
$count_lastsevendays_visitors=$count_lastsevendays_visitors-$no1;
//die($count_lastsevendays_visitors);
 ?>                       

<div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $count_lastsevendays_visitors?></h2>
                                                <span>Total Pending Visits</span>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!--notification-->
                   
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
<!-- end document-->
<?php } ?>