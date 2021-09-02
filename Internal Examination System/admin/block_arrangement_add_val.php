<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $r_id = $_GET['id'];
            $no_blocks = $_GET['no_blocks'];
            $duplication = array();
            $inserted_data = array();
            $not_inserted_data = array();
            
            include '../admin/connection.php';
            for($i=1;$i<=$no_blocks;$i++)
            {
                $b_name= $_POST['b_name'.$i];
                $exam_th_id= $_POST['exam_sch_th_id'.$i];
                //$f_id = NULL;
                
                $qry = "select b_arr_id from block_arrangement where r_id='$r_id' AND b_arr_no='$b_name' AND exam_sch_th_id='$exam_th_id' ;";
                $result = mysqli_query($con,$qry);
                $num = mysqli_num_rows($result);
        
                if($num==0)
                {
                    $qry1 = "insert into block_arrangement values ('NULL','$r_id','$b_name','$exam_th_id',NULL);";
                    $result1 = mysqli_query($con,$qry1);
                    if($result1)
                    {
                         $inserted_data[] = $r_id." ".$b_name." ".$exam_th_id;
                    }
                    else
                    {
                        $not_inserted_data[] = $r_id." ".$b_name." ".$exam_th_id;
                    }
                }
                else
                {
                    $duplication[] = $r_id." ".$b_name." ".$exam_th_id;
                     //echo "<script>alert('.' )</script>";
                     //echo '<script>window.location="examination_Schedule.php"</script>';
                }
            }
            
            if(count($duplication) != 0)
            {
                for($i=0,$data="";$i<count($duplication);$i++)
                {
                    $data = $data.",".$duplication[$i];
                }
                echo "<script>alert('$data'+' Duplication' )</script>";
            }
            if(count($not_inserted_data) != 0)
            {
                for($i=0,$data="";$i<count($not_inserted_data);$i++)
                {
                    $data = $data.",".$not_inserted_data[$i];
                }
                echo "<script>alert('$data'+' Not Inserted the data.' )</script>";
            }
            
                
                if(count($inserted_data) != 0)
            {
                for($i=0,$data="";$i<count($inserted_data);$i++)
                {
                    $data = $data.",".$inserted_data[$i];
                }
                echo "<script>alert('Inserted Successfully' )</script>";
            }
            if(count($inserted_data) != 0 or count($duplication)!=0)
            {
                echo '<script>window.location="room_arrangement.php"</script>';
            }
            if(count($inserted_data)!=0)
            {
                echo '<script>window.location="room_arrangement.php"</script>';
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