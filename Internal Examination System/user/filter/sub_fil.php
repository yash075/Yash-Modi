
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
                <li value="<?php $v=$row['course_code']; echo $v;?>"><a href="subject.php?id=<?php echo $row['course_code'];?>" name="find"><?php echo $row['course_name'];?></a>
					<ul>
                    <?php 
                        $sem="select semester.*,course.* from semester inner join course on semester.course_id=course.course_id where course.course_code='$v' And semester.sem_code NOT LIKE '%__0%' order by sem_code ;";
                        $result1=mysqli_query($con,$sem);
						while($row1=mysqli_fetch_assoc($result1)){ ?>
						<li value="<?php $v1=$row1['sem_code']; echo $v1;?>"><a href="subject.php?id=<?php echo $row1['sem_code'];?>" name="find"><?php echo substr($row1['sem_code'],2);?></a>
                            <ul>
                                <?php
                                     $sub="select distinct(subject.sub_name),subject.sub_code,subject.sem_id,semester.* from subject inner join 
                                     semester on semester.sem_id=subject.sem_id where semester.sem_code='$v1'  order by sub_code;";
                                     $result2=mysqli_query($con,$sub);
                                     while($row2=mysqli_fetch_assoc($result2)){
                                ?>
                                <li style="width:320px;" value="<?php $v3=$row1['sub_code']; echo $v3;?>"><a href="subject.php?id=<?php echo $row2['sub_code'];?>" name="find"><?php echo $row2['sub_name'];?></a>
                                </li>
                                     <?php }?>
                            </ul>
                        </li>
			<?php }?>
					</ul>
                </li>
            <?php }?>
            </li>
            </ul>
            <li style="color:red;">Grade
               <ul>
                    <li value="A"><a href="subject.php?id=A">A</a></li>
                    <li value="B"><a href="subject.php?id=B">B</li>
               </ul>
            </li>
            <li style="color:red;">Type
               <ul>
               <?php
                $subty="select distinct(sub_type) from subject;";
                $result=mysqli_query($con,$subty);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <li value="<?php $v3=$row['sub_type']; echo $v3;?>"><a href="subject.php?id=<?php echo $row['sub_type'];?>" name="find"><?php echo $row['sub_type'];?></a>
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
