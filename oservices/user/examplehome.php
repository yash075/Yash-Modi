<?php 
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
  //die($id);
	if($s == TRUE)
	{
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
   </head>
   <body class="size-1520">
      <!-- HEADER -->
     <?php include "include/nav.php"; 
            include "include/side.php"; ?>
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
                  <!-- CAROUSEL -->  
                  <div class="line hide-s">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                       <div class="item"><img src="img/header-1.svg" alt=""></div>
                       <div class="item"><img src="img/header-2.svg" alt=""></div>
                       <div class="item"><img src="img/header-3.svg" alt=""></div>
                    </div>
                  </div>                  
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <ul>
                      <li><a href="/"><i class="icon-sli-home"></i></a></li>
                      <li><a href="/">Catalogue</a></li>
                      <li><a href="/">First Category</a></li>
                      <li><span>Sub Category 1</span></li>
                    </ul>
                  </nav>
                  <h1 class="margin-bottom">Products</h1>
                  <!-- Pruducts -->
                  <div class="margin2x">
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
	}
	else
	{
		header('location:logout.php');
	}
?>