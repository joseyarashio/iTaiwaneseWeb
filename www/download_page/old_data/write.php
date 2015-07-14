<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>寫檔測試</title>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
</head>
<?php
if(@$_POST["send"]=="送出"){
	$fp = fopen('cmd', 'w');
	fwrite($fp, $_POST["txt"]);
	fclose($fp);
	}
?>
<body>
	<form method="post" name="myform">
		<input name="txt" type="text">
		<input name="send" type="submit" value="送出"><BR>
	</form>
</body>