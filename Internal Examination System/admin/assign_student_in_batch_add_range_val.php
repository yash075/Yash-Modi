<?php
	if(isset($_POST['submit']))
	{
        $sem_id = $_POST['sem_id'];
		$stud_start_id = $_POST['stud_start_id'];
        $stud_end_id = $_POST['stud_end_id'];
		$batch_id = $_POST['batch_id'];
        $inserted_data = array();
        $not_inserted_data = array();
		
		include '../admin/connection.php';
        
        $qry = "select * from student where stud_id='$stud_start_id';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_fetch_assoc($result);
        $stud_start_code = $row['stud_code'];
        
        $qry = "select * from student where stud_id='$stud_end_id';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_fetch_assoc($result);
        $stud_end_code = $row['stud_code'];
        
        $qry = "select * from student where sem_id='$sem_id' AND stud_code>='$stud_start_code' AND stud_code<='$stud_end_code' AND stud_status=1 AND stud_id NOT IN (select stud_id from assign_student_in_batch) order by stud_code;";
        $result = mysqli_query($con,$qry);
        while($row = mysqli_fetch_assoc($result)){
            
            $id = $row['stud_id'];
            $qry2 = "INSERT INTO `assign_student_in_batch` VALUES  (NULL,'$batch_id','$id')";
            $result2 = mysqli_query($con,$qry2);
            
            if($result2)
            {
                $inserted_data[] = $row['stud_code'];
            }
            else
            {    
                $not_inserted_data[] = $row['stud_code'];
            }  
        }
        if(count($not_inserted_data) != 0)
        {
            sort($not_inserted_data);
            for($i=0,$data="";$i<count($not_inserted_data);$i++)
            {
                $data = $data.",".$not_inserted_data[$i];
            }
            echo "<script>alert('Student Code '+'$data'+' something went wrong to Student Assign in Batch please check it.' )</script>";
            echo '<script>window.location="../admin/assign_student_in_batch_add_range.php"</script>';
        }
        else
        {
            echo "<script>alert('All Student Successfully Assign in Batch.')</script>";
            echo '<script>window.location="../admin/assign_student_in_batch.php"</script>';
        }
    }
else
{
    echo "<script>alert('Something went Wrong.')</script>";
}
?>