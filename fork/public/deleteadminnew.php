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

$admindetails=show_admin();

	$userid=$_GET["userid"];
	delete_admin($userid);
	redirect_to("deleteadmin.php");

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
	<h2>Delete Admins</h2>
	
	<table>
	<?php
	while($admin=mysqli_fetch_assoc($admindetails))
	 
	 {
	?>
	<tr>
	<td>Userid</td>
	<td><?php echo $admin["userid"];?></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td><a href="deleteadminnew.php?userid=<?php echo $admin["userid"];?>"><input type="button" value="Delete Admin" name="submit"></td>
	</tr>
	<?php
	}
	 ?>
	</table>
	
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
