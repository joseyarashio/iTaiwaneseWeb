<html>
<head>
<meta charset="utf-8">

<title>首頁</title>
</head>
<body bgcolor=gray>
<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	
	
	date_default_timezone_set('Asia/Taipei');
	
	
	
	$datetime=date("Y-m-d H:i:s");
	if(isset($_POST['Account'])&&isset($_POST['Password'])){
		$result=mysqli_query($link,"SELECT * FROM account where account='".$_POST['Account']."' and password='".$_POST['Password']."'");
		$row = @mysqli_fetch_row($result);
		
		if($row[0]!=""){
			setcookie("Value","",time()-7200);
			setcookie("Account",$_POST['Account'],time()+7200);
			setcookie("Value",$row[2],time()+7200);
			header("Location:home.php");
		}
		else{
			if(isset($_GET['orig'])){
				header("Location:login.php?error_message=帳號密碼錯誤&orig=".$_GET['orig']); 
			}
			else{
				header("Location:login.php?error_message=帳號密碼錯誤"); 
			}
			exit();
		}
	}
	else if(isset($_COOKIE['Account'])&&isset($_COOKIE['Value'])){
		mysqli_query($link,"UPDATE `account` SET `redate`='".$datetime."' WHERE account='".$_COOKIE['Account']."'");
		echo"<div style=\"float:right; text-align:right\">歡迎~ ".$_COOKIE['Account']."</a>&nbsp&nbsp";
			if($_COOKIE["Value"]==10)
				echo"<a href=\"management_admin.php\">管理</a>&nbsp&nbsp";
			echo"<a href=\"setting.php\">個人資訊</a>&nbsp&nbsp<a href=\"logout.php\">登出</a></div>";
	}
	else{
		echo"<div style=\"float:right; text-align:right\">歡迎~ 訪客<a href=\"msgboard_front.php\" >留言</a>&nbsp&nbsp<a href=\"register.html\" >註冊</a>&nbsp&nbsp<a href=\"login.php\" >登入</a>&nbsp&nbsp</div>";
		
	}
	if(isset($_GET['orig'])){
		header("Location:./".$_GET['orig']);
		exit();
	}
	
	
	
	
	
	
	
	echo"<br><br><center><a href=\"index.php\"><img src=\"./images/sinicalogo.gif\" height=200 width=200 /></a><br/></br><h1>中研院資訊科學研究所</h1>";
	$result=mysqli_query($link,"SELECT * FROM `value` WHERE `name`='home_row'");
	$row = mysqli_fetch_row($result);
	$rows=$row[1];
	$result=mysqli_query($link,"SELECT * FROM `value` WHERE `name`='home_type'");
	$row = mysqli_fetch_row($result);
	$type=$row[1];
	$result=mysqli_query($link,"SELECT * FROM `web` ORDER BY `order` DESC ,`id` ASC");
	$now=0;
	
	echo"<table>";
	while ($row = mysqli_fetch_row($result)){
		if($_COOKIE['Value']>=$row[2]){
			if($now%$rows==0){
				echo"<tr>";
			}
			echo"<td>";
			if($type==0){
				echo"<p align=left>";
			}
			else if($type==1){
				echo"<p align=center>";
			}
			else{
				echo"<p align=right>";
			}	
			echo"<a href='./relay.php?id=".$row[0]."'>".$row[3]."</a></p></td>";
			if(($now+1)%$rows==0){
				echo"</tr><tr><td></td></tr>";
			}
			$now++;
		}
		
	}
	echo"</table></center>";
	
	mysqli_close($link);
?>


	
		
		
	








</body>
</html>