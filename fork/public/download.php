<?php

if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database

//include 'library/config.php';
//include 'library/opendb.php';
$id    = $_GET['id'];
global $connection;
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = mysqli_query($connection,$query);
list($name, $type, $size, $content) =                                  mysql_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

//include 'library/closedb.php'; 
exit;
}

?>
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
global $connection;
$query = "SELECT id, name FROM upload";
$result= mysqli_query($connection,$query) ;
if(mysql_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysql_fetch_array($connection,$result))
{
?>
<a href="download.php?id=<?php=$id;?>"><?php=$name;?></a> <br>
<?php 
}
}

?>
</body>
</html>