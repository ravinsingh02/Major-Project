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
delete_my_details($userid,$projectid);
redirect_to("fakemanage_content.php")
?>