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
		$result=mysqli_query($link,"SELECT * FROM `filebase` ORDER BY `rank` DESC , `date` ASC");
		
		echo"<!DOCTYPE html><html><head><title>管理公開檔案</title><meta charset=\"utf-8\"><script>
			function D_delete(name){
				if(confirm(\"確定要刪除?\")){
					document.getElementById(\"D_name\").value=name;
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
			<li><a href=\"./management_valid_path.php\">管理檔案路徑</a></li>
			<li class=\"active\"><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
			<li><a href=\"./index.php\">回首頁</a></li>
			</ul></div></div></div><br><center>
		<table border=\"1\"><tr><th>欄位名稱</th><th>權限</th><th>排序</th><th>新增日期</th><th>檢視內容</th><th>刪除</th></tr>";
		while ($row = mysqli_fetch_row($result)){
			echo"<tr><td>".$row[0]."</td>";
			if($row[3]>0){
				echo"<td>訪客不可看</td>";
			}
			else{
				echo"<td>訪客可看</td>";
			}
			echo"<td>".$row[1]."</td><td>".$row[2]."</td><td><a href=\"management_file.php?filebase=".$row[0]."\">檢視內容</a></td><td><a href=\"#\" onclick=\"D_delete('".$row[0]."')\">刪除</a></td></tr>";
		}
		echo"<tr><td colspan=6><a href=\"addbase.php\">新增欄位</a></td></tr></table><br><input type=\"button\" onClick=\"location.href='./edit_basefile.php'\" value='編輯'></center>
		<form id=\"delete\" action=\"delete.php\" method=\"post\">
		<input type=\"hidden\" id=\"D_name\" name=\"D_name\">
		<input type=\"hidden\" name=\"D_base\" value=\"filebase\">
		</form></body></html>";
	
	}



?>