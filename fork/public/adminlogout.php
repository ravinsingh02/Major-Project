<?php
require_once("../includes/layout/functions.php");
?>
<?php
//destroying session
if(!($_SESSION["user_id"]))
{
session_start();
$_SESSION["user_id"]=null;
redirect_to("adminlogin.php");
}
else
{
redirect_to("manage_content.php");	
}
?>