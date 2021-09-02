 <?php ?>
 <header>
         <div class="line">
            <div class="box">
               <div class="s-12 l-2">
                  <!--img class="full-img logo" src="img/logo.svg">-->
                  <!--<img class="full-img logo" src="img/shop.png" style="height:100px;width:100px;float:left;">-->
                   <h3 style="color:green;margin-left:70px;font-family:Times New Roman,Times,fantacy;"><b>Shop Serenity<b></h3>
               </div>
               <!--<div class="s-12 l-8 right">
                  <div class="margin">
                     <form  class="customform s-12 l-8" method="get" action="http://google.com/">
                        <div class="s-9"><input type="text" placeholder="Search form" title="Search form" /></div>
                        <div class="s-3"><button type="submit">Search</button></div>
                     </form>
                  </div>
               </div>-->
            </div>
         </div>
         <!-- TOP NAV -->  
         <div class="line">
            <nav>
               <div class="top-nav">
                  <ul class="right">
                     <li>
                     <?php if(isset($_REQUEST['set'])){?>
                      <a href="home.php?set=true">Home</a>
                      <?php }else{?> 
                        <a href="home.php">Home</a>
                      <?php } ?>
                     </li>
                     <li>
                        <a>Category</a>
                        <ul>
                        <?php 
                        include "connection.php";
                        $query="select * from category order by c_name;";
                        $result = mysqli_query($con,$query);
                        while($row=mysqli_fetch_assoc($result)){ ?>  
                         <li>
                         <?php if(isset($_REQUEST['set'])){?>
                      <a href="viewshop.php?set=true&cid=<?php echo $row['c_id'];?>"><?php echo ucwords($row['c_name']); ?></a>
                      <?php }else{?> 
                        <a href="viewshop.php?cid=<?php echo $row['c_id'];?>"><?php echo ucwords($row['c_name']); ?></a>
                      <?php } ?>
                         </li>
                         <?php
                        }
                     ?>
                     </ul>
                      
                     </li>
                     <li>
                     <?php if(isset($_REQUEST['set'])){?>
                      <a href="wishlist.php?set=true&custid=<?php echo $id1;?>">Wishlist</a>
                      <?php }else{?> 
                        <a href="../user/log_shop/indexuser.php">Wishlist</a>
                      <?php } ?>
                     </li>
                     <li>
                         <a>Log Details</a>
                         <ul>
                         <?php //die (isset($s)."hi");?>
                         <?php if(isset($s)){?>
                           <li><a href="log_shop/userdetail.php?set=true"><i class="icon-sli-user"></i>&nbsp;&nbsp;Details</a></li>
                           <li><a href="log_shop/indexshop.php?set=true"><i class="icon-sli-home"></i>&nbsp;&nbsp;Shop</a></li>
                           <li><a href="log_shop/indexshop.php"><i class="icon-sli-power"></i>&nbsp;&nbsp;Logout</a></li>
                         <?php }else{ ?>
                           <li><a href="log_shop/indexshop.php"><i class="icon-sli-home"></i>&nbsp;&nbsp;Shop</a></li>
                           <li><a href="log_shop/indexuser.php"><i class="icon-sli-user"></i>&nbsp;&nbsp;User</a></li>
                         <?php } ?>
                        </ul>
                    </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
     