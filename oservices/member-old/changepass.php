<?php 
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
  //die($id);
	if($s == FALSE)
	{
    header('location:logoutval.php');
  }else{ 
if(isset($_POST['submit']))
{
$cpassword=$_POST['curr'];
$newpassword=$_POST['new'];
if($cpassword==$newpassword){
  echo "<script>alert('current password and new password are same');</script>";
}else{ 
include "include/connection.php";
$query=mysqli_query($con,"select m_id from member where m_id='$id1' and   m_pass='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update member set m_pass='$newpassword' where m_id='$id1'");
echo "<script>alert('Your password successully changed');</script>"; 
} else {

echo "<script>alert('Your current password is wrong');</script>";
}
}
}
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
<style>
    #upload_button {
  display: inline-block;
}
#upload_button input[type=file] {
  display:none;
}
    </style>
      <!-- JQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.new.value!=document.changepassword.con.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.con.focus();
return false;
}
return true;
}   

</script>
</head>

<body id="page-top" >

 <!-- Navbar -->
    <?php require "include/nav.php"; ?>


  <div id="wrapper">

    <!-- Sidebar -->
      <?php require "include/sidebar.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
          
          <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><b>Update</b> Password</div>
      <div class="card-body">
        <form action="" method="POST"  enctype="multipart/form-data" name="changepassword" onsubmit="return checkpass();">
      
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputcurr" name="curr" class="form-control" placeholder="Current Password" required="required">
              <label for="inputcurr">Current Password</label>
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="new" name="new" class="form-control" placeholder="New Password" required="required">
              <label for="new">New Password</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="con" name="con" class="form-control" placeholder="Confirm Password" required="required">
              <label for="con">Confirm Password</label>
            </div>
          </div>
            
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="Change">
        </form>
           <script>
$(document).ready(function(){
	$("#cat").on('change',function(){
		var catId=$(this).val();
		$.ajax({
			method:"POST",
			url:"ajax/subcat_ajax.php",
			data:{category_id:catId},
			dataType:"html",
			success:function(data){
				$("#subcat").html(data);
			}
		});
	});
});
</script>
        
      </div>
    </div>
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
  <?php include "logout.php"; ?>

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
?>