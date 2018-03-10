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
	
	<table class="table">
	<tr class="row_content">
	<td id="tile1">
	<a href="show.php?project_class=1&project_type=website">Website</a>
	</td>
	<td id="tile2">
	Graphics Design
	</td>
	<td id="tile3">
	Software
	</td>
	</tr>
	<tr class="row_content">
	<td id="tile4">
	Data entry
	</td>
	<td id="tile5">
	Sales
	</td><td id="tile6">
	Business
	</td>
	</tr>
	<tr class="row_content">
	<td id="">
	
	</td>
	</tr>
	
	</table>
	

	</div>

<div  id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
