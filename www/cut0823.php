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
		$result=mysqli_query($link,"SELECT  `value` FROM `web` WHERE `location`='./cut0823.php'");
		$row = mysqli_fetch_row($result);
		if($value<$row[0]){
			echo"<script>alert(\"權限不足或帳號已登出\");</script>";
			$url="權限不足或帳號已登出";
			$EncodeStr=urlencode($url);
			date_default_timezone_set('Asia/Taipei');
			$datetime=date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
			mysqli_query($link,"INSERT INTO `visitinfo`(`visitor`, `ip`, `target`, `date`) VALUES ('問題','".$ip."','./cut0823.php','".$datetime."')");
			header("Refresh:0;url=../login.php?error_message=$EncodeStr");
			exit();
		}
	?>﻿<!DOCTYPE html>
<?php
#include_once("connectdb.php");
#start_session(600);
##session_start(); 
#$query="SELECT * FROM user WHERE username='".$_SESSION['username']."'";
#$result = mysql_query($query) or die(mysql_error());
#$row = mysql_fetch_array($result);
##if($row['verify']==0)
##{
##	#echo '<script>alert("尚未通過認證");
##	#	  Response.Redirect("destroy.php")</script>';
##	#for($i=0;$i<1000000;$i++){}
##	#header("location:destroy.php");	
##	echo "<script>alert('尚未通過認證!'); location.href='destroy.php'; </script>";
##}
#if(empty($_SESSION['username']) or $_SESSION['username']=='guest')
#{
#  header("location:index.php");	
#}
#echo "<font size=5 color=blue>You are : ".$_SESSION['username']."</font>";
#echo '<form action=./destroy.php method=get><input type=submit value=logout></form>';
#function start_session($expire = 0)       #session過期機制
#{
#    if ($expire == 0) {
#        $expire = ini_get('session.gc_maxlifetime');
#    } else {
#        ini_set('session.gc_maxlifetime', $expire);
#    }
#
#    if (empty($_COOKIE['PHPSESSID'])) {
#        session_set_cookie_params($expire);
#        session_start();
#    } else {
#        session_start();
#        setcookie('PHPSESSID', session_id(), time() + $expire);
#    }
#}
#
	


?>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<link rel="stylesheet" type="text/css" href="js/tree_themes/SimpleTree.css"/>
	<script type="text/javascript" src="js/SimpleTree.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<style> 
		.lineNum {font-size:18px;color:dimgray}
		.blueLyric {font-size:20px;font-weight:bold;color:blue;}
        .normalLyric {font-size:20px;font-weight:bold;color:black;}
	</style> 
	</head>
