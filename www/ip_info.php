
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
				
			
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$last= date("Y-m-d H:i:s",strtotime("$datetime   -6   month"));
			mysqli_query($link,"DELETE FROM `visitinfo` WHERE `date`<'".$last."'");
			
			$result=mysqli_query($link,"SELECT * FROM `visitinfo` ORDER BY `date` DESC");
			
			
			
			echo"<!DOCTYPE html><html><head><title>管理IP</title><meta charset=\"utf-8\"><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\">
			</head><body>
			<div id=\"header-wrapper\">
			<div style=\"float:right; text-align:right; color:red;\">歡迎~ 管理者 &nbsp &nbsp &nbsp </div>
			<div id=\"header\" class=\"container\">
			<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
			</div><div id=\"menu\">
			
			</div></div></div><br><center>
			<table border=\"1\"><caption>IP總表(僅顯示6個月以內的)</caption><tr><th>帳號</th><th>IP</th><th>目的地</th><th>訪問時間</th></tr>";
			while ($row = mysqli_fetch_row($result)) 
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
				
			echo"</table><br></center>";
			
			echo "</body></html>";
			
			mysqli_close($link);
		}

	?>
	