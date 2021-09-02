<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            if(isset($_POST['sub_idval0'])){
            $exam_id = $_GET['id'];
            $inserted_data = array();
            $not_inserted_data = array();
            
            include '../admin/connection.php';
            for($i=0;isset($_POST['sub_idval'.$i]);$i++)
            {
                $sub_id= $_POST['sub_idval'.$i];
                $date = $_POST['dateval'.$i];
                $time = $_POST['timeval'.$i];
                
                $sub_code = substr($sub_id,0,strpos($sub_id,"  - "));
                
                $qry = "select sub_id from subject where sub_code='$sub_code' AND sub_type='Theory';";
                $result = mysqli_query($con,$qry);
                $num = mysqli_num_rows($result);
        
                if($num>0)
                {
                    $row=mysqli_fetch_assoc($result);
                    $sub_id = $row['sub_id'];
                    $qry1 = "insert into exam_schedule_theory values ('NULL','$exam_id','$sub_id','$date','$time');";
                    $result1 = mysqli_query($con,$qry1);
                    if($result1)
                    {
                         $inserted_data[] = $sub_code;
                    }
                    else
                    {
                        $not_inserted_data[] = $sub_code;
                    }
                }
                else
                {
                     echo "<script>alert('Error.' )</script>";
                    echo '<script>window.location="examination_Schedule.php"</script>';
                }
            }
                
                if(count($inserted_data) != 0)
            {
                sort($inserted_data);
                for($i=0,$data="";$i<count($inserted_data);$i++)
                {
                    $data = $data.",".$inserted_data[$i];
                }
                echo "<script>alert('Theory Schedule '+'$data'+' Successfully Add' )</script>";
            }
            if(count($not_inserted_data) != 0)
            {
                sort($not_inserted_data);
                for($i=0,$data="";$i<count($not_inserted_data);$i++)
                {
                    $data = $data.",".$not_inserted_data[$i];
                }
                echo "<script>alert('Theory Schedule '+'$data'+' something went wrong to add Semester please check it.' )</script>";
            }
             if(count($inserted_data) != 0 or count($not_inserted_data) != 0 )
            {
                echo '<script>window.location="examination_Schedule.php"</script>';
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong.')</script>";
        }    
            
        }
        else
        {
            echo "<script>alert('Something went Wrong.')</script>";
        }
    }
    else
    {
        header('location:../admin/index.php');
    }
?>