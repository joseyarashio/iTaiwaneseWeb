<?php
	if(!isset($_COOKIE['Value'])||$_COOKIE['Value']!=10){
		//header("Location:login.php?error_message=�v������");
		echo"<script>alert(\"�v�������αb���w�n�X\");</script>";
		$url="�v�������αb���w�n�X";
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
		
		
		for($i=0;$i<count($result)-1;$i+=2){
			mysqli_query($link,'UPDATE `account` SET `value`=\''.$result[$i+1].'\' WHERE `account`=\''.$result[$i].'\'');
			
		}
		
		
		header("Location:management_admin.php");
	}

?>