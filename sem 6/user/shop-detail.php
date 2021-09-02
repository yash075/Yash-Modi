<?php 
if(isset($_REQUEST['set'])){
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
}
  
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Shop Serenity</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
      <!-- 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
         <!-- JQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!--popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QKPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--wish-->
  <script src="https://https://ajaxs.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  
   
  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .rating{
  position:absolute;
  /*top:87%;*/
  left:53%;
  transform:translate(-50%,-50%) rotateY(180deg);
  display:flex;
}

.rating a{
  display:block;
  cursor:pointer;
  width:50%;
}
.rating a:before{
  content:'\2605';
  font-family:fontAwesome;
  position:relative;
  display:block;
  font-size:20px;
  color:#101010;
}
.rating a:after{
  content:'\2605';
  font-family:fontAwesome;
  position:absolute;
  display:block;
  font-size:20px;
  color:yellow;
  top:0;
  opacity:0;
  transition:.5s;
  text-shadow: 0 2px 5px rgba(0,0,0,.5);
}
.rating a:hover:after,
.rating a:hover ~ a:after{
  opacity:1;
}
.rate{
  position:absolute;
 /* top:85%;*/
  left:59%;
}
.wish{
  position:absolute;
 /* top:36%;*/
  left:80%;
}
.wish a{
  display:block;
  cursor:pointer;
  width:50%;
}
.wish a:before{
  content:'\002B';
  font-family:fontAwesome;
  position:relative;
  display:block;
  font-weight:bold;
  font-size:30px;
  color:black;
}
.wish a:after{
  content:'\2665';
  font-family:fontAwesome;
  position:absolute;
  display:block;
  font-size:20px;
  color:red;
  top:0;
  opacity:0;
  transition:.5s;
  text-shadow: 0 2px 5px rgba(0,0,0,.5);
}
.wish a:hover:after,
.wish a:hover ~ a:after{
  opacity:1;
}

.wish1{
  position:absolute;
 /* top:36%;*/
  left:80%;
}
.wish a{
  display:block;
  cursor:pointer;
  width:50%;
}
.wish1 a:before{
  content:'\2665';
  font-family:fontAwesome;
  position:absolute;
  display:block;
  font-size:20px;
  color:red;
}

