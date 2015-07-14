<html>
<head>
<meta charset="utf-8">

<title>台文語料庫</title>
</head>
<body bgcolor=gray>

<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($link,'SET NAMES utf8');
	
	
	date_default_timezone_set('Asia/Taipei');
	
	
	$tdate=date("Y-m-d");
	$datetime=date("Y-m-d H:i:s");

	if(isset($_GET['orig'])){
		header("Location:./".$_GET['orig']);
		exit();
	}
	
	if(isset($_COOKIE['Account'])){
		header("Location:home.php");
		exit();
	}
	$result=mysqli_query($link,"SELECT * FROM `value` WHERE name='today'");
	$row = @mysqli_fetch_row($result);
	
	$today=$row[1];
	$date=$row[2];
	$result=mysqli_query($link,"SELECT value FROM `value` WHERE name='viewtimes'");
	$row = @mysqli_fetch_row($result);
	$num=$row[0];
	if(!isset($_COOKIE['Value'])){
		setcookie("Value","0",time()+7200);
	}
	if($date==$tdate){
	
		if(!isset($_COOKIE['counted']))
		{
			
			$today++;
			$num++;
			mysqli_query($link,"UPDATE `value` SET `value`=value+1 WHERE name='viewtimes'");
			mysqli_query($link,"UPDATE `value` SET `value`=value+1 WHERE name='today'");
			setcookie("counted","yes",time()+3600);
			
		}
	}
	else{
		$num++; 
		mysqli_query($link,"UPDATE `value` SET `value`=value+1 WHERE name='viewtimes'");
		mysqli_query($link,"UPDATE `value` SET `value`=1 WHERE name='today'");
		$result="UPDATE `value` SET `date`='".$tdate."' WHERE name='today'";
		mysqli_query($link,$result);
		$today=1; 
		
		
	}
	


	echo "<div style=\"float:left; text-align:left\">累積瀏覽人次: ".$num."</div><br>";
	echo "<div style=\"float:left; text-align:left\">今日瀏覽人次: ".$today."</div>";
	
	echo"<br><br><center><img src=\"./images/sinicalogo.gif\" height=200 width=200 /><br/></br><font size=\"7\" face=\"標楷體\">台文語料庫</font>";
	
	echo"<br><br><br><h1><input type=\"button\" onClick=\"location.href='login.php'\" value='使用者登入'>&nbsp&nbsp&nbsp&nbsp<input type=\"button\" onClick=\"location.href='home.php'\" value='訪客登入'>&nbsp&nbsp&nbsp&nbsp<input type=\"button\" onClick=\"location.href='register.html'\" value='註冊帳號'></h1></center>";
	
	mysqli_close($link);
?>


	
		
	




</body>
</html>