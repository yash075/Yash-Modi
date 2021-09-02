<?php	
    $con = mysqli_connect('localhost','root','','shopss');
     
    if(!$con)
    {
        die('connect error:'.mysqli_connect_errno().mysqli_connect_errno());
    }
?>