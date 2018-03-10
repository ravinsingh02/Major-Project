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
$id=$_GET["id"];
$_SESSION["id"]=$id;
if($_GET["msg"]==1)
{
	$message="Admin has been created";
}
?>
<?php
$include_element="";
if(isset($_GET["idevent"]))
{ 
	$idevent=$_GET["idevent"];
	if($idevent==01)
	{
		$include_element=include("createadmin.php");
	}
	if($idevent==02)
	{
		$include_element=include("deleteadmin.php");
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
	<ul class=subjects>
	<li><a href="createadmin.php?id=<?php echo $id;?>&idevent=01&msg=0">Create admin</li>
	<li><a href="deleteadmin.php?id=<?php echo $id;?>&idevent=02&msg=0">Delete admin</li>
	</ul>
	
	</div>
	<div id="page">
	<h2>Manage Admins</h2>
	<?php
	echo $message;
	echo $include_element;
	?>
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
