<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> PHP表單傳遞實例3 </title>
</head>
<body>
<h1>檔案下載</h1>
<h2>透過 右鍵點選連結 開啟選單 並選擇另存新檔 下載</h2>
表單傳來了變數:<br>
<?php if(count($_POST)>0){ foreach($_POST as $k=>$v){ echo $k."=".$v; } } ?>
<br><br>
<?php if($_POST["submit"]=="買東西"){ //如果買東西
//秀出買的東西
echo "你買了:".$_POST["item1"];
?>
<br>
<?php
echo "數量  :".$_POST["unit1"];
?><br />
<?php
echo "你買了:".$_POST["item2"];
?>
<br>
<?php
echo "數量  :".$_POST["unit2"];
?>
<br />
<?php
echo "謝謝光臨"; 
}else if($_POST["submit"]=="不買"){ echo "不買請走開，別礙著做生意呢!";} ?>
<hr>
<form action="" method="post" name="form1">
<input name="item1" type="checkbox" id="item1" value="wii"> 
wii   
<input name="unit1" type="text" id="unit1">
<br>
<input name="item2" type="checkbox" id="item2" value="手把">
手把 
<input name="unit2" type="text" id="unit2">
<br>
<br>
<input name="submit" type="submit" value="買東西">---<input name="submit" type="submit" value="不買">
</form>
</body>
</html>