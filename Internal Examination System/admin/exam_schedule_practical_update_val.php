<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            if(isset($_POST['sub_idval0']))
            {
            $exam_id = $_GET['id'];
            $inserted_data = array();
            $not_inserted_data = array();
            
            include '../admin/connection.php';
            for($i=0;isset($_POST['sub_idval'.$i]);$i++)
            {
                $sub_id= $_POST['sub_idval'.$i];
                $date = $_POST['dateval'.$i];
                $time = $_POST['timeval'.$i];
                $batch_name= $_POST['batchval'.$i];
                $labno = $_POST['labnoval'.$i];
                $f_id = $_POST['f_idval'.$i];
                
                $sub_code = substr($sub_id,0,strpos($sub_id,"  - "));
                $exam_sch_pra_id = substr($f_id,strrpos($f_id," - ")+3);
                $f_id = substr($f_id,0,strpos($f_id," - "));
                
                $qry = "select sub_id from subject where sub_code='$sub_code' AND sub_type='Practical';";
                $result = mysqli_query($con,$qry);
                $num = mysqli_num_rows($result);
        
                if($num>0)
                {
                    $row=mysqli_fetch_assoc($result);
                    $sub_id = $row['sub_id'];
                    
                    $qry = "select batch_id from batch where batch_name='$batch_name';";
                    $result2 = mysqli_query($con,$qry);
                    $num2 = mysqli_num_rows($result);
                    if($num2 >0)
                    {
                        $row2=mysqli_fetch_assoc($result2);
                        $batch_id = $row2['batch_id'];
                        
                        //echo $exam_id.','.$sub_id.','.$date.','.$time.','.$labno.','.$batch_id.','.$f_id;
                        $qry1 ="UPDATE `exam_schedule_practical` SET `exam_id`='$exam_id',`sub_id`='$sub_id',`date`='$date',`time`='$time',`lab_no`='$labno',`batch_id`='$batch_id',`f_id`='$f_id' WHERE `exam_sch_pra_id`='$exam_sch_pra_id';";
                       //$qry1 = "insert into exam_schedule_practical values ('NULL','$exam_id','$sub_id','$date','$time','$labno','$batch_id','$f_id');";
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
                echo "<script>alert('Practical Schedule '+'$data'+' Successfully Upadte' )</script>";
            }
            if(count($not_inserted_data) != 0)
            {
                sort($not_inserted_data);
                for($i=0,$data="";$i<count($not_inserted_data);$i++)
                {
                    $data = $data.",".$not_inserted_data[$i];
                }
                echo "<script>alert('Practical Schedule '+'$data'+' something went wrong to add Semester please check it.' )</script>";
            }
             if(count($inserted_data) != 0 or count($not_inserted_data) != 0 )
            {
                echo '<script>window.location="examination_Schedule.php"</script>';
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong 11.')</script>";
        }    
            
        }
        else
        {
            echo "<script>alert('Something went Wrong 22.')</script>";
        }
    }
    else
    {
        header('location:../admin/index.php');
    }
?>