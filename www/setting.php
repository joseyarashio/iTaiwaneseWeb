<?php
	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_query($link,'SET NAMES utf8');
	
	if(!isset($_COOKIE['Account'])){
		echo"<script>alert(\"您的帳號已登出,請重新登入\")</script>";
		$url="帳號已登出,請重新登入";
		$EncodeStr=urlencode($url);
		header("Refresh:0;url=login.php?error_message=$EncodeStr");
	}
	else{
		$result=mysqli_query($link,"SELECT * FROM `account` WHERE `account`=\"".$_COOKIE['Account']."\"");
		$row = @mysqli_fetch_row($result);
		echo"<!DOCTYPE html><html><head><meta charset=\"utf-8\"><title>個人管理</title></head><link href=\"./css/management.css\" rel=\"stylesheet\" type=\"text/css\"><body><div id=\"header-wrapper\">
			<div style=\"float:right; text-align:right; color:red;\">歡迎~ ".$_COOKIE['Account']." &nbsp &nbsp &nbsp </div>
			<div id=\"header\" class=\"container\">
			<div id=\"logo\"><span><a href=\"./index.php\"><img src=\"./images/sinicalogo.gif\" height=150 width=150 ></a></span>	
			</div><div id=\"menu\"><ul>
			<li class=\"active\"><a href=\"./setting.php\">帳號資訊</a></li>";
			if($_COOKIE['Value']==10){
				echo"<li><a href=\"./msgboard_front.php\">查看訊息</a></li>";
			}
			else{
				echo"<li><a href=\"./msgboard_front.php\">發訊息給站主</a></li>";
			}
			echo"<li><a href=\"./index.php\">回首頁</a></li>
			</ul></div></div></div><br><center><table><tr><td>帳號:</td><td>".$row[0]."</td></tr><tr><td>密碼:</td><td><input type=\"button\" onClick=\"location.href='./repassword.php'\" value='修改密碼'></td></tr>";
			$result=mysqli_query($link,"SELECT * FROM `accountdata` WHERE `account`=\"".$_COOKIE['Account']."\"");
			$row = @mysqli_fetch_row($result);
			echo"<tr><td>名子:</td><td>".$row[1]."</td></tr><tr><tr><td>身分:</td><td>".$row[2]."</td></tr><tr><tr><td>e-mail:</td><td>".$row[3]."</td></tr><tr><tr><td>電話:</td><td>".$row[4]."</td></tr>";
			echo"</table><br><input type=\"button\" onClick=\"location.href='edit_setting.php'\" value='編輯個人資訊'></center></body></html>";
	}
	mysqli_close($link);




?>