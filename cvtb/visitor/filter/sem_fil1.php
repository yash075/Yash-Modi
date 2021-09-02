<html>
<head>
<?php include "../user/connection.php";?>
<link rel="stylesheet" href="filter/filter.css" />
    </head>
    
    <body>
    <div id="container">
        <ul>
            <li disabled="disabled">filter
        <ul><li style="color:red;">Course<ul>
           <?php  $cou = "select * from course order by course_name;";
            $result = mysqli_query($con,$cou);
            while($row=mysqli_fetch_assoc($result))
            {?>
                <li value="<?php $v=$row['course_code']; echo $v;?>"><a href="sem.php?id=<?php echo $row['course_code'];?>" name="find"><?php echo $row['course_name'];?></a>
					<ul>
                    <?php 
                        $sem="select semester.*,course.* from semester inner join course on semester.course_id=course.course_id where course.course_code='$v' And semester.sem_code NOT LIKE '%__0%' order by sem_code ;";
                        $result1=mysqli_query($con,$sem);
						while($row1=mysqli_fetch_assoc($result1)){ ?>
						<li value="<?php $v1=$row1['sem_code']; echo $v1;?>"><a href="sem.php?id=<?php echo $row1['sem_code'];?>" name="find"><?php echo substr($row1['sem_code'],2);?></a>
                        </li>
			<?php }?>
					</ul>
                </li>
            <?php }?>
            </li>
            </ul>
            <li style="color:red;">Type
               <ul>
               <?php
                $subty="select distinct(sem_type) from semester where sem_type!='comp';";
                $result=mysqli_query($con,$subty);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <li value="<?php $v3=$row['sem_type']; echo $v3;?>"><a href="sem.php?id=<?php echo $row['sem_type'];?>" name="find"><?php echo $row['sem_type'];?></a>
                </li>
                <?php }?>
               </ul>
            </li>
        </ul>
    </li>     
</ul>
        </div>
    </body>
</html>
