<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	
	
	$tdate=date("Y-m-d H:i:s");
	if(!isset($_COOKIE['Value'])||$_COOKIE['Value']!=10){
		
		echo"<script>alert(\"權限不足或帳號已登出\");history.go(-1)</script>";
	}
	else{
		$result=mysqli_query($link,"INSERT INTO `itaiwanese`.`account` (`account`, `password`, `value`,`date`,`redate`) VALUES ('".$_POST['R_Account']."', '".$_POST['R_Password']."', '".$_POST['R_Value']."', '".$tdate."', '".$tdate."');");
		if($result==""){
			echo"<script>alert(\"帳號已有人使用\");</script>";
			header("Refresh:0;url=addaccount.html"); 
			exit();
		}
		else{
			header("Location:management_admin.php"); 
		}
		mysqli_query($link,"INSERT INTO `itaiwanese`.`accountdata` (`account`, `name`, `idenity`,`email`,`phone`,`reason`) VALUES ('".$_POST['R_Account']."', '', '', '', '', '');");
	}
	mysqli_close($link);
?>