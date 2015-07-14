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
		
		
		for($i=0;$i<count($result)-1;$i+=5){
			if($result[$i+4]!="NULL"){
				$endtimepart=explode(" ",$result[$i+4]);
				$endfrontpart=explode("/",$endtimepart[0]);
				$endtime=$endfrontpart[2]."-".$endfrontpart[0]."-".$endfrontpart[1]." ".$endtimepart[1].":00";
				mysqli_query($link,'UPDATE `file` SET `name`=\''.$result[$i+1].'\', `location`=\''.$result[$i+2].'\', `value`=\''.$result[$i+3].'\', `end`=\''.$endtime.'\' WHERE `id`=\''.$result[$i].'\'');
			}
			else{
				mysqli_query($link,'UPDATE `file` SET `name`=\''.$result[$i+1].'\', `location`=\''.$result[$i+2].'\', `value`=\''.$result[$i+3].'\', `end`=NULL WHERE `id`=\''.$result[$i].'\'');
			}
			
			
		}
		
		if(isset($_GET['orig'])){
			header("Location:./".$_GET['orig']); 
		}
		else{
			header("Location:./management_file.php?filebase=".$_GET['filebase']); 
		}
		
	}

?>