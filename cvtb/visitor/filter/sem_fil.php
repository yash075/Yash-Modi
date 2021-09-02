<?php
			function fil(){
				if(isset($_POST["submit"])){
					if(isset($_POST["val"])){
						$value=$_POST["val"];
$sql1="select semester.sem_id,semester.sem_code,semester.sem_type,course.course_name from semester inner join course on semester.course_id=course.course_id where semester.sem_type!='comp' AND course.course_code like '%$value%' OR semester.sem_type like '%$value%'  order by course.course_name,semester.sem_code;";
 return $sql1;
					}
				}
			}
		?>
<form action="" method="post">
                             <!--filter-->
								<select name="val" onclick="return fil()"style="width:30%;float:left;align:left;background-color:darkseagreen">
									<option value="">---select filter---</option>
									<option disabled="disabled" style="background-color:#2e3842;color:white;">****select course****</option>
									<?php $sql = "select * from course;";
										  $result = mysqli_query($con,$sql); 
										  while($row=mysqli_fetch_assoc($result)){?>
										  <option value="<?php echo $row['course_code'];?>"><?php echo $row['course_name'];?></option>
										  <?php }?>
									<option disabled="disabled" style="background-color:#2e3842;color:white;">****select semester type****</option>
									<?php $sql = "select distinct(sem_type) from semester where sem_type!='comp';";
										  $result = mysqli_query($con,$sql); 
										  while($row=mysqli_fetch_assoc($result)){?>
										  <option value="<?php echo $row['sem_type'];?>"><?php echo $row['sem_type'];?></option>
										  <?php }?>	  
								</select>&nbsp;&nbsp;
								<input type="submit" value="filter" name="submit"  style="background-color:darkcyan;color:black;">
								<!--<input type="text" value="<?php //echo strval(fil());?>" name="query">-->
</form>