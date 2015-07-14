<?php
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_query("SET NAMES BIG5");
mysql_select_db($db_name,$db_link);
$stuname=$_POST['student_name'];
$student="Insert into student(Sname,Ssex,Sbirth,Sschool,Sclass) 
Value('".$_POST['student_name']."','".$_POST['student_sex']."','".$_POST['student_bday']."','".$_POST['student_school']."','".$_POST['student_class']."')";
$parent="Insert into parent(Pname,Psex,Phphone,Pcphone,Pwork)
Value('".$_POST['parent_name']."','".$_POST['parent_sex']."','".$_POST['parent_hphone']."','".$_POST['parent_cphone']."','".$_POST['parent_work']."')";
$sp="Insert into sp(Sname,Pname,SPrelation)
Value('".$stuname."','".$_POST['parent_name']."','".$_POST['parent_relation']."')";
mysql_query($student);
//mysql_query("insert into student(Sname) Value('¦n«Ó')");
mysql_query($parent);
mysql_query($sp);
header("Location:student_main.php");
?> 
