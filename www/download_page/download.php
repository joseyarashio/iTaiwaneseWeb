<?php $link = mysqli_connect('localhost', 'user', 'user', 'itaiwanese');
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		mysqli_query($link,'SET NAMES utf8');	
		if(isset($_COOKIE['Account'])){
			$result=mysqli_query($link,"SELECT  `value` FROM `account` WHERE `account`='".$_COOKIE['Account']."'");
			$row = mysqli_fetch_row($result);
			if($row[0]==""){
				$value=0;
			}
			else{
				$value=$row[0];
			}
		}
		else{
			$value=0;
		}
		$result=mysqli_query($link,"SELECT  `value` FROM `web` WHERE `location`='./download_page/download.php'");
		$row = mysqli_fetch_row($result);
		if($value<$row[0]){
			echo"<script>alert(\"權限不足或帳號已登出\");</script>";
			$url="權限不足或帳號已登出";
			$EncodeStr=urlencode($url);
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','".$ip."','./download_page/download.php','".$datetime."')");
			header("Refresh:0;url=../../login.php?error_message=$EncodeStr");
			exit();
		}
	?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../js/morris.css">
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<title>聽打檔案處理</title>
</head>
<body bgcolor=gray>
<h1>檔案下載</h1>
<h2>另存新檔 下載</h2>
<br>
<?php 
	
$fp = fopen('cmd', 'w');
fwrite($fp,"search\tall\t0");
fclose($fp);
if(@$_POST["submit"]=="統計總音節數"){
	$item2 = $_POST ["item1"];
	$url=implode("+",$item2); 
	$url=str_replace(" ","%20",$url);
	$aCommand= 'c:/Python33/python.exe C:/AppServ/www/download_page/Statistics.py all ' .$url;
	$aReturn= system($aCommand);
	echo $aCommand;
	echo $aReturn;
	header('Location: http://140.109.18.117/download_page/Statistics.php');
    exit;
	}
if(@$_POST["submit"]=="篩選"){
	echo $_POST["item2"];
	}
if(@$_POST["send"]=="搜尋音節"){
	unlink("c:/AppServ/www/download_page/result");
	$fp = fopen('cmd', 'w');
	fwrite($fp,"search\t".$_POST['mean']."\t".$_POST['search']);
	fclose($fp);
	header('Location: http://140.109.18.117/download_page/search.php');
}
?>
<form method="post" name="form1">
	<input name="submit" type="submit" value="統計總音節數"><br>
	<div name="result" id="result" style="width:300px;height:80px;overflow:auto;"></div>
	<script type="text/javascript">
	function read(){
		file_name="http://140.109.18.117/download_page/search"
		$.ajax({//開啟文字檔
					type: "POST",
					url: file_name,
					dataType: "text",
					async:false,
					error:function(xhr){alert('error: '+file_name+" open file failed");},//開啟失敗
					success: function(msg){
						Tail(msg);//進行文字處理
					}
			});	
	}
	function Tail(msg){
	var pre_text = msg.split(/\n/);
	var syllable = pre_text[0].split(/\t/);
	var tails = pre_text[1].split(/\t/);
	var i=1;
	$("#result").append('<span><select id="syllable" onChange=print("syllable")></select></span>')
	document.getElementById("syllable").options[0]=new Option("請選擇音節","");
	$("#result").append('<span><select id="meaning" onChange=print("meaning")></select></span>')
	document.getElementById("meaning").options[0]=new Option("請選擇詞意","");
	//hidden
	$("#result").append('<input id="search" name="search" type=hidden value="">')
	$("#result").append('<input id="mean" name="mean" type=hidden value="">')
	$("#result").append('<input name="send" type="submit" value="搜尋音節" ><BR>')//onClick=readresult()
	//$("#result").append('<a>使用者：<input type="text" name="user" id="user" value=""></a><BR>')
	
	while(i < syllable.length)
		{
			document.getElementById("syllable").options[i]=new Option(syllable[i], syllable[i]);
			i++;
		}
	i=1
	while(i < tails.length)
		{
			document.getElementById("meaning").options[i]=new Option(tails[i], tails[i]);
			i++;
		}
	}
	function print(item){
		document.getElementById("search").value=document.getElementById(item).value;
		document.getElementById("mean").value=item;
	}
	function readresult(){
		//window.open("http://140.109.18.117/download_page/wavplay.html?"+temp[0]+'%10'+temp[1]+'%10'+temp[2],"width=350,height=120,menubar=no,toolbar=no")
		//window.open("http://140.109.18.117/download_page/search.php,width=350,height=120,menubar=no,toolbar=no")
	}
	read()
	</script>
	<br>
		<h3>戲劇-大愛劇場美味人生</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs01.wav'>美味人生01</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs'>美味人生01-20130301 (20130316)-0416.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs01-20130301 (20130316)-0416.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs04.wav'>美味人生04</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs'>美味人生04-20130309(0324)-20130420.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs04-20130309(0324)-20130420.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs07.wav'>美味人生07</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs'>美味人生07-20130308(0404)-0422.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs07-20130308(0404)-0422.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs10.wav'>美味人生10</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs10-20130311(0411)-0425.trs'>美味人生10-20130311(0411)-0425.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs10-20130311(0411)-0425.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs13.wav'>美味人生13</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs13-20130317-0408-20130423.trs'>美味人生13-20130317-0408-20130423.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs13-20130317-0408-20130423.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs16.wav'>美味人生16</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs16-20130322-20130428-0516.trs'>美味人生16-20130322-20130428-0516.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs16-20130322-20130428-0516.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs19/vvrs19.wav'>美味人生19</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs19-20130324-0429-0513.trs'>美味人生19-20130324-0429-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs19-20130324-0429-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs22/vvrs22.wav'>美味人生22</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs22-20130325-20130430-0516.trs'>美味人生22-20130325-20130430-0516.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs22-20130325-20130430-0516.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs25/vvrs25.wav'>美味人生25</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs25-20130331-0505-0513.trs'>美味人生25-20130331-0505-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs25-20130331-0505-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs28/vvrs28.wav'>美味人生28</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs28-20130401-20130504-0520.trs'>美味人生28-20130401-20130504-0520.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs28-20130401-20130504-0520.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs31/vvrs31.wav'>美味人生31</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs31-20130406-0505-0515.trs'>美味人生31-20130406-0505-0515.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs31-20130406-0505-0515.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs34/vvrs34.wav'>美味人生34</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs34-20130407-20130509-0520.trs'>美味人生34-20130407-20130509-0520.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs34-20130407-20130509-0520.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs37/vvrs37.wav'>美味人生37</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs37-20130414-0513-0515.trs'>美味人生37-20130414-0513-0515.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs37-20130414-0513-0515.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/DaAi/vvrs40/vvrs40.wav'>美味人生40</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/DaAi/vvrs40-20130415-20130512-0520.trs'>美味人生40-20130415-20130512-0520.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/DaAi/vvrs40-20130415-20130512-0520.trs"></td>
		<tr>
		</table>
