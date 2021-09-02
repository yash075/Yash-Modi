<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $name = $_REQUEST['name'];
            $id = $_GET['id'];
           
            include '../admin/connection.php';
            $name = strtoupper($name);
            $qry = "select * from room_arrangement where r_name='$name' AND r_id='$id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Room Name Already Add.')</script>";
                echo '<script>window.location="../admin/room_arrangement.php"</script>';
            }
            else
            {
            
                $qry1 = "UPDATE `room_arrangement` SET `r_name`='$name' where r_id='$id';";
                $result1 = mysqli_query($con,$qry1);
                if($result1 )
                {
                    echo "<script>alert('Update Successfully')</script>";
                    echo '<script>window.location="../admin/room_arrangement.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong to update Room please check it.')</script>";
                    echo '<script>window.location="../admin/room_arrangement.php"</script>';
                }
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