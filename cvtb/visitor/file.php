<?php
	
$s = $_SESSION["username"];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) == 'upload')
{
var_export($_POST); 
$allowedExts = array("pdf", "doc", "docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("resume/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "resume/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "resume/" . $_FILES["file"]["name"];
      $sql = mysqli_query($con,"update visitor_log_detail 
      set info='".$_FILES["file"]["name"]."' where v_id='".$_SESSION['username']."'");
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
include "connection.php";
?>
<form action="update_file.php" method="post"  enctype="multipart/form-data">
<input type="file" name="file" id="file">
<input type="submit" name="submit" value="upload" />
</form>
<?php 
 $id1=$_SESSION['username'];
$sql="SELECT info FROM visitor_log_detail WHERE username='$id1'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{?>
<br/>
<br/>
<table cellpadding="5" cellspacing="3" style="border:1px solid #808080;" width="100%">
<tr>
<td class="blaaa"><b>Resume</b></td><td class="blaaa"><a href="uploads/<?php echo $row['info']; ?>" target="_blank">View Here</a></td></tr>
<?php
}
?></table>