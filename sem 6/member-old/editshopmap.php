<?php
 include 'include/connection.php';
$shop_id = $_GET['shop_id'];
	if(isset($_POST['Update']))
    {
       
        
        
        $m_id = $_POST['m_id'];
        $s_name=$_POST['s_name'];
        $subcat_id=$_POST['subcat_id'];
        $m_no= $_POST['m_no'];
        $mail= $_POST['mail'];
        $desc = $_POST['desc'];

        
         $qry = "select * from member where m_id='$m_id';";
            $result = mysqli_query($con,$qry);
            $roww = mysqli_fetch_assoc($result);
            $s = $roww['m_name']; 
        
         //image1
            $img1=$s.$_FILES['img1']['name'];
            $locimg1 = $_FILES['img1']['tmp_name'];
            $folder1="../admin/uploads/";
            $servepathimg1=$locimg1;
            $pathimg1=$folder1.$img1;
           //image2
          $img2=$s.$_FILES['img2']['name'];
          $locimg2 = $_FILES['img2']['tmp_name'];
           $folder2="../admin/uploads/";
          $servepathimg2=$locimg2;
          $pathimg2=$folder2.$img2;
		//die($name);
            
		
	
           // $qry = "select shop.*,member.* from shop inner join member on member.m_id=shop.m_id where shop.name='$s_name' And member.m_id='$m_id' And shop.s_c_id='$subcat_id' ;";
            //$result = mysqli_query($con,$qry);
            //$row = mysqli_num_rows($result);
           // if($row>0)
           // {
                //echo "duplicate";
              //  echo "<script>alert('Shop Already exist.')</script>";
                //echo '<script>window.location="displayshop.php"</script>';
           // }
           // else
           // {
                //echo "Add";
                //img1
                if(isset($_FILES['img1'])){
                    $size=$_FILES['img1']['size'];
                    if($size<=1){
                        $pathimg1=$_POST['image1'];
                    }else{
                        move_uploaded_file($servepathimg1,$pathimg1);
                    }
                }
                //img2
                if(isset($_FILES['img2'])){
                    $size=$_FILES['img2']['size'];
                    if($size<=1){
                        $pathimg2=$_POST['image2'];
                    }else{
                        move_uploaded_file($servepathimg2,$pathimg2);
                    }
                }
               // move_uploaded_file($servepathimg1,$pathimg1);
                //move_uploaded_file($servepathimg2,$pathimg2);
                   
                   
               
                $qry1 = "UPDATE shop SET shop.s_c_id='$subcat_id', shop.name='$s_name',shop.image='$pathimg1',shop.img1='$pathimg2',shop.m_id='$m_id',shop.shop_mob='$m_no',shop.shop_mail='$mail',shop.description='$desc' WHERE shop.shop_id='$shop_id'";
                    //die($qry1);
                   
                    $result1 = mysqli_query($con,$qry1);
                  //  die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($result1)." hi");
                   // echo $shop_id.' , '.$subcat_id.' , '.$s_name.' , '.$pathimg1.' , '.$pathimg2.' , '.$m_id.' , '.$m_no.' , '.$mail.' , '.$desc;
                    if($result1)
                    {
                        echo "<script>alert('Shop Update Succesfully.')</script>";
                    }
                    else
                    {
                        echo "<script>alert('something went wrong while adding shop please check it.')</script>";
                        //echo $_POST['subcat_id'];
                        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                        echo '<script>window.location="displayshop.php"</script>';
                    }
               
            }
       

     
     $shopq = "select * from shop where shop.shop_id=$shop_id;";
				
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
    
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 350px;
	       width: 350px;
        }
       

    #upload_button {
  display: inline-block;
    }
       
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */

#upload_button input[type=file] {
  display:none;
}
    </style>
    
   
    
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
        <form action="editshopmapupdate.php?id=<?php echo $shop_id;?>" method="post">
            
         
              
            
                  <div class="form-group">
            <div class="form-label-group">
              <input id="map-search" class="form-control" name="address" type="text" value="<?php echo $num['address'];?>" placeholder="Search Box" size="104" required="required" readonly>
              <label for="inputname">Address</label>
            </div>
          </div>
            
           
    
        <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="latitude" class="form-control" name="lat" value="<?php echo $num['latitude'];?>" required="required" readonly>
              <label for="inputname">latitude</label>
            </div>
          </div>
        
         <div class="form-group">
            <div class="form-label-group">
            <input type="text" id="longitude" class="form-control" name="lng" value="<?php echo $num['longitude'];?>" required="required" readonly>
              <label for="inputname">longitude</label>
            </div>
          </div>
    
         <div class="form-group">
            <div class="form-label-group">
            <input type="text" id="reg-input-city" class="form-control" name="city" value="<?php echo $num['city'];?>" placeholder="City" required="required" readonly>
              <label for="inputname">City</label>
            </div>
          </div>
            
            <div id="map"></div>
            <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var map, infoWindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: <?php echo $num['latitude'];?>, lng: <?php echo $num['longitude'];?> },
                zoom: 6
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: <?php echo $num['latitude'];?>,
                        lng: <?php echo $num['longitude'];?> 
                    };
                    console.log(pos);
                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);

                    var map1 = new google.maps.Map(
                        document.getElementById('map'), { zoom: 6, center: pos });
                    // The marker, positioned at Uluru
                    var marker = new google.maps.Marker({
                        position: pos, map: map1

                    });

                    map.addListener('center_changed', function () {
                        // 3 seconds after the center of the map has changed, pan back to the
                        // marker.
                        window.setTimeout(function () {
                             map.panTo(marker.getPosition());
                            console.log(marker.position.lat(), marker.position.lng());
                            var obj = { lat: marker.position.lat(), lng: marker.position.lng() };
                            console.log(obj.lat);
                        }, 2000);
                    });


                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
             <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE5FltkyvmP3bBcv4iQN555pjA5lL6KyM&callback=initMap">
    </script>
            
            <br>
          <a href="displayshop.php"><input type="button" class="btn btn-primary btn-block" name="OK" value="No Change in the Location"></a>
            <br>
           <input type="submit" class="btn btn-primary btn-block" name="Update" value="Change the Location">     
            
        </form>
        
        
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
      </footer>-->
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
    </div>
</body>

</html>
  
