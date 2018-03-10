<?php
require_once("../includes/database_connection.php");

?>
<?php
require_once("../includes/layout/functions.php");
?>
<?php
confirm_logged_in(); 
?>
<?php
$message="";
if(isset($_POST["submit"]))
{   
	$subjectname=$_POST["subject"];
	$positionvalue=$_POST["position"];
	$visibilityvalue=$_POST["visibility"];
	$newsubject=add_subject($subjectname,$positionvalue,$visibilityvalue);
	if($newsubject!=null)
	{
		$message="Subject Created";
	}
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
	<div id="page">
	<h2>Create Navigation Subject</h2>
	<h3><?php echo $message;?></h3>
	<form action="createsubject.php" method="post">
	<table>
	<tr><td><h3>Subject:&nbsp;</h3></td>
		<td><input type="text" value="" name="subject"></td>
	</tr>
	<tr><td><h3>Position:&nbsp;</h3></td>
		<td><select value="" name="position">
		<option name="1">1</option>
		<option name="1">2</option>
		<option name="1">3</option>
		<option name="1">4</option>
		<option name="1">5</option>
		<option name="1">6</option>
		<option name="1">7</option>
		<option name="1">8</option>
		</select></td>
	</tr>
	<tr><td><h3>Visibility:&nbsp;</h3></td>
		<td>
		<select value="" name="visibility">
		<option name="1">0</option>
		<option name="1">1</option>
		
		</select>
		</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td><input type="submit" value="Add Subject" name="submit"></td>
	</tr>
	</table>
	</form>
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
