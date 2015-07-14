<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>爭議選擇</title>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<style>
.normal {font-size:22px;font-weight:bold;color:black}
.wordst {font-size:20px;font-weight:bold;color:dimgray}
#S_result { 
margin-top:5%; 
margin-left:10%; 
}
</style>
</head>
<?php
#$aCommand= 'c:/Python32/python.exe dictionary.py searchtrs';
#$aReturn= system($aCommand);
$fp = fopen('cmd', 'w');
fwrite($fp,"searchtrs");
fclose($fp);
sleep(1);

if(@$_POST["send"]=="送出"){
	$user=iconv("UTF-8","big5",$_GET["user"]);
	#$aCommand= 'c:/Python33/python.exe getroot.py';
	#$aReturn= system($aCommand);
	#$strB=iconv("UTF-8","big5",$_POST["output"]);
	#$aCommand= 'c:/Python33/python.exe dictionary.py checkDic '.$strB .' ' .$user;
	#$aReturn= system($aCommand);
	#echo $aCommand;
	$fp = fopen('cmd', 'w');
	fwrite($fp,"checkDic\t".$_POST["output"]."\t".$user);
	fclose($fp);
	sleep(1);
	header('Location: http://140.109.18.117/download_page/check_page.php?&user='.$user);
	}
?>
<body>
	<form method="post" name="myform">
		<div name="S_result" id="S_result" style="width:auto;height:auto;overflow:auto;"></div>
	</form>
	<script type="text/javascript">
	var syllist=new Array();
	var tails=new Array();
	function read(){
		$.ajax({//開啟文字檔
					type: "POST",
					url: "http://140.109.18.117/download_page/collision",
					dataType: "text",
					async:false,
					error:function(xhr){alert('error: '+file_name+" open file failed");},//開啟失敗
					success: function(msg){
						tails=msg.split('\t');//進行文字處理
						//tails=tails.reverse()
					}
			});	
		file_name="http://140.109.18.117/download_page/collision.json"
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
	function print(j){
		var i=0;
		var value="";
		while (i < j)
		{
			var index=document.getElementById("syl"+i).options.selectedIndex;
			
			value=value+syllist[i][index]+"+";
			i++;
		}
		$("#S_result").append('<input type=text value="'+value+'" name="output">');
	}
	function Tail(msg){
		var collision = JSON.parse ( msg );
		var i=0;
		var j=0;
		var playlist=0;
		var temp=new Array();
		while ( i < collision.length)
		{
			if ( collision[i].flag == 0)
			{
				temp=tails[playlist].split("+")
				$("#S_result").append('<div onClick="wavplay('+playlist+')">'+temp[3]+'</div></BR>');
				playlist++;
				temp=tails[playlist].split("+")
				syllist[j]=[];
				//$("#S_result").append('<span>'+collision[i].syllable+'<select id="syl'+j+'"></select><a href="http://140.109.18.117/download_page/wavplay.html?'+temp[0]+'%10'+temp[1]+'">'+temp[2]+'</a></span></BR>');
				var temp1=new Array();
				var k=0;
				temp1=temp[3].split(" ");
				temp1[temp[4]]="<span style=\"background-color:yellow\"> "+temp1[temp[4]]+" </span>";
				temp[3]=""
				while ( k < temp1.length)
				{
					temp[3]=temp[3]+temp1[k]+" ";
					k++;
				}
				$("#S_result").append('<div class=wordst>'+collision[i].syllable+'<select id="syl'+j+'" class=normal></select><a onClick="wavplay('+playlist+')">'+temp[3]+'</a></div></BR>');
				
				document.getElementById("syl"+j).options[0]=new Option(collision[i].Controversy["Original"], collision[i].Controversy["Original"]);
				syllist[j][0]=collision[i].Controversy["Original"];
				
				document.getElementById("syl"+j).options[1]=new Option(collision[i].Controversy["Proposal"][0], collision[i].Controversy["Proposal"][0]);
				syllist[j][1]=collision[i].Controversy["Proposal"][0];
				
				document.getElementById("syl"+j).options[2]=new Option("null", "null");
				syllist[j][2]="null";
				//alert(collision[i].Controversy["addr"][0])
				j++;
				playlist++;
			}
			i++;
		}
		$("#S_result").append('<input name="send" type="submit" value="送出" onClick=print('+j+')><BR>')
	}
	function wavplay(wav){
		var temp=new Array();
		temp=tails[wav].split("+")
		window.open("http://140.109.18.117/download_page/wavplay.html?"+temp[0]+'%10'+temp[1]+'%10'+temp[2],"width=350,height=120,menubar=no,toolbar=no")
	}
	read();
</script>
</body>