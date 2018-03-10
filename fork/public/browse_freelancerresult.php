<?php 
//outpput buffereing starts
ob_start();


require_once("../includes/database_connection.php");
require_once("../includes/layout/functions.php");
confirm_logged_in();
?>
<?php 

$userid=$_SESSION["user_id"];
//echo "$userid";
$projectset=my_projectset($userid);

	ob_end_flush();

	?>
	


<html>
<head>
  <title>
	online job portal
  </title>
  <link href="stylesheets/post_project.css" media="all" rel="stylesheet" type="text/css">
  <link href="stylesheets/project_infopage.css" media="all" rel="stylesheet" type="text/css">
<link href="stylesheets/browse_freelancer
.css" media="all" rel="stylesheet" type="text/css">  
</head>
<body>
<div id="header">
<a href="fakemanage_content.php" id="home">	<h1 >Online Job Portal </h1></a>
<div id="logout"><a href="logout.php">Logout</a></div>	
	</div>
<!---main body---->
	<div id="main" >
<table>
	
	<?php
	
	while($projectresult=mysqli_fetch_assoc($projectset))
	{
		//getting details of project posted by other users table:project_details;
		$userid=$projectresult["userid"];
		$projectid=$projectresult["projectid"];
	echo "<tr class=\"projectdetails\" >";

	echo "<td > Title:  ".$projectresult["title"]."</td>";
	echo "<td > Details: ".$projectresult["details"]."</td>";
	echo "<td > Budget:  ".$projectresult["budget"]."</td>";
	echo "<td >"."<a href=\"apply.php?userid=$userid & projectid=$projectid\">"."<input type=\"submit\" name=\"apply\" value=\"Apply\">"."</td>";
	echo "</tr>";
	
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
</html>
