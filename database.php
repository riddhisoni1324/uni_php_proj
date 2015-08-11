<?php

$hostname="localhost";
$username="root";
$password="";

$my_db="uni_wifi";

if(!@mysql_connect($hostname,$username,$password) || !@mysql_select_db($my_db))
{
die(mysql_error());
}
else
{
	// echo "connection done!!!!!";
	
}
?>