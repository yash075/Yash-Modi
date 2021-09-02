<?php	
    $con = mysqli_connect('localhost','root','','oservices');
     
    if(!$con)
    {
        die('connect error:'.mysqli_connect_errno().mysqli_connect_errno());
    }
?>