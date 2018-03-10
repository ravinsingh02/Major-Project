<?php
require_once("../includes/database_connection.php");
ob_start();
?>
<?php
require_once("../includes/layout/functions.php");
?>
<?php
confirm_logged_in();
$id=$_SESSION["user_id"];

$userid=$_GET["userid"];
$projectid=$_GET["projectid"];

if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$email=$_POST["emailid"];
	$contact=$_POST["contact"];
	
	insertinto_apply($id,$userid,$projectid,$username,$email,$contact);
}
?>


<?php
//adding header
include("../includes/layout/header.php");
?>

<!---main body---->
	<div id="main" >
	<div class="frontpage" align="center">
	
	please sign up(all field are mandatory)
	<form action="apply.php?userid=<?php echo $userid;?>&projectid=<?php echo $projectid;?>" method="post">
	<table>
	<tr>
	<td>Name:</td>
	<td><input type="text" name="username" value="" ></td>
	</tr>
	<tr>
	<td>Email-id:</td>
	<td><input type="text" name="emailid" value="" ></td>
	<tr>
	<tr>
	<td><h5>(email id will be used as userid)</h5></td>
	<td>&nbsp;</td>
	</tr>
	<td>Contact no.:</td>
	<td><input type="text" name="contact" value=""></td>

	<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	
	<td><input type="submit" value="submit" name="submit"></td>
	</tr>
	</table>
	</form>
	</div>

<div id="page" id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>