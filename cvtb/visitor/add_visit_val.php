<?php
include('includes/dbconnection.php');

    if(isset($_POST['submit']))
  {

$vid=$_POST['id'];
//die($vid);
$department=$_POST['department_id'];
$employee=$_POST['employee_id'];
$resce=$_POST['res'];
$date=$_POST['date'];
$time=$_POST['time'];
        //echo $vid.','.$employee.','.$res.','.$date.','.$time;
       $q1="SELECT * FROM `schedule_visitor` WHERE v_id='$vid' and e_id='$employee' and reason='$resce' and date='$date' and time='$time'";
    $resq=mysqli_query($con,$q1);
        $no = mysqli_num_rows($resq);
       // echo $no;
        if($no=='0'){
            
        $qqq1 = "INSERT INTO `schedule_visitor` VALUES(NULL,'$vid','$employee','$resce','$date','$time');";
        $quer= mysqli_query($con,$qqq1);
    if ($quer) {
         $q2="SELECT * FROM `schedule_visitor` WHERE v_id='$vid' and e_id='$employee' and reason='$resce' and date='$date' and time='$time'";
         //die($q2);
       
         $res=mysqli_query($con,$q2);
        $row=mysqli_fetch_assoc($res);
        $id=$row["sch_vi_id"];
        $query1=mysqli_query($con,"insert into visit_record (sch_v_id,status) values ('$id','0')");
        //die("insert into visit_record (sch_v_id,status) values ('$id','0')");
        if ($query1) {
            echo "<script>alert('Record inserted.')</script>";
            echo "<script>window.location='add_visit.php'</script>";
  }
    }
  else
    {
      die($quer);
      echo "<script>alert('Something Went Wrong. Please try again.')</script>";
                    echo "<script>window.location='add_visit.php'</script>";
    }
            
    }
       else{
                  echo "<script>alert('Record alredy add.')</script>";
                    echo "<script>window.location='add_visit.php'</script>";
    }
        
        
  
} 
 ?>