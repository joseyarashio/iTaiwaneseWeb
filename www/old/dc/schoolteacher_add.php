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
<title>�ǮզѮv�s�譶��</title>
</head>
<body>
<form name="student_regist" method="POST" action="school_regist_save.php">
<table border="1" width="50%" align="left">
	<tr>
		<td colspan="2" align="center">�ǮզѮv���</td>
	</tr>
	<tr>
		<td>�Ѯv�m�W</td>
		<td><input name="schoolTeacher_name" type="text" value="<?php echo $row->HTname;?>" ></td>
	</tr>
	<tr>
		<td>�Ѯv�ʧO</td>
		<td><input type="radio" name="schoolTeacher_sex" value="�k">�k<input type="radio" name="schoolTeacher_sex" value="�k">�k</td>
	</tr>
	<tr>
		<td>�s���q��</td>
		<td><input type="text" name="schoolTeacher_phone" value="<?php echo $row->HTphone;?>"></td>
	</tr>
	<tr>
		<td>���оǮ�</td>
		<td><input name="schoolTeacher_school" type="text" value="<?php echo $row->HTschool;?>"></td>
	</tr>
	<tr>
		<td>�ɮv�Z��</td>
		<td><input name="schoolTeacher_class" type="text" value="<?php echo $row->HTtutor;?>"></td>
	</tr>
	<tr><td colspan="2" align="right"><input type="submit" value="�e�X"></td></tr>
</table>

</form>
</body>
</html>
