<?php date_default_timezone_set("Asia/Calcutta");?>
<html>
	<head>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="idcard.css">
        <style>
           input {
                   border:none;
           }
        </style>
	</head>
	<body>
<a href="../visitor/visit.php"><i class="fa fa-arrow-left"></i>Back</a>
        <div class="card1" style="    background-color: white;
    height: 420px;
    width: 300px;
    position: absolute;
    margin: auto;
    top: 0;
    bottom: 120;
    left: 0;
    right: 0;
    border-radius: 10px;
    box-shadow: 5px 5px 15px 10px #262626;
    font-family: serif;">
            <div class="upper" style="height: 150px;
    width: 300px;
    background-color: #4158d0;
    background-image: linear-gradient(43deg,#4158d0 0%,#c850c0 30%,#ffcc70 66%);
    border-radius: 10px 10px 0px 0px;"><br>
               <center> <img src="<?php echo "/cvtb/admin_cvms/admin/".$row['img'];?>" style="border-radius: 50px;
    position: relative;  width: 90px;
    height: 90px;
    top: 60px;
    left: 2px;
    border: 7px solid white;
    outline: none;"></center>
            </div>
            <br><br>
            <center><input type="text" id="t1" value="CVTB" style="font-size: 19px;text-align: center;"></center>
            <center> 
            <div class="details" style="position: relative;
    top: 8px;
    font-size: 18px;
    color: gray;">
     &nbsp;&nbsp;<i class="fa fa-user " aria-hidden="true"></i>&nbsp; &nbsp;<input type="text"  id="t1" value="<?php echo $row['name'];?>" readonly><br>
        &nbsp;<i class="fa fa-edit " aria-hidden="true"></i>&nbsp; <input type="text"  id="t1" value="<?php echo $row['reason']." (".$row['e_name'].")";?>" readonly><br>
        &nbsp;<i class="fa fa-briefcase" aria-hidden="true"></i> &nbsp;&nbsp;<input type="text" id="t1" value="<?php echo $row['description'];?>" readonly><br>
        &nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;<input type="text" id="t1" value="<?php echo $row['email'];?>" readonly><br>
        &nbsp;<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;  &nbsp;<input type="text" id="t1" value="<?php echo $row['mob'];?>" readonly><br>
        &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; &nbsp;<input type="text" id="t1" value="<?php echo $row['date'];?>" readonly><br>
        &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; &nbsp;<input type="text" id="t1" value="<?php if( date($row['time'])>=13 ||  date($row['time'])<24){echo date($row['time'])." PM";}else{echo date($row['time'])." AM";}?>" readonly>
            </div>
</center>
        </div>
        
        </body>
</html>
