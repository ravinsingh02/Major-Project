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
if(isset($_GET["subject"]))
{
	$selected_subject_id=$_GET["subject"];
	$selected_page_id=null;
}
elseif(isset($_GET["page"])) 
{
	$selected_page_id=$_GET["page"]	;
	$selected_subject_id=null;
}
else
{
	$selected_subject_id=null;
	$selected_page_id=null;
	}
//see details

?>
<?php
//adding header
include("../includes/layout/header.php");
?>

<!---main body---->
	<div id="main">
	<div id="navigation">
	<ul class=subjects>
	<?php
	$subject_set =find_all_subjects();
	?>
		<?php
	
		while($subjects=mysqli_fetch_assoc($subject_set))
		{
		//output data from each row
		?>
		<li>
		
		
		<a href="content.php?subject=<?php echo urlencode($subjects["id"]);?>">
		<?php
		echo $subjects["menu_name"];
		?>
		</a>
		
		

		</li>
		<br/>
		<?php
			}
		?>
		<?php
		mysqli_free_result($subject_set);
		?>
	</ul>
	</div>
	<div id="page">
	<h2>Notification</h2>
	<ul>
	<?php
	//echo $selected_subject_id;
	//echo "</br>";
	//echo $selected_page_id;
	$userid=$_SESSION["user_id"];

	$apply_set=output_applied($userid);
	while($applied=mysqli_fetch_assoc($apply_set))
		{
	
			$project_id=$applied["projectid"];
			$project_set=output_project($project_id);
			while($project=mysqli_fetch_assoc($project_set))
			{
				echo "<li>".$applied["name"]." has applied for your project named ".$project["project_type"]."</li>";
				
				echo "<a href=\"seedetails.php?id=".$applied["id"]."\"><input type=\"submit\" value=\"See Details\" name=\"seedetail\"></a>";
			}
		}
	?>
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
