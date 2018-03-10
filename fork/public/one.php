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
	<h1>Online Job Portal </h1>
	</div>
<!---main body---->
	<div id="main" >
	
	
	

	</div>

<div  id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
