<?php session_start();
$id = $_REQUEST["id"];
if($id != ""){
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_query("SET NAMES BIG5");
mysql_select_db($db_name,$db_link);
$require="select * from student, parent, sp where student.Sname=sp.Sname and parent.Pname=sp.Pname";
$ask=mysql_query($require,$db_link);
$row = mysql_fetch_object($ask);
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�ǥ͵��U</title>
</head>
<body>
<form name="student_regist" method="POST" action="student_regist_save.php">
<table border="1" width="50%" align="left">
	<tr>
		<td colspan="2" align="center">�ǥ͵��U�t��</td>
	</tr>
	<tr>
		<td>�ǥͩm�W</td>
		<td><input name="student_name" type="text" value="<?php echo $row->Sname;?>" ></td>
	</tr>
	<tr>
		<td>�ǥͩʧO</td>
		<td><input type="radio" name="student_sex" value="�k">�k<input type="radio" name="student_sex" value="�k">�k</td>
	</tr>
	<tr>
		<td>�ǥͥͤ�</td>
		<td><input type="date" name="student_bday" value="<?php echo $row->Sbirth;?>"></td>
	</tr>
	<tr>
		<td>�NŪ�Ǯ�</td>
		<td><input name="student_school" type="text" value="<?php echo $row->Sschool;?>"></td>
	</tr>
	<tr>
		<td>�NŪ�Z��</td>
		<td><input name="student_class" type="text" value="<?php echo $row->Sclass;?>"></td>
	</tr>
	<tr><td colspan="2" align="center">�ǥͮa��</td></tr>
	<tr>
		<td>�a���m�W</td>
		<td><input name="parent_name" type="text" value="<?php echo $row->Pname;?>"></td>
	</tr>
	<tr>
		<td>�a���ʧO</td>
		<td><input type="radio" name="parent_sex" value="�k">�k<input type="radio" name="parent_sex" value="�k">�k</td>
	</tr>
	<tr>
		<td>�a�̹q��</td>
		<td><input name="parent_hphone" type="text" value="<?php echo $row->Phphone;?>"></td>
	</tr>
	<tr>
		<td>�a�����</td>
		<td><input name="parent_cphone" type="text" value="<?php echo $row->Pcphone;?>"></td>
	</tr>
	<tr>
		<td>�u�@����</td>
		<td><input name="parent_work" type="text" value="<?php echo $row->Pwork;?>"></td>
	</tr>
	<tr>
		<td>�ˤl���Y</td>
		<td><input name="parent_relation" type="text" value="<?php echo $row->SPrelation;?>"></td>
	</tr>
	<tr><td colspan="2" align="right"><input type="submit" value="�e�X"></td></tr>
</table>

</form>
</body>
</html>
