<?php 
require_once 'dbconnect.inc.php';
include_once 'functions.php';

session_start();

if(!isset($_POST['title'],$_POST['synopsis'],$_POST['trailer'])){
	header("Location: index.php");
	exit();
}

printDebug("Uploading file...");

//================= picture upload

// URL to "borrowed" code
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));

$index = 'file';

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES[$index]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES['file']["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      	
		//$safe_name = str_replace(" ","_",$_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "images/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
//================= picture upload

$picture = $_FILES["file"]["name"];

$title =  mysql_real_escape_string($_POST['title']);
$synopsis =  mysql_real_escape_string(htmlspecialchars($_POST['synopsis']));
$trailer =  mysql_real_escape_string($_POST['trailer']);

$sql = "INSERT INTO movies2013 (`id`,`name`,`synopsis`,`trailer`,`picture`)
			VALUES ('','$title','$synopsis','$trailer','$picture')";
$ok = mysql_query($sql);

$sql = "SELECT * FROM movies2013 ";

printDebug($sql);
if($ok){
	$msg = stripslashes($title)." added!";
}else{
	$msg = "Error! ".mysql_error();
}

$_SESSION['msg'] = $msg;
echo $msg;
header("Location: index.php");
exit();