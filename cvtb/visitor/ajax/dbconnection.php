<?php	
    $con= mysqli_connect('localhost','root','','cvtb');
     
    if(!$con)
    {
        die('connect error:'.mysqli_connect_errno().mysqli_connect_errno());
    }
?>