<?php
	if(isset($_POST['submit']))
	{
        $sem_id = $_POST['sem_id'];
        $sub_code = $_POST['sub_code'];
        $sub_name = $_POST['sub_name'];
		$sub_type = $_POST['sub_type'];
		
		include '../admin/connection.php';
		
        $qry = "select sem_code from semester where sem_id='$sem_id';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            $num = mysqli_fetch_assoc($result);
            $sub_code = strtoupper($sub_code);
            if(substr($sub_code,0,3)!=$num['sem_code'])
            {
                    echo "<script>alert('Subject code and semester code is not matched.')</script>";
				    echo '<script>window.location="../admin/subject_details_add.php"</script>';   
            }
            else
            {
                if($sub_type != 'Both')
                {
                    $qry = "select * from subject where sub_code='$sub_code' and sub_type='$sub_type';";
                    $result = mysqli_query($con,$qry);
                    $row = mysqli_num_rows($result);

                    if($row>0)
                    {
                        //echo "duplicate";
                        echo "<script>alert('Subject Type Already Add.')</script>";
                        echo '<script>window.location="../admin/subject_details_add.php"</script>';
                    }
                    else
                    {

                        $qry2 = "INSERT INTO `subject` VALUES (NULL,'$sem_id','$sub_code','$sub_name','$sub_type')";
                        $result2 = mysqli_query($con,$qry2);
                        if($result2)
                        {
                            echo "<script>alert('Subject Successfully Add.')</script>";
                            echo '<script>window.location="../admin/subject_details.php"</script>';
                        }
                        else
                        {    
                            echo "<script>alert('something went wrong to add Subject please check it.')</script>";
                            echo '<script>window.location="../admin/subject_details_add.php"</script>';
                        }
                    }
                }
                else
                {
                    $duplicate_data = array();
                    $inserted_data = array();
                    $not_inserted_data = array();
                    for($i=0;$i<2;$i++)
                    {
                        if($i == 0){
                            $sub_type = 'Theory';
                        }
                        else if($i == 1){
                            $sub_type = 'Practical';
                        }
                        $qry = "select * from subject where sub_code='$sub_code' and sub_type='$sub_type';";
                        $result = mysqli_query($con,$qry);
                        $row = mysqli_num_rows($result);

                        if($row>0)
                        {
                            //echo "duplicate";
                            //echo "<script>alert('Subject Type Already Add.')</script>";
                            //echo '<script>window.location="../admin/subject_details_add.php"</script>';
                            $duplicate_data[] = $sub_type;
                        }
                        else
                        {

                            $qry2 = "INSERT INTO `subject` VALUES (NULL,'$sem_id','$sub_code','$sub_name','$sub_type')";
                            $result2 = mysqli_query($con,$qry2);
                            if($result2)
                            {
                                $inserted_data[] = $sub_type;
                                //echo "<script>alert('Subject Successfully Add.')</script>";
                                //echo '<script>window.location="../admin/subject_details.php"</script>';
                            }
                            else
                            {    
                                $not_inserted_data[] = $sub_type;
                                //echo "<script>alert('something went wrong to add Subject please check it.')</script>";
                                //echo '<script>window.location="../admin/subject_details_add.php"</script>';
                            }
                        }
                    }
                    
                    if(count($duplicate_data) != 0)
                    {
                        sort($duplicate_data);
                        for($i=0,$data="";$i<count($duplicate_data);$i++)
                        {
                            $data = $data.",".$duplicate_data[$i];
                        }
                        echo "<script>alert('Subject type '+'$data'+' Already Add')</script>";
                    }
                    if(count($inserted_data) != 0)
                    {
                        sort($inserted_data);
                        for($i=0,$data="";$i<count($inserted_data);$i++)
                        {
                            $data = $data.",".$inserted_data[$i];
                        }
                        echo "<script>alert('Subject type '+'$data'+' Successfully Add' )</script>";
                    }
                    if(count($not_inserted_data) != 0)
                    {
                        sort($not_inserted_data);
                        for($i=0,$data="";$i<count($not_inserted_data);$i++)
                        {
                            $data = $data.",".$not_inserted_data[$i];
                        }
                        echo "<script>alert('Subject Type '+'$data'+' something went wrong to Error please check it.' )</script>";
                    }
                    if(count($duplicate_data) != 0 or count($not_inserted_data) != 0 or count($inserted_data) != 0)
                    {
                        echo '<script>window.location="subject_details.php"</script>';
                    }
                }
            }
        }
        else
        {
            echo "<script>alert('Course id is not Already Add in Semester Details.')</script>";
            echo '<script>window.location="../admin/subject_details_add.php"</script>';
        }
			
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>