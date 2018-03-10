<?php //outpput buffereing starts
ob_start();
session_start();
require_once("../includes/database_connection.php");
?>

<?php
require_once("../includes/layout/functions.php");
?>

<?php
 $userid=$_SESSION["user_id"];
//image

 function picreload()
 {	$userid=$_SESSION["user_id"];
    $resultset=retrieveimage($userid);
	$image_name=mysqli_fetch_assoc($resultset);
	//echo $image_name["filename"];
	if(isset($image_name["filename"]))
	{
		$imagename=$image_name["filename"];
	}
	else
	{
		$imagename="a.jpeg";
	}
     return $imagename;
 }
  function cvload()
 {	
	$userid=$_SESSION["user_id"];
    $resultset1=retrieveimage($userid);
	$cv_name=mysqli_fetch_assoc($resultset1);
	
	if(isset($cv_name["cv"]))
	{
		$cvname=$cv_name["cv"];
	}
	else
	{
		$cvname="notfound";
	}
     return $cvname;
 }
 $imagename=picreload();
 $cvname=cvload();
if(isset($_POST["submit"])) {
	$filename=$_FILES["fileToUpload"]["name"];
	$cvname=$_FILES["cvToUpload"]["name"];
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$target_file_cv = $target_dir.basename($_FILES["cvToUpload"]["name"]);
$uploadOk = 1;
$uploadOk_cv = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType_cv = pathinfo($target_file,PATHINFO_EXTENSION);
//insertion into database
profileupdation($userid,$filename,$cvname);


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if (file_exists($target_file_cv)) {
    echo "Sorry, file already exists.";
    $uploadOk_cv = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($_FILES["cvToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk_cv = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($uploadOk_cv == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["cvToUpload"]["tmp_name"], $target_file_cv)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 $imagename=picreload();
  $cvname=cvload();
}   
else
{

	
}

?>

<?php //adding header

include("../includes/layout/header.php");
ob_end_flush();
?>

<!---main body---->




	<div id="main" >
	<div id="front" align="center">
	
	<form action="aaa.php" method="post" enctype="multipart/form-data">
	<div id="image"> <img src="uploads/<?php echo $imagename;?>" alt="profileimage" style="width:80px;height:80px;"></div>
	<table>
	<tr>

	
	<tr>
	<td>&nbsp;</td>
	<td>
	<input type="file" name="fileToUpload" id="fileToUpload">
	</td>

	</tr>
	
	<tr>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>
	User-id &nbsp;
	</td>
	<td>
	<input type="text" value="<?php echo $userid; ?>" disabled>
	</td>
    </tr>
	<tr>
	<td>&nbsp;</td>
	<tr>
	<td>
	CV
	</td>
	<td>

	<input type="file" name="cvToUpload" id="fileToUpload">&nbsp;&nbsp;<a href="upload/<?php echo $cvname;?>" download>download cv</a>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<tr>
	<td>&nbsp;</td>
	<td>
	<input type="submit" value="Upload " name="submit">
	</td>
	</tr>
	
	</table>
</form>

	</div>
	</div>

<div id="page" id="footer">

</div>
	<?php
	mysqli_close($connection);
	?>
</body>
