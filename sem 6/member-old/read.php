<?php 
	session_start();
	
	$s = $_SESSION["user"];
	$id1=$_SESSION["id"];
	if($s == TRUE)
	{
?>
<html>
<title>Shop Serenity - Description</title>
        <body>
            <?php 
                include 'include/connection.php';
                $shop=$_GET['shop'];
                $query=mysqli_query($con,"select * from shop where shop_id='$shop';");
                while($row=mysqli_fetch_assoc($query)){ ?>
                <div style="background-color:black; color:white; padding:20px; text-align:center;">
<?php
                        echo ucfirst($row['description']);
               ?></div><?php }
            ?>      
        </body>
</html>
<?php 
	}
	else
	{
		header('location:logout.php');
	}
?>