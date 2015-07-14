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
		$result=mysqli_query($link,"SELECT * FROM `value_c` where name='valid_path'");
		
		echo"<!DOCTYPE html><html><head><title>管理檔案路徑</title><meta charset=\"utf-8\"><script>
		function D_delete(id){
			if(confirm(\"確定要刪除?\")){
				document.getElementById(\"D_id\").value=id;
				document.getElementById(\"delete\").submit();
			}
			else{
				
			}
			
		}
		</script><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\"></head><body>
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
			</ul></div></div></div><br><center>
		<table border=\"1\"><tr><th>檔案路徑</th><th>修改日期</th><th>檔案個數</th><th>刪除</th></tr>";
		while ($row = mysqli_fetch_row($result)){
			$num=mysqli_query($link,"SELECT COUNT(`under`) FROM `filedata` WHERE `under`='".$row[2]."'");
			$nums=mysqli_fetch_row($num);
			echo"<tr><td>".$row[2]."</td><td>".$row[3]."</td><td><a href=\"file_list.php?path=".$row[2]."\">".$nums[0]."個</a></td><td><a href=\"#\" onclick=\"D_delete('".$row[0]."')\">刪除</a></td></tr>";
		}
		echo"<tr><td colspan=3><a href=\"addvalidpath.html\">新增有效路徑</a></td></tr></table><br><input type=\"button\" onClick=\"location.href='update_file.php?re=1'\" value='重新更新資料'></center>
		<form id=\"delete\" action=\"delete.php\" method=\"post\">
		<input type=\"hidden\" id=\"D_id\" name=\"D_id\">
		<input type=\"hidden\" name=\"D_base\" value=\"value_c\">
		</form></body></html>";
	
	}



?>