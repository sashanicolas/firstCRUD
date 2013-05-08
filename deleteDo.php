<?php
// includes for funtioncs, classes, libraries
include "functions.php";
require_once 'dbconnect.inc.php';

// controller logic
session_start();
$msg = "";
/*
 * Verify ID
 * */
if (!isset($_GET['id'])) {
    $_SESSION['msg'] = "Missing ID!";
    redirect("all.php");
}
if(!is_numeric($_GET['id'])){
    $_SESSION['msg'] = "ID not numerical or null!";
    redirect("all.php");
}elseif ($_GET['id'] < 1){
    $_SESSION['msg'] = "ID negative!";
    redirect("all.php");
}
$id = mysql_real_escape_string($_GET['id']);

$sqlFind = "SELECT * FROM movies2013 WHERE `id` = '$id'";
$resFind = mysql_query( $sqlFind );
if( mysql_num_rows( $resFind ) != 1 ){
    $_SESSION['msg'] = "ID not found!";
    redirect("all.php");
}
$sql = "delete from movies2013 where `id`='$id'";
$ok = mysql_query($sql);

if($ok){
	$msg .= "Deleted movie id=$id!";
}else{
	$msg .= "Error! ".mysql_error();
}

$_SESSION['msg'] = $msg;
redirect("all.php");