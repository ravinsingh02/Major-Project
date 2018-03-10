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





function find_all_subjects()
{
	global $connection;
	$query="select * from subjects where visible=1 order by position";
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

function add_subject($subjectname,$positionvalue,$visibilityvalue)
{
			global $connection;
			$query="insert into subjects(menu_name,position,visible) values ('{$subjectname}',{$positionvalue},{$visibilityvalue})";
			$newsubject=mysqli_query($connection,$query);
			confirm_query($newsubject);
			return $newsubject;
}
function delete_subject($subjectname)
{
			global $connection;
			$query="delete from subjects where menu_name='{$subjectname}'";
			$exitsubject=mysqli_query($connection,$query);
			confirm_query($exitsubject);
			return $exitsubject;
}

function verify_password($password,$userid)
{	
	global $connection;
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

function enter_project_detail($select,$detail,$from,$to,$user_id,$project_type,$title)
{
			global $connection;
			$select.=" ";
			$select.=$detail;
			$from.="to";
			$from.=$to;
			echo $select;	
			echo $from;
			$query="insert into project_detail(userid,project_type,title,details,budget) values ('{$user_id}','{$project_type}','{$title}','{$select}','{$from}')";
			$detail_set=	mysqli_query($connection,$query);
			confirm_query($detail_set);
			
}
function my_project($userid)
{
			global $connection;
			
			$query="select * from project_detail where userid='{$userid}' ";
			$my_project=mysqli_query($connection,$query);
			
			confirm_query($my_project);
			return $my_project;
}
function my_projectdetail($userid,$projectid)
{
			global $connection;
			
			$query="select * from project_detail where userid='{$userid}' and projectid={$projectid}";
			$my_project=mysqli_query($connection,$query);
			
			confirm_query($my_project);
			return $my_project;
}
//update option
function edit_my_details($userid,$projectid,$show_title,$show_detail,$show_budget)
{           

			global $connection;
			
			$query="update project_detail set title='{$show_title}' ,details='{$show_detail}',budget='{$show_budget}' where userid='{$userid}' and projectid={$projectid}";
			$my_project=mysqli_query($connection,$query);
			
			confirm_query($my_project);
			//return $my_project;
}
function delete_my_details($userid,$projectid)
{
			global $connection;
			
			$query="delete from project_detail  where userid='{$userid}' and projectid={$projectid}";
			$my_project=mysqli_query($connection,$query);
			confirm_query($my_project);
}
function my_projectset($useridentity)
{
			global $connection;
			
			$query="select * from project_detail where userid !='{$useridentity}' ";
			$my_projectone=mysqli_query($connection,$query);
			
			confirm_query($my_projectone);
			return $my_projectone;
}
//admin credentials
function attempt_login_admin($user_id,$password)
{
	$hash_format="$2y$10$";
	$salt="Salt22CharactersOrMoregasdasdgh";
	$format_and_salt=$hash_format.$salt;
	$hash=crypt($password,$format_and_salt);
	
	
	global $connection;
	$query="select userid,password from admin where userid='{$user_id}' and password='{$hash}'";
	$user_data=mysqli_query($connection,$query);
	return $user_data;
}
function create_admin($userid,$name,$password)
{
	$hash_format="$2y$10$";
	$salt="Salt22CharactersOrMoregasdasdgh";
	$format_and_salt=$hash_format.$salt;
	$hash=crypt($password,$format_and_salt);
	
	
	global $connection;
	$query="insert into admin(userid,name,password) values('{$userid}','{$name}','{$hash}')";
	$user_data=mysqli_query($connection,$query);
	return $user_data;
}

function show_admin()
{
	global $connection;
	$query="select * from admin";
	$user_data=mysqli_query($connection,$query);
	return $user_data;	
}
function delete_admin($userid)
{
	global $connection;
	$query="delete from admin where userid='{$userid}'";
	$user_data=mysqli_query($connection,$query);
		
}
//insertion into apply table
function insertinto_apply($id,$userid,$projectid,$username,$email,$contact)
{
	global $connection;
	$query="insert into apply(id,userid,projectid,name,emailid,contactno) values('{$id}','{$userid}','{$projectid}','{$username}','{$email}','{$contact}')";
	$user_data=mysqli_query($connection,$query);
	redirect_to("browse_freelancerresult.php");
	
}
//inside fakemanage_content.php
function output_applied($userid)
{
	global $connection;
	$query="select * from apply where userid='{$userid}'";
	$apply_data=mysqli_query($connection,$query);
	return $apply_data;
}
function output_project($projectid)
{
			global $connection;
			
			$query="select * from project_detail where projectid='{$projectid}' ";
			$project_set=mysqli_query($connection,$query);
			
			confirm_query($project_set);
			return $project_set;
}
//inside seedetails.php
function output_apply($userid,$id)
{
			global $connection;
			
			$query="select distinct(id,userid,projectid,name,emailid,contactno) from apply natural join upload where id='{$id}' and userid='{$userid}' ";
			$applicant=mysqli_query($connection,$query);
			confirm_query($applicant);
			return $applicant;
}
//image insertion in testblob table
function insert_image($name,$image)
{
	global $connection;
	$query="insert into image(name,image) values ('$name','$image')";
	$result=mysqli_query($connection,$query);
	confirm_query($result);
			//return $applicant;
}

//profile pic and resume
function profileupdation($userid,$filename,$cv)
{
	global $connection;
	$query="insert into upload(userid,filename,cv) values ('$userid','$filename','$cv')";
	$result=mysqli_query($connection,$query);
	confirm_query($result);
	
}
function retrieveimage($userid)
{
	global $connection;
	$query="select * from upload where userid='$userid'";
	$result=mysqli_query($connection,$query);
	confirm_query($result);
	return $result;
	
}

?>

