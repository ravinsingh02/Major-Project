<?php
require_once("../includes/database_connection.php");
ob_start();
?>
<?php
require_once("../includes/layout/functions.php");
?>
<?php
	
if(isset($_POST["submit"]))
	{
	$password=$_POST["password"];
	$confirm_password=$_POST["confpassword"];
	$username=$_POST["username"];
	$userid=$_POST["emailid"];
	if(signup_validation() )
	{
	if($password==$confirm_password)
	{
	$encrypt_password=password_encrypt($password);
	 
	$query="insert into user(userid,username,password) values ('{$userid}','{$username}','{$encrypt_password}')";
	$user_data=mysqli_query($connection,$query);
	
		header("Location:exit.php");	
	}
	else
	{
     header("Location:signup.php");
	}
	
	}
	}
else
{
	//$head="please sign up(all field are mandatory) ";
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
	<form action="signup.php" method="post">
	<table>
	<tr>
	<td>User Name:</td>
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
	<td>Password:</td>
	<td><input type="password" name="password" value=""></td>
	<tr>
	<td>Confirm-Password:</td>
	<td><input type="password" name="confpassword" value=""></td>
	</tr>
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