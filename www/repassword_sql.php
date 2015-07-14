<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if($_POST['pass']!=$_POST['repass']){
		echo"<script>alert(\"密碼與確認密碼不一致\");</script>";
		header("Refresh:0;url=repassword.html");
		exit();
	}
	mysqli_query($link,'SET NAMES utf8');
	$result=mysqli_query($link,"SELECT * FROM `account` WHERE `account`='".$_COOKIE['Account']."' and `password`='".$_POST['prepass']."'");
	$row = @mysqli_fetch_row($result);
	
	if($row[0]==""){
		echo"<script>alert(\"密碼錯誤\");</script>";
		header("Refresh:0;url=repassword.php"); 
		
	}
	else{
		echo"<script>alert(\"修改成功\");</script>";
		mysqli_query($link,"UPDATE `account` SET `password`='".$_POST['pass']."' WHERE `account`='".$_COOKIE['Account']."'");
		header("Refresh:0;url=setting.php"); 
	}

?>