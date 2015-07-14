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
			
		echo"<!DOCTYPE html><html><head><title>管理帳號</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		</head><body>
		<div id=\"header-wrapper\">
		<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
		<div id=\"header\" class=\"container\">
		<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
		</div><div id=\"menu\"><ul>
		<li><a href=\"./management_admin.php\">管理帳號</a></li>
		<li><a href=\"./management_web.php\">管理網頁</a></li>
		<li class=\"active\"><a href=\"./management_valid_path.php\">管理檔案路徑</a></li>
		<li><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
		<li><a href=\"./index.php\">回首頁</a></li>
		</ul></div></div></div><br><center>";
		
		
		$myfile=mysqli_query($link,"SELECT * FROM `filedata` WHERE `under`='".$_GET['path']."' ORDER BY `date` DESC");
		echo"<table border=1><caption>".substr($_GET['path'],strrpos($_GET['path'], "/")+1)."</caption><tr><th>檔名</th><th>位置</th><th>新增日期</td></tr>";
		while ($data = mysqli_fetch_row($myfile)){
			echo"<tr><td>".substr($data[1],strrpos($data[1], "/")+1)."</td><td>".$data[1]."</td><td>".$data[3]."</td></tr>";
		}
		echo"</table>";
		
		
		
		echo"</center>";
		
		
		
		echo "</body></html>";
			mysqli_close($link);
		}

?>
	