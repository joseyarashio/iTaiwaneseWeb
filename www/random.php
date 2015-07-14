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
				
		$result=mysqli_query($link,"SELECT `id` FROM `file`");
		while ($row = mysqli_fetch_row($result)){ 
			mysqli_query($link,"UPDATE `file` SET `accesskey`='".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122))."' WHERE `id`='".$row[0]."'");
		}
		deleteDirectory("./tmp");
		mkdir("./tmp");

		
		
		header("Location:editablepage.php");
	}
	function deleteDirectory($dir) {  
			if (!file_exists($dir)) return true;  
			if (!is_dir($dir) || is_link($dir)) return unlink($dir);  
				foreach (scandir($dir) as $item) {  
					if ($item == '.' || $item == '..') continue;  
					if (!deleteDirectory($dir . "/" . $item)) {  
						chmod($dir . "/" . $item, 0777);  
						if (!deleteDirectory($dir . "/" . $item)) return false;  
					};  
				}  
				return rmdir($dir);  
		}  
			


?>