<!DOCTYPE html>
<?php
start_session(600);
#session_start(); 
if(empty($_SESSION['username']) or $_SESSION['username']=='guest')
{
  header("location:index.php");	
}
echo "You're logged as ".$_SESSION['username'];
echo '<form action=./destroy.php method=get><input type=submit value=logout></form>';
function start_session($expire = 0)       #session過期機制
{
    if ($expire == 0) {
        $expire = ini_get('session.gc_maxlifetime');
    } else {
        ini_set('session.gc_maxlifetime', $expire);
    }

    if (empty($_COOKIE['PHPSESSID'])) {
        session_set_cookie_params($expire);
        session_start();
    } else {
        session_start();
        setcookie('PHPSESSID', session_id(), time() + $expire);
    }
}
?>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<link rel="stylesheet" type="text/css" href="js/tree_themes/SimpleTree.css"/>
	<script type="text/javascript" src="js/SimpleTree.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<style> 
		.ONE {font-size: 10px;color:red;}
		.blueLyric {font-size:20px;font-weight:bold;color:blue;font-family:Arial;}
        .normalLyric {font-size:20px;font-weight:bold;color:black;font-family:Arial;}
	</style> 
	</head>
<body>
	<form name="myform">
		<table border="0">
			<tr><td valign="top">
				<audio id="media" controls> //FF not supported mp3
					audio not supported
				</audio><br>
				改變播放速度:<input type="button" value="+" onclick=rate(0.1)>
				<input type="button" value="-" onclick=rate(-0.1)>
				<br>
				延遲時間:<select name="delay" id="delay"> 
					<option value="0" >0 second</option>
					<option value="300" >0.3 second</option>
					<option value="600" >0.6 second</option>
					<option value="1000">1.0 second</option>
				</select><br>
				<input type="checkbox" name="independent" id="independent">單句播放<br><br>
				</td><td rowspan=2 valign="top">
				<div name="S_result" id="S_result" style="width:1200px;height:600px;overflow:auto;"></div><br>
				</td></tr>
				<tr><td valign="top">
					<div class="st_tree" id="st_tree" name="st_tree"></div>
			
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
		var NowPlay= "y";//音樂播放狀態
		
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
			$(".normalLyric").remove();
			$(".blueLyric").remove();
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
				$("#S_result").append("<div id='Sentence"+i+"' class=normalLyric onclick='part_play("+i+")'>"+text[i]+"</div>"); 
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
					if($("select#delay").val()!= 0){
						window.setTimeout("continue_play()",$("select#delay").val());
						media.pause();
						NowPlay = "n";
						media.currentTime = current_time;
					}
					currentKey = currentKey+dev;
					document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
				}
				
				else if(current_time < time[currentKey]){
					while(current_time < time[currentKey+dev])//處理當使用者直接往前拉動音樂的播放條
						dev -= 1;
					document.getElementById("Sentence"+currentKey+"").className = "normalLyric";
					if($("select#delay").val()!= 0){
						window.setTimeout("continue_play()",$("select#delay").val());
						media.pause();
						NowPlay = "n";
						media.currentTime = current_time;
					}
					currentKey = currentKey+dev;
					document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
				}
			}
			if(NowPlay == "y")
				window.setTimeout("grab_time()", 50);
		}
		function continue_play(){			
			current_time = media.currentTime;
			if(!$("#independent").attr("checked"))
				media.play();
			NowPlay = "y";
			grab_time();
		}
		function rate(speed)
		{
			media.playbackRate+=speed;
		}
		load_list();
		grab_time();
	</script>
</body>
</html>
