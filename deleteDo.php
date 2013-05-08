<?php 
require_once 'dbconnect.inc.php';

session_start();

$id = mysql_real_escape_string($_GET['id']);

$sql = "delete from movies2013 where `id`='$id'";
$ok = mysql_query($sql);
$msg = "";

if($ok){
	$msg = "Deleted movie id=$id!";
}else{
	$msg = "Error! ".mysql_error();
}

$_SESSION['msg'] = $msg;
header("Location: all.php");
//echo $msg;
exit();