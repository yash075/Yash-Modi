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
      <title>Free responsive Online Store template</title>
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
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  
   </head>
   <body class="size-1520">

      <!-- HEADER -->
     <?php include "include/nav.php"; 
            include "include/side.php"; ?>
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
                  <!-- CAROUSEL 
                  <div class="line hide-s">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                       <div class="item"><img src="img/header-1.svg" alt=""></div>
                       <div class="item"><img src="img/header-2.svg" alt=""></div>
                       <div class="item"><img src="img/header-3.svg" alt=""></div>
                    </div>
                  </div>    -->              
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <ul>
                      <li><a href="/"><i class="icon-sli-home"></i></a></li>
                    </ul>
                    <?php if(isset($_REQUEST['set'])){?>
                    <form  method="post" action="../user/viewshop.php?set=true" align="right">
                     <input type="text" style="height:25px;width:250px;border-color:#00264d;" value="Search by shop name & mobile & mail" name="find">&nbsp;<a class="srh-btn"><i class="fa fa-search"></i></a>
                     </form>
                    <?php }else{?>
                     <form  method="post" action="../user/viewshop.php" align="right">
                     <input type="text" style="height:25px;width:250px;border-color:#00264d;" value="Search by shop name & mobile & mail" name="find">&nbsp;<a class="srh-btn"><i class="fa fa-search"></i></a>
                     </form>
                    <?php }?>
                  </nav>
                  <!--<h1 class="margin-bottom">Products</h1>--><br>
                  <!-- Pruducts -->
                  <div class="margin2x">
                  <?php 
                     include "include/connection.php";
                     $query=mysqli_query($con,"select * from category order by c_name");
                     while($row=mysqli_fetch_assoc($query)){
                  ?>
                    <div class="s-12 m-12 l-4 xl-3 xxl-3">
                    <?php if(isset($_REQUEST['set'])){?>
                       <a href="viewshop.php?set=true&cid=<?php echo $row['c_id'];?>">
                    <?php }else{?> 
                     <a href="viewshop.php?cid=<?php echo $row['c_id'];?>">
                    <?php }?>
                        <img class="full-img" src="<?php echo $row['img'];?>" style="height:150px;width:100px;align:center;">
                        <h4 class="margin-bottom"><strong><?php echo $row['c_name'];?></strong></h4></a>
                     </div>
                    <!-- <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-1.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-2.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-3.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-4.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-4.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-3.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-2.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-1.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-1.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-2.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-3.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-4.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-4.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-3.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-2.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                        <a href="/"><img class="full-img" src="img/gallery-1.svg"></a>
                        <h5>EUR 20.59</h5>
                        <a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>
                        <form class="customform s-12 margin-bottom2x" action="">
                           <div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>
                        </form>
                     </div>-->
                     <?php }?>
                     <div class="s-12 m-12 l-4 xl-3 xxl-3">
                    <?php if(isset($_REQUEST['set'])){?>
                       <a href="viewshop.php?set=true">
                    <?php }else{?> 
                     <a href="viewshop.php?">
                    <?php }?>
                         <br><br>&emsp;&emsp;&emsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <h4 class="margin-bottom"><strong>View All </strong></h4></a>
                     </div>
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