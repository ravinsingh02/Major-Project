<?php //outpput buffereing starts
ob_start();
session_start();
require_once("../includes/database_connection.php");
?>

<?php
require_once("../includes/layout/functions.php");
?>
<?php
$userid=$_SESSION["user_id"];
$imagename="";

if(isset($_POST["submit"]))
	{
	
	$resultset=retrieveimage($userid);
	$image_name=mysqli_fetch_assoc($resultset);
	//echo $image_name["filename"];
	if(isset($image_name["filename"]))
	{
		$imagename=$image_name["filename"];
	}
}


?>


<?php 
ob_end_flush();
?>
<html>
<body>

<form action="getimage.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>&nbsp;</td>
<td><img src="uploads/<?php echo $imagename;?>" alt="Mountain View" style="width:50px;height:50px;">
</td>
<td>
	<td><input type="submit" value="Upload Image" name="submit"></td>
</td>
</tr>
<tr>
<td>
 user id:
</td>
<td>
<input type="text" name="username" value="<?php echo $userid;?>" disabled>
</td>

</tr>

<td>
CV
</td>
</tr>
<tr>
<td>&nbsp;</td>

</tr>
</table>
</form>
</body>
</html>

<?php
	mysqli_close($connection);
?>