.rating1{
  position:absolute;
  /*top:87%;*/
  left:53%;
  transform:translate(-50%,-50%);
  display:flex;
}
.rating1 a{
  display:block;
  cursor:pointer;
  width:50%;
}
.rating1 a:before{
  content:'\2605';
  font-family:fontAwesome;
  position:relative;
  display:block;
  font-size:20px;
  color:yellow;
}
  </style> 
   </head>
   <body class="size-1520">
      <!-- HEADER -->
     <?php include "include/nav.php"; 
            include "include/side.php"; ?>
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
              
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <ul>
                    <?php $cid=$_REQUEST['cid'];?>
                      <li> <?php if(isset($_REQUEST['set'])){
                                if(isset($_REQUEST['wish'])){?>
                                  <a href="wishlist.php?set=true"><i class="icon-sli-arrow-left-circle" aria-hidden="true" style="font-weight: bold;"></i></a>
                                <?php }else{ ?>
                      <a href="viewshop.php?set=true&cid=<?php echo $cid;?>"><i class="icon-sli-arrow-left-circle" aria-hidden="true" style="font-weight: bold;"></i></a>
                      <?php }}else{?> 
                        <a href="viewshop.php?cid=<?php echo $cid;?>"><i class="icon-sli-arrow-left-circle" aria-hidden="true" style="font-weight: bold;"></i></a>
                      <?php } ?>
                      </li>
                    </ul>
                  </nav>
                  <!--<h1 class="margin-bottom">Products</h1>--><br>
                  <!-- Pruducts -->
                  <div class="margin2x">
                  <?php 
                     include "include/connection.php";
                     $sid=$_GET['sid'];
                     $visit=mysqli_query($con,"select visit from shop where shop_id='$sid'");
                     $v=mysqli_fetch_array($visit);
                     $n=$v['visit'];
                     $n=$n+1;
                     $visitupdate=mysqli_query($con,"update shop set visit='$n' where shop_id='$sid'");
                     $query=mysqli_query($con,"select shop.*,sub_category.*,category.* from shop inner join sub_category on
                     shop.s_c_id=sub_category.s_c_id join category on sub_category.c_id=category.c_id where shop.shop_id='$sid' order by shop.name");
                     while($row=mysqli_fetch_assoc($query)){
                  ?>

                       <!--<div class="carousel slide" data-ride="carousel" style="height:100%;width:100%;">
                          <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img  src="<?php //echo $row['image'];?>" style="height:150px;width:100px;align:center;">
                          </div>
                          <div class="carousel-item">
                            <img  src="<?php //echo $row['img1'];?>" style="height:150px;width:100px;align:center;">
                          </div>
                     </div>
                       </div>-->
                       <div>
                       <div style="float:left;">
                       <?php if($row['image']=='0'){?>
                        <img src="noimage.png" style="height:150px;width:100px;"><br>
                        <?php }else{?>
                       <img  src="<?php echo $row['image'];?>" style="height:150px;width:100px;"><br>
                       <?php }?>
                       <?php if($row['img1']=='0'){?>
                        <img src="noimage.png" style="height:150px;width:100px;"><br>
                        <?php }else{?>
                       <img  src="<?php echo $row['img1'];?>" style="height:150px;width:100px;"><br>
                       <?php }?>
                        </div>
                       <h4 class="margin-bottom" style="margin-left:40%;"><strong><?php echo ucwords($row['name']);?></strong> </h4>
                       <?php 
                       if(isset($_REQUEST['set'])){
                       $querwish=mysqli_query($con,"SELECT add_wish.*,wishlist.* FROM add_wish inner join wishlist on add_wish.w_id=wishlist.w_id 
                             WHERE add_wish.shop_id='$sid' and wishlist.cust_id='$id1'");
                        $w=mysqli_num_rows($querwish);
                        if($w>0){
                        ?>
                       <div class="wish1">
                              <a href="wish.php?set=true&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="wishl1" value="1"></a>
                       </div>
                        <?php }else{?>
                       <div class="wish">
                              <a href="wish.php?set=true&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="wishl1" value="1"></a>
                       </div><?php } }else{?>
                                <div class="wish">
                                <a href="wish.php" id="wishl1" value="1"></a>
                       </div>
                             <?php } ?>
                       <h6 class="margin-bottom" style="margin-left:40%;"><strong><?php echo ucwords($row['description']);?></strong></h6>
                       <h5 class="margin-bottom" style="margin-left:40%;"><strong><i class="icon-sli-settings" style="color:blue;"></i>(<?php echo ucwords($row['s_c_name']);?>&nbsp;-->&nbsp;<?php echo ucwords($row['c_name']);?>)</strong></h5>
                       <h6 class="margin-bottom" style="margin-left:40%;"><strong><i class="icon-sli-location-pin" style="color:blue;"></i><?php echo ucwords($row['address']);?></strong></h6>
                       <h6 class="margin-bottom" style="margin-left:40%;"><strong><i class="icon-sli-envelope" style="color:blue;"></i><?php echo ucwords($row['shop_mail']);?></strong></h6>
                       <h6 class="margin-bottom" style="margin-left:40%;"><strong><i class="icon-sli-screen-smartphone" style="color:blue;"></i><?php echo $row['shop_mob'];?></strong></h6>
                       <h6 class="margin-bottom" style="margin-left:40%;">
                       <?php if(isset($_REQUEST['set'])){
                          $querrate=mysqli_query($con,"SELECT * FROM rate WHERE shop_id='$sid' and cust_id='$id1'");
                          //die("SELECT * FROM rate WHERE shop_id='$sid' and cust_id='$id1'");
                          $ra=mysqli_num_rows($querrate);
                          $rate=mysqli_fetch_assoc($querrate);
                          $num=$rate['rate'];
                          //die($num);
                          $no='0';
                     if($ra>0){
                         ?>
                        <div class="rating1">
                        <?php while($no<$num){?>
                              <a href="rate.php?set=true&val=<?php echo $no+1;?>&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>"></a>
                              <?php //die($no);?>
                        <?php $no=$no+1;}?>      
                       </div>
                    <?php }else{?>
                      <div class="rating">
                              <a href="rate.php?set=true&val=5&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="s5"></a>
                              <a href="rate.php?set=true&val=4&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="s4"></a>
                              <a href="rate.php?set=true&val=3&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="s3"></a>
                              <a href="rate.php?set=true&val=2&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="s2"></a>
                              <a href="rate.php?set=true&val=1&shop_id=<?php echo $sid;?>&cid=<?php echo $cid;?>" id="s1"></a>
                    </div><?php }}else{ ?>
                    <div class="rating">
                              <a href="rate.php"></a>
                              <a href="rate.php"></a>
                              <a href="rate.php"></a>
                              <a href="rate.php"></a>
                              <a href="rate.php"></a>
                            </div>
                    <?php }?><br>
                            <div class="rate">
                            <?php $q=mysqli_query($con,"select ROUND(AVG(rate),1) as averageRating,count(cust_id) as cust from rate where shop_id='$sid'");
                              $fetchAverage = mysqli_fetch_array($q);
                    $averageRating = $fetchAverage['averageRating'];
                    $cust=$fetchAverage['cust'];

                    if($averageRating <= 0){
                        echo "No rating yet.";
                    }else{
                        echo $averageRating." out of 5 (By $cust users)";
                    }
                            ?>
                            </div></h6><br><br>
                            <a href="location.php?lat=<?php echo $row['latitude'];?>&lng=<?php echo $row['longitude'];?>" name="location" class="button rounded-btn submit-btn s-12" style="height:50px;width:100px;margin-left:40%;">
                       <i class="icon-sli-location-pin" style="color:blue;"></i></a>
                         
                       </div>
                       
                     
                      
                     
                     <?php }?>
                  </div>
               </section>
            </div>
         </div>
      </div>
      <!-- FOOTER -->
      <?php include "include/footer.php"; ?>
      <script type="text/javascript" src="js/responsee.js"></script> 
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
        })
      </script>     
   </body>
</html>
<?php 
	//}
	/*else
	{
		header('location:logout.php');
	}*/
?>