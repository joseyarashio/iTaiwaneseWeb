<html>
<head><meta content="text/html"; charset="big5"; http-equiv="Content-Type";></head>
<body>
<a href="index.php">�^����</a>
<a href="school_grade_edit.php?name=">�s�W�Ҹզ��Z</a>
<form name="schoolList" method="POST" >
<table border="1" width="100%" align="left">
<tr><td>�ǥͩm�W</td><td>�Ҹդ��</td><td>��y</td><td>�ƾ�</td><td>�ͬ�</td><td>�^��</td><td>����</td></tr>
<?php
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name,$db_link);
mysql_query("SET NAMES 'big5'");
$require="select * from grade";
$ask=mysql_query($require,$db_link);
while($row = mysql_fetch_object($ask)){
	echo "<tr>";
	echo "<td>";
	echo $row->Sname;
	echo "</td>";
	echo "<td>";
	echo $row->Gtime;
	echo "</td>";
	echo "<td>";
	if($row->Gchinese<60)
		echo "<font color=red>".$row->Gchinese."</font>";
	else
		echo $row->Gchinese;
	echo "</td>";
	echo "<td>";
	if($row->Gmath<60)
		echo "<font color=red>".$row->Gmath."</font>";
	else
		echo $row->Gmath;
	echo "</td>";
	echo "<td>";
	if($row->Glife<60)
		echo "<font color=red>".$row->Glife."</font>";
	else
		echo $row->Glife;
	echo "</td>";
	echo "<td>";
	if($row->Genglish<60)
		echo "<font color=red>".$row->Genglish."</font>";
	else
		echo $row->Genglish;
	echo "</td>";
	echo "<td>";
	$avg = ($row->Gchinese+$row->Gmath+$row->Glife+$row->Genglish)/5;
	if($avg <60)
		echo "<font color=red>".$avg."</font>";
	else
		echo $avg;
	echo "</td>";
	echo "<td><a href='school_grade_edit.php?name=".$row->Sname."'>Edit</a></td>";
	echo "</tr>";
}
?>
</table>
</form>
</body>
</html>