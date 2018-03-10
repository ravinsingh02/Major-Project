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
	
	$exitsubject=delete_subject($subjectname);
	if($exitsubject!=null)
	{
		$message="Subject Deleted";
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
	<h2>Delete Navigation Subject</h2>
	<h3><?php echo $message;?></h3>
	<form action="deletesubject.php" method="post">
	<table>
	<tr><td><h3>Subject:&nbsp;</h3></td>
		<td><input type="text" value="" name="subject"></td>
	</tr>
	
	
	<tr>
	<td>&nbsp;</td>
	<td><input type="submit" value="Delete Subject" name="submit"></td>
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
