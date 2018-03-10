<?php //outpput buffereing starts
ob_start();
session_start();
require_once("../includes/database_connection.php");
?>

<?php
require_once("fakefunction.php");
?>

<?php
    
	$message="Enter userid/password";
	if(isset($_POST["submit"]))
	{
		//in case login is attempted
	  $user_id=$_POST["userid"];
	  $password=$_POST["password"];
	  $a=validity($user_id,$password);
	  
	if($a)
	{   
		
		$user_data=attempt_login($user_id,$password);
		$row=mysqli_fetch_assoc($user_data);
		
		
		
		if($row["userid"]!=null)
		{      
			$_SESSION['user_id']=$user_id;
			$destination="manage_content.php";
				
			redirect_to($destination);
		
		}
		else
		{
			$message="Enter valid Userid/Password";
			$destination="fakelogin.php";
			redirect_to($destination);
		}
	}
	else
	{
		$message="Enter valid Userid/Password";
	}
		
	}
	else
	{
		$message="Enter  Userid/Password";
	}

?>

<?php //adding header

include("../includes/layout/header.php");
ob_end_flush();
?>

<!---main body---->
	<div id="main" >
	<div id="front" align="center">
	<form action="fakelogin.php" method="post">
	<table>
	
	<?php echo "$message";?></td>
	
	<tr>
	<td>User-id:</td>
	<td><input type="text" name="userid" value="" ></td>
	<tr>
	<td>Password:</td>
	<td><input type="password" name="password" value=""></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td><input type="submit" value="submit" name="submit"></td>
	
	</form>
	</div>

<div id="page" id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
