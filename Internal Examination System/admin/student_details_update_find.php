<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_GET['find']))
        {   
            $g = $_GET['find'];
            
            include '../admin/connection.php';
            
            if(ord($g)==32)
            {
                $sql = "select student.stud_id,student.stud_code,student.stud_status,semester.sem_code from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 order by semester.sem_code DESC;";
            }
            else if(strtolower($g)=='active')
            {
                $sql = "select student.stud_id,student.stud_code,student.stud_status,semester.sem_code from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 order by semester.sem_code DESC;";
            }
            else
            {
                $sql = "select student.stud_id,student.stud_code,student.stud_status,semester.sem_code from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 AND (student.stud_id like '$g%' OR student.stud_name like '%$g%' OR semester.sem_code like '$g%' OR course.course_name like '$g%') order by semester.sem_code DESC;";
            }
		
            $result = mysqli_query($con,$sql);
            $num = mysqli_num_rows($result);
     
            if ($num > 0)
            {   
                while($row=mysqli_fetch_assoc($result))
                {
                    $stud_id = $row['stud_id'];
                    $stud_status = $row['stud_status'];
                    $sem_code = $row['sem_code'];
                    
                    //$sem_code = substr($sem_code,0,2).substr($sem_code,2)+1;
                    $sem_code1 = substr($sem_code,2);
                    $sem_code1 = $sem_code1+1;
                    $sem_code = substr($sem_code,0,2).$sem_code1;
                    
                    $qry = "select sem_id from semester where sem_code='$sem_code';";
                    $result1 = mysqli_query($con,$qry);
                    $num1 = mysqli_num_rows($result1);
        
                    if($num1<1)
                    {
                        $stud_status = '0';
                        $sem_code = substr($sem_code,0,2).'0';
                        $qry = "select sem_id from semester where sem_code='$sem_code';";
                        $result1 = mysqli_query($con,$qry);
                    }
                    
                    $row1=mysqli_fetch_assoc($result1);
                    $sem_id = $row1['sem_id'];
                    
                    $qry = "UPDATE `student` SET `sem_id`='$sem_id',`stud_status`='$stud_status' where stud_id='$stud_id';";
                    $result2 = mysqli_query($con,$qry);
                }
                if($result2)
                {
                    echo "<script>alert('Successfully Upgrade Student Semester.')</script>";
                    echo '<script>window.location="../admin/student_details.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong please check it.')</script>";
                    echo '<script>window.location="../admin/student_details.php"</script>';
                }
            }
            else
            {
                echo "<script>alert('Empty Record Found.')</script>";
                echo "<script>window.location='student_details.php'</script>";
            }
			
	   }
	   else
       {
           echo "<script>alert('Find is not set the value in Updating Student Sem.')</script>";
           echo '<script>window.location="../admin/student_details.php"</script>';
	   }
		
	}
	else
	{
		header('location:../admin/index.php');
	}
?>