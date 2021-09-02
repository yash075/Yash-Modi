<!--need to change in wishlist too-->
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
                            $query=mysqli_query($con,"select * from category order by c_name");
                            while($result=mysqli_fetch_assoc($query)){
                          ?>
                         <li>
                            <a><?php echo $result['c_name'];$cid=$result['c_id'];?></a>
                             <!--if set-->
                             <?php 
                                if(isset($_REQUEST['set'])){?>
                               <ul>
                                <li>
                                    <!-- cname -->
                                    <a href="../user/viewshop.php?set=true&cid=<?php echo $cid;?>"> (<?php echo $result['c_name'];?>)</a>
                                </li>
                                    <!--sub name-->
                                    <?php 
                                        $subq=mysqli_query($con,"select * from sub_category where c_id='$cid' order by s_c_name");
                                        $q=mysqli_num_rows($subq);
                                        if($q>0){
                                            while($row1=mysqli_fetch_assoc($subq)){
                                            ?>
                                            <li>
                                            <a href="../user/viewshop.php?set=true&scid=<?php echo $row1['s_c_id'];?>"> <?php echo $row1['s_c_name'];?></a>
                                        </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                   
                                   
                             </ul>
                             <!-- if not set -->
                             <?php     
                                }else{?>
                                   <ul>
                                <li>
                                    <!--cname-->
                                    <a href="../user/viewshop.php?cid=<?php echo $cid;?>"> (<?php echo $result['c_name'];?>)</a>
                                </li>
                                    <!--sub name-->
                                    <?php 
                                        $subq=mysqli_query($con,"select * from sub_category where c_id='$cid' order by s_c_name");
                                        $q=mysqli_num_rows($subq);
                                        if($q>0){
                                            while($row1=mysqli_fetch_assoc($subq)){
                                            ?>
                                            <li>
                                            <a href="../user/viewshop.php?scid=<?php echo $row1['s_c_id'];?>"> <?php echo $row1['s_c_name'];?></a>
                                        </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                
                             </ul> 
                              <?php  }
                             ?>
                         </li>
                         <?php } ?>
                     </ul>
                  </div>
               </aside>
               <!--backup
               <?php /*$query1="select * from sub_category where c_id=$id order by s_c_name;";
                                 $result1 = mysqli_query($con,$query1);
                                 $num2=mysqli_num_rows($result1);
                                 if($num2>0){
                            ?>
                            <ul>
                            <li>
                            <?php if(isset($_REQUEST['set'])){?>
                                <a href="../user/viewshop.php?set=true&cid=<?php echo $row['c_id'];?>">(<?php  $id=$row['c_id'];echo ucwords($row['c_name']); ?>) </a>
                                </li>
                                <?php 
                                 //$num=mysqli_fetch_num($result1);
                                 while($row=mysqli_fetch_assoc($result1)){ ?>  
                                 <li> <a href="../user/viewshop.php?set=true&cid=<?php echo $row['c_id'];?>&scid=<?php echo $row['s_c_id'];?>"> <?php echo ucwords($row['s_c_name']); ?> </a></li><?php }
                            ?>
                            </ul>
                           <?php    
    }else{?>
      <a href="../user/viewshop.php?cid=<?php echo $row['c_id'];?>">(<?php  $id=$row['c_id'];echo ucwords($row['c_name']); ?>) </a>
      </li>
      <?php 
                                 //$num=mysqli_fetch_num($result1);
                                 while($row=mysqli_fetch_assoc($result1)){ ?>  
                                 <li> <a href="../user/viewshop.php?cid=<?php echo $row['c_id'];?>&scid=<?php echo $row['s_c_id'];?>"> <?php echo ucwords($row['s_c_name']); ?> </a></li><?php }
                            ?>
                            </ul>
     <?php                    
    }?>
                                 <?php } ?>
                         </li>
                         <?php
                        }
                    */ ?>-->