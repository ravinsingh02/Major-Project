<?php
function confirm_query($result)
{
	if(!$result)
	{
		die("database query failed");
	}
}



//password encryption 
function password_encrypt($password)
{
	$hash_format="$2y$10$";
	$salt="Salt22CharactersOrMoregasdasdgh";
	$format_and_salt=$hash_format.$salt;
	$hash=crypt($password,$format_and_salt);
	
	return $hash;
}


function signup_validation()
{
	if($_POST["password"]!=null && $_POST["username"]!=null && $_POST["emailid"]!=null && $_POST["confpassword"]!=null)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

?>
<?php
//------------------------------------------------------------------------------------------------------------
?>
<?php


function find_all_subjects()
{
	global $connection;
	$query="select * from subjects where visible=1";
	$subject_set1=mysqli_query($connection,$query);
	confirm_query($subject_set1);
	return $subject_set1;
}




function find_pages_for_subject($subject_id)
{			
			global $connection;
			$query="select * from pages where subject_id={$subject_id} and visible=1";
			$page_set=	mysqli_query($connection,$query);
			confirm_query($page_set);
			return $page_set;
}


function verify_password($password,$userid)
{	global $connection;
	$query="select userid,password from user where userid='{$userid}' and password='{$password}'";
	$user_data=mysqli_query($connection,$query);
	if($user_data!=null)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
function redirect_to($destination)
{
	header("Location:".$destination);
}

function attempt_login($user_id,$password)
{
	$hash_format="$2y$10$";
	$salt="Salt22CharactersOrMoregasdasdgh";
	$format_and_salt=$hash_format.$salt;
	$hash=crypt($password,$format_and_salt);
	
	
	global $connection;
	$query="select userid,password from user where userid='{$user_id}' and password='{$hash}'";
	$user_data=mysqli_query($connection,$query);
	return $user_data;
}
function validity($user_id,$password)
{
	if($user_id!=null && $password!=null)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

function confirm_logged_in()
{
session_start();
if(!isset($_SESSION['user_id']))
{
	header("Location:login.php");
}
}


?>

