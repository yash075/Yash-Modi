<?php 
    if(isset($_POST['submit'])){
	session_start();
	session_destroy();
	header('location:../user/log_shop/indexshop.php');
	}else{
		header('location:../user/log_shop/indexshop.php');
	}
?>