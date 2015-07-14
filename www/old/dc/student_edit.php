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
$require="select * from student, parent, sp where student.Sname=sp.Sname and parent.Pname=sp.Pname and Sn=".$id."";
$ask=mysql_query($require,$db_link);
$row = mysql_fetch_object($ask);
echo $row->Sn;
echo $row->Pn;
echo $row->SPn;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>學生註冊</title>
</head>
<body>
<form name="student_regist" method="POST" action="student_edit_save.php?sid=<?php echo $row->Sn;?>&pid=<?php echo $row->Pn;?>&spid=<?php echo $row->SPn;?>">
<table border="1" width="100%" align="left">
	<tr>
		<td colspan="2" align="center">學生註冊系統</td>
	</tr>
	<tr>
		<td>學生姓名</td>
		<td><input name="student_name" type="text" value="<?php echo $row->Sname;?>" ></td>
	</tr>
	<tr>
		<td>學生性別</td>
		<td><input type="text" name="student_sex" value="<?php echo $row->Ssex;?>"></td>
	</tr>
	<tr>
		<td>學生生日</td>
		<td><input type="date" name="student_bday" value="<?php echo $row->Sbirth;?>"></td>
	</tr>
	<tr>
		<td>就讀學校</td>
		<td><input name="student_school" type="text" value="<?php echo $row->Sschool;?>"></td>
	</tr>
	<tr>
		<td>就讀班級</td>
		<td><input name="student_class" type="text" value="<?php echo $row->Sclass;?>"></td>
	</tr>
	<tr><td colspan="2" align="center">學生家長</td></tr>
	<tr>
		<td>家長姓名</td>
		<td><input name="parent_name" type="text" value="<?php echo $row->Pname;?>"></td>
	</tr>
	<tr>
		<td>家長性別</td>
		<td><input type="text" name="parent_sex" value="<?php echo $row->Psex;?>"></td>
	</tr>
	<tr>
		<td>家裡電話</td>
		<td><input name="parent_hphone" type="text" value="<?php echo $row->Phphone;?>"></td>
	</tr>
	<tr>
		<td>家長手機</td>
		<td><input name="parent_cphone" type="text" value="<?php echo $row->Pcphone;?>"></td>
	</tr>
	<tr>
		<td>工作類型</td>
		<td><input name="parent_work" type="text" value="<?php echo $row->Pwork;?>"></td>
	</tr>
	<tr>
		<td>親子關係</td>
		<td><input name="parent_relation" type="text" value="<?php echo $row->SPrelation;?>"></td>
	</tr>
	<tr><td colspan="2" align="right"><input type="submit" value="送出"></td></tr>
</table>

</form>
</body>
</html>
