<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>程式執行</title>
</head>
<body>
<br>
<?php
echo '執行程式';
$aCommand= 'c:/Python32/python.exe C:/AppServ/www/download_page/dictionary_rt_sqlite.py';
$aCommand= system($aCommand);
?>
</body>
</html>