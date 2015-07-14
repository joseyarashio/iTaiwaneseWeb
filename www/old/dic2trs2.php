<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>聽打檔案查詢</title>
</head>
<body>
<br>
<?php
	$url=$_GET["url"];
	$url=str_replace(" ","%20",$url);
	$aCommand= 'c:/Python32/python.exe C:/AppServ/www/download_page/dictionary.py trsDic ' .$url;
	$aReturn= system($aCommand);
	echo $aCommand."<br>".$aReturn."<br>*".$url;
	#header('Location: http://140.109.18.117/trs.html?'.$url.'~');
?>
</body>
</html>