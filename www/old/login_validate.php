<?php
session_start(); 
include_once("connectdb.php");
?>
<?php

if (!empty($_POST['username']) or !empty($_POST['password'])) {

    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
 @$sql = "SELECT * FROM user WHERE username ='".$user."' AND password = '".$pass."' LIMIT 1";
 $res = mysql_query($sql) or die(mysql_error());
 if (mysql_num_rows($res) == 1) {
  $rows = mysql_fetch_assoc($res);
  $_SESSION['username'] = $rows['username'];
  if($rows['username']=='guest')
	header("location:cut0823-2.php");
  else
	header("location:cut0823.php");
 } else {
  echo "Invalid login information.";
  echo '<form action = "sinica_index.php" method = "get">
		<input type = "submit" value = "Back"></form>';
  exit();
 }
    } else {
      echo "Please input username and password!";
    }
?>