<body>
	<form name="myform">
		<table border="0">
			<tr><td valign="top">
				<audio id="media" controls> //FF not supported mp3
					audio not supported
				</audio><br>
				播放速度:
				<div id="media_rate">1.0</div>
				改變播放速度:
				<input type="button" value="+0.1" onclick=rate(0.1)>
				<input type="button" value="-0.1" onclick=rate(-0.1)>
				<input type="button" value="reset" onclick=rate(1)><br/>
				<input type="checkbox" name="independent" id="independent">單句播放<br><br>
				</td><td rowspan=2 valign="top">
				<div name="S_result" id="S_result" style="width:1000px;height:550px;overflow:auto;">請選擇左欄檔案清單以顯示指定內容。</div><br>
				</td></tr>
				<tr><td valign="top">
					<div class="st_tree" id="st_tree" name="st_tree"  style="width:260px;height:500px; overflow:auto;"></div>
			
				</td></tr>
		</table>
	</form>
	<script type="text/javascript">
			$(function(){
							$(".st_tree").SimpleTree();
						});
		var pre_time = new Array();	//處理前的時間陣列
		var time = new Array();//處理後的時間陣列
		var pre_text = new Array();//處理前的文字陣列
		var text = new Array();//處理後的文字陣列
		var current_time = "";//目前播放時間
		var currentKey = 0;//目前播放的array index
		//音樂播放狀態
		
		function load_list(){
			$.ajax({//開啟文字檔
					type: "POST",
					url: "file_list.txt",
					dataType: "text",
					async:false,
					error:function(xhr){alert('error:'+"open file failed");},//開啟失敗
					success: function(msg){
						$("#st_tree").append(msg);//進行文字處理
						
					}
			});
		}
		function load_file(file_name){
			$(".row_n").remove();
			
			$.ajax({//開啟文字檔
					type: "POST",
					url: file_name+".trs",
					dataType: "text",
					async:false,
					error:function(xhr){alert('error:'+"open file failed");},//開啟失敗
					success: function(msg){
						splitText(msg,file_name);//進行文字處理
					}
			});
			
		}
		function splitText(msg,file_name){
			var i = 0, m = 0;
			pre_text = msg.split(/<\?.*\?>|<!DOCTYPE.*>|<.*Trans.*>|<.*Speaker.*>|<.*Topic.*>|<.*Section.*>|<.*Turn.*>|<.*Episode.*>|<.*Background.*>|<Sync.*>/);
			pre_time = msg.split(/<\?.*\?>|<!DOCTYPE.*>|<Trans|<.*Event.*>|<.*Speaker.*>|<.*Topic.*>|<.*Section.*>|<.*Turn.*>|<.*Episode.*>|<.*Background.*>|<Sync |"\/>/);
			while(i != pre_time.length){//處理時間陣列
				if(/time=".+/.test(pre_time[i])){//去除文字time="xxx"
					time[m] = pre_time[i].split(/time="/)[1];
					m++;
				}
				if(/.*audio_filename=.+/.test(pre_time[i])){
					var media_src = pre_time[i].split(/.*audio_filename="|".*>/)[1];
					if(media_src == "MSPLAB")
						media.src = file_name+".wav";
					else{
						var file_path = file_name.lastIndexOf('/');
						media.src = file_name.substring(0,file_path+1) + media_src+".wav";
					}
				
				}
				i++;
			
			}
			i = 0, m = 0;
			while(i != pre_text.length){//處理文字陣列
				if(/.+/.test(pre_text[i])){//去除空白
					text[m] = pre_text[i];
					m++;
				}
				i++;
			}
			i = 0, m = 0;
			while(text.length > i){//將時間+文字顯示
				$("#S_result").append("<div class=row_n><span class = lineNum>"+i+"</span><span id='Sentence"+i+"' class=normalLyric onclick='part_play("+i+")'>"+text[i]+"</span></div>"); 
				i++;
			}
		}
		
		function part_play(current){//random access
			media.currentTime = time[current];
			document.getElementById("Sentence"+currentKey+"").className = "normalLyric";
			currentKey = current;
			document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
			media.play();
			grab_time();
		}
		
		function grab_time(){
			
			current_time = media.currentTime;
			if($("#independent").attr("checked")){
				if(current_time > time[currentKey+1]){
					media.pause();
				}
			}
			else{
				var dev = 0;
				if(current_time > time[currentKey+1]){//播放達到下一句文字時間
					while(current_time > time[currentKey+dev+1])//處理當使用者直接往後拉動音樂的播放條
						dev += 1;
					document.getElementById("Sentence"+currentKey+"").className = "normalLyric";
					currentKey = currentKey+dev;
					document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
				}
				
				else if(current_time < time[currentKey]){
					while(current_time < time[currentKey+dev])//處理當使用者直接往前拉動音樂的播放條
						dev -= 1;
					document.getElementById("Sentence"+currentKey+"").className = "normalLyric";
					currentKey = currentKey+dev;
					document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
				}
			}
			
			window.setTimeout("grab_time()", 50);
		}
		
		function rate(speed)
		{
			if(speed == 1)
				media.playbackRate = 1;
			else
				media.playbackRate+=speed;
			document.getElementById("media_rate").innerHTML = media.playbackRate;
		}
		load_list();
		grab_time();
	</script>
</body>
</html>