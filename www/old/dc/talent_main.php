<?php
$name = $_REQUEST['name'];
$db_server = "localhost";
$db_name = "B98db";
$db_user = "B98users";
$db_passwd = "B98users123";
$db_link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name,$db_link);
mysql_query("SET NAMES 'big5'");
$require="select * from talent";
$ask=mysql_query($require,$db_link);
?>
<html>
<head>
<title>�~���޲z</title>
<meta content="text/html"; charset="big5"; http-equiv="Content-Type";>
</head>
<body>
<?php include("talent_top.php");?>
<table border="1" width="100%" align="left">
<tr><td>�ǥͩm�W</td><td>�w�˯Z</td><td>�^��Z</td><td>���ܯZ</td><td>�@��Z</td><td>���N�Z</td><td>�ƾǯZ</td></tr>
<?php
while($row = mysql_fetch_object($ask)){
	echo "<tr>";
	echo "<td>".$row->Sname."</td>";
	echo "<td>".$row->Tdc."</td>";
	echo "<td>".$row->Tenglish."</td>";
	echo "<td>".$row->Tspeaking."</td>";
	echo "<td>".$row->Twriting."</td>";
	echo "<td>".$row->Tart."</td>";
	echo "<td>".$row->Tmath."</td>";
	echo "</tr>";
}
?>	
</table>
</body>
</html>