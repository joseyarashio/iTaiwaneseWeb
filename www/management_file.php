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
		$result=mysqli_query($link,"SELECT * FROM `file` WHERE `base`='".$_GET['filebase']."'");
		
		echo"<!DOCTYPE html><html><head><title>管理公開檔案</title><meta charset=\"utf-8\"><script>
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
			<li><a href=\"./management_valid_path.php\">管理檔案路徑</a></li>
			<li class=\"active\"><a href=\"./management_editableweb.php\">管理公開檔案</a></li>
			<li><a href=\"./index.php\">回首頁</a></li>
			</ul></div></div></div><br><center>
		<table border=\"1\"><caption>".$_GET['filebase']."欄位</caption><tr><th>名稱</th><th>位置</th><th>權限</th><th>新增日期</th><th>結束日期</th><th>刪除</th></tr>";
		while ($row = mysqli_fetch_row($result)){
			echo"<tr><td>".$row[1]."</td><td>".$row[2]."</td>";
			if($row[3]>0){
				echo"<td>訪客不可看</td>";
			}
			else{
				echo"<td>訪客可看</td>";
			}
			echo"<td>".$row[5]."</td><td>".$row[6]."</td><td><a href=\"#\" onclick=\"D_delete('".$row[0]."')\">刪除</a></td></tr>";
		}
		echo"<tr><td colspan=6><a href=\"addnewfile.php?filebase=".$_GET['filebase']."\">新增檔案</a></td></tr></table><br><input type=\"button\" onClick=\"location.href='edit_file.php?filebase=".$_GET['filebase']."'\" value='編輯'><input type=\"button\" onClick=\"location.href='./management_editableweb.php'\" value='取消'></center>
		<form id=\"delete\" action=\"delete.php\" method=\"post\">
		<input type=\"hidden\" id=\"D_id\" name=\"D_id\">
		<input type=\"hidden\" name=\"D_base\" value=\"file\"><input type=\"hidden\" name=\"D_rbase\" value=\"".$_GET['filebase']."\">
		</form></body></html>";
	
	}





?>