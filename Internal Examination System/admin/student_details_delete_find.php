<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
		include '../admin/connection.php';
        
        if(isset($_GET['find']))
        {   
            $g = $_GET['find'];
                                                                             
            if(strtolower($g)=='inactive')
            {
                $sql = "select student.stud_id,student.stud_name,student.stud_mobile,student.stud_mail,semester.sem_code,course.course_name from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=0 order by student.stud_id;";
            }
            else if(ord(strtoupper($g))>=65 and ord(strtoupper($g))<=90 and substr($g,2)=='0')
            {
                $sql = "select student.stud_id,student.stud_name,student.stud_mobile,student.stud_mail,semester.sem_code,course.course_name from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=0 AND semester.sem_code='$g' order by student.stud_id;";
            }
            else if(ord($g)==32)
            {
                $sql = "select student.stud_id,student.stud_name,student.stud_mobile,student.stud_mail,semester.sem_code,course.course_name from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 order by student.stud_id;";
            }
            else if(strtolower($g)=='active')
            {
                $sql = "select student.stud_id,student.stud_name,student.stud_mobile,student.stud_mail,semester.sem_code,course.course_name from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 order by student.stud_id;";
            }
            else
            {
                $sql = "select student.stud_id,student.stud_name,student.stud_mobile,student.stud_mail,semester.sem_code,course.course_name from student inner join semester on semester.sem_id=student.sem_id inner join course on semester.course_id=course.course_id where student.stud_status=1 AND (student.stud_id like '$g%' OR student.stud_name like '%$g%' OR semester.sem_code like '$g%' OR course.course_name like '$g%') order by student.stud_id;";
            }
        }
        else
        {
            echo "<script>alert('Find is not set the value in deleting Student.')</script>";
            echo '<script>window.location="../admin/student_details.php"</script>';
        }
                                                 
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        
        if ($num > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $sql = "delete from student where stud_id =".$row['stud_id'].";";
                $result1 = mysqli_query($con,$sql);
            }
            if($result1)
            {
                echo "<script>alert('Student Successfully Deleted.')</script>";
                echo "<script>window.location='../admin/student_details.php'</script>";
            }
            else
            {
                echo "<script>alert('Something went wrong in deleting Student.')</script>";
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
		header('location:../admin/index.php');
	}
?>