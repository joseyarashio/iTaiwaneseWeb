
<!DOCTYPE html>
<!------------------------------------------------------------>
<html>
<head>
	<link href="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="http://glyphicons.getbootstrap.com/css/bootstrap-glyphicons.css" />
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="http://simonwhitaker.github.com/github-fork-ribbon-css/gh-fork-ribbon.css" />

    <link rel="stylesheet" href="style.css" />

    <script src="observer.js"></script>

    <script src="src/wavesurfer.js"></script>
    <script src="src/webaudio.js"></script>
    <script src="src/drawer.js"></script>
    <script src="src/drawer.canvas.js"></script>
    <script src="src/drawer.svg.js"></script>

    <!-- <script src="english_novel/main.js"></script> -->
	<meta name="google-translate-customization" content="c303e05954d83c3-a8d40c5171a26753-g4b398e359f7bf168-1c"></meta>
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
	<script type="text/javascript">
	var strUrl = location.search;
		var getPara, ParaVal;
		var aryPara = [];

		if (strUrl.indexOf("?") != -1) {
			var getSearch = strUrl.split("?");
			getPara = getSearch[1].split("&");
			for (i = 0; i < getPara.length; i++) {
				ParaVal = getPara[i].split("=");
				aryPara.push(ParaVal[0]);
				aryPara[ParaVal[0]] = ParaVal[1];
			}
		}
		var temp = aryPara['file'];
		var zoom = 0.5;

	</script>
<body onload = "load_file('<?php echo $_GET['file'] ?>')">
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'zh-TW'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<form action="../index.php"><input type=submit value=回上頁></form>        
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
				<div name="S_result" id="S_result" style="width:1000px;height:550px;overflow:auto;"></div><br>
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
		var current_time = 0;//目前播放時間
		var currentKey = 0;//目前播放的array index
		
		//音樂播放狀態
		
		function load_list(){
			$.ajax({//開啟文字檔
					type: "POST",
					url: "multilLang.txt",
					dataType: "text",
					async:false,
					error:function(xhr){alert('error:'+"open file multilLang.txt");},//開啟失敗
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
					error:function(xhr){alert('error:'+"open file "+file_name+".trs");},//開啟失敗
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
			//wavesurfer.playByText(time[current]);
			document.getElementById("Sentence"+currentKey+"").className = "normalLyric";
			currentKey = current;
			document.getElementById("Sentence"+currentKey+"").className = "blueLyric";
			grab_time();
		}
		
		function grab_time(){
			current_time=media.currentTime
			//current_time = wavesurfer.backend.getCurrentTime();	
			
			if($("#independent").attr("checked")){
				if(current_time > time[currentKey+1]){
					media.pause();
					//wavesurfer.playByText(time[currentKey]);
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

	<script src="main.js"></script>
	<div class="container">
            <hr />
            <div id="waveform" style="height: 128px">
                <div class="progress" id="progress-bar">
                    <div class="progress-bar progress-bar-info"></div>
                </div>

                <!-- Here be the waveform -->
            </div>

            <div class="controls">
                <button class="btn btn-primary" data-action="back">
                    <i class="glyphicon glyphicon-step-backward"></i>
                    Backward
                </button>

                <button class="btn btn-primary" data-action="play">
                    <i class="glyphicon glyphicon-play"></i>
                    Play
                    /
                    <i class="glyphicon glyphicon-pause"></i>
                    Pause
                </button>

                <button class="btn btn-primary" data-action="forth">
                    <i class="glyphicon glyphicon-step-forward"></i>
                    Forward
                </button>

                <button class="btn btn-primary" data-action="toggle-mute">
                    <i class="glyphicon glyphicon-volume-off"></i>
                    Toggle Mute
                </button>
				
				<button class="btn btn-primary" data-action="zoomout">
                    <i class="glyphicon glyphicon-minus-sign"></i>
                    Zoom out
				</button>	
				
				<button class="btn btn-primary" data-action="zoomin">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                    Zoom in
                </button>            
				
            </div>

            <hr /> 
		

</body>
</html>

