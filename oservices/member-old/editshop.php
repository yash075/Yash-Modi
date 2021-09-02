<?php
 if(isset($_GET['id'])){
     $sid = $_GET['id'];
     include 'include/connection.php';
     
     $shopq = "select shop.*,member.*,sub_category.*,category.* from shop inner join member on member.m_id=shop.m_id inner join sub_category on sub_category.s_c_id=shop.s_c_id inner join category on category.c_id=sub_category.c_id where shop.shop_id=$sid;";
				
					$result=mysqli_query($con,$shopq);
					$num=mysqli_fetch_assoc($result);
            
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
     <meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Tables</title>

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
       
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
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
        <form action="editshopmap.php?shop_id=<?php echo $sid;?>" method="post" enctype="multipart/form-data">
            
            
            <div class="form-group">
            <div class="form-label-group">
            <select name="m_id" class="form-control" required>
		                                   <option value="<?php echo $num['m_id'];?>"><?php echo $num['m_name']; ?> </option>	 
		                                      </select>
            </div>
          </div>
      
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputname" class="form-control" name="s_name" value="<?php echo $num['name'];?>" required="required">
              <label for="inputname">Shop name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <select name="category_id" class="form-control" id="cat" required>
		                                   <option value="<?php echo $num['c_id'];?>"><?php echo $num['c_name']; ?> </option>
			                               <?php
                                            $ii = $num['c_id'];
                                            $query=mysqli_query($con,"select * from category where c_id!=$ii;");
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
                <option value="<?php echo $num['s_c_id'];?>"><?php echo $num['s_c_name']; ?> </option>
            </select>
            </div>
            </div>
            <br>
             <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <img src="<?php echo $num['image'];?>" alt="No Image" style="height:80px;width:80px;">
                <input type="hidden" value="<?php echo $num['image'];?>" name="image1">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <div id="upload_button">
    <label>
      <input type="file" id="img1" name="img1" accept="image/*" multiple>
      <span class="btn btn-primary">Change Image</span>
    </label>
  </div>
                </div>
              </div>
            </div>
          </div>
            <br>
              <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <img src="<?php echo $num['img1'];?>" alt="No Image" style="height:80px;width:80px;">
                <input type="hidden" value="<?php echo $num['img1'];?>" name="image2">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <div id="upload_button">
    <label>
      <input type="file" id="img2" name="img2" accept="image/*" multiple>
      <span class="btn btn-primary">Change Image</span>
    </label>
  </div>
                </div>
              </div>
            </div>
          </div>
            
            
            <!--<div class="form-group">
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
          </div>-->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputmobile" class="form-control" name="m_no"  value="<?php echo $num['shop_mob'];?>">
                  <label for="inputmobile">Mobile(optional)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="email" id="mail" class="form-control" name="mail" value="<?php echo $num['shop_mail'];?>">
                  <label for="mail">Mail(optional)</label>
                </div>
              </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="form-label-group">
              <textarea id="inputadd" name="desc" class="form-control" rows="5" cols="20" required><?php echo $num['description'];?></textarea>
              <!--<label for="inputadd">Address</label>-->
            </div>
          </div>
            
           <!-- <div class="form-group">
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
            <br>-->
          <input type="submit" class="btn btn-primary btn-block" name="Update" value="Update">
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
    </div>
</body>

</html>
    <?php
 }
else{
    header("location:displayshop.php");
}
?>