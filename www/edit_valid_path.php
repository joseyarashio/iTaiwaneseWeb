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
		$result=mysqli_query($link,"SELECT * FROM `value_c` where `name`='valid_path' ");
		
		
			
		echo"<!DOCTYPE html><html><head><title>management</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
		<script>
		function EditWebPost(last){
			result=\"\";
			for(i=1;i<last;i++){
				str=i;
				result+=document.getElementById(str).value+\"!!!\";	
				str=i+\"_valid_path\"
				result+=document.getElementById(str).value+\"!!!\";
			}
			document.getElementById(\"PostValue\").value=result;
			document.getElementById(\"SendValue\").submit();
		}
		</script></head><body>
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
		<table border=\"1\"><tr><th>檔案路徑</th><th>最後一次修改日期</th></tr>";
		
		$end=1;
		while ($row = mysqli_fetch_row($result)){
			echo "<tr><input type=\"hidden\" id=\"".$end."\" value=\"".$row[0]."\"><td><input size=\"50\" stype=\"text\" id=\"".$end."_valid_path\" value=\"".$row[2]."\" ></td><td><input type=\"text\" disabled=\"disabled\"  value=\"".$row[3]."\"></td></tr>";
		$end++;
		}
	
		echo"</table><br><input type=\"button\" onClick=\"EditWebPost(".$end.")\" value='儲存'>&nbsp&nbsp&nbsp";
		echo"<input type=\"button\" onClick=\"location.href='./management_valid_path.php'\" value='取消'></center>";
		
		echo "<form action=\"edit_valid_path_sql.php\" method=\"post\" id=\"SendValue\"><input type=\"hidden\" id=\"PostValue\" name=\"PostValue\"></form></body></html>";
		mysqli_close($link);
		
	}



?>