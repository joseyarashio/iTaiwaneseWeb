<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>搜尋字典中...</title>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<style>
.normal {font-size:25px;font-weight:bold;color:black}
.wordst {font-size:20px;font-weight:bold;color:dimgray}
#S_result { 
margin-top:5%; 
margin-left:10%; 
}
</style>
</head>

<?php
#header ('Content-Type: text/html; charset=big5');
$url=$_GET["url"];
$timer=$_GET["time"];
$user=iconv("UTF-8","big5",$_GET["user"]);

#$url=str_replace(" ","%20",$url);
#$aCommand= 'c:/Python33/python.exe C:/AppServ/www/download_page/dictionary.py searchDic ' .$url ." " .$timer;
#$aReturn= system($aCommand);
$fp = fopen('cmd', 'w');
fwrite($fp,"searchDic\t".$url."\t".$timer);
fclose($fp);
sleep(2);
#echo $aReturn."<br>".$aCommand."<br>";
if(@$_POST["send"]=="送出"){
	echo $_POST["output"];
	$strB=iconv("UTF-8","big5",$_POST["output"]);
	#$aCommand= 'c:/Python33/python.exe dictionary.py insertDic ' .$url ." " .$timer ." " .$strB." ".$user;
	#$aReturn= system($aCommand);
	$fp = fopen('cmd', 'w');
	fwrite($fp,"insertDic\t".$url."\t".$timer."\t".$_POST["output"]."\t".$user);
	fclose($fp);
	sleep(2);
	header('Location: http://140.109.18.117/download_page/searchDic.php?url='.$url.'&time='.$timer."&user=".$user);
}
?>
<body>
	<form method="post" name="myform">
	<table border="0">
		<div name="cut_page" id="cut_page" style="width:auto;height:auto;overflow:auto;"></div><br>
		<div name="S_result" id="S_result" style="width:600px;height:300px;overflow:auto;"></div>
	</table>
	</form>
	<script type="text/javascript">
	var syllist=new Array();
	function cut(){
		var pre_text = msg.split(/\t/);
		var list1 = pre_text[pre_text.length].split(/ /)
		while(i < list1.length)
		{
			list2=list1[i].split(/-/);
			lists=lists+pre[0]+" ";
			i++;
		}
	}
	function read(){
		$("#S_result").empty()
		file_name="http://140.109.18.117/download_page/searchDic"
		$.ajax({//開啟文字檔
					type: "POST",
					url: file_name,
					dataType: "text",
					async:false,
					error:function(xhr){alert('error: '+file_name+" open file failed");},//開啟失敗
					success: function(msg){
						//$("#S_result").append('<input type="button" value="read" onclick="read()"><br>');
						Tail(msg);//進行文字處理
					}
			});	
	}
	function print(i){
		var j=0;
		var value="";
		while(j<i)
		{
			var index=document.getElementById("list_"+j).options.selectedIndex;
			if(j!=0){value=value+"+";}
			if(document.getElementById("in"+j).value != "")
			{
				value=value+document.getElementById("in"+j).value;
			}
			else
			{
				value=value+syllist[j][index];
				}
			j++;
		}
		$("#S_result").append('<input type=text value="'+value+'" name="output">');
	}
	function Tail(msg){
	var pre_text = msg.split(/\t/);
	var i=0;
	var lists = "";
	while(i < pre_text.length-1)
	{
		pre=pre_text[i].split(/=/);
		lists=lists+pre[0]+" ";
		i++;
	}
	i=0;
	$("#S_result").append('<span class=normal>'+lists+'</span><br>');
	lists="";
	while(i < pre_text.length-1)
		{
			if(!pre_text[i] == "")
			{
				lists = "list_"+i;
				var text = pre_text[i].split(/=/);
				syllist[i]=[]
				if(/=.+/.test(pre_text[i])){
				$("#S_result").append('<span class=wordst>'+text[0]+'<select id="'+lists+'"></select><input type=text value="" id="in'+i+'"</span></BR>');
				var index = document.getElementById(lists).options.length;
				var j=0;
				var tails = text[1].split(/,/);
				while ( j < tails.length)
					{
					syllist[i][j]=tails[j];
					document.getElementById(lists).options[j]=new Option(tails[j], tails[j]);
					j++;
					}
				//syl[i][j]=null;
				//document.getElementById(lists).options[j]=new Option(syl[i][j],syl[i][j]);
				}
				//lists.options[0]=new Option(text[0], text[1]);
				i++;
			}
			else
			{
				pre_text.length=i
			}
		}
		$("#S_result").append('<input name="send" type="submit" value="送出" onClick=print('+i+')><BR>')
	}
	read()
	</script>
</body>
</html>