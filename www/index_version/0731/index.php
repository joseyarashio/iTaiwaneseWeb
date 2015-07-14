<html>
<head>
<title>中研院資訊科學研究所</title>
</head>
<body bgcolor=gray>
<script>
	function logout(){
		<?php setcookie("Account","",time()-86400);?>
		document.getElementById("logout").submit();
	}
	
</script>
<?php

	$link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	if(isset($_POST['Account'])&&isset($_POST['Password'])){
		$result=mysqli_query($link,"SELECT * FROM account where account='".$_POST['Account']."' and password='".$_POST['Password']."'");
		$row = @mysqli_fetch_row($result);
		if($row[0]!=""){
			setcookie("Account",$_POST['Account'],time()+86400);
			echo"<p align=\"right\">歡迎".$_POST['Account']."</a>&nbsp&nbsp
			<a href=\"#\" onclick=\"setting()\">管理</a>&nbsp&nbsp
			<a href=\"#\" onclick=\"logout()\">登出</a></p>";
		}
		else{
			header("Location:login_error.php"); 
		}
	}
	else if(isset($_COOKIE['Account'])){
		echo"<p align=\"right\">歡迎".$_COOKIE['Account']."</a>&nbsp&nbsp
		<a href=\"#\" onclick=\"setting()\">管理</a>&nbsp&nbsp
		<a href=\"#\" onclick=\"logout()\">登出</a></p>";
	}
	else{
		echo"<p align=\"right\"><a href=\"login.php\" >登入</a></p>";
		
	}
	echo"<form method=\"post\" action=\"index.php\" id=\"logout\"><input type=\"hidden\"></form>";
	
	$result=mysqli_query($link,"SELECT * FROM `value` WHERE name='today'");
	$row = @mysqli_fetch_row($result);
	
	
	$today=$row[1];
	$date=$row[2];
	$result=mysqli_query($link,"SELECT value FROM `value` WHERE name='viewtimes'");
	$row = @mysqli_fetch_row($result);
	$num=$row[0];
	
	if( ! ini_get('date.timezone') )
	{
		date_default_timezone_set('Asia/Taipei');
	}
	
	$tdate=date("Y-m-d");
	
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
	echo "累積瀏覽人次: ".$num."<br>";
	echo "今日瀏覽人次: ".$today;
	
	mysqli_close($link);
?>


	<center><img src="../images/sinicalogo.gif" height=200 width=200 /><br/>
		</br>
		<h1>中研院資訊科學研究所</h1>
		<a href='./cut0823.php' >中央研究院台語語音語料庫系統</a></br></br>
		<a href='./download_page/download.php' >檔案下載 位置</a></br></br>
		<a href='./ry/index.html'>呂仁園老師專頁</a>
		</br></br>
		<a href='ziiyu/word&syl.txt' >台語數位典藏 同音異字 統計表</a>
		<br><a href='ziiyu/wordsearch3.html'>台語數位典藏 列表</a>
		</br></br>
		<a href='ziiyu/word&syl.txt'>台語數位典藏 文本</a>
		</br></br>
		<a href='./聽打下載.html'>聽打下載 位置</a>
		<!--html!-->
		
	</center>








</body>
</html>