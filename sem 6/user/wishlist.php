<?php 
if(isset($_REQUEST['set'])){
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
}
  //die($id);
	//if($s == TRUE)
	//{
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <title>Shop Serenity</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QKPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
      <!-- 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
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
  font-size:20px;
  color:#101010;
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

.wish a{
  display:block;
  cursor:pointer;
  width:50%;
}
.wish1 a:before{
  content:'\2665';
  font-family:fontAwesome;
  /*position:absolute;
  */display:block;
  font-size:20px;
  color:red;
}
  </style>
   </head>
   <body class="size-1520">
      <!-- HEADER -->
     <?php include "include/nav.php"; 
            //include "include/side.php"; ?>
               <!-- CONTENT -->
               <?php ?>
 <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
         <div class="box margin-bottom">
            <div class="margin2x">
               <!-- ASIDE NAV -->
               <aside class="s-12 m-4 l-3 xl-2" >
                  <h4 class="margin-bottom">Select Category</h4>
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Select Category</p>
                     <ul>
                     <?php 
                        include "include/connection.php";
                        $query="select * from category order by c_name;";
                        $result = mysqli_query($con,$query);
                        while($row=mysqli_fetch_assoc($result)){ ?>  
                         <li>
                            <a> <?php  $id=$row['c_id'];echo ucwords($row['c_name']); ?> </a>
                            <?php $query1="select * from sub_category where c_id=$id order by s_c_name;";
                                 $result1 = mysqli_query($con,$query1);
                                 $num2=mysqli_num_rows($result1);
                                 if($num2>0){
                            ?>
                            <ul>
                            <li>
                            <?php if(isset($_REQUEST['set'])){?>
                                <a href="../user/wishlist.php?set=true&cid=<?php echo $row['c_id'];?>">(<?php  $id=$row['c_id'];echo ucwords($row['c_name']); ?>) </a>
                                </li>
                                <?php 
                                 //$num=mysqli_fetch_num($result1);
                                 while($row=mysqli_fetch_assoc($result1)){ ?>  
                                 <li> <a href="../user/wishlist.php?set=true&cid=<?php echo $row['c_id'];?>&scid=<?php echo $row['s_c_id'];?>"> <?php echo ucwords($row['s_c_name']); ?> </a></li><?php }
                            ?>
                            </ul>
                           <?php    
    }else{?>
      <a href="../user/wishlist.php?cid=<?php echo $row['c_id'];?>">(<?php  $id=$row['c_id'];echo ucwords($row['c_name']); ?>) </a>
      </li>
      <?php 
                                 //$num=mysqli_fetch_num($result1);
                                 while($row=mysqli_fetch_assoc($result1)){ ?>  
                                 <li> <a href="../user/wishlist.php?cid=<?php echo $row['c_id'];?>&scid=<?php echo $row['s_c_id'];?>"> <?php echo ucwords($row['s_c_name']); ?> </a></li><?php }
                            ?>
                            </ul>
     <?php                    
    }?>
                                 <?php } ?>
                         </li>
                         <?php
                        }
                     ?>
                     </ul>
                  </div>
               </aside>

               <section class="s-12 m-8 l-9 xl-10" style="float:right;">                  
              
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <ul>
                      <li><a href="/"><i class="icon-sli-home"></i></a></li>
                    </ul>
                  </nav>
                  <!--<h1 class="margin-bottom">Products</h1>--><br>
                  <!-- Pruducts -->
                  <div class="margin2x">
                  <?php 
                     //include "include/connection.php";
                     if(isset($_GET['cid']) && (!isset($_GET['scid']))){
                      $v1id=$_GET['cid'];
                      $vid="category.c_id='$v1id'";
                      }else if(isset($_GET['scid'])){
                        $vid1=$_GET['scid'];
                        $vid="sub_category.s_c_id='$vid1'";
                      }else{
                       $vid="'1'='1'";
                      }
                     //die($vid);
                     $str="SELECT add_wish.*,wishlist.*,shop.*,customer.*,category.*,sub_category.*
                      FROM add_wish inner join wishlist on add_wish.w_id=wishlist.w_id join customer 
                      on customer.cust_id=wishlist.cust_id join shop on shop.shop_id=add_wish.shop_id 
                      join sub_category on shop.s_c_id=sub_category.s_c_id join category on 
                      category.c_id=sub_category.c_id WHERE wishlist.cust_id='$id1' AND ".$vid." ORDER by category.c_name ,shop.name,sub_category.s_c_name";
                     $query=mysqli_query($con,$str);
                    //die($str);
                     while($row=mysqli_fetch_assoc($query)){
                  ?>
                    <div class="s-12 m-12 l-4 xl-3 xxl-3" style="float:left;">
                       <table>
                       <tr>
                     <?php if($row['image']=='0'){?>
                     <td width="50%"><img src="noimage.png" style="height:150px;width:100px;align:center;"></td>
                     <?php }else{?>
                       <td width="50%"> <img  src="<?php echo $row['image'];?>" style="height:150px;width:100px;align:center;"></td>
                     <?php }?>
                     <?php if($row['img1']=='0'){?>
                     <td><img src="noimage.png" style="height:150px;width:100px;align:center;"></td>
                     <?php }else{?>
                      <td><img  src="<?php echo $row['img1'];?>" style="height:150px;width:100px;align:center;"></td>
                     <?php }?>
                       </tr>
                       <tr>
                       <td colspan="2"><h4 class="margin-bottom" style="font-size:15px;"><strong><?php echo ucwords($row['name']);?></strong></h4></td>
                       </tr>
                       <tr>
                       <td colspan="2"><h5 class="margin-bottom" style="font-size:11px;"><strong>(<?php echo ucwords($row['s_c_name']);?>&nbsp;-->&nbsp;<?php echo ucwords($row['c_name']);?>)</strong></h5></td>
                       </tr>
                       <tr>
                       <td colspan="2"><strong><i class="icon-sli-screen-smartphone" style="float:left;color:blue;"></i>&nbsp;<?php echo $row['shop_mob'];?></strong></td>
                       </tr>
                       <tr>
                          <td colspan="2">
                          <i class="icon-star" style="float:left;color:blue;"></i>&nbsp;
                            <?php 
                              $sid=$row['shop_id'];
                               $q=mysqli_query($con,"select ROUND(AVG(rate),1) as averageRating,count(cust_id) as cust from rate where shop_id='$sid'");
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
                       <tr>
                       <td colspan="2"> 
                           <?php 
                       if(isset($_REQUEST['set'])){
                       $querwish=mysqli_query($con,"SELECT add_wish.*,wishlist.* FROM add_wish inner join wishlist on add_wish.w_id=wishlist.w_id 
                             WHERE add_wish.shop_id='$sid' and wishlist.cust_id='$id1'");
                        $w=mysqli_num_rows($querwish);
                        if($w>0){
                        ?>
                       <div class="wish1">
                              <a href="wish.php?set=true&shop_id=<?php echo $sid;?>" id="wishl1" value="1"></a>
                       </div>
                        <?php }else{?>
                       <div class="wish">
                              <a href="wish.php?set=true&shop_id=<?php echo $sid;?>" id="wishl1" value="1"></a>
                       </div><?php } }else{?>
                       <div class="wish">
                                <a href="wish.php" id="wishl1" value="1"></a>
                       </div>
                             <?php } ?>                        
                        <div>
                        <?php if(isset($_REQUEST['set'])){?>
                          <a href="shop-detail.php?set=true&cid=<?php echo $row['c_id'];?>&sid=<?php echo $row['shop_id'];?>&wish=true" class="button rounded-btn submit-btn s-12">View Detail</a>
                    <?php }else{?> 
                      <a href="shop-detail.php?cid=<?php echo $row['c_id'];?>&sid=<?php echo $row['shop_id'];?>" class="button rounded-btn submit-btn s-12">View Detail</a>
                    <?php }?>
                        </div></td>
                       </tr>
                       </table>
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