<?php
require_once("../includes/database_connection.php");

?>
<?php
require_once("../includes/layout/functions.php");
?>
<?php
//confirm_logged_in(); 
?>
<?php

if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$userid=$_POST["userid"];
	$password=$_POST["password"];
	
	$userdata=create_admin($userid,$name,$password);
	$_SESSION["id"]=null;
	redirect_to("manageadmin.php?id=1&msg=1");
}
?>
<?php
//adding header
include("../includes/layout/adminheader.php");
?>

<!---main body---->
	<div id="main">
	<div id="navigation">
	
	</div>
	<div id="page" >
	<h2>manage Admins</h2>
	<div align="center" class="admin">
	<form action="createadmin.php" method="post" >
	<table >
	<tr>
	<td>Userid</td>
	<td><input type="text" value="" name="userid"></td>
	</tr>
	<tr>
	<td>Name</td>
	<td><input type="text" value="" name="name"></td>
	</tr>
	<tr><td>Password</td>
	<td><input type="password" value="" name="password"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td><input type="submit" value="Create Admin" name="submit"></td>
	</tr>
	</table>
	</form>
	</div>
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
