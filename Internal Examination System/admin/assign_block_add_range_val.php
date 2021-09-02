<?php
	if(isset($_POST['submit']))
	{
        $r_id = $_POST['room_id'];
        $b_arr_id = $_POST['b_arr_id'];
		$stud_start_id = $_POST['stud_s_id'];
        $stud_end_id = $_POST['stud_e_id'];
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
        
        $qry = "select * from student where sem_id IN (select subject.sem_id from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join subject on subject.sub_id=exam_schedule_theory.sub_id  where block_arrangement.b_arr_id='$b_arr_id') AND stud_code>='$stud_start_code' AND stud_code<='$stud_end_code' AND stud_status=1 AND stud_id NOT IN (select stud_id from assign_block where b_arr_id='$b_arr_id') order by stud_code;";
        $result = mysqli_query($con,$qry);
        while($row = mysqli_fetch_assoc($result)){
            
            $id = $row['stud_id'];
            $qry2 = "INSERT INTO `assign_block` VALUES  (NULL,'$b_arr_id','$id','NULL')";
            $result2 = mysqli_query($con,$qry2);
            
            if($result2)
            {
                $inserted_data[] = $row['stud_code']."-".$b_arr_id;
            }
            else
            {    
                $not_inserted_data[] = $row['stud_code']."-".$b_arr_id;
            }  
        }
        if(count($not_inserted_data) != 0)
        {
            sort($not_inserted_data);
            for($i=0,$data="";$i<count($not_inserted_data);$i++)
            {
                $data = $data.",".$not_inserted_data[$i];
            }
            echo "<script>alert('Student Code & B_arr_id '+'$data'+' something went wrong to Student Assign in Batch please check it.' )</script>";
            echo '<script>window.location="../admin/assign_block_add.php"</script>';
        }
        else
        {
            echo "<script>alert('All Student Successfully Assign in Block.')</script>";
            echo '<script>window.location="../admin/assign_block.php"</script>';
        }
    }
else
{
    echo "<script>alert('Something went Wrong.')</script>";
}
?>