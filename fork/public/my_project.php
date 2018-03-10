<?php 
//outpput buffereing starts
ob_start();


require_once("../includes/database_connection.php");
require_once("../includes/layout/functions.php");
confirm_logged_in();
?>
<?php 
//adding header
//include("../includes/layout/header.php");
ob_end_flush();
?>
<?php
$subject=$_GET["subject"];
?>
<html>
<head>
  <title>

  </title>
  <link href="stylesheets/post_project.css" media="all" rel="stylesheet" type="text/css">

</head>
<body>
<div id="header">
	<a href="fakemanage_content.php" id="home">	<h1 >Online Job Portal </h1></a>
	<div id="logout"><a href="logout.php">Logout</a></div>	
	</div>
<!---main body---->
	<div id="main" >
	<table class="contenttable" align="center">
	<tr>
	<th>Project Type</th>
	<th>Project Name</th>
	</tr>
	
	<?php
	//output project of users
	$userid=$_SESSION["user_id"];
	
	$my_project=my_project($userid);
	while($get_project=mysqli_fetch_assoc($my_project))
		{
	?>
	
	<tr>
	<td>
	<?php 
		echo $get_project["project_type"].":";
	?>	
	</td>
	<td>
	<a href="my_projectdetail.php?project_id=<?php echo $get_project["projectid"]?>">
	<?php
	echo $get_project["title"];
	?>
	</a>
	</td>
	</tr>
	<?php
		}
	?>
	
	</table>
	
	</div>

<div  id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
