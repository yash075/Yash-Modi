<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $type=$_REQUEST['type'];
            $mid=$_REQUEST['mid'];
            
            include '../admin/connection.php';
            for($i=0;isset($_POST['m_idval'.$i]);$i++)
            {
                if($type=='theory' || $type=='Theory'){
                for($j=0;isset($_POST['aid'.$j]);$j++){
                    $aid=$_POST['aid'.$j];
                    $mark=$_POST['m_idval'.$j]
                    $qry1 = "insert into add_marks values ('NULL','$mid','$aid','$mark','NULL');";
                    $result1 = mysqli_query($con,$qry1);}
                    
                

            }if($type=='practical' || $type=='Practical'){
                $mark=$_POST['m_idval'.$i]
                $qry1 = "insert into add_marks values ('NULL','$mid','NULL','$mark','$pr_id');";
                $result1 = mysqli_query($con,$qry1);
                
            }
            echo "<script>alert('marks added' )</script>";}
        }
                else
                {
                     echo "<script>alert('Error.' )</script>";
                    echo '<script>window.location="examination_Schedule.php"</script>';
                }
            }
    else
    {
        header('location:../admin/marks.php');
    }
?>