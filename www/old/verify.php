<?php
include_once("connectdb.php");
$queryString = $_SERVER['QUERY_STRING'];
echo $queryString.'<br/>';
$queryString =explode('~',$queryString);
$query = "SELECT * FROM user WHERE username='".$queryString[0]."' LIMIT 1";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
echo $queryString[0].'<br/>';
echo $queryString[1].'<br/>';
echo $row['verifykey'].'<br/>';

if($row['verifykey']==$queryString[1])
{
	$query="UPDATE user SET verify=1 WHERE username='".$queryString[0]."' AND verifykey='".$queryString[1]."'";
	mysql_query($query);
	echo "verify success";
}
/***
while($row = mysql_fetch_array($result)){
	if ($queryString == $row["activationkey"])
	{
		echo "Congratulations!" . $row["username"] . " is now the proud new owner of a YOURWEBSITE.com account.";
		$sql="UPDATE users SET activationkey = '', status='activated' WHERE (id = $row[id])";
		if (!mysql_query($sql)) 
		{
			die('Error: ' . mysql_error());
		}
	}
}
***/
?>
