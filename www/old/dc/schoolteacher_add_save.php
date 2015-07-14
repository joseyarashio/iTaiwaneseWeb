<?php
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name,$db_link);
mysql_query("SET NAMES 'big5'");
$school="Insert into hahaoteacher(HTname,HTsex,HTphone,HTschool,HTtutor) 
Value('".$_POST['schoolTeacher_name']."','".$_POST['schoolTeacher_sex']."','".$_POST['schoolTeacher_phone']."','".$_POST['schoolTeacher_school'].",'".$_POST['schoolTeacher_class']."')";
mysql_query($school);
header("Location:school_main.php");
?> 
<html>
<meta content="text/html"; charset="big5"; http-equiv="Content-Type";>
</html>