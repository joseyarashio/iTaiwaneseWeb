<html>
<head><meta content="text/html"; charset="big5"; http-equiv="Content-Type";></head>
<body>
<a href="index.php">�^����</a>
<a href="school_regist.php?id=">�s�W�Ѯv</a>
<form name="schoolList" method="POST" >

<table border="1" width="100%" align="left">
<tr>
<td>�Ѯv�m�W</td><td>�ʧO</td><td>�s���q��</td><td>���оǮ�</td><td>�ɮv�Z��</td></tr>
<?php
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name,$db_link);
mysql_query("SET NAMES 'big5'");
$require="select * from hahaoteacher";
$ask=mysql_query($require,$db_link);
while($row = mysql_fetch_object($ask)){
	
	echo "<tr>";
	echo "<td>";
	echo $row->HTname;
	echo "</td>";
	echo "<td>";
	echo $row->HTsex;
	echo "</td>";
	echo "<td>";
	echo $row->HTphone;
	echo "</td>";
	echo "<td>";
	echo $row->HTschool;
	echo "</td>";
	echo "<td>";
	echo $row->HTtutor;
	echo "</td>";
	echo "<td><a href='school_regist.php?id=".$row->HTn."'>Edit</a></td>";
	echo "</tr>";
}
?>
</table>
</form>
</body>
</html>