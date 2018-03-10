<?php 
//outpput buffereing starts
ob_start();
require_once("../includes/database_connection.php");
require_once("../includes/layout/functions.php");
confirm_logged_in();
?>
<?php 

if(isset($_POST["submit"]))
{
	$project_class=$_GET["project_class"];

	$project_type=$_GET["project_type"];

	enter_project_detail($_POST["select"],$_POST["detail"],$_POST["from"],$_POST["to"],$_SESSION["user_id"],$project_type,$_POST["title"]);

	redirect_to("fakemanage_content.php");
}
?>
<?php 
//adding header
include("../includes/layout/project_detail_header.php");
ob_end_flush();
?>



	<tr>
	<td>what type of website do you like?</td>
	<td>
	<select name="select">
	<option value="i need a new website" name="option1">i need a new website.</option>
	<option value="i need an existing website rebuilt" name="option2">i need an existing website rebuilt.</option>
	<option value="i need a website fixed" name="option3">i need a website fixed.</option>
	<option value="not sure" name="option4">not sure</option>
	</select>
<?php
include("../includes/layout/project_detail_footer.php");
?>
<?php
	mysqli_close($connection);
?>
