<?php
	if(isset($_POST['import']))
	{
        $sem_id = $_POST['sem_id'];
        $stud_file = $_FILES["file"]["tmp_name"];
		$stud_status = '1';
        $inserted_data = array();
        $not_inserted_data = array();
        $duplication = array();
		
		include '../admin/connection.php';
        
        if($_FILES["file"]["size"] > 0)
        {
            $f1=fopen($stud_file,"r");
            while(($data=fgetcsv($f1,","))!=FALSE)
            {
                $stud_code = $data[0];
                $stud_name = $data[1];
                $stud_mobile = $data[2];
                $stud_mail = $data[3];

                $qry = "select * from student where stud_code='$stud_code';";
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);

                if($row>0)
                {
                    //echo "duplicate";
                    //echo "<script>alert('Student code Already Add.')</script>";
                    //echo '<script>window.location="../admin/student_details_add.php"</script>';
                    $duplication[] = $stud_code;

                }
                else
                {

                    $qry2 = "INSERT INTO `student` VALUES (NULL,'$stud_code','$stud_name','$sem_id','$stud_mobile','$stud_mail','$stud_status')";
                   $result2 = mysqli_query($con,$qry2);
                    if($result2)
                    {
                        $inserted_data[] = $stud_code;
                        //echo "<script>alert('Student Successfully Add.')</script>";
                        //echo '<script>window.location="../admin/student_details.php"</script>';
                    }
                    else
                    {    
                        $not_inserted_data[] = $stud_code;
                        //echo "<script>alert('something went wrong to add student please check it.')</script>";
                        //echo '<script>window.location="../admin/student_details_add.php"</script>';
                    }
                }	

            }
            if(count($not_inserted_data) != 0)
            {
                sort($not_inserted_data);
                for($i=0,$data="";$i<count($not_inserted_data);$i++)
                {
                    $data = $data.",".$not_inserted_data[$i];
                }
                echo "<script>alert('Student Code '+'$data'+' something went wrong to Student not inserted the student tabe.' )</script>";
            }
            if(count($duplication) != 0)
            {
                sort($duplication);
                for($i=0,$data="";$i<count($duplication);$i++)
                {
                    $data = $data.",".$duplication[$i];
                }
                echo "<script>alert('Student Code '+'$data'+' something went wrong to Student Already inserted the student tabe.' )</script>";
            }
            if(count($duplication) != 0 or count($not_inserted_data) != 0)
            {
                echo '<script>window.location="../admin/student_details_file_import.php"</script>';
            }
            else
            {
                echo "<script>alert('Students Successfully Add.')</script>";
                echo '<script>window.location="../admin/student_details.php"</script>';
            }  
        }
        else
        {
            echo "<script>alert('File Size Empty.')</script>";
        }
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>