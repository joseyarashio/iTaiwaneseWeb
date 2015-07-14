<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>mygetfilem.php</title>
	<meta http-equiv="refresh" content="3;url=../index.php"> 
</head>

<body>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_FILES['btFilenameL']['name'] as $id => $name) {
        $aTmpName= $_FILES['btFilenameL']['tmp_name'][$id];
        $aSaveName= '.' .$name;
        
        //rename($aTmpName, $aSaveName);         // 檔案存在時有warning
        //move_uploaded_file($aTmpName,$aSaveName); // 好像是蓋下去，沒warning
        echo "<p>$aTmpName ---> $aSaveName</p>";
        
        if (file_exists($aSaveName)){
                $aCommand= 'c:/Python32/python.exe program43.py ' .$aSaveName;
                $aReturn= system($aCommand, $aParam);
                echo '<p>'; 
                echo '<br>aCommand= '  .$aCommand;
                echo '<br>aParam= '    .$aParam;
                echo '<br>aReturn= '   .$aReturn;
                echo '</p>'; 
        }
    } 
}
?>

</body>
</html>