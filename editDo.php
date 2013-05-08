<?php
// includes for funtioncs, classes, libraries
include_once 'functions.php';
require_once 'dbconnect.inc.php';

// controller logic
session_start();
$msg = "";
/*
 * Verify ID
 * */
if (!isset($_POST['id'])) {
    // set a message for the user
    // tell them that something went wrong
    // redirect
    redirect("index.php");
}
if(!is_numeric($_POST['id'])){
    $_SESSION['msg'] = "ID not found!";
    redirect("index.php");
}elseif ($_POST['id'] < 1){
    redirect("index.php");
}
//verify if there's a entry with id
$id = mysql_real_escape_string($_POST['id']);
$sql = "select * from movies2013 WHERE `id`='$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result)<1){
    $_SESSION['msg'] = "ID not identified!";
    redirect("index.php");
}

/*
 * Picture Upload
 * */
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 20000)
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
//        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//        echo "Type: " . $_FILES["file"]["type"] . "<br>";
//        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            //echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "images/" . $_FILES["file"]["name"]);
            //echo "Stored in: " . "images/" . $_FILES["file"]["name"];
        }
    }
} else {
    //echo "Invalid file";
}
//================= picture upload end

$sql = sprintf("UPDATE movies2013 SET
					`name`='%s',
					`synopsis`='%s',
					`trailer`='%s',
					`picture`='%s'
				WHERE `id`='%d'",
    mysql_real_escape_string($_POST['title']),
    mysql_real_escape_string($_POST['synopsis']),
    mysql_real_escape_string($_POST['trailer']),
    mysql_real_escape_string($_FILES["file"]["name"]),
    mysql_real_escape_string($_POST['id'])
);

$ok = mysql_query($sql);

if ($ok) {
    $msg .= $_POST['title'] . " edited!";
} else {
    $msg .= "Error! " . mysql_error();
}

$_SESSION['msg'] = $msg;
redirect("index.php");