<?php 

		//要換成accesskey版本請將 4,5行註解去掉 ,並在wamp 控制面板選擇 apache->httpd.conf->ctrl+f 找2014->找到forbidden->把下面註解去掉->控制面板->重新啟動所有服務 
		//header("Location:editablepage_accesskey.php");
		//exit();
		/*
		如果要禁止訪問更多資料夾則新增
		<Directory "禁止訪問位置">
		Options Indexes FollowSymLinks 
		AllowOverride None 
		Order allow,deny 
		Deny from all 
		</Directory> 
		*/
		$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($link,'SET NAMES utf8');
		
		if(isset($_COOKIE['Account'])){
			$result=mysqli_query($link,"SELECT  `value` FROM `account` WHERE `account`='".$_COOKIE['Account']."'");
			$row = mysqli_fetch_row($result);
			if($row[0]==""){
				$value=0;
			}
			else{
				$value=$row[0];
			}
		}
		else{
			$value=0;
		}
		$result=mysqli_query($link,"SELECT  `value` FROM `web` WHERE `location`='./editablepage.php'");
		$row = mysqli_fetch_row($result);
		if($value<$row[0]){
			echo"<script>alert(\"權限不足或帳號已登出\");</script>";
			$url="權限不足或帳號已登出";
			$EncodeStr=urlencode($url);
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','".$ip."','./editablepage.php','".$datetime."')");
			header("Refresh:0;url=../login.php?error_message=$EncodeStr");
			exit();
		}
	?><?php

	
	
	
	echo"<!DOCTYPE html><html><head><meta charset=\"utf-8\"><title>公開頁面</title>
	<link href=\"./css/default.css\" rel=\"stylesheet\" type=\"text/css\"><script>function D_delete(name){
				if(confirm(\"確定要刪除?\")){
					document.getElementById(\"D_name\").value=name;
					document.getElementById(\"delete\").submit();
				}
				else{
				
				}
			}</script></head>";
	
	if(isset($_COOKIE['Account'])){
		echo"<body bgcolor=gray><div style=\"float:right; text-align:right; color:red;\">歡迎~ ".$_COOKIE['Account']." &nbsp &nbsp &nbsp </div>";
	}
	else{
		echo"<body bgcolor=gray><div style=\"float:right; text-align:right; color:red;\">歡迎~ 訪客 &nbsp &nbsp &nbsp </div>";
	}
	echo"<a href=\"index.php\">首頁</a>";
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	date_default_timezone_set('Asia/Taipei');
	
	$tdate=date("Y-m-d H:i:s");
	
	
	$base=mysqli_query($link,"SELECT * FROM `filebase` ORDER BY `rank` DESC , `date` ASC");
	$fnum=1;
	$bnum=1;	
	echo"<br><center><h1>公開頁面</h1>";
	while ($row = mysqli_fetch_row($base)){
		
		$line=1;
		$basename=$row[0];
		if($row[3]>0&&!isset($_COOKIE['Account'])){
			continue;
		}
		$file=mysqli_query($link,"SELECT `id`,`name`,`value`,`end` FROM `file` WHERE `base`='".$basename."'");
		echo "<table border=\"1\"><caption><h3>".$basename;
		echo"</h3></caption>";
		
		while ($row = mysqli_fetch_row($file)){
			
			if($row[3]!=""&&$row[3]<$tdate){
				mysqli_query($link,"DELETE FROM `file` WHERE id='".$row[0]."'");
				continue;
			}
			else if($row[2]>0&&!isset($_COOKIE['Account'])){
				continue;
			}
			
			if($line==1){
				echo"<tr>";
			}
			else if($line%4==1){
				echo"</tr><tr>";
			}
			
			echo"<td><a href=\"getinfo.php?id=".$row[0]."\">".$row[1]."</a></td>";
			
			$line++;
			$fnum++;
		}
		if($line>4){
			for($i=($line+3)%4;$i<4;$i++){
				if($i==0)
					break;
				echo"<td></td>";
			}
		}
		
		echo"</tr></table>";
		
		if(isset($_COOKIE['Value'])&&$_COOKIE['Value']==10){
			echo"<br><input type=\"button\" onClick=\"location.href='./addnewfile.php?filebase=".$basename."&orig=editablepage.php'\" value='新增檔案'><input type=\"button\" onClick=\"location.href='edit_file.php?filebase=".$basename."&orig=editablepage.php'\" value='編輯'><input type=\"button\" onClick=\"D_delete('".$basename."')\" value='刪除'><br>";
		}
		$bnum++;
	}
	
	
	if(isset($_COOKIE['Value'])&&$_COOKIE['Value']==10){
		
		echo"<br><input type=\"button\" onClick=\"location.href='./addbase.php?orig=editablepage.php'\" value='增加新欄位'><input type=\"button\" onClick=\"location.href='edit_basefile.php?orig=editablepage.php'\" value='編輯欄位'>";
	}
	
	
	echo"</center><form id=\"delete\" action=\"delete.php\" method=\"post\">
		<input type=\"hidden\" id=\"D_name\" name=\"D_name\">
		<input type=\"hidden\" name=\"D_base\" value=\"filebase\">
		<input type=\"hidden\" name=\"D_turn\" value=\"editablepage.php\">
		</form></body></html>";
	mysqli_close($link);
?>