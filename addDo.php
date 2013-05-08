<?php
// includes for funtioncs, classes, libraries
require_once 'dbconnect.inc.php';
include_once 'functions.php';

session_start();
$msg = "";
if (!isset($_POST['title'], $_POST['synopsis'], $_POST['trailer'])) {
    redirect("add.php");
}
if (empty($_POST['title']) || empty($_POST['synopsis']) || empty( $_POST['trailer'])) {
    $_SESSION['movie_title'] = $_POST['title'];
    $_SESSION['movie_synopsis'] = $_POST['synopsis'];
    $_SESSION['movie_trailer'] = $_POST['trailer'];
    $msg .= "Complete fields!";
    $_SESSION['msg'] = $msg;
    redirect("add.php");
}

//================= picture upload
printDebug("Uploading file...");
// URL to "borrowed" code
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));

if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES['file']["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    //&& ($_FILES["file"]["size"] < 20000)
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
//        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//        echo "Type: " . $_FILES["file"]["type"] . "<br>";
//        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";s
        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            //echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            //$safe_name = str_replace(" ","_",$_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "images/" . $_FILES["file"]["name"]);
            //echo "Stored in: " . "images/" . $_FILES["file"]["name"];
        }
    }
} else {
    //echo "Invalid file";
    $msg .= "Invalid file";
}
//================= picture upload

$sql = sprintf("INSERT INTO movies2013 (`id`,`name`,`synopsis`,`trailer`,`picture`)
			VALUES ('','%s','%s','%s','%s')",
    mysql_real_escape_string($_POST['title']),
    mysql_real_escape_string($_POST['synopsis']),
    mysql_real_escape_string($_POST['trailer']),
    mysql_real_escape_string($_FILES["file"]["name"])
);

$ok = mysql_query($sql);
if ($ok) {
    $msg .= $_POST['title']." added!";
} else {
    $msg .= "Error! " . mysql_error();
}

$_SESSION['msg'] = $msg;
redirect("index.php");
exit();