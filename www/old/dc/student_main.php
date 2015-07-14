<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5"></head>
<body>
<a href="index.php">回首頁</a>
<a href="student_regist.php?id=">新生註冊</a>
<form name="studentList" method="POST" >
<table border="1" width="100%" align="left">
<tr>
<td>學生姓名</td><td>性別</td><td>生日</td><td>學校</td><td>班級</td><td>家長姓名</td><td>與學生關係</td><td>家裡電話</td><td>手機</td><td>工作</td></tr>
<?php
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_query("SET NAMES BIG5");
mysql_select_db($db_name,$db_link);
$require="select * from student, parent, sp where student.Sname=sp.Sname and parent.Pname=sp.Pname";
$ask=mysql_query($require,$db_link);
while($row = mysql_fetch_object($ask)){
	
	echo "<tr>";
	echo "<td>";
	echo "<a href=talent_viewall.php?name=".$row->Sname.">";
	echo $row->Sname;
	echo "</a></td>";
	echo "<td>";
	echo $row->Ssex;
	echo "</td>";
	echo "<td>";
	echo $row->Sbirth;
	echo "</td>";
	echo "<td>";
	echo $row->Sschool;
	echo "</td>";
	echo "<td>";
	echo $row->Sclass;
	echo "</td>";
	echo "<td>";
	echo $row->Pname;
	echo "</td>";
	echo "<td>";
	echo $row->SPrelation;
	echo "</td>";
	echo "<td>";
	echo $row->Phphone;
	echo "</td>";
	echo "<td>";
	echo $row->Pcphone;
	echo "</td>";
	echo "<td>";
	echo $row->Pwork;
	echo "</td>";
	echo "<td><a href='student_edit.php?id=".$row->Sn."'>Edit</a></td>";
	echo "</tr>";
}
?>
</table>
</form>
</body>
</html>