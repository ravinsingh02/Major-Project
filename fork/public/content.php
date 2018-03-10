<?php
$subject=$_GET["subject"];

switch($subject)
{
	case 1:include("post_project.php");
		break;
	case 2:include("my_project.php");
		break;
	case 3:include("browse_freelancer.php");
		break;
	case 4:include("profile.php");
		break;		
	default:include("logout.php");		
		break;
	}
?>