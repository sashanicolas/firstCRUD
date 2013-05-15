<?php
// Set up db connection
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "test";

//attempt to connect
$dbLink = mysql_connect($dbHost,"$dbUser","$dbPassword");
if(!is_resource($dbLink)){
	die("Could not connect!");
}
//attempt to select database
$dbSelectOK = mysql_select_db($dbName,$dbLink);
if(!$dbSelectOK){
	die("Cant use db :".mysql_error());
}









