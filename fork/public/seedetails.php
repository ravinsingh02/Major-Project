<?php
require_once("../includes/database_connection.php");
ob_start();
?>
<?php
require_once("../includes/layout/functions.php");
?>
<?php
confirm_logged_in();
$userid=$_SESSION["user_id"];
$id=$_GET["id"];

?>


<?php
//adding header
include("../includes/layout/header.php");
?>

<!---main body---->
	<div id="main" >
	<div class="frontpage" align="center">
	
	
	
	<table>
	<?php
	$applicant=output_apply($userid,$id);
	while($details=mysqli_fetch_assoc($applicant))
		{
		
	?>
	
	<tr>
	<td>Name:</td>
	<td><input type="text" name="username" value="<?php echo $details["name"];?>" disabled></td>
	</tr>
	<tr>
	<td>Email-id:</td>
	<td><input type="text" name="emailid" value="<?php echo $details["emailid"];?>" disabled ></td>
	</tr>
	
	<tr>
	<td>
	cv:
	</td>
	<td>
	<input type="file" name="cvToUpload" id="cvToUpload">&nbsp;<a href="upload/<?php echo $details["cv"];?>" download>download cv</a>
	</td>
	<td>&nbsp;</td>
	</tr>
	<td>Contact no:</td>
	<td><input type="text" name="contact" value="<?php echo $details["contactno"];?>" disabled></td>
	<?php
		}
	?>
	</table>
	
	</div>

<div id="page" id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>