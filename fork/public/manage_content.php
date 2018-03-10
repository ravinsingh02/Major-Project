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

?>
<?php
//adding header
include("../includes/layout/adminheader.php");
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
		
		<?php 
		echo "<li";
		
		if($subjects["id"]==$selected_subject_id)
		{	
		echo  "class=\"selected\"";
		}
		echo ">"; 
		
		?>
		
		<a href="<?php echo $subjects["menu_name"];?>?subject=<?php echo urlencode($subjects["id"]);?>">
		<?php
		echo $subjects["menu_name"];
		?>
		</a>
		
		<?php
			$page_set= find_pages_for_subject($subjects["id"]);
		?>
		
		<ul class="pages">
		
		<?php
		while($page=mysqli_fetch_assoc($page_set))
		{
		?>
		<?php 
		echo "<li";
		
		if($page["id"]==$selected_page_id)
		{	
		echo  "class=\"selected\"";
		}
		echo ">"; 
		
		?>
		
		<a href="manage_content.php?page=<?php echo urlencode($page["id"]);?>">
		<?php
		echo $page["menu_name"];
		?>
		</a>
		</li>
		
		<?php
		}
		?>
		<?php
		mysqli_free_result($page_set);
		?>
		</ul>
		</li>
		
		<?php
			}
		?>
		<?php
		mysqli_free_result($subject_set);
		?>
	</ul>
	</div>
	<div id="page">
	<h2>manage Admins</h2>
	<ul class="managecontent">
	<li><h3><a href="manageadmin.php?id=1&msg=0">Manage Admins</a></h3></li>
	<li><h3><a href="createsubject.php?id=2">Create New Subject</a></h3></li>
	<li><h3><a href="deletesubject.php?id=3">Delete Subject</a></h3></li>
	</ul>
	
	<?php
	//echo $selected_subject_id;
	//echo "</br>";
	//echo $selected_page_id;
	?>
	</div>
	</div>
	
	<div id="page" id="footer">
	copyright ravindra singh
	</div>

<?php 
include("../includes/layout/footer.php");
?>
