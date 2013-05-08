<?php 
require_once 'dbconnect.inc.php';

session_start();

if(!isset($_POST['id'])){
	// set a message for the user
	// tell them that something went wrong
	// redirect 
	header("Location: index.php");
	exit();
	
}


//================= picture upload
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
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

/*
$sql = "update movies2013 set `name`='$title',`synopsis`='$synopsis',`trailer`='$trailer',`picture`='$picture'
			where `id`='$id'";

			
$id = mysql_real_escape_string($_POST['id']);
$title =  mysql_real_escape_string(htmlspecialchars($_POST['title']));
$synopsis =  mysql_real_escape_string(htmlspecialchars($_POST['synopsis']));
$trailer =  mysql_real_escape_string(htmlspecialchars($_POST['trailer']));
 * 
*/

$sql = sprintf("UPDATE movies2013 SET 
					`name`='%s',
					`synopsis`='%s',
					`trailer`='%s',
					`picture`='%s'
				WHERE `id`='%d'",
					mysql_real_escape_string($title),
					mysql_real_escape_string($synopsis),
					mysql_real_escape_string($trailer),
					mysql_real_escape_string($picture),
					mysql_real_escape_string($id)
				);
			
			
$ok = mysql_query($sql);
if($ok){
	$msg = $title." edited!";
}else{
	$msg = "Error! ".mysql_error();
}

$_SESSION['msg'] = $msg;
echo $msg;
header("Location: index.php");
exit();
?>