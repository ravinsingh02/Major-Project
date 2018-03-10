<?php 
//outpput buffereing starts
ob_start();


require_once("../includes/database_connection.php");
require_once("../includes/layout/functions.php");
confirm_logged_in();
?>
<?php 

ob_end_flush();
?>

<!---------text field control----------->

<!------edit------>
<?php
	$disable_title="disabled";
if(isset($_POST["edit"]))
{
	$projectid=$_SESSION["project_id"];
	$userid=$_SESSION["user_id"];

	$disable_title="enabled";
	$result=my_projectdetail($userid,$projectid);
	$project=mysqli_fetch_assoc($result);
	//edit_my_details($userid,$projectid);	
}
else
{
		$_SESSION["project_id"]=$_GET["project_id"];
		$userid=$_SESSION["user_id"];

		$projectid=$_GET["project_id"];

$result=my_projectdetail($userid,$projectid);
$project=mysqli_fetch_assoc($result);
}
?>
<!-----delete------>
<?php
if(isset($_POST["delete"]))
{
	delete_my_details($userid,$projectid);
}
?>
<html>
<head>
  <title>

  </title>
  <link href="stylesheets/post_project.css" media="all" rel="stylesheet" type="text/css">
  <link href="stylesheets/project_infopage.css" media="all" rel="stylesheet" type="text/css">	
</head>
<body>
<div id="header">
<a href="fakemanage_content.php" id="home">	<h1 >Online Job Portal </h1></a>
<div id="logout"><a href="logout.php">Logout</a></div>	
	</div>
<!---main body---->
	<div id="main" >
	<form action="my_projectdetailupdate.php" method="post">
	<div class="container">
	
	<div id="buddy1">
	<div id="child1">Title:</div>
	<div >
	<input type="text" name="show_title" value=<?php echo $project["title"];?> <?php echo "$disable_title";?> id="child2">
	
	</div>
	</div>
	<div id="buddy2" >
	<div id="child3">Project Detail:</div>
	<div >
	<textarea name="show_detail"  <?php echo "$disable_title";?> id="child4"><?php echo $project["details"];?></textarea>

	</div>
	</div>
	<div id="buddy3" >
	<div id="child5">Budget:</div>
	<div >
	<input type="text" name="show_budget" value=<?php echo $project["budget"];?> <?php echo "$disable_title";?> id="child6">
	
	</div>
	</div>
	
	<div id="buddy4" >
	<div class="buddy41">
	<input type="submit" name="edit" value="edit">
	</div>
	</form>
	<form action="my_projectdetaildelete.php" action="post">
	<div class="buddy41">
	<input type="submit" name="delete" value="delete">
	</div>
	</form>
	</div>
	</div>
	</div>
<div  id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
