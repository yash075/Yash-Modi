<!DOCTYPE html>
<html>
<head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>
<body>

<!--<h2>Dropdown Menu</h2>
<p>Move the mouse over the button to open the dropdown menu.</p>-->

<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <ul class="dropdown-content">
<?php include "../user/connection.php";
$sql = "select * from course;";
$result = mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result))
					{?>

    <!--<a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>-->
    <li value="<?php echo $row['course_code'];?>"><?php echo $row['course_code'];?></li>
                    <?php }?>

  </ul>
</div>

<!--<p><strong>Note:</strong> We use href="#" for test links. In a real web site this would be URLs.</p>-->

</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_dropdown_button by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:02:57 GMT -->
</html>
<!--
<?php/*
			function fil(){
				if(isset($_POST["submit"])){
					if(isset($_POST["val"])){
						$value=$_POST["val"];
						$sql1="select subject.*,semester.*,course.* from subject inner join semester on semester.sem_id=subject.sem_id inner join course on course.course_id=semester.course_id  where course.course_code like '$value%' OR semester.sem_code like '%$value%' OR sub_code like lower('___$value%') OR sub_type like '%$value%' order by subject.sub_code;";
						return $sql1;
					}
				}
			}
		*/?>
<!--<form action="" method="post">
                             //filter
								<select name="val" onclick="return fil()"style="width:30%;float:left;align:left;background-color:darkseagreen">
									<option value="">---select filter---</option>
                                    <option disabled="disabled" style="background-color:#2e3842;color:white;">****select course****</option>
									<?php /*$sql = "select * from course;";
										  $result = mysqli_query($con,$sql); 
										  while($row=mysqli_fetch_assoc($result)){?>
										  <option value="<?php echo $row['course_code'];?>"><?php echo $row['course_name'];?></option>
										  <?php }*/?>	  
                                    <option disabled="disabled" style="background-color:#2e3842;color:white;">****select subject type****</option>
									<?php/* $sql = "select distinct(sub_type) from subject;";
										  $result = mysqli_query($con,$sql); 
										  while($row=mysqli_fetch_assoc($result)){?>
										  <option value="<?php echo $row['sub_type'];?>"><?php echo $row['sub_type'];?></option>
										  <?php }*/?>	
                                          <option disabled="disabled" style="background-color:#2e3842;color:white;">****select subject Grade****</option>
										  <option value="A">A</option>
										  <option  value="B">B</option> 
								</select>&nbsp;&nbsp;
								<input type="submit" value="filter" name="submit"  style="background-color:darkcyan;color:black;">
								<input type="text" value="<?php //echo strval(fil());?>" name="query">
</form>-->-->