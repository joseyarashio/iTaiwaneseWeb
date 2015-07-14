<?php session_start();
$id = $_REQUEST["id"];
if($id != ""){
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name,$db_link);
mysql_query("SET NAMES 'big5'");
$require="select * from hahaoteacher";
$ask=mysql_query($require,$db_link);
$row = mysql_fetch_object($ask);
}
?>
<html>
<head>
<meta content="text/html"; charset="big5"; http-equiv="Content-Type";>
<title>學校老師編輯頁面</title>
</head>
<body>
<form name="student_regist" method="POST" action="school_regist_save.php">
<table border="1" width="50%" align="left">
	<tr>
		<td colspan="2" align="center">學校老師資料</td>
	</tr>
	<tr>
		<td>老師姓名</td>
		<td><input name="schoolTeacher_name" type="text" value="<?php echo $row->HTname;?>" ></td>
	</tr>
	<tr>
		<td>老師性別</td>
		<td><input type="radio" name="schoolTeacher_sex" value="男">男<input type="radio" name="schoolTeacher_sex" value="女">女</td>
	</tr>
	<tr>
		<td>連絡電話</td>
		<td><input type="text" name="schoolTeacher_phone" value="<?php echo $row->HTphone;?>"></td>
	</tr>
	<tr>
		<td>任教學校</td>
		<td><input name="schoolTeacher_school" type="text" value="<?php echo $row->HTschool;?>"></td>
	</tr>
	<tr>
		<td>導師班級</td>
		<td><input name="schoolTeacher_class" type="text" value="<?php echo $row->HTtutor;?>"></td>
	</tr>
	<tr><td colspan="2" align="right"><input type="submit" value="送出"></td></tr>
</table>

</form>
</body>
</html>
