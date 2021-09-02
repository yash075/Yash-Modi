<?php	
    $con= mysqli_connect('localhost','root','','cvl');
     
    if(!$con)
    {
        die('connect error:'.mysqli_connect_errno().mysqli_connect_errno());
    }
?>