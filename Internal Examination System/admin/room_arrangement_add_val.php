<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $name = $_REQUEST['name'];
           
            include '../admin/connection.php';
            $name = strtoupper($name);
            $qry = "select * from room_arrangement where r_name='$name';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Room Name Already Add.')</script>";
                echo '<script>window.location="../admin/room_arrangement_add.php"</script>';
            }
            else
            {
            
                $qry1 = "insert into room_arrangement values ('NULL','$name');";
                $result1 = mysqli_query($con,$qry1);
                if($result1 )
                {
                    echo "<script>alert('Insert Successfully')</script>";
                    echo '<script>window.location="../admin/room_arrangement.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong to add Room please check it.')</script>";
                    echo '<script>window.location="../admin/room_arrangement_add.php"</script>';
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