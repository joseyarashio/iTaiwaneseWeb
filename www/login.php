<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<meta charset="utf-8">
	</head>
	<body bgcolor=gray>
	
	<center>
	<a href="./index.php"><img src="./images/sinicalogo.gif" height=200 width=200 ></a>
	<br><br>
	<?php	
		if(isset($_GET['error_message'])){
			echo"<p><font color=\"red\">".$_GET['error_message']."</font></p>";
		}
		
		if(isset($_GET['orig'])){
			echo"<form action=\"./home.php?orig=".$_GET['orig']."\" method=\"post\">";
		}
		else{
			echo"<form action=\"home.php\" method=\"post\">";
		}
	?>
		帳號:<input type="text" name="Account" maxlength="10"><br>
		密碼:<input type="password" maxlength="12" name="Password"><br>
		<input type="submit"  value="登入"> <input type="button" onclick="location.href='register.html'" value="註冊">
	</form>
	</center>
	</body>
</html>