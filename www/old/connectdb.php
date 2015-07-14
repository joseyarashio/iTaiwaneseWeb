<?php


$host = "localhost";
$username = "root";
$password = "0000";
$db = "login";


mysql_connect($host, $username, $password);
mysql_select_db($db) or die(mysql_error());
?>