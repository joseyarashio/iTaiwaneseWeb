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
			
		$result=mysqli_query($link,"SELECT * FROM `accountdata` WHERE `account`=\"".$_GET['acc']."\"");
		$row = @mysqli_fetch_row($result);
			
			
		echo"<!DOCTYPE html><html><head><title>管理帳號</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		</head><body>
		<div id=\"header-wrapper\">
		<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
		<div id=\"header\" class=\"container\">
		<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
		</div><div id=\"menu\"><ul>
		<li class=\"active\"><a href=\"./management_admin.php\">管理帳號</a></li>
		<li><a href=\"./management_web.php\">管理網頁</a></li>
		<li><a href=\"./management_valid_path.php\">管理有效路徑</a></li>
		<li><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
		<li><a href=\"./index.php\">回首頁</a></li>
		</ul></div></div></div><br><center>
		<table border=\"1\"><caption>個人資訊</caption>";
		 
		echo "<tr><td>名子:</td><td>".$row[1]."</td></tr><tr><tr><td>身分:</td><td>".$row[2]."</td></tr><tr><tr><td>e-mail:</td><td>".$row[3]."</td></tr><tr><tr><td>電話:</td><td>".$row[4]."</td></tr></table><table border=\"1\"><caption>連線紀錄</caption><th>連線IP</th><th>目的地</th><th>連線日期</th>";
		$result=mysqli_query($link,"SELECT * FROM `visitinfo` WHERE `visitor`='".$_GET['acc']."' ORDER BY `date` DESC");
		while ($row = mysqli_fetch_row($result)){
			echo"<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		
		}
		
		
		echo"</table><br><input type=\"button\" onClick=\"location.href='ip_info.php'\" value='檢視ip造訪總表'>&nbsp&nbsp&nbsp</center>";
			
		echo "</body></html>";
			mysqli_close($link);
		}

?>
	