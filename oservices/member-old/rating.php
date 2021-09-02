<?php 
	session_start();
	
	$s = $_SESSION["user"];
	$id1=$_SESSION["id"];
	if($s == TRUE)
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Member</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<!--select all-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body id="page-top">
    <?php require "include/nav.php"; ?>

  <!--<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search 
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar 
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav> -->

  <div id="wrapper">

    <!-- Sidebar -->
      <?php require "include/sidebar.php"; ?>
    <!--
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.php">404 Page</a>
          <a class="dropdown-item" href="blank.php">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>-->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Ratings</li>
        </ol>
        <!-- DataTables Example -->
        <form action="shopdelete_checkbox.php" method="post">
        <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>No.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Rating</th>
                  </tr>
                </thead>
                <tfoot>
                 <tr>
                 <th>No.</th>
                  <th>Name</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Rating</th>
                  </tr>
                </tfoot>
                <tbody>
                        <?php 
                              $no=1;
												
                              include 'include/connection.php';

                              $sql = "select shop.*,category.*,sub_category.* from shop inner join sub_category on 
                              sub_category.s_c_id=shop.s_c_id join category on category.c_id=sub_category.c_id where shop.m_id='$id1' order by shop.name;";
                              $result = mysqli_query($con,$sql);
                              if(mysqli_num_rows($result)>0){
                              while($row=mysqli_fetch_assoc($result))
                              {  
                        ?>
                            <tr>
                            <td><?php echo $no;?></td>
                            
                            <td><?php echo ucwords($row['name']);?></td>
                            <td><?php echo ucwords($row['c_name']);?></td>
                            <td><?php echo ucwords($row['s_c_name']);?></td>
                            <td>
                            <?php 
                              $sid=$row['shop_id'];
                              if(isset($_REQUEST['d'])){
                                if($_REQUEST['d']=='today'){
                                  $test="rate.Date=CURDATE()";
                                  echo ("<a href='viewrating.php?sid=$sid&d=today'>");
                                }else{
                                  $test="rate.Date=DATE";
                                  echo ("<a href='viewrating.php?sid=$sid&d=all'>");
                                }
                              }
                            ?>
                            <!--<a href="viewrating.php?sid=<?php //echo $sid;?>">-->
                            <i class="fa fa-star" style="color:yellow;"></i>
                           <?php
                            $q=mysqli_query($con,"select ROUND(AVG(rate),1) as averageRating,count(cust_id) as cust from rate where shop_id='$sid' AND ".$test);
                              $fetchAverage = mysqli_fetch_array($q);
                    $averageRating = $fetchAverage['averageRating'];
                    $cust=$fetchAverage['cust'];

                    if($averageRating <= 0){
                        echo "No rating yet.";
                    }else{
                        echo $averageRating." out of 5 (By $cust users)";
                    }
                            ?>
                            </td>
                            </tr>
                              <?php 
                               $no++;
                              } 
                            }else{
                                echo "<center><h3>No Data</h3></center>";
                            }
                              ?>
                        </tbody>
              </table>
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>
        <script>
    $("#checkAl").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
     <script>
    $("#checkAl1").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer 
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>--><?php require "include/footer.php";?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 <?php include "logout.php";?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php 
	}
	else
	{
		header('location:logoutval.php');
	}
?>