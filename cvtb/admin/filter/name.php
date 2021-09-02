<html>
<head>
<link rel="stylesheet" href="/cvms/cvms/filter/filter1.css" />
  
    </head>
    <?php include "dbconnection.php";?>
    <body>
    <div id="container">
               <ul><?php 
            $sql = "SELECT * FROM `schedule_visitor` where sch_v_id='$_GET['name']'";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {?>
             <li value="<?php $v=$row['v_id'];?>"><?php echo $row['name'];?>
            </li><?php }?></ul>
        </div>
    </body>
</html>