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

	if(isset($_POST['Account'])&&isset($_POST['Password'])){
		
		$link = mysqli_connect('localhost', 'csie104', 'msplab', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result=mysqli_query($link,"SELECT * FROM account where account='".$_POST['Account']."' and password='".$_POST['Password']."'");
		$row = @mysqli_fetch_row($result);
		if($row[0]!=""){
			setcookie("Account",$_POST['Account'],time()+86400);
			echo"<p align=\"right\">歡迎".$_POST['Account']."</a>
			<a href=\"#\" onclick=\"logout()\">登出</a></p>";
		}
		else{
			
			header("Location:login_error.php"); 
		}
		
	}
	else if(isset($_COOKIE['Account'])){
		echo"<p align=\"right\">歡迎".$_COOKIE['Account']."</a>
		<a href=\"#\" onclick=\"logout()\">登出</a></p>";
	}
	else{
		echo"<p align=\"right\"><a href=\"login.php\" >登入</a></p>";
		
	}
	echo"<form method=\"post\" action=\"index.php\" id=\"logout\"><input type=\"hidden\"></form>";
	

	
	$file=@file("count.txt");
	
	list($today,$date,$num,$yesterday)=explode(",",$file[0]);
	if( ! ini_get('date.timezone') )
	{
		date_default_timezone_set('Asia/Taipei');
	}
	$d=getdate();
	$ty=$d["year"];
	$tm=$d["mon"];
	$td=$d["mday"];
	$tdate=date("y-m-d");
	$ydate=date("y-m-d",mktime(0,0,0,$tm,$td-1,$ty));
	if($date=="$tdate"){
	
		if(strlen($yesterday)==0)
		{
			$yesterday="0";
		}
		
		
		if(!isset($_COOKIE['counted']))
		{
			
			$today++;
			$num++;
			setcookie("counted","yes",time()+3600);
			
		}
		
		
		$w=fopen("count.txt","w");
		fputs($w,$today.",".$tdate.",".$num.",".$yesterday);
		fclose($w);
	}
	else{
		$num++; 
		if($date=="$ydate")
		{
			$yesterday=$today;
		}
		else
		{
			$yesterday=0;
		}
		$today=1; 
		$w=fopen("count.txt","w");
		fputs($w,$today.",".$tdate.",".$num.",".$yesterday);
		fclose($w);
	}
	if($yesterday=="")
	{
		$yesterday="0";
	}
	echo "今日瀏覽人次: ".$today."<br>";
	echo "昨日瀏覽人次: ".$yesterday."<br>";
	echo "累積瀏覽人次: ".$num;
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