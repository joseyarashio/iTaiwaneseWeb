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
		$orig=mysqli_query($link,"SELECT * FROM `value_c` WHERE `name`=\"valid_path\"");
		
		
		
		date_default_timezone_set('Asia/Taipei');
		
		
		$tdate=date("Y-m-d H:i:s");
		
		for($i=0;$i<count($result)-1;$i+=2){
			$row = @mysqli_fetch_row($orig);
			
			if($result[$i+1]!=$row[2]){
				mysqli_query($link,'UPDATE `value_c` SET `value`=\''.$result[$i+1].'\', date=\''.$tdate.'\' WHERE `id`=\''.$result[$i].'\'');
			}
		}
		
		
		header("Location:management_valid_path.php");
	}
	mysqli_close($link);

?>