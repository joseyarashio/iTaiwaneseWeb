<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	$url=$_GET["url"];
	#$url=str_replace(" ","%20",$url);
	#$aCommand= 'c:/Python32/python.exe C:/AppServ/www/download_page/dictionary.py trsDic ' .$url;
	#$aReturn= system($aCommand);
	try
	{
		unlink("c:".$url."~");
	}
	catch(Exception $e)
	{
		echo $url.' no file';
	}
	$fp = fopen('cmd', 'w');
	fwrite($fp,"trsDic\t".$url);
	fclose($fp);
	#$i=0;
	#echo $aReturn."<br>*".$url;
	#header('Location: http://140.109.18.117/trs.html?'.$url.'~');
	#while(! file_exists('C:'.$url.'~')){
	#	sleep(1);
	#	echo $i;
	#	$i++;
	#}
	$count=0;
	while (!file_exists ("c:".$url.'~') and $count<5)
	{
		echo 'http://140.109.18.117'.$url.'~';
		sleep(1);
		$count++;
	}
	if ($count>=5)
	{
		#echo '執行程式';
		#$aCommand= 'c:/Python32/python.exe C:/AppServ/www/download_page/dictionary_rt_sqlite.py';
		#$aCommand= system($aCommand);
		#echo "<script type='text/javascript'>";
		#echo "window.open('http://140.109.18.117/download_page/runpy.php','','width=100,height=100');";
		#echo "</script>";
		pclose(popen('c:/Python32/python.exe C:/AppServ/www/download_page/dictionary_rt_sqlite.py &', 'r'));
		header('Location: http://140.109.18.117/download_page/dic2trs.php?url='.$url);
	}
	else
	{
		header('Location: http://140.109.18.117/download_page/trs.html?'.$url.'~&');
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>聽打檔案查詢</title>
</head>
<body>
<br>
</body>
</html>