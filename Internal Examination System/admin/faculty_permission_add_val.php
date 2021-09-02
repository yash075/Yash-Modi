<?php
	if(isset($_POST['submit']))
	{
        $sub_id = $_POST['sub_id'];
        $f_id = $_POST['f_id'];
		$batch_name = $_POST['batch_name'];
        $duplicate_data = array();
        $inserted_data = array();
        $not_inserted_data = array();
        $notAddDataInBatchTable = array();

        include '../admin/connection.php';
            
            for($i=0;$i<count($batch_name);$i++)
            {
                $bname = $batch_name[$i];
                
                $qry = "select batch_id from batch where batch_name='$bname';";
                    
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);
                
                if($row == 1)
                {
                    $batchid =  mysqli_fetch_assoc($result);
                    $batch_id = $batchid['batch_id'];
                    $qry = "select * from faculty_permission where sub_id='$sub_id' AND f_id='$f_id' AND batch_id='$batch_id';";
                    $result = mysqli_query($con,$qry);
                    $row = mysqli_num_rows($result);
                    if($row>0)
                    {
                        //echo "duplicate";
                        $duplicate_data[] = $bname;
                        //echo "<script>alert('$bname'. Already Assign in this Faculty)</script>";
                        //echo '<script>window.location="../admin/sem_details_add.php"</script>';
                    }
                    else
                    {
                        $qry2 = "INSERT INTO `faculty_permission` VALUES (NULL,'$f_id','$sub_id','$batch_id')";
			            $result2 = mysqli_query($con,$qry2);
                        if($result2)
                        {
                             $inserted_data[] = $bname;
                            //echo "<script>alert('Semester Successfully Add.')</script>";
				            //echo '<script>window.location="../admin/sem_details.php"</script>';
                        }
			            else
			            {    
                            $not_inserted_data[] = $bname;
                            //echo "<script>alert('something went wrong to add Semester please check it.')</script>";
				            //echo '<script>window.location="../admin/sem_details_add.php"</script>';
                        }
                    }      
                }
                else
                {
                    $notAddDataInBatchTable[] = $bname;
                }
            }
    
        if(count($duplicate_data) != 0)
        {
            sort($duplicate_data);
            for($i=0,$data="";$i<count($duplicate_data);$i++)
            {
                $data = $data.",".$duplicate_data[$i];
            }
            echo "<script>alert('Batch '+'$data'+' Already Assign in this Faculty')</script>";
        }
        if(count($inserted_data) != 0)
        {
            sort($inserted_data);
            for($i=0,$data="";$i<count($inserted_data);$i++)
            {
                $data = $data.",".$inserted_data[$i];
            }
            echo "<script>alert('Batch '+'$data'+' Successfully Add' )</script>";
        }
        if(count($not_inserted_data) != 0)
        {
            sort($not_inserted_data);
            for($i=0,$data="";$i<count($not_inserted_data);$i++)
            {
                $data = $data.",".$not_inserted_data[$i];
            }
            echo "<script>alert('Batch '+'$data'+' something went wrong to add Semester please check it.' )</script>";
        }
        if(count($notAddDataInBatchTable) != 0)
        {
            sort($notAddDataInBatchTable);
            for($i=0,$data="";$i<count($notAddDataInBatchTable);$i++)
            {
                $data = $notAddDataInBatchTable[$i].", ".$data;
            }
            echo "<script>alert('Batch '+'$data'+' Not Insert Record In The Batch table' )</script>";
        }
        
        if(count($duplicate_data) != 0 or count($not_inserted_data) != 0 )
        {
            echo '<script>window.location="../admin/faculty_permission_add.php"</script>';
        }
        else if(count($inserted_data) != 0)
        {
            echo '<script>window.location="../admin/faculty_permission.php"</script>';
        }
        else if(count($notAddDataInBatchTable) != 0)
        {
            echo '<script>window.location="../admin/batch_details_add.php"</script>';
        }
        else
        {
            echo "Problem";
        }
    }
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>