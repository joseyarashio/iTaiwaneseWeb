<?php
$sid = $_REQUEST["sid"];
$pid = $_REQUEST["pid"];
$spid = $_REQUEST["spid"];
$db_server = "localhost";
$db_name = "B98db";
$db_user = "root";
$db_passwd = "0000";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_query("SET NAMES BIG5");
mysql_select_db($db_name,$db_link);
//mysql_query("SET NAMES 'UTF8'");
$stuname=$_POST['student_name'];
$student="update student
SET Sname='".$_POST['student_name']."',Ssex='".$_POST['student_sex']."',Sbirth='".$_POST['student_bday']."',Sschool='".$_POST['student_school']."',Sclass='".$_POST['student_class']."'
where Sn=".$sid.""; 
$parent="update parent
SET Pname='".$_POST['parent_name']."',Psex='".$_POST['parent_sex']."',Phphone='".$_POST['parent_hphone']."',Pcphone='".$_POST['parent_cphone']."',Pwork='".$_POST['parent_work']."'
where Pn=".$pid."";
$sp="update sp
SET Sname='".$stuname."',Pname='".$_POST['parent_name']."',SPrelation='".$_POST['parent_relation']."'
where SPn=".$spid."";
mysql_query($student);
//mysql_query("insert into student(Sname) Value('¦n«Ó')");
mysql_query($parent);
mysql_query($sp);
header("Location:student_main.php");
?>