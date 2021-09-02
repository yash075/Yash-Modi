<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            include '../admin/connection.php';
            //$duplication = array();
            $inserted_data = array();
            $not_inserted_data = array();
            for($i=1,$j=1;isset($_POST['date'.$i]);$i++)
            {
                 for(;isset($_POST['f_id'.$i.$j]);$j++)
                 {
                     $f_id = $_POST['f_id'.$i.$j];
                     $b_arr_id = substr($f_id,strpos($f_id,"-")+1);
                     $f_id = substr($f_id,0,strpos($f_id,"-"));
                     
                    $qry1 = "UPDATE block_arrangement SET f_id='$f_id' where b_arr_id='$b_arr_id';";
                    $result1 = mysqli_query($con,$qry1);
                    if($result1)
                    {
                         $inserted_data[] = $b_arr_id;
                    }
                    else
                    {
                        $not_inserted_data[] = $b_arr_id;
                    }
                 }
               
            }
            
            if(count($not_inserted_data) != 0)
            {
                for($i=0,$data="";$i<count($not_inserted_data);$i++)
                {
                    $data = $data.",".$not_inserted_data[$i];
                }
                echo "<script>alert('$data'+' Not Updated the data.' )</script>";
            }
            
                
                if(count($inserted_data) != 0)
            {
                for($i=0,$data="";$i<count($inserted_data);$i++)
                {
                    $data = $data.",".$inserted_data[$i];
                }
                echo "<script>alert('Inserted Successfully' )</script>";
            }
            if(count($inserted_data) != 0 or count($inserted_data)!=0)
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