<!DOCTYPE html>
<html>
	<head>
		<title>重設密碼</title>
		<meta charset="utf-8">
		<link href="./css/management.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="header-wrapper">
			<div style="float:right; text-align:right; color:red;">歡迎~ <?php echo$_COOKIE['Account'];?> &nbsp &nbsp &nbsp </div>
			<div id="header" class="container">
			<div id="logo"><span><a href="./index.php"><img src="./images/sinicalogo.gif" height=150 width=150 ></a></span>	
			</div><div id="menu"><ul>
			<li class="active"><a href="./setting.php">帳號資訊</a></li>
			<?php
			if($_COOKIE['Value']==10){
				echo"<li><a href=\"./msgboard_front.php\">查看訊息</a></li>";
			}
			else{
				echo"<li><a href=\"./msgboard_front.php\">發訊息給站主</a></li>";
			}?>
			<li><a href="./index.php">回首頁</a></li>
			</ul></div></div></div><br><center>
		<table>
		<form method="post" action="repassword_sql.php" >
			<tr><td>原本密碼:</td><td><input type="password" name="prepass"  maxlength="10"  required></td></tr>
			<tr><td>修改後密碼:</td><td><input type="password" name="pass"  maxlength="10" required></td></tr>
			<tr><td>確認密碼:</td><td><input type="password" name="repass" maxlength="10" required></td></tr>
		</table>
			<br><input type="submit" value="確定">
			<input type="button" onClick="location.href='setting.php'" value='取消'>
		</form>
		</center>
	</body>
</html>