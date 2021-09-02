<html>
<head>
<?php include "../user/connection.php";
     $sql = "select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,
     batch.batch_name,semester.sem_code,course.* from faculty_permission inner join faculty on 
     faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
     semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
     course on course.course_id=semester.course_id where faculty.f_code='$s' group by course.course_name
     order by faculty.f_code,subject.sub_code,batch.batch_name;";
                                                       
?>
<link rel="stylesheet" href="filter/filter.css" />
    </head>
    
    <body>
    <div id="container">
        <ul>
            <li disabled="disabled">filter
        <ul><li style="color:red;">Course<ul>
           <?php  
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {?>
                <li value="<?php $v=$row['course_code']; echo $v;?>"><a href="faculty-permission.php?id=<?php echo $row['course_code'];?>" name="find"><?php echo $row['course_name'];?></a>
					<ul>
                    <?php 
                    //echo $v; 
                    $sql1="select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,
                    batch.batch_name,semester.sem_code,course.* from faculty_permission inner join faculty on 
                    faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
                    semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
                    course on course.course_id=semester.course_id where faculty.f_code='$s' And course.course_code='$v'group by semester.sem_id
                     order by faculty.f_code,subject.sub_code,batch.batch_name;";
                       $result1=mysqli_query($con,$sql1);
                       //echo mysqli_num_rows($result1);
						while($row1=mysqli_fetch_assoc($result1)){ ?>
						<li value="<?php $v1=$row1['sem_code']; echo $v1;?>"><a href="faculty-permission.php?id=<?php echo $row1['sem_code'];?>" name="find"><?php echo substr($row1['sem_code'],2);?></a>
						<ul>
								<?php
								$sql2="select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,
                                batch.batch_name,semester.sem_code,course.* from faculty_permission inner join faculty on 
                                faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
                                semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
                                course on course.course_id=semester.course_id where faculty.f_code='$s' And semester.sem_code='$v1' 
                                group by subject.sub_name order by faculty.f_code,subject.sub_code,batch.batch_name;";
                                   $result2=mysqli_query($con,$sql2);
                                     while($row2=mysqli_fetch_assoc($result2)){
                                ?>
                                <li style="width:250px;"value="<?php $v3=$row2['sub_code']; echo $v3;?>"><a href="faculty-permission.php?id=<?php echo $row2['sub_name'];?>" name="find"><?php echo $row2['sub_name'];?></a>
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
            <li style="color:red;">Type
               <ul>
               <?php
                $subty="select distinct(sub_type) from subject;";
                $result=mysqli_query($con,$subty);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <li value="<?php $v3=$row['sub_type']; echo $v3;?>"><a href="faculty-permission.php?id=<?php echo $row['sub_type'];?>" name="find"><?php echo $row['sub_type'];?></a>
                </li>
                <?php }?>
               </ul>
			</li>
			<li style="color:red;">Batch
               <ul>
               <?php
                $subty="select batch_name from batch where batch_name NOT LIKE 'T%';";
                $result=mysqli_query($con,$subty);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <li value="<?php $v3=$row['batch_name']; echo $v3;?>"><a href="faculty-permission.php?id=<?php echo $row['batch_name'];?>" name="find"><?php echo $row['batch_name'];?></a>
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

