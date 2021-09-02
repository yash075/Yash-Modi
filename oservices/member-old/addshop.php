<?php 
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
  //die($id);
include 'include/connection.php';
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
<style>
    #upload_button {
  display: inline-block;
}
    
#map-canvas {
	height: 350px;
	width: 350px;
}

    
#upload_button input[type=file] {
  display:none;
}
    </style>
      <!-- JQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
          <li class="breadcrumb-item active">Shop</li>
        </ol>
          
          <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><b>Add</b> Shop</div>
      <div class="card-body">
        <form action="addshop_val.php" method="POST"  enctype="multipart/form-data">
      
      <input type="hidden" name="m_id" value="<?php echo $id1;?>">
      
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputname" class="form-control" name="s_name" placeholder="shop name" required="required">
              <label for="inputname">Shop name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <select name="category_id" class="form-control" id="cat" required>
		                                   <option value="" selected disabled>--Select Category--</option>
			                               <?php
     
                                            $query=mysqli_query($con,"select * from category;");
                                            while ($row=mysqli_fetch_assoc($query)) {
                                            ?>
		                                          <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name']; ?> </option>
                                            <?php		 
                                                    }
                                            ?>			 
		                                      </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <select name="subcat_id" class="form-control" id="subcat">
                <option value="" selected disabled>--Select Subcategory--</option>
            </select>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <div id="upload_button">
    <label>
      <input type="file" id="img1" name="img1" accept="image/*" multiple>
      <span class="btn btn-primary">Upload Image</span>
    </label>
  </div>
               </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                 <div id="upload_button">
    <label>
      <input type="file" id="img2" name="img2" accept="image/*" multiple>
      <span class="btn btn-primary">Upload Image</span>
    </label>
  </div></div>
              </div>
            </div>
          </div>
          <?php 
              //die($id);
              $query1=mysqli_query($con,"select * from member where m_id='$id1';");
              while ($row1=mysqli_fetch_assoc($query1)) {         
          ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputmobile" value="<?php echo $row1['m_mob'];?>" name="m_no" class="form-control" placeholder="Mobile">
                  <label for="inputmobile">Mobile</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="email" id="mail" name="mail" value="<?php echo $row1['m_mail'];?>" class="form-control" placeholder="Mail">
                  <label for="mail">Mail</label>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
            
            <div class="form-group">
            <div class="form-label-group">
              <textarea id="inputadd" name="desc" class="form-control" rows="5" cols="20" placeholder="Desciption" required></textarea>
              <!--<label for="inputadd">Address</label>-->
            </div>
          </div>
            
         <div class="form-group">
            <div class="form-label-group">
              <input id="map-search" class="form-control" name="address" type="text" placeholder="Search Box" size="104" required="required" readonly>
              <label for="inputname">Address</label>
            </div>
          </div>
            
           
    
        <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="latitude" class="form-control" name="lat" required="required" readonly>
              <label for="inputname">latitude</label>
            </div>
          </div>
        
         <div class="form-group">
            <div class="form-label-group">
            <input type="text" id="longitude" class="form-control" name="lng" required="required" readonly>
              <label for="inputname">longitude</label>
            </div>
          </div>
    
         <div class="form-group">
            <div class="form-label-group">
            <input type="text" id="reg-input-city" class="form-control" name="city" placeholder="City" required="required" readonly>
              <label for="inputname">City</label>
            </div>
          </div>
            
            <br>
          <div id="map-canvas"></div>

<script src="map/javascript.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE5FltkyvmP3bBcv4iQN555pjA5lL6KyM&libraries=places&callback=initialize"></script>
            <br>
          
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="Add">
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
	else
	{
		header('location:logoutval.php');
	}
?>