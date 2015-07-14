<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>搜尋中...</title>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<style> 
	#searchpage { 
	margin-top:5%; 
	margin-left:10%; 
	}
	.normal {font-size:20px;font-weight:bold;color:black}
	.wordst {font-size:20px;font-weight:bold;color:dimgray}
	.blueLyric {font-size:20px;font-weight:bold;color:blue;}
	.normalLyric {font-size:20px;font-weight:bold;color:black;}
</style> 
</head>
<body>
	<form method="post" name="myform">
	<table border="1">
		<div name="searchpage" id="searchpage" style="width:1000px;height:400px;overflow:auto;"></div>
	</table>
	</form>
	<script type="text/javascript">
	var pre =new Array();
	function read(){
		file_name="http://140.109.18.117/download_page/result"
		$.ajax({//開啟文字檔
					type: "POST",
					url: file_name,
					dataType: "text",
					async:false,
					error:function(xhr){document.location.href="http://140.109.18.117/download_page/search.php";},//開啟失敗
					success: function(msg){
						pre = msg.split(/\n/);
						var i=1;
						$("#searchpage").append('<div class=normal>'+pre[0]+'</div>')
						while(i < pre.length-1)
						{	
							var text=pre[i].split(/\t/);
							//alert(text[1]);
							$("#searchpage").append('<span onClick="wavplay('+i+')" class=wordst>'+text[0]+' '+text[1]+'</span><br>');
							i++;
						}
					}
			});
	}
	function wavplay(wav){
		var t=pre[wav].split(/\t/);	
		window.open("http://140.109.18.117/download_page/wavplay.html?"+t[1]+'%10'+t[2]+'%10'+t[3],"width=350,height=120,menubar=no,toolbar=no")
	}
	read();
	//SetTimeOut(read(),3000);
	</script>
</body>
</html>