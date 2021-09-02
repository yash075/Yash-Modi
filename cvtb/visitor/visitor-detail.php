<?php 
	session_start();
	
	$s = $_SESSION["cvmsaid"];
	if($s == TRUE)
	{
?>

				 <?php //include "../visitor/navigation.php";
				 include('includes/dbconnection.php');?> 
        
                 <!-- Main -->

                                       

   <?php
$id=$_GET['editid'];
$ret=mysqli_query($con,"select schedule_visitor.*,visitor_log_detail.*,employee.* from schedule_visitor inner join 
visitor_log_detail on schedule_visitor.v_id=visitor_log_detail.v_id join employee on schedule_visitor.e_id=employee.e_id where schedule_visitor.sch_vi_id='$id' AND schedule_visitor.date>=CURDATE()");

$cnt=1;
$no=mysqli_num_rows($ret);
if($no<=0){
    echo "<a href='visit.php'>Back</a>";
    echo "<center style='margin-top:100px;'> Visit Left</center>";
}else{
$row=mysqli_fetch_array($ret);
    
    include "idcard/idcard.php";                                      
}                                                                                      
 ?>
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
