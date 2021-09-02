<html>
<head>
<link rel="stylesheet" href="filter/filter.css" />
  
    </head>
    <?php include "../user/connection.php";?>
    <body>
    <div id="container">
        <ul>
            <li disabled="disabled">filter
        <ul><li style="color:red;">Course<ul><?php
            $sql = "select * from course;";
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {?>
                <li value="<?php $v=$row['course_code']; echo $v;?>"><a href="exam_schedule.php?id=<?php echo $row['course_code'];?>" name="find"><?php echo $row['course_name'];?></a> 

								</li>
            <?php }?>
            </li>
            </ul>
        </ul>
                          </li>     </ul>
        </div>
    </body>
</html>