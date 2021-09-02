<?php
	if(isset($_POST['submit']))
	{
        $b_arr_id = $_POST['b_arr_id'];
		$stud_id = $_POST['stud_s_id'];
		
		include '../admin/connection.php';
        
       
            $qry2 = "INSERT INTO `assign_block` VALUES  (NULL,'$b_arr_id','$stud_id','NULL')";
            $result2 = mysqli_query($con,$qry2);
            
            if($result2)
            {
                echo "<script>alert('Student Successfully Assign in Block.')</script>";
               echo '<script>window.location="../admin/assign_block.php"</script>';
            }
            else
            {    
                 echo "<script>alert( something went wrong to Student Assign in Block please check it.' )</script>";
                echo '<script>window.location="../admin/assign_block_add.php"</script>';
            }  
    }
else
{
    echo "<script>alert('Something went Wrong.')</script>";
}
?>