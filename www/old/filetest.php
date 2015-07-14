<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>統計音節</title>
</head>

<body><br>
<?php ##if(count($_POST)>0){ foreach($_POST as $k=>$v){ echo $k."=".$v; } } ?>
<br>
<?php 
if($_POST["submit"]=="統計"){
	$item2 = $_POST ["item1"];
	$url=implode("&",$item2); 
	$url=str_replace(" ","%20",$url);
	
	$aCommand= 'c:/Python33/python.exe C:/AppServ/www/syllable.py ' .$url;
	$aReturn= system($aCommand);
	echo $aCommand."<br>";
	echo $aReturn;
	}
?>

<form action="" method="post" name="form1">
	<hr>
		<h3>DaAi</h3>
		<table border=1>
		<td>
		<a href='..GitRepos\finish\DaAi\vvrs01-20130301 (20130316)-0416.trs.wav'>vvrs01</a>
		</td>
		<td>
		<a href='http://140.109.18.117/trs1.html?/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs'>vvrs01-20130301 (20130316)-0416.trs</a>
		</td>
		<td>
		<input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs">
		</td>
		<tr>
		<td><a href='..GitRepos\finish\DaAi\vvrs04-20130309(0324)-20130420.trs.wav'>vvrs04</a></td>
		<td><a href='http://140.109.18.117/trs1.html?/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs'>vvrs04-20130309(0324)-20130420.trs</a></td>
		<td>
		<input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs">
		</td>
		<tr>
		<td><a href='..GitRepos\finish\DaAi\vvrs07-20130308(0404)-0422.trs.wav'>vvrs07</a></td>
		<td><a href='http://140.109.18.117/trs1.html?/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs'>vvrs07-20130308(0404)-0422.trs</a></td>
		<td>
		<input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs">
		</td>
		<tr>
		<td><a href='..GitRepos\finish\DaAi\vvrs10-20130311(0411)-0425.trs.wav'>vvrs10</a></td>
		<td><a href='http://140.109.18.117/trs1.html?/GitRepos/finish/DaAi/vvrs10-20130311(0411)-0425.trs'>vvrs10-20130311(0411)-0425.trs</a></td>
		<tr>
		<td><a href='..GitRepos\finish\DaAi\vvrs13.wav'>vvrs13</a></td>
		<td><a href='http://140.109.18.117/trs1.html?/GitRepos/finish/DaAi/vvrs13-20130317-0408-20130423.trs'>vvrs13-20130317-0408-20130423.trs</a></td>
		<tr>
		</table>
	<input name="submit" type="submit" value="統計"><br>
	</form>
</body>
</html>