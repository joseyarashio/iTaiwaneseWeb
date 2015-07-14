<?php
	if(!isset($_COOKIE['Value'])||$_COOKIE['Value']!=10){
		//header("Location:login.php?error_message=權限不足");
		echo"<script>alert(\"權限不足或帳號已登出\");</script>";
		$url="權限不足或帳號已登出";
		$EncodeStr=urlencode($url);
		header("Refresh:0;url=login.php?error_message=$EncodeStr");
	}
	else{
		$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		mysqli_query($link,'SET NAMES utf8');
		
		$result=explode("!!!",$_POST['PostValue']);
		mysqli_query($link,'UPDATE `value` SET `value`=\''.$result[0].'\' WHERE `name`=\'home_row\'');
		mysqli_query($link,'UPDATE `value` SET `value`=\''.$result[1].'\' WHERE `name`=\'home_type\'');
		
		
		header("Location:management_web.php");
	}

?>