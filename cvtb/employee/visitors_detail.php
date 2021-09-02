<?php
session_start();
$cvmsaid=$_SESSION['cvmsaid'];
include('includes/dbconnection.php'); 
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
                                        <strong>Add</strong> New Visitors
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="add_info.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data" >
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="description" rows="9" placeholder="Enter Visitor description..." class="form-control" required=""></textarea>
                                                </div>
                                            </div>
                                            <!--<div class="resume">
                                            <div class="resume_right">
                                            <div class="resume_profile">-->
                                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Select Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="file" name="fileimg" id="fileimg">
                                                   </div>
                                            </div>
                                               <!-- </div>
                                                </div>
                                            </div>-->
                                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Select Resume / File</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="file" name="filerem" id="filerem">
                                                   </div>
                                            </div>
                                          <div class="card-footer">
                                        <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit
                                        </button></p>
                                        
                                    </div>
                                        </form>
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
