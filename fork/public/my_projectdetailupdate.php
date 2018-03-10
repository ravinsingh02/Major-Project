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
<?php
$projectid=$_SESSION["project_id"];
$userid=$_SESSION["user_id"];

if(isset($_POST["update"]))
{	
	$show_title=$_POST["show_title"];
	$show_detail=$_POST["show_detail"];
	$show_budget=$_POST["show_budget"];
	edit_my_details($userid,$projectid,$show_title,$show_detail,$show_budget);
}
?>
<!---------text field control----------->

<!------edit------>
<?php
	$disable_title="disabled";
if(isset($_POST["edit"]))
{
	$disable_title="enabled";
	$result=my_projectdetail($userid,$projectid);
	$project=mysqli_fetch_assoc($result);
		
}
else
{
//$_SESSION["project_id"]=$_GET["project_id"];
$userid=$_SESSION["user_id"];

$projectid=$_SESSION["project_id"];

$result=my_projectdetail($userid,$projectid);
$project=mysqli_fetch_assoc($result);
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
	<div class="container">
	<form action="my_projectdetailupdate.php" method="post">
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
	<input type="submit" name="update" value="OK">
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