<hr>
		<h3>廣播-夢中的國家</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0501-230001.wav'>0501-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0501-230001-110704-0917-111229.trs'>0501-230001-110704-0917-111229.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0501-230001-110704-0917-111229.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0501-230002.wav'>0501-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0501-230002-110710-0929-111230.trs'>0501-230002-110710-0929-111230.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0501-230002-110710-0929-111230.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0511-230001.wav'>0511-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0511-230001-110716-1015-111230.trs'>0511-230001-110716-1015-111230.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0511-230001-110716-1015-111230.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0511-230002.wav'>0511-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0511-230002-110718-1102-111230.trs'>0511-230002-110718-1102-111230.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0511-230002-110718-1102-111230.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0513-230001.wav'>0513-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0513-230001-110723-1113-111231.trs'>0513-230001-110723-1113-111231.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0513-230001-110723-1113-111231.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0513-230002.wav'>0513-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0513-230002-110727-1119-111231.trs'>0513-230002-110727-1119-111231.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0513-230002-110727-1119-111231.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0518-220001.wav'>0518-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0518-220001-110731-1128-120101.trs'>0518-220001-110731-1128-120101.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0518-220001-110731-1128-120101.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0518-220002.wav'>0518-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0518-220002-110802-1203-120101.trs'>0518-220002-110802-1203-120101.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0518-220002-110802-1203-120101.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0520-220001.wav'>0520-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0520-220001-110808-1114-120106.trs'>0520-220001-110808-1114-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0520-220001-110808-1114-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0520-220002.wav'>0520-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0520-220002-110810-1114-120106.trs'>0520-220002-110810-1114-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0520-220002-110810-1114-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0520-230001.wav'>0520-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0520-230001-110815.trs'>0520-230001-110815.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0520-230001-110815.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0520-230002.wav'>0520-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0520-230002-110816.trs'>0520-230002-110816.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0520-230002-110816.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0522-230001.wav'>0522-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0522-230001-110821-111122-120106.trs'>0522-230001-110821-111122-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0522-230001-110821-111122-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0522-230002.wav'>0522-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0522-230002-110823-111122-120106.trs'>0522-230002-110823-111122-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0522-230002-110823-111122-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0604-230001(dancor)-120204.wav'>0604-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0604-230001(dancor)-120204.trs'>0604-230001(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0604-230001(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0604-230002(dancor)-120204.wav'>0604-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0604-230002(dancor)-120204.trs'>0604-230002(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0604-230002(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0608-230001(dancor)-120204.wav'>0608-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0608-230001(dancor)-120204.trs'>0608-230001(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0608-230001(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0608-230002(dancor)-120204.wav'>0608-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0608-230002(dancor)-120204.trs'>0608-230002(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0608-230002(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0609-220001(dancor)-120204.wav'>0609-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0609-220001(dancor)-120204.trs'>0609-220001(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0609-220001(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0609-220002(dancor)-120204.wav'>0609-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0609-220002(dancor)-120204.trs'>0609-220002(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0609-220002(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0706-230001.wav'>0706-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0706-230001-0823-111228.trs'>0706-230001-0823-111228.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0706-230001-0823-111228.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0706-230002.wav'>0706-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0706-230002-0802-111229.trs'>0706-230002-0802-111229.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0706-230002-0802-111229.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0805-220001.wav'>0805-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0805-220001-111202-120106.trs'>0805-220001-111202-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0805-220001-111202-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0805-220002.wav'>0805-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0805-220002-111206-120106.trs'>0805-220002-111206-120106.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0805-220002-111206-120106.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0816-220001.wav'>0816-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0816-220001-111215-120107.trs'>0816-220001-111215-120107.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0816-220001-111215-120107.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0816-220002.wav'>0816-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0816-220002-111215-120107.trs'>0816-220002-111215-120107.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0816-220002-111215-120107.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0817-220001.wav'>0817-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0817-220001-111215-120108.trs'>0817-220001-111215-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0817-220001-111215-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0817-220002.wav'>0817-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0817-220002-111215-120108.trs'>0817-220002-111215-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0817-220002-111215-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0824-220001.wav'>0824-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0824-220001-111215-120108.trs'>0824-220001-111215-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0824-220001-111215-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0824-220002.wav'>0824-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0824-220002-111220-120108.trs'>0824-220002-111220-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0824-220002-111220-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0827-230001.wav'>0827-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0827-230001-111212-120108.trs'>0827-230001-111212-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0827-230001-111212-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0827-230002.wav'>0827-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0827-230002-111228-120108.trs'>0827-230002-111228-120108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0827-230002-111228-120108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0901-220001(dancor)-120204.wav'>0901-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0901-220001(dancor)-120204.trs'>0901-220001(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0901-220001(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0901-220002(dancor)-120204.wav'>0901-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0901-220002(dancor)-120204.trs'>0901-220002(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0901-220002(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0906-220001(dancor)-120204.wav'>0906-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0906-220001(dancor)-120204.trs'>0906-220001(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0906-220001(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0906-220002(dancor)-120204.wav'>0906-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0906-220002(dancor)-120204.trs'>0906-220002(dancor)-120204.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0906-220002(dancor)-120204.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0907-230001.wav'>0907-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0907-230001dancor-1231.trs'>0907-230001dancor-1231.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0907-230001dancor-1231.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0907-230002.wav'>0907-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0907-230002dancor-0101.trs'>0907-230002dancor-0101.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0907-230002dancor-0101.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0915-220001.wav'>0915-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0915-220001dancor-0107.trs'>0915-220001dancor-0107.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0915-220001dancor-0107.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/0915-220002.wav'>0915-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/0915-220002dancor-0108.trs'>0915-220002dancor-0108.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/0915-220002dancor-0108.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1001-220001.wav'>1001-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1001-220001-111009-1210-120110.trs'>1001-220001-111009-1210-120110.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1001-220001-111009-1210-120110.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1001-220002.wav'>1001-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1001-220002-111010-1219-120110.trs'>1001-220002-111010-1219-120110.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1001-220002-111010-1219-120110.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1001-230001.wav'>1001-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1001-230001-111015-1220-120111.trs'>1001-230001-111015-1220-120111.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1001-230001-111015-1220-120111.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1001-230002.wav'>1001-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1001-230002-111017-1224-120111.trs'>1001-230002-111017-1224-120111.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1001-230002-111017-1224-120111.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1002-230001.wav'>1002-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1002-230001-111220-120112.trs'>1002-230001-111220-120112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1002-230001-111220-120112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1002-230002.wav'>1002-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1002-230002-111220-120112.trs'>1002-230002-111220-120112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1002-230002-111220-120112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1005-230001.wav'>1005-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1005-230001-111220-120112.trs'>1005-230001-111220-120112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1005-230001-111220-120112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1005-230002.wav'>1005-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1005-230002-111220-120112.trs'>1005-230002-111220-120112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1005-230002-111220-120112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1008-230001.wav'>1008-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1008-230001-111220-120112.trs'>1008-230001-111220-120112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1008-230001-111220-120112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1008-230002.wav'>1008-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1008-230002-111220-120113.trs'>1008-230002-111220-120113.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1008-230002-111220-120113.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1013-220001.wav'>1013-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1013-220001-120101-120113.trs'>1013-220001-120101-120113.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1013-220001-120101-120113.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1013-220002.wav'>1013-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1013-220002-120101-120114.trs'>1013-220002-120101-120114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1013-220002-120101-120114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1014-220001.wav'>1014-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1014-220001-120101-120114.trs'>1014-220001-120101-120114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1014-220001-120101-120114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1014-220002.wav'>1014-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1014-220002-120101-120114.trs'>1014-220002-120101-120114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1014-220002-120101-120114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1022-220001.wav'>1022-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1022-220001-120101-120114.trs'>1022-220001-120101-120114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1022-220001-120101-120114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1022-220002.wav'>1022-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1022-220002-120103-120114.trs'>1022-220002-120103-120114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1022-220002-120103-120114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1025-220001.wav'>1025-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1025-220001-111209.trs'>1025-220001-111209.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1025-220001-111209.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1025-220002.wav'>1025-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1025-220002-111210.trs'>1025-220002-111210.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1025-220002-111210.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1103-220001.wav'>1103-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1103-220001-120729.trs'>1103-220001-120729.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1103-220001-120729.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1103-220002.wav'>1103-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1103-220002-120730.trs'>1103-220002-120730.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1103-220002-120730.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1103-230001.wav'>1103-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1103-230001-120801.trs'>1103-230001-120801.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1103-230001-120801.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1103-230002.wav'>1103-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1103-230002-120808.trs'>1103-230002-120808.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1103-230002-120808.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1106-220001.wav'>1106-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1106-220001-120809.trs'>1106-220001-120809.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1106-220001-120809.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1106-220002.wav'>1106-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1106-220002-120812.trs'>1106-220002-120812.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1106-220002-120812.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1106-230001.wav'>1106-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1106-230001-120819.trs'>1106-230001-120819.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1106-230001-120819.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1106-230002.wav'>1106-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1106-230002-120816.trs'>1106-230002-120816.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1106-230002-120816.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1113-220001.wav'>1113-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1113-220001-120929.trs'>1113-220001-120929.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1113-220001-120929.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1113-220002.wav'>1113-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1113-220002-121001.trs'>1113-220002-121001.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1113-220002-121001.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1115-220001-120823(1013)-121114.wav'>1115-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1115-220001-120823(1013)-121114.trs'>1115-220001-120823(1013)-121114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1115-220001-120823(1013)-121114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1115-220002-120825(1017)121114.wav'>1115-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1115-220002-120825(1017)121114.trs'>1115-220002-120825(1017)121114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1115-220002-120825(1017)121114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1119-230001.wav'>1119-230001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1119-230001-120817.trs'>1119-230001-120817.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1119-230001-120817.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1119-230002.wav'>1119-230002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1119-230002-120824.trs'>1119-230002-120824.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1119-230002-120824.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1202-220001.wav'>1202-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1202-220001-120828-121103.trs'>1202-220001-120828-121103.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1202-220001-120828-121103.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1202-220002.wav'>1202-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1202-220002-120828-121103.trs'>1202-220002-120828-121103.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1202-220002-120828-121103.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1209-220001.wav'>1209-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1209-220001-121020-121114.trs'>1209-220001-121020-121114.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1209-220001-121020-121114.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1209-220002.wav'>1209-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1209-220002-121020-121115.trs'>1209-220002-121020-121115.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1209-220002-121020-121115.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1214-220001.wav'>1214-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1214-220001-120903-121119.trs'>1214-220001-120903-121119.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1214-220001-120903-121119.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1214-220002.wav'>1214-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1214-220002-120903-121119.trs'>1214-220002-120903-121119.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1214-220002-120903-121119.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1227-220001.wav'>1227-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1227-220001-120905.trs'>1227-220001-120905.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1227-220001-120905.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1227-220002.wav'>1227-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1227-220002-120909.trs'>1227-220002-120909.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1227-220002-120909.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1228-220001.wav'>1228-220001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1228-220001-121119.trs'>1228-220001-121119.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1228-220001-121119.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/Dream_State/1228-220002.wav'>1228-220002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/Dream_State/1228-220002-121119.trs'>1228-220002-121119.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/Dream_State/1228-220002-121119.trs"></td>
		<tr>
		</table>
<hr>
		<h3>朗讀-教育部台語朗讀範例</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine001(dancor)ok.wav'>Combine001</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine001(dancor)ok.trs'>Combine001(dancor)ok.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine001(dancor)ok.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine002-110519(dancor)-1.wav'>Combine002</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine002-110519(dancor)-1.trs'>Combine002-110519(dancor)-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine002-110519(dancor)-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine003.wav'>Combine003</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine003-0424-2-1.trs'>Combine003-0424-2-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine003-0424-2-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine004(dancor)-110623.wav'>Combine004</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine004(dancor)-110623.trs'>Combine004(dancor)-110623.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine004(dancor)-110623.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine005-110519(dancor).wav'>Combine005</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine005-110519(dancor).trs'>Combine005-110519(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine005-110519(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine006.wav'>Combine006</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine006-0508-3-110617.trs'>Combine006-0508-3-110617.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine006-0508-3-110617.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine007-110602(dancor).wav'>Combine007</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine007-110602(dancor).trs'>Combine007-110602(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine007-110602(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine008(dancor).wav'>Combine008</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine008(dancor).trs'>Combine008(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine008(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine009-110727(dancor).wav'>Combine009</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine009-110727(dancor).trs'>Combine009-110727(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine009-110727(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine010(dancor)-110602.wav'>Combine010</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine010(dancor)-110602.trs'>Combine010(dancor)-110602.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine010(dancor)-110602.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine011-110616(dancor).wav'>Combine011</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine011-110616(dancor).trs'>Combine011-110616(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine011-110616(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine012(dancor).wav'>Combine012</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine012(dancor).trs'>Combine012(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine012(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine013-110624(dancor).wav'>Combine013</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine013-110624(dancor).trs'>Combine013-110624(dancor).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine013-110624(dancor).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/EDU/Combine014(dancor)-110612.wav'>Combine014</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/EDU/Combine014(dancor)-110612.trs'>Combine014(dancor)-110612.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/EDU/Combine014(dancor)-110612.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-民視台語新聞-1</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090522_B_FTVN.wav'>090522_B_FTVNt</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090522_B_FTVN20091112.trs'>090522_B_FTVN20091112.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090522_B_FTVN20091112.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090525_A_FTVN.wav'>090525_A_FTVN</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090525_A_FTVN20091104.trs'>090525_A_FTVN20091104.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090525_A_FTVN20091104.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090528_A_FTVN.wav'>090528_A_FTVN</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090528_A_FTVN20091021.trs'>090528_A_FTVN20091021.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090528_A_FTVN20091021.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090601_A_FTVN.wav'>090601_A_FTVN</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090601_A_FTVN20091012.trs'>090601_A_FTVN20091012.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090601_A_FTVN20091012.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090604_A_FTVN.wav'>090604_A_FTVN</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090604_A_FTVN20090914.trs'>090604_A_FTVN20090914.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090604_A_FTVN20090914.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-1/090715_B_FTVN.wav'>090715_B_FTVN</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-1/090715_B_FTVN20090826.trs'>090715_B_FTVN20090826.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-1/090715_B_FTVN20090826.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-民視台語新聞-2</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090521.wav'>FTVN_090521</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090521-20100512-1.trs'>FTVN_090521-20100512-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090521-20100512-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090526.wav'>FTVN_090526</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090526-20100516-1.trs'>FTVN_090526-20100516-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090526-20100516-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090527.wav'>FTVN_090527</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090527-20100527-1.trs'>FTVN_090527-20100527-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090527-20100527-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090529.wav'>FTVN_090529</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090529-20100430.trs'>FTVN_090529-20100430.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090529-20100430.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090602.wav'>FTVN_090602</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090602-20100619-1.trs'>FTVN_090602-20100619-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090602-20100619-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090603.wav'>FTVN_090603</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090603-20100710-1.trs'>FTVN_090603-20100710-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090603-20100710-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090605.wav'>FTVN_090605</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090605-20100711-1.trs'>FTVN_090605-20100711-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090605-20100711-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090608.wav'>FTVN_090608</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-2/FTVN_090608-20100517-1.trs'>FTVN_090608-20100517-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-2/FTVN_090608-20100517-1.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-民視台語新聞-3</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110627-zy.wav'>20110627-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110627-zy-20110115-120314.trs'>20110627-zy-20110115-120314.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110627-zy-20110115-120314.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110629-zy.wav'>20110629-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110629-zy-0117-120314.trs'>20110629-zy-0117-120314.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110629-zy-0117-120314.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110630-zy.wav'>20110630-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110630-zy-120308-120316.trs'>20110630-zy-120308-120316.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110630-zy-120308-120316.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110705-zy.wav'>20110705-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110705-zy-120220.trs'>20110705-zy-120220.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110705-zy-120220.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110706-zy.wav'>20110706-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110706-zy-120308-120317.trs'>20110706-zy-120308-120317.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110706-zy-120308-120317.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110707-zy.wav'>20110707-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110707-zy-0202.trs'>20110707-zy-0202.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110707-zy-0202.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110708-zy.wav'>20110708-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110708-zy-120310-120317.trs'>20110708-zy-120310-120317.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110708-zy-120310-120317.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110712-zy.wav'>20110712-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110712-zy-120310-120317.trs'>20110712-zy-120310-120317.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110712-zy-120310-120317.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110713-zy.wav'>20110713-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110713-zy-120208.trs'>20110713-zy-120208.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110713-zy-120208.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110714-zy-1.wav'>20110714-zy-1</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110714-zy-0215.trs'>20110714-zy-0215.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110714-zy-0215.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110715-zy.wav'>20110715-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110715-zy-20120307-120319.trs'>20110715-zy-20120307-120319.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110715-zy-20120307-120319.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110719-zy.wav'>20110719-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110719-zy-20120308-120319.trs'>20110719-zy-20120308-120319.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110719-zy-20120308-120319.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110721-zy.wav'>20110721-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110721-zy-20120311-120319.trs'>20110721-zy-20120311-120319.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110721-zy-20120311-120319.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110722-zy.wav'>20110722-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110722-zy-20120407.trs'>20110722-zy-20120407.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110722-zy-20120407.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110726-zy.wav'>20110726-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110726-zy-120227.trs'>20110726-zy-120227.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110726-zy-120227.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110804-zy.wav'>20110804-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110804-zy-120307.trs'>20110804-zy-120307.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110804-zy-120307.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110805-zy.wav'>20110805-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110805-zy-120311.trs'>20110805-zy-120311.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110805-zy-120311.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110909-zy.wav'>20110909-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110909-zy-120622-0710-120802.trs'>20110909-zy-120622-0710-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110909-zy-120622-0710-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110916-zy.wav'>20110916-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110916-zy120627-0711-120802.trs'>20110916-zy120627-0711-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110916-zy120627-0711-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110923-zy.wav'>20110923-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110923-zy-120729-120802.trs'>20110923-zy-120729-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110923-zy-120729-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20110929-zy.wav'>20110929-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20110929-zy-120729-120802.trs'>20110929-zy-120729-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20110929-zy-120729-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20111006-zy.wav'>20111006-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20111006-zy-120712-0727-120802.trs'>20111006-zy-120712-0727-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20111006-zy-120712-0727-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20111007-zy.wav'>20111007-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20111007-zy-120715-0728-120802.trs'>20111007-zy-120715-0728-120802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20111007-zy-120715-0728-120802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20111013-zy.wav'>20111013-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20111013-zy-020721-120724.trs'>20111013-zy-020721-120724.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20111013-zy-020721-120724.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-3/20111014-zy.wav'>20111014-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-3/20111014-zy-120716-120725-0731.trs'>20111014-zy-120716-120725-0731.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-3/20111014-zy-120716-120725-0731.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-民視台語新聞-4</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110626-zy.wav'>20110626-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110626-zy-120502-0620.trs'>20110626-zy-120502-0620.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110626-zy-120502-0620.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110627-zy.wav'>20110627-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110627-zy-120509.trs'>20110627-zy-120509.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110627-zy-120509.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110629-zy.wav'>20110629-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110629-zy-120517.trs'>20110629-zy-120517.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110629-zy-120517.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110630-zy.wav'>20110630-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110630-zy--120517-0702-0717.trs'>20110630-zy--120517-0702-0717.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110630-zy--120517-0702-0717.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110702-zy.wav'>20110702-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110702-zy-120526-0707-0717.trs'>20110702-zy-120526-0707-0717.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110702-zy-120526-0707-0717.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110705-zy.wav'>20110705-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110705-zy-120711-120722.trs'>20110705-zy-120711-120722.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110705-zy-120711-120722.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110706-zy.wav'>20110706-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110706-zy-120711-120722.trs'>20110706-zy-120711-120722.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110706-zy-120711-120722.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110707-zy.wav'>20110707-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110707-zy-120716-120722.trs'>20110707-zy-120716-120722.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110707-zy-120716-120722.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110712-zy.wav'>20110712-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110712-zy-120602-120722.trs'>20110712-zy-120602-120722.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110712-zy-120602-120722.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110713-zy.wav'>20110713-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110713-zy-120603.trs'>20110713-zy-120603.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110713-zy-120603.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110714-zy.wav'>20110714-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110714-zy-120608.trs'>20110714-zy-120608.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110714-zy-120608.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110719-zy.wav'>20110719-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110719-zy-120610.trs'>20110719-zy-120610.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110719-zy-120610.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110721-zy.wav'>20110721-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110721-zy-120612.trs'>20110721-zy-120612.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110721-zy-120612.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110726-zy.wav'>20110726-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110726-zy-120614.trs'>20110726-zy-120614.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110726-zy-120614.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110804-zy.wav'>20110804-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110804-zy-120617.trs'>20110804-zy-120617.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110804-zy-120617.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110809-zy.wav'>20110809-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110809-zy-120405-0425-0513.trs'>20110809-zy-120405-0425-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110809-zy-120405-0425-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110811-zy.wav'>20110811-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110811-zy-120407-120513.trs'>20110811-zy-120407-120513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110811-zy-120407-120513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110817-zy.wav'>20110817-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110817-zy-120510-0513.trs'>20110817-zy-120510-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110817-zy-120510-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110818-zy.wav'>20110818-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110818-zy120412-120513.trs'>20110818-zy120412-120513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110818-zy120412-120513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110825-zy.wav'>20110825-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110825-zy-120506-0513.trs'>20110825-zy-120506-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110825-zy-120506-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110908-zy.wav'>20110908-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110908-zy-120506-0513.trs'>20110908-zy-120506-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110908-zy-120506-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110916-zy.wav'>20110916-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110916-zy120414-120513.trs'>20110916-zy120414-120513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110916-zy120414-120513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20110929-zy.wav'>20110929-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20110929-zy-120429-0508-0802.trs'>20110929-zy-120429-0508-0802.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20110929-zy-120429-0508-0802.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20111006-zy.wav'>20111006-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20111006-zy-120506-0513.trs'>20111006-zy-120506-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20111006-zy-120506-0513.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/FTVN-4/20111013-zy.wav'>20111013-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/FTVN-4/20111013-zy-120506-0513.trs'>20111013-zy-120506-0513.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/FTVN-4/20111013-zy-120506-0513.trs"></td>
		<tr>
		</table>
<hr>
		<h3>戲劇-浪滔砂</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS03.wav'>浪滔砂03</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS03_101012.trs'>浪滔砂03_101012.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS03_101012.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS06.wav'>浪滔砂06</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS06_100325-1.trs'>浪滔砂06_100325-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS06_100325-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS09.wav'>浪滔砂09</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS09_100406.trs'>浪滔砂09_100406.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS09_100406.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS12.wav'>浪滔砂12</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS12_100410.trs'>浪滔砂12_100410.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS12_100410.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS15.wav'>浪滔砂15</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS15_091206.trs'>浪滔砂15_091206.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS15_091206.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS21.wav'>浪滔砂21</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS21_100110.trs'>浪滔砂21_100110.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS21_100110.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS24.wav'>浪滔砂24</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS24-1.trs'>浪滔砂24-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS24-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS27.wav'>浪滔砂27</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS27-1.trs'>浪滔砂27-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS27-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/LTS/LTS30.wav'>浪滔砂30</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/LTS/LTS30-1.trs'>浪滔砂30-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/LTS/LTS30-1.trs"></td>
		<tr>
		</table>
<hr>
		<h3>戲劇-娘家</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-003.wav'>娘家-003</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-003-compare.trs'>娘家-003-compare.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-003-compare.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-013.wav'>娘家-013</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-013-20130120.trs'>娘家-013-20130120.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-013-20130120.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-023.wav'>娘家-023</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-023-compare.trs'>娘家-023-compare.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-023-compare.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-033[2]-0414.wav'>娘家-033</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-033[2]-0414.trs'>娘家-033[2]-0414.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-033[2]-0414.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-043.wav'>娘家-043</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-043-110630.trs'>娘家-043-110630.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-043-110630.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-053.wav'>娘家-053</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-053-compare.trs'>娘家-053-compare.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-053-compare.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-203.wav'>娘家-203</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-203-compare-130221.trs'>娘家-203-compare-130221.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-203-compare-130221.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-223.wav'>娘家-223</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-223_110313-0131-130219.trs'>娘家-223_110313-0131-130219.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-223_110313-0131-130219.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-243(chencau)-kdlu-110418.wav'>娘家-243</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-243(chencau)-kdlu-110418.trs'>娘家-243(chencau)-kdlu-110418.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-243(chencau)-kdlu-110418.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-253-100[1].3.23-110402-20130215.wav'>娘家-253</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-253-100[1].3.23-110402-20130215.trs'>娘家-253-100[1].3.23-110402-20130215.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-253-100[1].3.23-110402-20130215.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-263(100[1].03.11)-110326-20130215.wav'>娘家-263</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-263(100[1].03.11)-110326-20130215.trs'>娘家-263(100[1].03.11)-110326-20130215.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-263(100[1].03.11)-110326-20130215.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-333.wav'>娘家-333</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-333_110217.trs'>娘家-333_110217.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-333_110217.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-363.wav'>娘家-363</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-363-130126-0131-130218.trs'>娘家-363-130126-0131-130218.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-363-130126-0131-130218.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-383.wav'>娘家-383</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-383-chencau-ok-110321-20130215.trs'>娘家-383-chencau-ok-110321-20130215.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-383-chencau-ok-110321-20130215.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-393.wav'>娘家-393</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-393_compare_110308.trs'>娘家-393_compare_110308.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-393_compare_110308.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/MH/MaternalHome-413(chencau)-kdlu.wav'>娘家-413</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/MH/MaternalHome-413(chencau)-kdlu.trs'>娘家-413(chencau)-kdlu.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/MH/MaternalHome-413(chencau)-kdlu.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-公視台語新聞-1</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100518.wav'>PTSN-20100518</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100518-1.trs'>PTSN-20100518-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100518-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100519.wav'>PTSN-20100519</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100519-1.trs'>PTSN-20100519-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100519-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100520.wav'>PTSN-20100520</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100520-1.trs'>PTSN-20100520-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100520-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100521.wav'>PTSN-20100521</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100521-1.trs'>PTSN-20100521-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100521-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100522.wav'>PTSN-20100522</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100522-1.trs'>PTSN-20100522-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100522-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100523.wav'>PTSN-20100523</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100523-1.trs'>PTSN-20100523-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100523-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100524.wav'>PTSN-20100524</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100524-1.trs'>PTSN-20100524-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100524-1.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100525.wav'>PTSN-20100525</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-1/PTSN-20100525-1.trs'>PTSN-20100525-1.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-1/PTSN-20100525-1.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-公視台語新聞-2</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PSTN-20101103.wav'>PSTN-20101103</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PSTN-20101103.trs'>PSTN-20101103.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PSTN-20101103.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PSTN-20101110.wav'>PSTN-20101110</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PSTN-20101110-1208.trs'>PSTN-20101110-1208.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PSTN-20101110-1208.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101022(chencau).wav'>PTSN-20101022</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PTSN-20101022(chencau).trs'>PTSN-20101022(chencau).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101022(chencau).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101025(chentsau).wav'>PTSN-20101025</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PTSN-20101025(chentsau).trs'>PTSN-20101025(chentsau).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101025(chentsau).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101027.wav'>PTSN-20101027</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PTSN-20101027_101202.trs'>PTSN-20101027_101202.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101027_101202.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101105.wav'>PTSN-20101105</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PTSN-20101105_101210.trs'>PTSN-20101105_101210.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101105_101210.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-20101108.wav'>PTSN-20101108</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-2/PTSN-2010110825.trs'>PTSN-2010110825.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-2/PTSN-2010110825.trs"></td>
		<tr>
		</table>
<hr>
		<h3>新聞-公視台語新聞-3</h3>
		<table border=1>
		<td><h4>聲音檔</h4></td>
		<td><h4>線上瀏覽</h4></td>
		<td><h4>統計選擇</h4></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20120928-zy.wav'>PTSN_20120928-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20120928-zy-121006.trs'>PTSN_20120928-zy-121006.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20120928-zy-121006.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121005-zy.wav'>PTSN_20121005-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121005-zy-121021.trs'>PTSN_20121005-zy-121021.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121005-zy-121021.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121006-zy.wav'>PTSN_20121006-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121006-zy-121014.trs'>PTSN_20121006-zy-121014.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121006-zy-121014.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121007-zy.wav'>PTSN_20121007-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121007-zy-121010.trs'>PTSN_20121007-zy-121010.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121007-zy-121010.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121019-zy.wav'>PTSN_20121019-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121019-zy-121029.trs'>PTSN_20121019-zy-121029.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121019-zy-121029.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121023-zy.wav'>PTSN_20121023-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121023-zy-121105.trs'>PTSN_20121023-zy-121105.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121023-zy-121105.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121103-zy.wav'>PTSN_20121103-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121103-zy-121111.trs'>PTSN_20121103-zy-121111.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121103-zy-121111.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121110-zy.wav'>PTSN_20121110-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121110-zy-130113.trs'>PTSN_20121110-zy-130113.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121110-zy-130113.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121111-zy.wav'>PTSN_20121111-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121111-20130114-130207-0223-zy.trs'>PTSN_20121111-20130114-130207-0223-zy.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121111-20130114-130207-0223-zy.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121114-zy.wav'>PTSN_20121114-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121114-zy-121211.trs'>PTSN_20121114-zy-121211.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121114-zy-121211.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121116-zy.wav'>PTSN_20121116-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121116-zy-121126.trs'>PTSN_20121116-zy-121126.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121116-zy-121126.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121117-zy.wav'>PTSN_20121117-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121117-zy-121201.trs'>PTSN_20121117-zy-121201.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121117-zy-121201.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121201-zy.wav'>PTSN_20121201-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121201-1228-zy130213.trs'>PTSN_20121201-1228-zy130213.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121201-1228-zy130213.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121202-zy.wav'>PTSN_20121202-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121202-20130109-zy-130214-0223.trs'>PTSN_20121202-20130109-zy-130214-0223.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121202-20130109-zy-130214-0223.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121204-zy.wav'>PTSN_20121204-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121204-zy-121224.trs'>PTSN_20121204-zy-121224.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121204-zy-121224.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121207-zy.wav'>PTSN_20121207-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121207-1224-zy130214.trs'>PTSN_20121207-1224-zy130214.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121207-1224-zy130214.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121219-zy.wav'>PTSN_20121219-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121219-20130102-zy-130216.trs'>PTSN_20121219-20130102-zy-130216.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121219-20130102-zy-130216.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121221-zy.wav'>PTSN_20121221-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121221-zy-121231.trs'>PTSN_20121221-zy-121231.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121221-zy-121231.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121229-zy.wav'>PTSN_20121229-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121229-zy-130104.trs'>PTSN_20121229-zy-130104.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121229-zy-130104.trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121230-20130107-130207-0223-zy (1).wav'>PTSN_20121230-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20121230-20130107-130207-0223-zy (1).trs'>PTSN_20121230-20130107-130207-0223-zy (1).trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20121230-20130107-130207-0223-zy (1).trs"></td>
		<tr>
		<td><a href='http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20130105-zy.wav'>PTSN_20130105-zy</a></td>
		<td><a href='http://140.109.18.117/download_page/dic2trs.php?url=/GitRepos/finish/PTSN-3/PTSN_20130105-zy-130110.trs'>PTSN_20130105-zy-130110.trs</a></td>
		<td><input name="item1[]" type="checkbox" value="http://140.109.18.117/GitRepos/finish/PTSN-3/PTSN_20130105-zy-130110.trs"></td>
		<tr>
</form>
</body>
</html>